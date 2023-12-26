<?php

namespace App\MailService;

use App\Services\UserRegistration;
use App\Events\userFormRegistration;

class UserFormSubmition implements UserRegistration
{
    /**
     * @param string $email
     * @param string $subject
     * @param string $message
     * @return void
     */


    public function send(array $data, array $info): void
    {


      event(new userFormRegistration($data, $info));


     }
}        