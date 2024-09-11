<?php

namespace Asesores\Model;

use Asesores\core\CRest;

class ModelBitrix
{
    public $datos = [];
    public function ObtenerCompanias($paginacion)
    {
        $result = CRest::call('crm.company.list', [
            "select" => ['UF_CRM_1715009836', 'UF_CRM_1715008800'],
            "start" => $paginacion
        ]);
        return $result;
    }
    public function ListarCompanias(): array
    {
        $paginacion = 0;
        $results = $this->ObtenerCompanias($paginacion);

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

                    $results = $this->ObtenerCompanias($paginacion);
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
    public function CrearNegociacionCSU()
    {
        $result = CRest::call('crm.deal.add', []);
        return $result;
    }
}
