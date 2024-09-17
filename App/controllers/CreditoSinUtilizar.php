<?php

namespace Asesores\controllers;

use Asesores\Model\ModelBitrix;

class CreditoSinUtilizar extends ModelBitrix
{
	public $ModelBitrix;

	public function __construct()
	{

		$this->ModelBitrix = new ModelBitrix();
	}

	public function getCompanias()
	{
		$creditosSinutilizar = $this->ModelBitrix->ListarCompanias();

		foreach ($creditosSinutilizar as $deal) {
			if ($deal["UF_CRM_1715009836"] == 0 || $deal["UF_CRM_1715009836"] == '') {
				if ($deal["UF_CRM_1715008800"] == 0 || $deal["UF_CRM_1715008800"] < 150) {
					//$b24->CrearNegociacionCSU();
				}
			}
		}
		return $creditosSinutilizar;
	}
}
