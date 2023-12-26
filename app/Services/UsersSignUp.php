<?php

namespace App\Services;

interface UsersSignUp
{
    /**
     * @param string $email
     * @param string $subject
     * @param string $message
     * @return void
     */
    public function send(array $data, array $info): void;
}