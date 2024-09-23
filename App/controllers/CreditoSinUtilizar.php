<?php

namespace Asesores\controllers;

use Asesores\Model\ModelBitrix;
use Asesores\controllers\helpers;

class CreditoSinUtilizar extends ModelBitrix
{
	public $ModelBitrix;
	public $helpers;

	public function __construct()
	{

		$this->ModelBitrix = new ModelBitrix();
		$this->helpers = new helpers();
	}

	public function getCompanias()
	{
		$creditosSinutilizar = $this->ModelBitrix->ListarCompanias();
		//$this->helpers->FormatPrint($creditosSinutilizar);
		/* foreach ($creditosSinutilizar as $deal) {
			if ($deal["UF_CRM_1715009836"] == 0 || $deal["UF_CRM_1715009836"] == '') {
				if ($deal["UF_CRM_1715008800"] == 0 || $deal["UF_CRM_1715008800"] < 150) {

					//$this->ModelBitrix->CrearNegociacionCSU();
				}
			}
		} */
		return $creditosSinutilizar;
	}
}
