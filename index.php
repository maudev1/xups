<?php

require_once('vendor/autoload.php');
require_once('classes/PhpEnviroment.php');
require_once('classes/Xamps.php');


$environments = new PhpEnviroment();

if (count($argv) > 0) {

    unset($argv[0]);

    if (count($argv) > 1) {

        unset($argv[1]);

        $text = implode(' ',  $argv);
        
        if ($text != '') {  

            $xups = new Xamps();

            echo "\e[33m".$xups->messaging($text)."\e[0m\n"; exit;

        }

    }

    exit;

}



?>