<?php

namespace App\Listeners;

use App\Events\fSignInFire;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\userSignUpMail;
use App\Traits\MethodsTrait;
use DB;
use Config;

class fSignInMail
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
     * @param  \App\Events\fSignInFire  $event
     * @return void
     */
    public function handle(fSignInFire $event)
    {
        $auth = DB::table("authentication_mdls")->select('type','status')->orderBy('id','desc')->first();
        if ($auth->type=='email' || $auth->type=='both' && $auth->status=='yes') 
        {
            try
            {
                 Mail::to($event->post['email'])->send(new userSignUpMail($event->post, $event->subject));
                $user_data1 = [
                                      'user_id' => $event->post['user_id'] ?? "",
                                      'mail_type' => "sign-in",
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
                                      'mail_type' => "sign-in",
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
}
