<?php

namespace App\Services\SMS;

interface SmsServiceInterface
{
    public function send(string $celNumber, string $message): int;
}
