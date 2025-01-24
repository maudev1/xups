<?php

require_once('config.php');


if (count($argv) > 0) {

    unset($argv[0]);

    if (count($argv) > 0) {

        $text = implode(' ', $argv);

        if($text != ''){
                        
            $response = aiAssistant($text);
            
            if (isset($response->choices[0])) {
                
                $message = $response->choices[0]->message->content;
                
                echo $message;
            }

        }

    }

    exit;

}


function aiAssistant($text)
{

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.groq.com/openai/v1/chat/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . groq_token,
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, '{"messages": [{"role": "user", "content": "' . $text . '"}], "model": "llama-3.3-70b-versatile"}');

    $response = curl_exec($ch);

    curl_close($ch);

    return json_decode($response);

}



?>