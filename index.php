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

            $command = $xups->messaging($text);

                $regex = '/```bash\n(.*?)\n```/s';

                $codigoSemTags = preg_replace($regex, '$1',  $command);

                echo $codigoSemTags."\n\n";

               echo shell_exec($codigoSemTags);

        }

    }

    exit;

}



?>