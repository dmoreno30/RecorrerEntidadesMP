<?php
require_once(__DIR__ . '\vendor\autoload.php');

use Asesores\controllers\CreditoSinUtilizar;
use Asesores\controllers\helpers;


try {
    $CreditoSinUtilizar = new CreditoSinUtilizar();
    print_r($CreditoSinUtilizar->getCompanias());
} catch (\Throwable $th) {
    throw $th;
}
