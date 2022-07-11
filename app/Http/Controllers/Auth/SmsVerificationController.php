<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Services\SMS\SmsServiceInterface;

class SmsVerificationController extends Controller
{
    public function send($celNumber, SmsServiceInterface $smsService)
    {
        $code = \mt_rand(1000, 9999);
        session(['code' => $code]);

        $response = $smsService->send($celNumber, "Seu código de verificação é: $code");
       
        if ($response == 200) {
            return 'ok';
        }
        return  response('nao ok', $response);
    }
}
