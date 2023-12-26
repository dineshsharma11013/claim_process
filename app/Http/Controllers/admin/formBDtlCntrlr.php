<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserClaimServiceNotification;
use App\Models\userMdl;
use App\Models\operationalCreditorMdl;
use App\Models\formBApprovalMdl;

use App\Models\formBFilesMdl;
use App\Models\MailingDetialsMdl;
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
     
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
        
        DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-B Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
      
        $users = operationalCreditorMdl::where([['submitted','=',1],['status','=',1],['admin_id','=', '']])->orderBy('id','desc')->get();
        
        foreach ($users as $us) 
        {
            DB::table('operational_creditor_mdls')->where([['id','=',$us->id],['form_b_selected_id','=','']])->update(['form_b_selected_id'=>$us->id]);
        }  

        $usrs = DB::table('operational_creditor_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]); 
                    
                    if (userType()->user_type==2) 
                    {
                        $usrs = $usrs->where('fmB.irp', Session::get('admin_id')); 
                    }
                    elseif (userType()->user_type==4) 
                      {
                         $usrs = $usrs->where('fmB.irp', userType()->sub_user); 
                      }
                    
          $usrs = $usrs->select('fmB.claimant_name','fmB.id','fmB.company as company_id','fmB.irp as ip_id','fmB.ar','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','usr.name','usr.email','usr.mobile','usr.unique_id','comp.name as company', 'ip.first_name as ip')
                    ->orderBy('id','desc')
                    ->get();
                  

         //dd($usrs);die();

        return view('admin.formBDetails',compact("usrs","jsl","a_vl"));


    }

    function formBUnRegDetails()
    {
      $users = operationalCreditorMdl::getData();
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
    
        // $usrs = DB::table('operational_creditor_mdls as fmB')
        //             ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
        //             //->leftJoin('form_modification_mdls As ntf', 'ntf.form_id','=','fmB.id')
        //             ->where('fmB.submitted','=',2) 
        //             ->select('fmB.id','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar')
        //             ->orderBy('id','desc')
        //             ->get();
   //   $users = operationalCreditorMdl::where([['submitted','=',1],['status','=',1],['admin_id','=', '']])->orderBy('id','desc')->get();              
   // dd($users);
      return view('admin.formUnRegDetail',compact("users","jsl","a_vl")); 
    } 

    function viewFormBDetails($id)
   {
      $fid = base64_decode($id);
      //dd($fid);die;
      $user = DB::table('operational_creditor_mdls')->where('form_b_selected_id',$fid)->where('submitted',1)->orderBy('id','desc')->first();//operationalCreditorMdl::find($fid);
    
      if ($user) 
      {
         $userInfo = DB::table('user_mdls')->where('id', $user->user_id)->first();
         $fms = DB::table('operational_creditor_mdls')->select('id','claimant_name','operational_creditor_name','user_id','admin_id','form_b_selected_id','status','created_at','updated_at', 'unique_id')->where([['form_b_selected_id','=', $fid],['submitted','=',1]])->get(); 

        $admins = DB::table('general_info_mdls')->get();

        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.formBApprovalValidate');

        $mail = bPath().'/'.Config::get('site.mailRP');
        $formB = bPath().'/'.Config::get('site.formBReport');

        DB::table('form_modification_mdls')->where([['form_id','=',$fid],['status','=',2],['form_type','=','Form-B Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
        
        $cat = formBApprovalMdl::where('form_b_id',$fid)->orderBy('id', 'desc')->first();



      if ($cat) 
      {
         return view('admin.formBRegViewDetail', compact("jsl","a_vl","user","fid","cat","mail","userInfo","fms", "admins","formB"));   
      }     
      else
      {
        return view('admin.formBRegViewDetail', compact("jsl","a_vl","user","fid","mail", "userInfo", "fms","admins","formB"));  
      }
      }
      else
      {
        return redirect(admin().'/form-b-registered');
      }    
   }


   function FormBDocDetails($id)
   {
      $fm = DB::table('operational_creditor_mdls as fm')
                ->leftJoin('form_b_files_mdls as ff', 'ff.form_b_id','=', 'fm.id');
                      if (userType()->user_type==2) 
                        {
                          $fm = $fm->where('fm.irp', Session::get('admin_id'));
                        }
                        elseif (userType()->user_type==4) 
                        {
                          $fm = $usrs->where('fm.irp', userType()->sub_user); 
                        }

               $fm = $fm->select('fm.id', 'fm.operational_creditor_signature', 'fm.claimant_name', 'fm.unique_id', 'ff.work_purchase_order_file', 'ff.invoices_file', 'ff.balance_confirmation_file', 'ff.any_correspondence_file', 'ff.authorisation_letter_file', 'ff.bank_statement_file', 'ff.ledger_copy_file', 'ff.computation_sheet_file', 'ff.pan_number_file', 'ff.passport_file', 'ff.aadhar_card')
               ->where('fm.id', $id)->first();

        $where = [
          'form_b_id'=>$id
        ];       

       $other_files = $this->getRecords(Config::get('site.formBOtherDoc'), $where);
        // $senctions = $this->getRecords(Config::get('site.formBSenctionMdl'), $where);  
        // $declarationMdls = $this->getRecords(Config::get('site.formBDecTblMdl'), $where);          

    //   dd($fm);die();        
      if ($fm) 
      {

          return view('admin.formBDocDetail', compact("fm", "other_files"));  
      }         
      else
      {

        return redirect(admin().'/form-b-registered');
      }
      
   }


   function getFormBPdfReport(Request $req, $main_id, $other_id)
   {
        
        $pdf = $this->getFormBUserReport($main_id, $other_id);
        $now = time();
        return $pdf->stream('FormB-'.$now.'.pdf');
 
   }

   function formBDetailsApproval(Request $req)
   {
    $response = array();

    $fb = DB::table('operational_creditor_mdls')->where('form_b_selected_id',$req->form_id)->where('submitted',1)->orderBy('id','desc')->first();

    $check1 = DB::table('form_b_approval_mdls')->where('form_b_id',$req->form_id)->first();

    if (!$check1) 
    {
      $formTyp = "first";
    }
    else
    {
      $formTyp = "updated";
    }

    $cat = new formBApprovalMdl;

    $cat->company = $fb->company;
    $cat->irp = $fb->irp;
    $cat->user_id = $fb->user_id;
    $cat->form_b_id = $req->form_id;
    $cat->admin_id =  Session::get('admin_id');
    $cat->principal_amt = $req->principle_amt ?? '';
    $cat->interest = $req->interest ?? '';
    $cat->total = $req->total_amount ?? '';

    $cat->dept = $req->dept ?? '';
    $cat->govt = $req->govt ?? '';
    $cat->claim_nature2 = $req->claim_nature2 ?? '';
      
    $cat->approved_principle_amt = $req->approved_principle_amt ?? '';
    $cat->approved_interest_amt = $req->approved_interest_amt ?? '';
    $cat->approved_total_amount = $req->approved_total_amount ?? '';

    $cat->rejected_principle_amt = $req->rejected_principle_amt ?? '';
    $cat->rejected_interest_amt = $req->rejected_interest_amt ?? '';
    $cat->rejected_total_amount = $req->rejected_total_amount ?? '';

    $cat->pending_principle_amt = $req->pending_principle_amt ?? '';
    $cat->pending_interest_amt = $req->pending_interest_amt ?? '';
    $cat->pending_total_amount = $req->pending_total_amount ?? '';

    $cat->claim_nature = $req->claim_nature ?? '';
    $cat->security_interest = $req->security_interest ?? '';
    $cat->guarantee_amt = $req->guarantee_amt ?? '';
    $cat->related_party = $req->related_party ?? '';
    $cat->voting_shares = $req->voting_shares ?? '';
    $cat->contingent_amt = $req->contingent_amt ?? '';
    $cat->mutual_dues = $req->mutual_dues ?? '';  


    $cat->reason = $req->reason ?? '';
    $cat->status =  $req->status ?? 1;
    $cat->formType = $formTyp;

     if($cat->save())
        {

          $whereCK=[
                    'company'=>$fb->company,
                    'irp'=>$fb->irp,
                    'form_b_id'=>$req->form_id
                ];      

           $this->updateFormApproval('form_b_approval_mdls', $whereCK, 'form_b_id');      


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
      $cat = DB::table('operational_creditor_mdls as fmB')
              ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
              ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
              ->where('fmB.form_b_selected_id', $id)
              ->where('fmB.submitted',1)
              ->select('fmB.id','fmB.claimant_name as name', 'fmB.operational_creditor_email as email', 'fmB.user_id', 'comp.name as company', 'fmB.user_unique_id as uId')
              ->orderBy('id','desc')
              ->first();
      
     

      $info = formBApprovalMdl::where('form_b_id',$id)->orderBy('id', 'desc')->first();

     // $user = userMdl::select('name','email')->where('id',$cat->user_id)->first();

      $mail_details =  view('admin.modals.formBMail', compact("cat","info"));
      echo $mail_details;
     // echo print_r($cat);
    }

    function rpMailSend(Request $req, UserClaimServiceNotification $notify)
    {
      $response = array();
       
      

      $user = userMdl::select('id','email')->where('email',$req->to)->orderBy('id', 'desc')->first();

      $to = $user->id;
      $mail_to = $req->to;
      $subject = $req->subject;
      $description = $req->description;
     

      $dir = "";
        $dir2 = "";
        if($req->hasfile('file'))
         {
            $link = time();
            $dir2 = "/access/media/approval/".$link;
            $dir = publicP()."/access/media/approval/".$link;
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

      $dt1=[
        'from'=>Session::get('admin_id'),
        'mail_type'=>'User Claim Amount Approval Form-B',
        'to'=>$to,
        'mail_to'=>$mail_to,
        'subject'=>$subject,  
        'msg'=>$description,
        'files' => $file_name,
        'user_id' => Session::get('admin_id'),
        'rem_addr' => $req->ip(),
        'directory' => $dir2 ?? "",
        'files' => $file_name ?? "",

      ];

      try{
         
            $notify->send($dt1);

               $response['error'] = false;
               $response['message'] = 'Email sent successfully.';
        
      }
        catch(\Exception $e)
            {
                $response['error'] = true;
                $response['message'] = "Email not sent. Please refresh and try again."; ///$e->getMessage();//
            }

        echo json_encode($response);
    }

}
