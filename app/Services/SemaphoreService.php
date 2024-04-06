<?php

namespace App\Services;

class SemaphoreService
{
    public function sendMessage($number, $message)
    {
        $ch = curl_init();
        $parameters = array(
            'apikey' => env('SEMAPHORE_API_KEY'),
            'number' => $number,
            'message' => $message,
            'sendername' => 'CMU'
        );

        curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        curl_close($ch);

        return $output;
    }
}