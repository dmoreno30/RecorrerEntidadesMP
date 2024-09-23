<?php
require_once(__DIR__ . '\vendor\autoload.php');

use Asesores\controllers\CreditoSinUtilizar;
use Asesores\controllers\helpers;

//$condicion = $_REQUEST["Condicion"];
$condicion = "CSU";
try {
    switch ($condicion) {
        case 'CSU':
            $CreditoSinUtilizar = new CreditoSinUtilizar();
            $helpers = new helpers();
            $helpers->FormatPrint($CreditoSinUtilizar->getCompanias());
            break;

        default:
            # code...
            break;
    }
} catch (\Throwable $th) {

    $helpers->LogRegister($th, "error de petición");
    throw $th;
}
