<?php

namespace App\MailService;

use App\Services\UsersSignUp;
use App\Events\fSignUpMail;

class UserSignUpService implements UsersSignUp
{
    /**
     * @param string $email
     * @param string $subject
     * @param string $message
     * @return void
     */


    public function send(array $data, array $subject): void
    {


      event(new fSignUpMail($data, $subject));


     }
}        