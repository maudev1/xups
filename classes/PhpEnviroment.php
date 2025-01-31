<?php

class PhpEnviroment
{

    public function __construct()
    {

        $this->setEnv();

    }

    public function setEnv()
    {

        try {

            if (file_exists('.env')) {
                $envFile = file_get_contents('.env');
                $environments = $this->parseStringToArray($envFile);

                foreach ($environments as $key => $env) {
                    putenv("$key=$env");
                }

            } else {

                throw new Exception;

            }

        } catch (Exception $e) {

            echo json_encode(['message' => "Error to load .env file"]); exit;

        }


    }

    public function parseStringToArray($input)
    {
        $lines = explode("\n", trim($input)); // Divide por linhas
        $result = [];

        foreach ($lines as $line) {
            list($key, $value) = explode("=", trim($line), 2); // Separa chave e valor
            $result[$key] = $value;
        }

        return $result;
    }

}



?>