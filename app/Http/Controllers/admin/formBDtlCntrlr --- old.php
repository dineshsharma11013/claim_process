<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userMdl;
use App\Models\operationalCreditorMdl;
use App\Models\formBApprovalMdl;

use App\Models\formBFilesMdl;
use App\Models\formBOtherDocumentsMdl;
use App\Traits\MethodsTrait;

use Mail;
use App\Mail\userFormSubmittion;

use Config;
use Session;
use DB;
use PDF;

class formBDtlCntrlr extends Controller
{

	 use MethodsTrait;

    function formBDetails()
    {
        $users = operationalCreditorMdl::getRData();  
    	   $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
    	return view('admin.formBDetails',compact("users","jsl","a_vl"));
    }

    function formBUnRegDetails()
   {
      $users = operationalCreditorMdl::getData();
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
   // dd($users);
      return view('admin.formUnRegDetail',compact("users","jsl","a_vl")); 
   } 

    function viewFormBDetails($id)
   {
      $fid = base64_decode($id);
      $user = operationalCreditorMdl::getUserRData($id);
      $jsl =  bPath().'/'.Config::get('site.general');
      $a_vl =  Config::get('site.formBApprovalValidate');
      $mail = bPath().'/'.Config::get('site.mailRP');

      
      $cat = formBApprovalMdl::where('form_b_id',$fid)->first();
      
     // dd($cat);die();
      if ($cat) 
      {
         return view('admin.formBRegViewDetail', compact("jsl","a_vl","user","fid","cat","mail"));   
      }     
      else
      {
        return view('admin.formBRegViewDetail', compact("jsl","a_vl","user","fid","mail"));  
      }
      
    
   }

   function formBDetailsApproval(Request $req)
   {
    $response = array();

    $cat = new formBApprovalMdl;

    $cat->form_b_id = $req->user_id;
    $cat->admin_id =  Session::get('admin_id');
    $cat->principal_amt = $req->principle_amt ?? '';
    $cat->interest = $req->interest ?? '';
    $cat->total = $req->total_amount ?? '';
    $cat->approved_principle_amt = $req->approved_amt_principl ?? '';
    $cat->rejected_principle_amt = $req->rejected_amt_principl ?? '';
    $cat->approved_interest_amt = $req->approved_interest_amt ?? '';
    $cat->rejected_interest_amt = $req->rejected_interest_amt ?? '';
    $cat->total_approval_amt = $req->total_approved_amount ?? '';
    $cat->total_rejected_amt = $req->total_rejected_amount ?? '';
    $cat->reason = $req->reason ?? '';
    $cat->status =  $req->status ?? '';


     if($cat->save())
        {
            $response['error'] = false; 
            $response['message'] = "Status Added Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Status Not Added. Try Again Later.";
          }
        
        echo json_encode($response);
   }


    function removeFormBDetails($id)
    {
    	$response = array();
        $cat = operationalCreditorMdl::find($id); 
   	

   		$dir = publicP()."/access/media/forms/formB/documents/".$cat->unique_id;
   		
      if(is_dir($dir))
      {
      $this->rmFilesDirs($dir);  
   		}
        if ($cat->delete()) 
          {
            $response['error'] = false;
            $response['message'] = "Successfully Deleted";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Not Deleted. Try Again Later.";
          }
        
        echo json_encode($response);
    }


    function rpMailInfo($id)
    {
      $cat = DB::table('operational_creditor_mdls')->where('id', $id)->first();
      
      $mail_details =  view('admin.modals.formBMail', compact("cat"));
      echo $mail_details;
    }

    function rpMailSend(Request $req)
    {
      $response = array();
        if (!empty($req->irp)) 
        {
          $usersDB = DB::table('general_info_mdls')->whereIn('id', $req->irp)->get();  
        }
        // else
        // {
        //   $usersDB = DB::table('general_info_mdls')->where([['user_type','=',2],['sub_user','=',''],['status','=',1]])->get();  
        // }

        $dir = "";
        $dir2 = "";
        if($req->hasfile('file'))
         {
            $link = time();
            $dir2 = "/access/media/forms/documents/".$link;
            $dir = publicP()."/access/media/forms/documents/".$link;
          if (!is_dir($dir)) 
          {
          mkdir($dir, 0777, TRUE);      
         
            foreach($req->file('file') as $image)
            {
                $id=time().uniqid(rand());
                $name=$id.'.'.$image->getClientOriginalExtension();
                $image->move($dir, $name);  
                $file_name[] = $name;
            }
            $file_name = implode(', ',$file_name);
          }
      }
      else
      {
        $file_name = "";
      }


      foreach ($usersDB as $ml) 
      {
        $user_id[] = $ml->email;
      }

      //echo print_r($user_id);die();
      
          $dbs = DB::table('operational_creditor_mdls')->latest('id')->first();
              
             
              $txt = $req->description; 

              $myfile = fopen(base_path('resources/views/mail/front/signUp.blade.php'), "w") or die("Unable to open file!");
              fwrite($myfile, $txt);
              fclose($myfile);

          $dataMl = [
                 'from'=>Config::get('site.mail_from'),
                 'subject'=>$req->subject
                 ];       

          try{
            $data1 = [        
                  'user_id' => Session::get('admin_id'),
                  'mail_type' => 'Form B PDF',
                  'mail_from' => Config::get('site.mail_from') ?? "",
                  'mail_to' => implode(', ',$user_id) ?? "",
                  'subject' => $req->subject ?? '',
                  'desc' => $txt ?? '',
                  'name' => '',
                  'email' => '',
                  'directory' => $dir2 ?? '',
                  'files' => $file_name ?? "",
                  'url' => "",
                  'rem_addr' => $req->ip(),
                  'output' => "success",
                  'error' => "",
                  'error_msg' => "",
                  'date' => "",
                  'created_at' => \Carbon\Carbon::now(),
                  'updated_at'  => \Carbon\Carbon::now()
                ];
          
            DB::table('mail_sent_mdls')->insert($data1);
            
            foreach ($user_id as $mk=>$mv) {
              Mail::to($mv)->send(new userFormSubmittion($dataMl));  
            }

            $response['error'] = false;
            $response['message'] = "Email sent successfully.";
          }
          catch(\Exception $e)
          {
            $data1 = [        
                  'user_id' => Session::get('admin_id'),
                  'mail_type' => 'Form B PDF',
                  'mail_from' => Config::get('site.mail_from') ?? "",
                  'mail_to' => $user_id,
                  'subject' => $req->subject ?? '',
                  'desc' => $txt ?? '',
                  'name' => '',
                  'email' => '',
                  'directory' => $dir2 ?? '',
                  'files' => $file_name ?? "",
                  'url' => "",
                  'rem_addr' => $req->ip(),
                  'output' => "fail",
                  'error' => $e,
                  'error_msg' => $e->getMessage(),
                  'date' => "",
                  'created_at' => \Carbon\Carbon::now(),
                  'updated_at'  => \Carbon\Carbon::now()
                ];

            DB::table('mail_sent_mdls')->insert($data1);    
            
            $response['error'] = true;
            $response['message'] = $e->getMessage();//"Email not sent.";
          }
        
        
        echo json_encode($response);
    }

}
