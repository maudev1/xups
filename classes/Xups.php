<?php

class Xups
{

    private $groq_token;
    private $groq_ai_model;
    private $groq_api_uri;
    private $mode;

    public function __construct($mode = null)
    {
        $this->groq_api_uri = getenv('groq_api_uri');
        $this->groq_ai_model = getenv('groq_ai_model');
        $this->groq_token = getenv('groq_token');

        if (isset($mode)) {
            $this->mode = $mode;
        } else if (!isset($this->mode)) {
            $this->mode = "freex";
        }
    }


    public function messaging($text)
    {

        if (!is_dir('history')) {
            mkdir('history');
        }

        $dir = 'history';

        if (is_file($dir . '/last_chat.json')) {
            $last_chats = $dir . '/last_chat.json';
        }

        $last_chats = file_get_contents($last_chats, true);

        $last_chats = json_decode($last_chats);

        $last_chats[] = (object) ["role" => "user", "content" => "$text"];

        $messages = (object) [
            "messages" => (array) [
                (object) [
                    "role" => "system",
                    "content" => "seja maneiro, use emojis, para geração de senhas mostre apenas o seguinte texto seguido da senha: ta ai meu nobre: "
                ]
            ],
            "temperature" => 0.5,
            "model" => $this->groq_ai_model,
            "stop" => null,
            "stream" => false
        ];

        $mergedMessages = array_merge($messages->messages, $last_chats);

        $messages->messages = $mergedMessages;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->groq_api_uri . '/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->groq_token,
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messages));

        $results = curl_exec($ch);

        curl_close($ch);

        $response = json_decode($results);

        if (isset($response->choices[0])) {
            $last_chats[] = $response->choices[0]->message;

            $last_chats = json_encode($last_chats);

            file_put_contents($dir . '/last_chat.json', $last_chats, true);

            return $response->choices[0]->message->content;
        }



    }


}


?>