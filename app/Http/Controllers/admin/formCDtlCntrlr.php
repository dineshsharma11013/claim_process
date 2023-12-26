<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserClaimServiceNotification;
use App\Models\userMdl;
use App\Models\finanicialCreditorFormCMdl;
use App\Models\formCAprovalMdl;

use App\Models\formCFilesMdl;
use App\Models\formCOtherDocumentMdl;
use App\Traits\MethodsTrait;

use Mail;
use App\Mail\userFormSubmittion;

use Config;
use Session;
use DB;
use PDF;

class formCDtlCntrlr extends Controller
{
    use MethodsTrait;

    function formCDetails()
    {
        //$users = finanicialCreditorFormCMdl::getRData();  
    	  $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
      	
        DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-C Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);

        $users = finanicialCreditorFormCMdl::where([['submitted','=',1],['status','=',1],['admin_id','=', '']])->orderBy('id','desc')->get();
        
        foreach ($users as $us) 
        {
            DB::table('finanicial_creditor_form_c_mdls')->where([['id','=',$us->id],['form_c_selected_id','=','']])->update(['form_c_selected_id'=>$us->id]);
        }  

        // $userDtls = userMdl::all();
        // $regs = finanicialCreditorFormCMdl::all();

        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

        $usrs = DB::table('finanicial_creditor_form_c_mdls as fmB')
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
                    
                    
        $usrs = $usrs->select('fmB.id','fmB.formA', 'fmB.signing_person_name','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','fmB.fc_name','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'formA.name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();

                     


     //  dd($usrs);die();             
      return view('admin.formCDetails',compact("usrs","jsl","a_vl"));
    }

    function formCUnRegDetails()
   {
      $users = finanicialCreditorFormCMdl::getData();
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
       // dd($users);die();
      return view('admin.formCUnRegDetail',compact("users","jsl","a_vl")); 
   } 

   function viewFormCDetails($id)
   {
      $fid = base64_decode($id);
     // $user = finanicialCreditorFormCMdl::getUserRData($id);
      
      $user = DB::table('finanicial_creditor_form_c_mdls')->where('form_c_selected_id',$fid)->where('submitted',1)->orderBy('id','desc')->first();//operationalCreditorMdl::find($fid);
      if ($user) 
      {
  
      $userInfo = DB::table('user_mdls')->get();
      //$fms = DB::table('finanicial_creditor_form_c_mdls')->where('form_c_selected_id', $fid)->where('status',1)->get(); 

      $fms = DB::table('finanicial_creditor_form_c_mdls')->select('id','fc_name','signing_person_name','user_id','admin_id','form_c_selected_id','status','created_at','updated_at')->where([['form_c_selected_id','=', $fid],['submitted','=',1]])->get();       

      $admins = DB::table('general_info_mdls')->get();

      $jsl =  bPath().'/'.Config::get('site.general');
      $a_vl = Config::get('site.formCApprovalValidate');
      $mail = bPath().'/'.Config::get('site.mailRP');
      $formC = bPath().'/'.Config::get('site.formBReport'); 

      DB::table('form_modification_mdls')->where([['form_id','=',$fid],['status','=',2],['form_type','=','Form-C Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);

      $cat = formCAprovalMdl::where('form_c_id',$fid)->orderBy('id', 'desc')->first();
      
      $borrower_claim_amount = is_numeric($user->borrower_claim_amount) ? $user->borrower_claim_amount : 0;
        $guarantor_claim_amount = is_numeric($user->guarantor_claim_amount) ? $user->guarantor_claim_amount : 0;
        $financial_claim_amt = is_numeric($user->financial_claim_amt) ? $user->financial_claim_amt : 0;

         $total_amount = $borrower_claim_amount + $guarantor_claim_amount + $financial_claim_amt;


    //  dd($fms);die();
      if ($cat) 
      {
         return view('admin.formCRegViewDetail', compact("jsl","a_vl","user","fid","cat","mail","userInfo","fms", "admins","formC", "total_amount"));   
      }     
      else
      {
        return view('admin.formCRegViewDetail', compact("jsl","a_vl","user","fid","mail","userInfo","fms", "admins","formC", "total_amount"));  
      }
      
      }
      else
      {
          return redirect(admin().'/form-c-registered');
      }
   }

   function viewFormCDocDetails($id)
   {
    $fm = DB::table('finanicial_creditor_form_c_mdls as fm')
                ->leftJoin('form_c_files_mdls as ff', 'ff.form_c_id','=', 'fm.id');
                      if (userType()->user_type==2) 
                        {
                          $fm = $fm->where('fm.irp', Session::get('admin_id'));
                        }
                        elseif (userType()->user_type==4) 
                        {
                          $fm = $fm->where('fm.irp', userType()->sub_user); 
                        }

               $fm = $fm->select('fm.id', 'fm.operational_creditor_signature', 'fm.signing_person_name as claimant_name', 'fm.unique_id', 'ff.work_purchase_order_file', 'ff.invoices_file', 'ff.balance_confirmation_file', 'ff.any_correspondence_file', 'ff.authorisation_letter_file', 'ff.bank_statement_file', 'ff.ledger_copy_file', 'ff.computation_sheet_file', 'ff.pan_number_file', 'ff.passport_file', 'ff.aadhar_card')
               ->where('fm.id', $id)->first();

        $where = [
          'form_c_id'=>$id
        ];       

       $other_files = $this->getRecords(Config::get('site.formCOtherDoc'), $where);
        // $senctions = $this->getRecords(Config::get('site.formCSenctionMdl'), $where);  
        // $declarationMdls = $this->getRecords(Config::get('site.formCDecTblMdl'), $where);          

    //   dd($fm);die();        
      if ($fm) 
      {

          return view('admin.formCDocDetail', compact("fm", "other_files"));  
      }         
      else
      {

        return redirect(admin().'/form-c-registered');
      }
   }


   function getFormCPdfReport(Request $req, $main_id, $other_id)
   {
        $now = time();
        $pdf = $this->getFormCUserReport($main_id, $other_id);
        return $pdf->stream('FormC-'.$now.'.pdf');
  
   }


   function formCDetailsApproval(Request $req)
   {
    $response = array();

    $fb = DB::table('finanicial_creditor_form_c_mdls')->where('form_c_selected_id',$req->form_id)->where('submitted',1)->orderBy('id','desc')->first();

    $check1 = DB::table('form_c_aproval_mdls')->where('form_c_id',$req->form_id)->first();

    if (!$check1) 
    {
      $formTyp = "first";
    }
    else
    {
      $formTyp = "updated";
    }


    $cat = new formCAprovalMdl;

    $cat->company = $fb->company;
    $cat->irp = $fb->irp;
    $cat->user_id = $fb->user_id;
    $cat->form_c_id  = $req->form_id;
    $cat->admin_id =  Session::get('admin_id');
    $cat->borrower_claim_amount = $req->borrower_claim_amount ?? '';
    $cat->borrower_security_interest_amount = $req->borrower_security_interest_amount ?? '';
    $cat->borrower_guarantee_amt = $req->borrower_guarantee_amt ?? '';
    $cat->borrower_guarantor_name = $req->borrower_guarantor_name ?? '';
    $cat->borrower_guarantor_address = $req->borrower_guarantor_address ?? '';
    $cat->guarantor_claim_amount = $req->guarantor_claim_amount ?? '';
    $cat->guarantor_security_interest_amount = $req->guarantor_security_interest_amount ?? '';
    $cat->guarantor_gaurantee_amt = $req->guarantor_gaurantee_amt ?? '';
    $cat->guarantor_principal_borrower = $req->guarantor_principal_borrower ?? '';
    $cat->guarantor_address_borrower = $req->guarantor_address_borrower ?? '';
    $cat->financial_claim_amt =  $req->financial_claim_amt ?? '';
    $cat->financial_beneficiary_name = $req->financial_beneficiary_name ?? '';
    $cat->financial_beneficiary_address = $req->financial_beneficiary_address ?? '';
    
    $cat->total_amount = $req->total_amount ?? '';
    $cat->approved_total_amount = $req->approved_total_amount ?? '';
    $cat->rejected_total_amount = $req->rejected_total_amount ?? '';
    $cat->pending_total_amount = $req->pending_total_amount ?? '';

    $cat->claim_nature = $req->claim_nature ?? '';
    $cat->security_interest = $req->security_interest ?? '';
    $cat->guarantee_amt = $req->guarantee_amt ?? '';
    $cat->related_party = $req->related_party ?? '';
    $cat->voting_shares = $req->voting_shares ?? '';
    $cat->contingent_amt = $req->contingent_amt ?? '';
    $cat->mutual_dues = $req->mutual_dues ?? '';

    $cat->reason = $req->reason ?? '';
    $cat->status = $req->status ?? '';  
    $cat->formType = $formTyp;

     if($cat->save())
        {

          $whereCK=[
                    'company'=>$fb->company,
                    'irp'=>$fb->irp,
                    'form_c_id'=>$req->form_id
                ];      

          $this->updateFormApproval('form_c_aproval_mdls', $whereCK, 'form_c_id'); 

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

    function removeFormCDetails($id)
    {
    	$response = array();
        $cat = finanicialCreditorFormCMdl::find($id); 
   		
   		$dir = publicP()."/access/media/forms/formC/documents/".$cat->unique_id;
   		if (is_dir($dir)) 
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

    function updateFormCNotifications(Request $req, UserFormNotification $notify)
    {
      $response = array();
     
      $user = DB::table("user_mdls")->select('id','name','email','unique_id','mobile','password','pwd')->where('id',$req->user_id)->first();
     
      try
         {

          $data2 = [
            'user_id'=>$req->user_id,
            'form_type'=>$req->fm_type,
            'form_id'=>$req->fm_id,
            'approval_status'=>1,
            'form_update_status'=>2
          ];

          $cat2 = $this->getLatestRow(Config::get('site.formModificationMdls'),$data2);
          if ($cat2) 
          {
            $response['error']=false;
            $response['message']="Already approved";
          }
          else
          {

            $subject = ucwords($user->name)." - Form C updation request approval.";
            $txt = "<p>Hi ".ucwords($user->name).", your request to update Form-C is approved. Now you can update your form.</p>";   
            
            $dt1 = [
                'user_id'=>$req->user_id,
                'form_type'=>$req->fm_type,
                'form_id'=>$req->fm_id,
                'msg' => $txt,
                'subject'=>$subject,
                'approval_status'=>2,
                'mail_to'=>$user->email,
                'approval_person_id'=>Session::get('admin_id'),
                'action'=>'approve'   
            ];        

            $dt2 = [
                    'subject'=>$subject,
                    'email_from'=>Config::get('site.mail_from')
                ];

                  $notify->send($dt1, $dt2);

                  $response['error']=false;
                  $response['message']="Approved";
                }
              }
              catch(\Exception $e)
              {
                  $response['error']=true;
                  $response['message']=$e->getMessage();//"Not approved. Please try again.";
              }
      

        echo json_encode($response);


    }

    function rpMailInfoFormC($id)
    {
      $cat = DB::table('finanicial_creditor_form_c_mdls')->where('form_c_selected_id', $id)->where('submitted',1)->orderBy('id','desc') ->first();
    
      

      $info = formCAprovalMdl::where('form_c_id',$id)->orderBy('id', 'desc')->first();
     // $user = userMdl::select('name','email')->where('id',$cat->user_id)->first();

      $mail_details =  view('admin.modals.formCMail', compact("cat", "info"));
      echo $mail_details;
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
        'mail_type'=>'User Claim Amount Approval Form-C',
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
