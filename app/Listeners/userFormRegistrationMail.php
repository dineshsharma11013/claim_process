<?php

namespace App\Listeners;

use App\Events\userFormRegistration;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Traits\MethodsTrait;
use Mail;
use App\Mail\userFormSubmittion;
use Config;
use DB;


class userFormRegistrationMail
{

  use MethodsTrait;
   
    public function __construct()
    {
        
    }

    public function handle(userFormRegistration $event)
    {
        $subject = $event->info['subject'];
        $from = Config::get('site.mail_from');

        $db = DB::table($event->info['table'])->where($event->data)->latest()->first();

       // $mailCheck = DB::table(Config::get('site.userFormAuth'))->where('company_id',$db->company)->orderBy('id','desc')->first();        

        $user = DB::table(Config::get('site.userMdl'))->where('id', $db->user_id)->latest()->first();


        $to = $user->email;

        $desc = '<p>Hi '.ucwords($user->name).', '.$event->info['desc'].'.</p>';
        $myfile = fopen(base_path('resources/views/mail/front/signUp.blade.php'), "w") or die("Unable to open file!");
              fwrite($myfile, $desc);
              fclose($myfile);    

        try {
              $user_data1 = [
                                      'mail_type' => $event->info['mail_type'],
                                      'mail_from' => $from ?? "",
                                      'mail_to' => $user->email ?? $to,
                                      'user_id'=> $db->user_id,
                                      'subject'=>$subject ?? "",
                                      'desc'=> $desc ?? "", 
                                      'name'=>$user->name ?? "",
                                      'email'=>$user->email ?? "",
                                      'directory' => "",
                                      'files'=>"",
                                      'url'=>'',
                                      'rem_addr'=>$event->data['rem_addr'] ?? "",
                                      'output'=>'success',
                                      'error'=>'',
                                      'error_msg'=>'',
                                      'date'=> date('Y-m-d') ?? "",
                                      'created_at'=>\Carbon\Carbon::now(),
                                      'updated_at'=>\Carbon\Carbon::now()
                                  ];       
                        DB::table('mail_sent_mdls')->insert($user_data1);

               
                 $dataMl =[
                 'from'=>$from,
                 'subject'=>$subject
                 ];       

                $check = $this->getLatestRow(Config::get('site.userSubAuth'), ['company_id'=>$db->company]);
                

                if ($check) 
                {
                  if ($check->forms!='') 
                  {
                      $MailCk = explode(', ', $check->forms);
                    if (in_array($db->formName, $MailCk)) 
                    {
                        if ($check->type=='email') 
                        {
                  
                        Mail::to($to)->send(new userFormSubmittion($dataMl));    
                        }      
                    }   
                   } 
                }
                else
                {
                    Mail::to($to)->send(new userFormSubmittion($dataMl));
                }
                

                
      
              } catch (Exception $e) 
              {

                $user_data1 = [
                                      'mail_type' => $event->info['mail_type'],
                                      'mail_from' => $from ?? "",
                                      'mail_to' => $user->email ?? $to,
                                      'user_id'=> $db->user_id,
                                      'subject'=>$subject ?? "",
                                      'desc'=> $desc ?? "", 
                                      'name'=>$user->name ?? "",
                                      'email'=>$user->email ?? "",
                                      'directory' => "",
                                      'files'=>"",
                                      'url'=>'',
                                      'rem_addr'=>$event->data['rem_addr'] ?? "",
                                      'output'=>'fail',
                                      'error'=>$e ?? "",
                                      'error_msg'=>$e->getMessage() ?? "",
                                      'date'=> date('Y-m-d') ?? "",
                                      'created_at'=>\Carbon\Carbon::now(),
                                      'updated_at'=>\Carbon\Carbon::now()
                                  ];


                        DB::table('mail_sent_mdls')->insert($user_data1);
        
              }      
        
    }
}
