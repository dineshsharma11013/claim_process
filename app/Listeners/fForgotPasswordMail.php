<?php

namespace App\Listeners;

use App\Events\fForgotPasswardFire;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\userForgotPasswordMail;
use App\Traits\MethodsTrait;
use Config;

class fForgotPasswordMail
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
     * @param  \App\Events\fForgotPasswardFire  $event
     * @return void
     */
    public function handle(fForgotPasswardFire $event)
    {
        try
        {
        Mail::to($event->post['email'])->send(new userForgotPasswordMail($event->post, $event->subject));
        $user_data1 = [
                                      'user_id' => $event->post['user_id'] ?? "",
                                      'mail_type' => $event->post['mail_type'] ?? "",
                                      'mail_from' => Config::get('site.mail_from') ?? "",
                                      'mail_to' => $event->post['email'] ?? "Users",
                                      'subject'=> $event->post['subject'] ?? "",
                                      'desc'=> $event->post['desc'] ?? "", 
                                      'name'=>$event->post['name'] ?? "",
                                      'email'=>$event->post['email'] ?? "",
                                      'directory' => "",
                                      'files'=>"",
                                      'url' => $event->post['url'] ?? "",
                                      'rem_addr'=>$event->post['rem_addr'] ?? "",
                                      'output'=>'success',
                                      'error'=>'',
                                      'error_msg'=>'',
                                      'date'=> date('Y-m-d') ?? "",
                                      'created_at'=>\Carbon\Carbon::now(),
                                      'updated_at'=>\Carbon\Carbon::now()
                                  ];       
                          $this->insertData(Config::get('site.mailSentMdl'),$user_data1);        
                        
        }
        catch(\Exception $e)
        {
            $user_data1 = [ 
                                      'user_id' => $event->post['user_id'] ?? "",
                                      'mail_type' => $event->post['mail_type'] ?? "",
                                      'mail_from' => Config::get('site.mail_from') ?? "",
                                      'mail_to' => "Users",
                                      'subject'=> $event->post['subject'] ?? "",
                                      'desc'=> $event->post['desc'] ?? "", 
                                      'name'=>$event->post['name'] ?? "",
                                      'email'=>$event->post['email'] ?? "",
                                      'directory' => "",
                                      'files'=>"",
                                      'url' => $event->post['url'] ?? "",
                                      'rem_addr'=>$event->post['rem_addr'] ?? "",
                                      'output'=>'fail',
                                      'error'=>$e,
                                      'error_msg'=>$e->getMessage(),
                                      'date'=> date('Y-m-d') ?? "",
                                      'created_at'=>\Carbon\Carbon::now(),
                                      'updated_at'=>\Carbon\Carbon::now()
                                  ];       
                          $this->insertData(Config::get('site.mailSentMdl'),$user_data1);  
        }
    }
}
