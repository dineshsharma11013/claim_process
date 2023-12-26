<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserClaimServiceNotification;
use App\Models\financialCreditorFormCaMdl;
use App\Models\formCAAprovalMdl;
use App\Models\userMdl;
use App\Traits\MethodsTrait;

use Config;
use Session;
use DB;
use PDF;


class formCADtlCntrlr extends Controller
{
    use MethodsTrait;

    function formCaDetails()
    {
        //$users = financialCreditorFormCaMdl::getRData();  
    	  $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
    	 
        $cat2 = DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-CA Update Request']])->first();
        if ($cat2) 
        {
          DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-CA Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
        }
        

       $users = financialCreditorFormCaMdl::where([['submitted','=',1],['status','=',1],['admin_id','=', '']])->get();
        
        if (count($users)>0) 
        {       
        foreach ($users as $us) 
        {
            DB::table('financial_creditor_form_ca_mdls')->where([['id','=',$us->id],['form_ca_selected_id','=','']])->update(['form_ca_selected_id'=>$us->id]);
        }
        }  

        //$userDtls = userMdl::all();
        //$regs = financialCreditorFormCaMdl::all();

        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

        $usrs = DB::table('financial_creditor_form_ca_mdls as fmB')
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
                     
                  $usrs = $usrs->select('fmB.id','fmB.user_id','fmB.form_type','fmB.created_at','fmB.signing_person_name','fmB.updated_at','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'ip.first_name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();



       //dd($users); 
      return view('admin.formCaDetails',compact("usrs","jsl","a_vl"));
    }

    function formCaUnRegDetails()
   {
      $users = financialCreditorFormCaMdl::getData();
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
   // dd($users);
      return view('admin.formCaUnRegDetail',compact("users","jsl","a_vl")); 
   } 

   function viewFormCADetails($id)
   {
      $fid = base64_decode($id);
      //$user = financialCreditorFormCaMdl::getUserRData($id);
       
     // echo print_r($fid);die();

      $user = DB::table('financial_creditor_form_ca_mdls')->where('form_ca_selected_id',$fid)->where('submitted',1)->orderBy('id','desc')->first();//operationalCreditorMdl::find($fid);
      if ($user) 
      {
      
      $userInfo = DB::table('user_mdls')->where('id', $user->user_id)->first();
     // $fms = DB::table('financial_creditor_form_ca_mdls')->where('form_ca_selected_id', $fid)->get(); 

      $fms = DB::table('financial_creditor_form_ca_mdls')->select('id','fc_name','user_id','admin_id','form_ca_selected_id','status','created_at','updated_at')->where([['form_ca_selected_id','=', $fid],['submitted','=',1]])->get();       


     

      $admins = DB::table('general_info_mdls')->get(); 

      $jsl =  bPath().'/'.Config::get('site.general');
      $a_vl =  Config::get('site.formCApprovalValidate');
      $mail = bPath().'/'.Config::get('site.mailRP');
      $formCA = bPath().'/'.Config::get('site.formBReport');
      
      $cat2 = DB::table('form_modification_mdls')->where([['form_id','=',$fid],['status','=',2],['form_type','=','Form-CA Update Request']])->first();
      if ($cat2) 
      {
        DB::table('form_modification_mdls')->where([['form_id','=',$fid],['status','=',2],['form_type','=','Form-CA Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
      }

      $cat = formCAAprovalMdl::where('form_ca_id',$fid)->orderBy('id', 'desc')->first();
      
     // dd($fid);die();
      if ($cat) 
      {
         return view('admin.formCARegViewDetail', compact("jsl","a_vl","user","fid","cat","mail","userInfo","fms", "admins","formCA"));   
      }     
      else
      {
        return view('admin.formCARegViewDetail', compact("jsl","a_vl","user","fid","mail", "userInfo", "fms","admins","formCA"));  
      }
    }
    else
    {
      return redirect(admin().'/form-ca-registered');
    }

   }

   function viewFormCADocDetails($id)
   {
    $fm = DB::table('financial_creditor_form_ca_mdls as fm')
                ->leftJoin('form_ca_files_mdls as ff', 'ff.form_ca_id','=', 'fm.id');
                      if (userType()->user_type==2) 
                        {
                          $fm = $fm->where('fm.irp', Session::get('admin_id'));
                        }

               $fm = $fm->select('fm.id', 'fm.fc_signature as operational_creditor_signature', 'fm.signing_person_name as claimant_name', 'fm.unique_id', 'ff.work_purchase_order_file', 'ff.invoices_file', 'ff.balance_confirmation_file', 'ff.any_correspondence_file', 'ff.authorisation_letter_file', 'ff.bank_statement_file', 'ff.ledger_copy_file', 'ff.computation_sheet_file', 'ff.pan_number_file', 'ff.passport_file', 'ff.aadhar_card')
               ->where('fm.id', $id)->first();

        $where = [
          'form_ca_id'=>$id
        ];       

       $other_files = $this->getRecords(Config::get('site.formCaOtherDoc'), $where);
        // $senctions = $this->getRecords(Config::get('site.formCSenctionMdl'), $where);  
        // $declarationMdls = $this->getRecords(Config::get('site.formCDecTblMdl'), $where);          

    //   dd($fm);die();        
      if ($fm) 
      {

          return view('admin.formCADocDetails', compact("fm", "other_files"));  
      }         
      else
      {

        return redirect(admin().'/form-ca-registered');
      }
   }

   function getFormCAPdfReport(Request $req, $main_id, $other_id)
   {
        $pdf = $this->getFormCAUserReport($main_id, $other_id);
        $now = time();
        return $pdf->stream('FormCA-'.$now.'.pdf');
 
   }

   function formCADetailsApproval(Request $req)
   {
    $response = array();

    $fb = DB::table('financial_creditor_form_ca_mdls')->where('form_ca_selected_id',$req->form_id)->where('submitted',1)->orderBy('id','desc')->first();

    $check1 = DB::table('form_c_a_aproval_mdls')->where('form_ca_id',$req->form_id)->first();

    if (!$check1) 
    {
      $formTyp = "first";
    }
    else
    {
      $formTyp = "updated";
    }


    $cat = new formCAAprovalMdl;

    $cat->company = $fb->company;
    $cat->irp = $fb->irp;
    $cat->user_id = $fb->user_id;
    $cat->form_ca_id  = $req->form_id;
    $cat->admin_id =  Session::get('admin_id');
    $cat->principal_amt = $req->principle_amt ?? '';
    $cat->interest = $req->interest ?? '';
    $cat->total = $req->total_amount ?? '';
    
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
    $cat->status =  $req->status ?? '';
    $cat->formType = $formTyp;
    
    
    

     if($cat->save())
        {

          $whereCK=[
                    'company'=>$fb->company,
                    'irp'=>$fb->irp,
                    'form_ca_id'=>$req->form_id
                ];      

           $this->updateFormApproval('form_c_a_aproval_mdls', $whereCK, 'form_ca_id');

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

   
    function removeFormCaDetails($id)
    {
    	$response = array();
        $cat = financialCreditorFormCaMdl::find($id); 
   		
   		$dir = publicP()."/access/media/forms/formCa/documents/".$cat->unique_id;
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

    function rpMailInfoFormCA($id)
    {
      //$cat = DB::table('financial_creditor_form_ca_mdls')->where('form_ca_selected_id', $id)->where('submitted',1)->orderBy('id','desc')->first();
      
      $cat = DB::table('financial_creditor_form_ca_mdls as fmB')
              ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
              ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
              ->where('fmB.form_ca_selected_id', $id)
              ->where('fmB.submitted',1)
              ->select('fmB.id','fmB.signing_person_name', 'fmB.fc_email' ,'fmB.user_id', 'comp.name as company', 'fmB.user_unique_id as uId')
              ->orderBy('id','desc')
              ->first();

       $info = formCAAprovalMdl::where('form_ca_id',$id)->orderBy('id', 'desc')->first();        
     // $user = userMdl::select('name','email')->where('id',$cat->user_id)->first();

      //echo print_r($cat);

      $mail_details =  view('admin.modals.formCAMail', compact("cat","info"));
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
        'mail_type'=>'User Claim Amount Approval Form-CA',
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
