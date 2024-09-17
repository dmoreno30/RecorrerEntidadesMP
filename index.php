<?php
require_once(__DIR__ . '\vendor\autoload.php');

use Asesores\controllers\CreditoSinUtilizar;
use Asesores\controllers\helpers;

$condicion = $_REQUEST["Condicion"];
try {
    switch ($condicion) {
        case 'CSU':
            $CreditoSinUtilizar = new CreditoSinUtilizar();
            print_r($CreditoSinUtilizar->getCompanias());
            break;

        default:
            # code...
            break;
    }
} catch (\Throwable $th) {
    $helpers = new helpers();
    $helpers->LogRegister($th, "error de petición");
    throw $th;
}
