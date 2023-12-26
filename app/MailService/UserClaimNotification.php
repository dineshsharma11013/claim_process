<?php

namespace App\MailService;

use App\Services\UserClaimServiceNotification;
use App\Events\userClaimEvent;

class UserClaimNotification implements UserClaimServiceNotification
{
    
    public function send(array $data): void
    {
        
        event(new userClaimEvent($data));

        }
     
}        