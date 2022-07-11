<?php

namespace App\Services\SMS\Providers;

use Illuminate\Support\Facades\Http;
use App\Services\SMS\SmsServiceInterface;

class InfobipProvider implements SmsServiceInterface
{
    private $token;
    private $url;

    public function __construct(string $token, string $url)
    {
        $this->token = $token;
        $this->url = $url;
    }

    public function send(string $celNumber, string $message): int
    {
        $json = [
            'messages'=> [
                'from' => 'TreinaWeb',
                'destinations' => [
                    'to' => '55'.$celNumber
                ],
                'text' => $message
            ]
        ];
        
        $header = [
            'Authorization' => "App {$this->token}"
        ];

        $response = Http::withHeaders($header)->post("{$this->url}/text/advanced", $json);

        return $response->status();
    }
}
