<?php

namespace Asesores\controllers;

class helpers
{
    public function LogRegister($arr, $title = '')
    {
        $log = "\n------------------------\n";
        $log .= date("Y.m.d G:i:s") . "\n";
        $log .= (strlen($title) > 0 ? $title : 'DEBUG') . "\n";
        $log .= print_r($arr, 1);
        $log .= "\n------------------------\n";
        file_put_contents(getcwd() . '\log.log', $log, FILE_APPEND);
        return true;
    }
    public function FormatPrint($arr)
    {
        $info = "<pre>";
        $info .= print_r($arr);
        $info .= "</pre>";
        return $info;
    }
    public function log_error($message)
    {
        error_log("[" . date("Y-m-d H:i:s") . "] " . __FUNCTION__ . ": " . $message, 3, "error.log");
    }
}
