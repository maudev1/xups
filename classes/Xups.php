<?php

class Xups
{

    private $groq_token;
    private $groq_ai_model;
    private $groq_api_uri;


    public function __construct()
    {
        $this->groq_api_uri = getenv('groq_api_uri');
        $this->groq_ai_model = getenv('groq_ai_model');
        $this->groq_token = getenv('groq_token');
    }

    public function messaging($text)
    {

        $response = $this->send_message($text);

        if (isset($response->choices[0])) {
            return $response->choices[0]->message->content;
        }

    }

    public function send_message($text)
    {

        $data = (object) [
            "messages" => (array) [
                (object) [
                    "role"    => "system",
                    "content" => "This chat is intended only for pure code, send only the code I ask for without comments or any other text that is not code"
                ],
                (object) [
                    "role"    => "system",
                    "content" => "I'm using the ubuntu operating system, use shell script to install dependencies or run routines"
                ],
                (object) [
                    "role"    => "user",
                    "content" => "$text"
                ]
            ],
            "temperature" => 0.5,
            "model"       => $this->groq_ai_model,
            "stop"        => null,
            "stream"      => false
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->groq_api_uri . '/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->groq_token,
        ]);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, '{"messages": [{"role": "user", "content": "' . $text . '"}], "model": "' . $this->groq_ai_model . '"}');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response);

    }


}


?>