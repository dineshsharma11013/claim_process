<?php

namespace App\MailService;

use App\Services\UserFormNotification;
use App\Traits\MethodsTrait;
use Config;
use Mail;
use App\Mail\formNotification;

class UserFormNotify implements UserFormNotification
{
    use MethodsTrait;

    public function send(array $data, array $info): void
    {
        

        $subject = $data['subject'];
        $txt = $data['msg'];    
         $myfile = fopen(base_path('resources/views/mail/front/notification.blade.php'), "w") or die("Unable to open file!");
                    fwrite($myfile, $txt);
                    fclose($myfile);  
        
        if ($data['action']=='insert') 
        {
        $Arr = [
                    'user_id'=>$data['user_id'],
                    'form_type'=>$data['form_type'],
                    'form_id'=>$data['form_id'],
                    'msg'=>$txt,
                    'date'=>$data['date'],
                    'rem_addr'=>$data['rem_addr'],
                    'approval_status'=>$data['approval_status'],
                    'approval_person_id'=>$data['approval_person_id'],
                    'approval_by_date'=>$data['approval_by_date'],
                    'status'=>$data['status'],
                    'request_sent_time'=>$data['request_sent_time'],
                    'request_seen_time'=>$data['request_seen_time'],
                    'form_update_status'=>$data['form_update_status'],
                    'form_update_time'=>$data['form_update_time']
                ];            

        $this->insertData(Config::get('site.formModificationMdls'),$Arr);
        
        }
        elseif($data['action']=='approve')
        {
            $update_data = [
                'approval_status'=>1,
                'approval_by_date'=>\Carbon\Carbon::now(),
                'approval_person_id'=>$data['approval_person_id']
            ];

             $where = [
                'user_id'=>$data['user_id'],
                'form_type'=>$data['form_type'],
                'form_id'=>$data['form_id'],
                'approval_status'=>$data['approval_status']
              ];

           $this->updateData(Config::get('site.formModificationMdls'), $update_data, $where);

        }


            if ($info['formType']=='Form-B') 
                {
                    $table=Config::get('site.formBMdl');
                    $field = 'form_b_selected_id';
                }
                elseif ($info['formType']=='Form-C') 
                {
                    $table=Config::get('site.formCMdl');
                    $field = 'form_c_selected_id';
                }
                elseif ($info['formType']=='Form-D') 
                {
                    $table=Config::get('site.formDMdl');
                    $field = 'form_d_selected_id';
                }
                elseif ($info['formType']=='Form-E') 
                {
                    $table=Config::get('site.formEMdl');
                    $field = 'form_e_selected_id';
                }
                elseif ($info['formType']=='Form-F') 
                {
                    $table=Config::get('site.formFMdl');
                    $field = 'form_f_selected_id';
                }
                elseif ($info['formType']=='Form-CA') 
                {
                    $table=Config::get('site.formCaMdl');
                    $field = 'form_ca_selected_id';
                }

                $db = $this->getLatestRow($table,[$field=>$data['form_id']]);    
                $check = $this->getLatestRow(Config::get('site.userSubAuth'), ['company_id'=>$db->company]);

                //echo print_r($check);die();

                if ($check) 
                {
                 if ($check->forms!='') 
                 {   
                  $MailCk = explode(', ', $check->forms);
                  if (in_array($db->formName, $MailCk)) 
                  {
                    if ($check->type=='email') 
                    {
                      Mail::to($data['mail_to'])->send(new formNotification($info)); 
                  }
                }
                }
                }
                else
                {
                    Mail::to($data['mail_to'])->send(new formNotification($info));    
                }






                   

        }
     
}        