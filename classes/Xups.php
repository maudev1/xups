<?php

class Xups
{

    private $groq_token;
    private $groq_ai_model;
    private $groq_api_uri;


    public function __construct()
    {
        $this->groq_api_uri   = getenv('groq_api_uri');
        $this->groq_ai_model  = getenv('groq_ai_model');
        $this->groq_token     = getenv('groq_token');
    }

    public function messaging($text)
    {

        $response = $this->send_message($text);

        if (isset($response->choices[0])) { return $response->choices[0]->message->content; }

    }

    public function send_message($text)
    {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->groq_api_uri . '/chat/completions');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: Bearer ' . $this->groq_token,
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{"messages": [{"role": "user", "content": "' . $text . '"}], "model": "' . $this->groq_ai_model . '"}');

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response);

    }


}


?>