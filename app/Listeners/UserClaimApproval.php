<?php

namespace App\Listeners;

use App\Events\userClaimEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Traits\MethodsTrait;
use Config;
use Mail;
use App\Mail\UserClaimApprovalMail;
use DB;

class UserClaimApproval
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
     * @param  \App\Events\userClaimEvent  $event
     * @return void
     */
    public function handle(userClaimEvent $event)
    {
        $subject = $event->data['subject'];
        $txt = $event->data['msg'];    
         $myfile = fopen(base_path('resources/views/mail/front/userClaimAmount.blade.php'), "w") or die("Unable to open file!");
                    fwrite($myfile, $txt);
                    fclose($myfile);  

        $user = DB::table("user_mdls")->select('id','name','email')->where('id', $event->data['to'])->first();            

      try
        {
        $user_data1 = [
                                      'user_id' => $event->data['from'] ?? "",
                                      'mail_type' => $event->data['mail_type'] ?? Config::get('site.mail_from'),
                                      'mail_from' => $event->data['from'],
                                      'mail_to' => $user->email,
                                      'subject'=> $event->data['subject'] ?? "",
                                      'desc'=> $event->data['msg'] ?? "", 
                                      'name'=> $user->name,
                                      'email'=>$user->email,
                                      'directory' => $event->data['directory'],
                                      'files'=>$event->data['files'],
                                      'url' => "",
                                      'rem_addr'=>$event->data['rem_addr'] ?? "",
                                      'output'=>'success',
                                      'error'=>'',
                                      'error_msg'=>'',
                                      'date'=> date('Y-m-d') ?? "",
                                      'created_at'=>\Carbon\Carbon::now(),
                                      'updated_at'=>\Carbon\Carbon::now()
                                  ];       
                          $this->insertData(Config::get('site.mailSentMdl'),$user_data1);        
                        
                         // Mail::to($event->data['mail_to'])->send(new UserClaimApprovalMail($event->data)); 

        }
        catch(\Exception $e)
        {
            $user_data1 = [ 
                                      'user_id' => $event->data['from'] ?? "",
                                      'mail_type' => $event->data['mail_type'] ?? "",
                                      'mail_from' => $event->data['from'] ?? Config::get('site.mail_from'), //Config::get('site.mail_from') ?? "",
                                      'mail_to' => $user->email,
                                      'subject'=> $event->data['subject'] ?? "",
                                      'desc'=> $event->data['msg'] ?? "", 
                                      'name'=> $user->name,
                                      'email'=>$user->email,
                                      'directory' => $event->data['directory'],
                                      'files'=>$event->data['files'],
                                      'url' => "",
                                      'rem_addr'=>$event->data['rem_addr'] ?? "",
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
