<?php

namespace App\Services;

interface UserClaimServiceNotification
{
    /**
     * @param string $email
     * @param string $subject
     * @param string $message
     * @return void
     */
    public function send(array $data): void;

    
}