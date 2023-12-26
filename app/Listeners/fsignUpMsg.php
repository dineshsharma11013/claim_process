<?php

namespace App\Listeners;

use App\Events\fSignUpMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Traits\MethodsTrait;
use Config;


class fsignUpMsg
{
    use MethodsTrait;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\fSignUpMail  $event
     * @return void
     */
    public function handle(fSignUpMail $event)
    {

        $check = $this->signUpAuth(Config::get('site.authMdl'));
        if ($check) 
          {
            if ($check->type=='both' || $check->type=='sms' && $check->status=='yes') {

        $mobile = $event->post['mobile'];
        $otp = $event->post['otp'];

        $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, "http://164.52.195.161/API/SendMsg.aspx?uname=20220104&pass=a0IXzx9t&send=JIGSWS&dest=".$mobile."&msg=Dear%20User,%20$otp%20is%20your%20OTP%20to%20authenticate%20your%20login%20in%20IP%20Support.%0Ahttps://ipsupport.in/index.php%20Jigsaw");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, [
                  "KEY" => "VALUE"
                ]);

                // (C) CURL FETCH
                $result = curl_exec($ch);
                if (curl_errno($ch)) {
                  // (C1) CURL FETCH ERROR
                  echo curl_error($ch);
                } else {
                  // (C2) CURL FETCH OK
                  $info = curl_getinfo($ch);
                  // echo $result; // Whatever Wikipedia returns
                  // print_r($info); // More information on the transfer
                }

                // (D) CLOSE CONNECTION
                curl_close($ch);


            }
         }       

    }
}


