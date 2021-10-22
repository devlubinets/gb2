<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


spl_autoload_register(static function (string $class):void{

    $fn1 = '../'.str_replace("\\","/",$class) .'.php';

    if(file_exists($fn1)) {
        require $fn1;
    }

});

$spider1 = new \classDC\Spider();
$spider2 = new \classMARVEL\Spider();