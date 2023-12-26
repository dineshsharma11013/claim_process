<?php

namespace App\Listeners;

use App\Events\fSignUpMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Mail;
use App\Mail\userSignUpMail;
use App\Traits\MethodsTrait;
use Config;
use DB;

class fUserSignUpMail
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
        try
        {

          $check = $this->signUpAuth(Config::get('site.authMdl'));

          if ($check) 
          {
            if ($check->type=='both' || $check->type=='email' && $check->status=='yes') {
                Mail::to($event->post['email'])->send(new userSignUpMail($event->post, $event->subject['subject']));        
            }
          }

        
        $user_data1 = [
                                      'user_id' => $event->post['user_id'] ?? "",
                                      'mail_type' => $event->post['mail_type'] ?? "",
                                      'mail_from' => Config::get('site.mail_from') ?? "",
                                      'mail_to' => $event->post['email'] ?? "Users",
                                      'subject'=> $event->subject['subject'] ?? "",
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
                                      'subject'=> $event->subject['subject'] ?? "",
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

                    $log = [
                     'page_type' => 'signup', //Session::has('admin_id') ? Config::get('site.adminType') : Config::get('site.userType'),
                     'user_id' => '',//Session::has('admin_id') ? Session::get('admin_id') : Session::get('user_id'),
                     'admin_id' => '',
                     'page_name' => 'User-signup',
                     'page_url' => url()->current(),
                     'mthd' => '',// Route::getCurrentRoute()->getActionName(),
                     'action' => Config::get('site.action_insert'),
                     'action_output' => Config::get('site.action_fail'),
                     'err' => '',
                     'err_msg' => '',
                     'rem_addr' => $event->subject['ip'] ?? '',
                     'date' => date('Y-m-d'),
                     'created_at' => date('Y-m-d H:i:s'),
                     'updated_at' => '',
                    ];

                    $this->insertData(Config::get('site.logMdl'),$log);       


        }
    }
}
