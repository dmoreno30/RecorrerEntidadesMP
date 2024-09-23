<?php

namespace Asesores\Model;

use Asesores\core\CRest;

class ModelBitrix
{
    public $datos = [];
    public function ObtenerDatosCRM($paginacion, $entidad)
    {
        $result = CRest::call("crm.$entidad.list", [
            "select" => ["UF_CRM_1715008800", "UF_CRM_1715009836"],
            "start" => $paginacion
        ]);
        return $result;
    }
    public function ListarCompanias(): array
    {
        $paginacion = 0;
        $results = $this->ObtenerDatosCRM($paginacion, "company");

        if ($results['next']) {
            $co = false;
            $break = false;
            while (true) {

                if ($co) {
                    if ($results['next']) {
                        $paginacion = $results['next'];
                    } else {

                        $break = true;
                    }

                    $results = $this->ObtenerDatosCRM($paginacion, "company");
                }
                if ($break) {
                    break;
                }
                for ($i = 0; $i < count($results['result']); $i++) {
                    array_push($this->datos, $results["result"][$i]);
                }

                $co = true;
            }
        } else {
            foreach ($results["result"] as $result) {
                array_push($datos, $result);
            }
        }

        return $this->datos;
    }
    public function CrearNegociacionCSU($nombre, $company_id, $categoryID)
    {
        $result = CRest::call(
            'crm.deal.add',
            [
                "category_id" => $categoryID,
                "company_id" => $company_id,
                "TITLE" => $nombre
            ]
        );
        return $result;
    }
}
