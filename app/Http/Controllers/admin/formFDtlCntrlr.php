<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserClaimServiceNotification;
use App\Models\otherCreditorFormFMdl;
use App\Models\formFApprovalMdl;
use App\Models\userMdl;
use App\Traits\MethodsTrait;
use Config;
use Session;
use DB;
use PDF;

class formFDtlCntrlr extends Controller
{
    use MethodsTrait;

    function formFRegDetails()
    {
        //$users = otherCreditorFormFMdl::getRData();  
    	   $jsl =  bPath().'/'.Config::get('site.general');
         $a_vl =  Config::get('site.adminGeneral');
    	   
        
        $cat2 = DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-F Update Request']])->first();
        if ($cat2) 
        {
          DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-F Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
        }

        $users = otherCreditorFormFMdl::where([['submitted','=',1],['status','=',1]])->get();        
        if (count($users)>0) 
        {
        foreach ($users as $us) 
        {
            DB::table('other_creditor_form_f_mdls')->where([['id','=',$us->id],['form_f_selected_id','=','']])->update(['form_f_selected_id'=>$us->id]);
        }
        }  

        // $userDtls = userMdl::all();
        // $regs = otherCreditorFormFMdl::all();
        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

        $usrs = DB::table('other_creditor_form_f_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','fmB.company')
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
                    
                 $usrs = $usrs->select('fmB.id','fmB.user_id', 'fmB.form_f_selected_id', 'fmB.status' ,'fmB.form_type','fmB.created_at','fmB.updated_at','fmB.signing_person_name','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'formA.name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();

       // echo "<pre>";
       // echo print_r($usrs);
       // echo "</pre>";die();             

     //  dd($usrs);die();             
      return view('admin.formFDetails',compact("usrs","jsl","a_vl"));
    }

    function formFUnRegDetails()
   {
      $users = otherCreditorFormFMdl::getData();
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
   // dd($users);
      return view('admin.formFDetailsUnReg',compact("users","jsl","a_vl")); 
   } 

   function viewFormFDetails($id)
   {
      $fid = base64_decode($id);

      $user = DB::table('other_creditor_form_f_mdls')->where('form_f_selected_id',$fid)->where('submitted',1)->orderBy('id','desc')->first();//operationalCreditorMdl::find($fid);
      $userInfo = DB::table('user_mdls')->get();
      // $fms = DB::table('other_creditor_form_f_mdls')->where('form_f_selected_id', $fid)->get(); 

      $fms = DB::table('other_creditor_form_f_mdls')->select('id','fc_name','user_id','signing_person_name','admin_id','form_f_selected_id','status','created_at','updated_at')->where([['form_f_selected_id','=', $fid],['submitted','=',1]])->get(); 

      $admins = DB::table('general_info_mdls')->get();

      $jsl =  bPath().'/'.Config::get('site.general');
      $a_vl =  Config::get('site.formCApprovalValidate');
      $mail = bPath().'/'.Config::get('site.mailRP');
      $formF = bPath().'/'.Config::get('site.formBReport');

      $cat = formFApprovalMdl::where('form_f_id',$fid)->orderBy('id', 'desc')->first();
    
     // dd($fms);die();
      if ($cat) 
      {
         return view('admin.formFRegViewDetail', compact("jsl","a_vl","user","fid","cat","mail","userInfo","fms", "admins","formF"));   
      }     
      else if ($user) 
      {
        return view('admin.formFRegViewDetail', compact("jsl","a_vl","user","fid","mail","userInfo","fms", "admins","formF")); 
      }
      else
      {
        return redirect(admin().'/form-f-registered');
      }
      
   }

   function viewFormFDocDetails($id)
   {
    $fm = DB::table('other_creditor_form_f_mdls as fm')
                ->leftJoin('form_f_files_mdls as ff', 'ff.form_f_id','=', 'fm.id');
                      if (userType()->user_type==2) 
                        {
                          $fm = $fm->where('fm.irp', Session::get('admin_id'));
                        }
                        elseif (userType()->user_type==4) 
                        {
                          $fm = $fm->where('fm.irp', userType()->sub_user);
                        }

               $fm = $fm->select('fm.id', 'fm.fc_signature as operational_creditor_signature', 'fm.signing_person_name as claimant_name', 'fm.unique_id', 'ff.work_purchase_order_file', 'ff.invoices_file', 'ff.balance_confirmation_file', 'ff.any_correspondence_file', 'ff.authorisation_letter_file', 'ff.bank_statement_file', 'ff.ledger_copy_file', 'ff.computation_sheet_file', 'ff.pan_number_file', 'ff.passport_file', 'ff.aadhar_card')
               ->where('fm.id', $id)->first();

        $where = [
          'form_f_id'=>$id
        ];       

       $other_files = $this->getRecords(Config::get('site.formFOtherDoc'), $where);
        // $senctions = $this->getRecords(Config::get('site.formCSenctionMdl'), $where);  
        // $declarationMdls = $this->getRecords(Config::get('site.formCDecTblMdl'), $where);          

    //   dd($fm);die();        
      if ($fm) 
      {

          return view('admin.formFDocDetail', compact("fm", "other_files"));  
      }         
      else
      {

        return redirect(admin().'/form-f-registered');
      }
   }

   function getFormFPdfReport(Request $req, $main_id, $other_id)
   {

        $now = time();
        $pdf = $this->getFormFUserReport($main_id, $other_id);
        return $pdf->stream('FormF-'.$now.'.pdf');
        


   }

   function formFDetailsApproval(Request $req)
   {
    $response = array();


    $fb = DB::table('other_creditor_form_f_mdls')->where('form_f_selected_id',$req->form_id)->where('submitted',1)->orderBy('id','desc')->first();

    $check1 = DB::table('form_f_approval_mdls')->where('form_f_id',$req->form_id)->first();

    if (!$check1) 
    {
      $formTyp = "first";
    }
    else
    {
      $formTyp = "updated";
    }



    $cat = new formFApprovalMdl;


    $cat->company = $fb->company;
    $cat->irp = $fb->irp;
    $cat->user_id = $fb->user_id;
    $cat->form_f_id  = $req->form_id;
    $cat->admin_id =  Session::get('admin_id');

    $cat->name = $req->name ?? '';
    
    $cat->claim_amt = $req->claim_amt ?? '';
    $cat->claim_amt_desc = $req->claim_amt_desc ?? '';
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
                    'form_f_id'=>$req->form_id
                ];      

           $this->updateFormApproval('form_f_approval_mdls', $whereCK, 'form_f_id'); 

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



    function removeFormFDetails($id)
    {
    	$response = array();
        $cat = otherCreditorFormFMdl::find($id); 
   		
   		$dir = publicP()."/access/media/forms/formF/documents/".$cat->unique_id;
   		$this->rmFilesDirs($dir);  

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


    function rpMailInfoFormF($id)
    {
      //$cat = DB::table('other_creditor_form_f_mdls')->where('form_f_selected_id', $id)->where('submitted',1)->orderBy('id','desc')->first();
      $cat = DB::table('other_creditor_form_f_mdls as fmB')
              ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
              ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
              ->where('fmB.form_f_selected_id', $id)
              ->where('fmB.submitted',1)
              ->select('fmB.id','fmB.signing_person_name as name', 'fmB.fc_email as email', 'fmB.user_id', 'comp.name as company', 'fmB.user_unique_id as uId')
              ->orderBy('id','desc')
              ->first();

       $info = formFApprovalMdl::where('form_f_id',$id)->orderBy('id', 'desc')->first();       
    //  $user = userMdl::select('name','email')->where('id',$cat->user_id)->first();

      $mail_details =  view('admin.modals.formFMail', compact("cat", "info"));
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
        'mail_type'=>'User Claim Amount Approval Form-F',
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
