<?php

require_once('vendor/autoload.php');
require_once('classes/PhpEnviroment.php');
require_once('classes/Xups.php');

$environments = new PhpEnviroment();
$xups         = new Xups();

if (count($argv) > 0) {

    unset($argv[0]);

    if (count($argv) > 0) {

        $text = implode(' ', $argv);

        if ($text != '') {

            echo $xups->messaging($text);


        }

    }

    exit;

}



?>