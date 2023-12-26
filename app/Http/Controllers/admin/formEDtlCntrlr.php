<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserClaimServiceNotification;
use App\Models\formEFileMdl;
use App\Models\formEEmployeeDetailMdl;
use App\Models\formEOtherDocumentMdl;
use App\Models\formEApprovalMdl;
use App\Models\userMdl;
use App\Traits\MethodsTrait;
use Config;
use Session;
use DB;
use PDF;

class formEDtlCntrlr extends Controller
{
    use MethodsTrait;

    function formEDetails()
    {
        //$users = formEFileMdl::getRData();  
         $jsl =  bPath().'/'.Config::get('site.general');
         $a_vl =  Config::get('site.adminGeneral');
      
        $cat2 = DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-E Update Request']])->first();
        if ($cat2) 
        {
          DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-E Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
        }

        $users = formEFileMdl::where([['submitted','=',1],['status','=',1]])->orderBy('id','desc')->get();
        
        foreach ($users as $us) 
        {
            DB::table('form_e_file_mdls')->where([['id','=',$us->id],['form_e_selected_id','=','']])->update(['form_e_selected_id'=>$us->id]);
        }  

        // $userDtls = userMdl::all();
        // $regs = formEFileMdl::all();

        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

        $usrs = DB::table('form_e_file_mdls as fmB')
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
                    
          $usrs = $usrs->select('fmB.id','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'formA.name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();

      return view('admin.formEDetails',compact("usrs","jsl","a_vl"));
    }

    function formEUnRegDetails()
   {
      $users = formEFileMdl::getData();
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
    //dd($users);
      return view('admin.formEDetailsUnReg',compact("users","jsl","a_vl")); 
   } 


   function viewFormEDetails($id)
   {
      $fid = base64_decode($id);
  

      $user = DB::table('form_e_file_mdls')->where([['form_e_selected_id','=',$fid],['submitted','=',1]])->orderBy('id','desc')->first();//
      if ($user) 
      {
       
      $userIn = DB::table('user_mdls')->where('id',$user->user_id)->first();
      $userInfo = DB::table('user_mdls')->get();
      $fms = DB::table('form_e_file_mdls as fe')
                  ->leftJoin('user_mdls as user', 'user.id', '=', 'fe.user_id')
                  ->where('fe.form_e_selected_id', $fid)
                  ->where('fe.submitted',1)
                  ->select('fe.id', 'fe.form_e_selected_id', 'fe.created_at', 'fe.updated_at', 'user.name as signing_person_name', 'fe.status')
                  ->get(); 


      $emps = formEEmployeeDetailMdl::where('form_e_id',$user->id)->get();

      $total_amt = DB::table("form_e_employee_detail_mdls")->where([['form_e_selected_id','=', $user->form_e_selected_id],['form_e_id','=',$user->id]])->sum('total_amt');


      $admins = DB::table('general_info_mdls')->get();

      $jsl =  bPath().'/'.Config::get('site.general');
      $a_vl =  Config::get('site.formCApprovalValidate');
      $mail = bPath().'/'.Config::get('site.mailRP');
      $formC = bPath().'/'.Config::get('site.formBReport'); 
      
      DB::table('form_modification_mdls')->where([['form_id','=',$fid],['status','=',2],['form_type','=','Form-E Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);

       // return view('admin.formERegViewDetail', compact("jsl","a_vl","user","fid","emps"));
       $cat = formEApprovalMdl::where('form_e_id',$fid)->orderBy('id', 'desc')->first();
      
      ///dd($fms);die();
      if ($cat) 
      {
         return view('admin.formERegViewDetail', compact("jsl","a_vl","user","fid","cat", "mail","userInfo","fms", "admins","formC","userIn","emps","total_amt"));   
      }     
      else
      {
        return view('admin.formERegViewDetail', compact("jsl","a_vl","user","fid", "mail","userInfo","fms", "admins","formC","userIn","emps","total_amt"));  
      }
    }
    else
    {
      return redirect(admin().'/form-e-registered');
    }
      
   }

   function viewFormEDocDetails($id)
   {
    $fm = DB::table('form_e_file_mdls as fm')
                ->leftJoin('user_mdls as user', 'user.id','=', 'fm.user_id');
                      if (userType()->user_type==2) 
                        {
                          $fm = $fm->where('fm.irp', Session::get('admin_id'));
                        }
                        elseif (userType()->user_type==4) 
                        {
                          $fm = $fm->where('fm.irp', userType()->sub_user);
                        }

               $fm = $fm->select('fm.id', 'fm.operational_creditor_signature', 'user.name as claimant_name', 'fm.unique_id', 'fm.work_purchase_order_file', 'fm.invoices_file', 'fm.balance_confirmation_file', 'fm.any_correspondence_file', 'fm.authorisation_letter_file', 'fm.bank_statement_file', 'fm.ledger_copy_file', 'fm.computation_sheet_file', 'fm.pan_number_file', 'fm.passport_file', 'fm.aadhar_card')
               ->where('fm.id', $id)->first();

        $where = [
          'form_e_id'=>$id
        ];       

       $other_files = $this->getRecords(Config::get('site.formEOtherDoc'), $where);
        // $senctions = $this->getRecords(Config::get('site.formCSenctionMdl'), $where);  
        // $declarationMdls = $this->getRecords(Config::get('site.formCDecTblMdl'), $where);          

    //   dd($fm);die();        
      if ($fm) 
      {

          return view('admin.formEDocDetail', compact("fm", "other_files"));  
      }         
      else
      {

        return redirect(admin().'/form-e-registered');
      }
   }

   function getFormEPdfReport(Request $req, $main_id, $other_id)
   {
        
        $pdf = $this->getFormEUserReport($main_id, $other_id);
        $now = time();
        return $pdf->stream('FormE-'.$now.'.pdf');
    
   }


   function formEDetailsApproval(Request $req)
   {
    $response = array();

    $fb = DB::table('form_e_file_mdls')->where('form_e_selected_id',$req->form_id)->where('submitted',1)->orderBy('id','desc')->first();

    $check1 = DB::table('form_e_approval_mdls')->where('form_e_id',$req->form_id)->first();

    if (!$check1) 
    {
      $formTyp = "first";
    }
    else
    {
      $formTyp = "updated";
    }


    $cat = new formEApprovalMdl;

    $cat->company = $fb->company;
    $cat->irp = $fb->irp;
    $cat->user_id = $fb->user_id;
    $cat->form_e_id  = $req->form_id;
    $cat->admin_id =  Session::get('admin_id');

    $cat->claim_amt = $req->claim_amt ?? '';
  
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
                    'form_e_id'=>$req->form_id
                ];      

           $this->updateFormApproval('form_e_approval_mdls', $whereCK, 'form_e_id');

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



    function removeFormEDetails($id)
    {
       $response = array();
        $cat = formEFileMdl::find($id); 
      
      $dir = publicP()."/access/media/forms/formE/documents/".$cat->unique_id;
      if (is_dir($dir)) 
      {
      $this->rmFilesDirs($dir);  
      }

       DB::table('form_e_employee_detail_mdls')->where('unique_id', $cat->unique_id)->delete();

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


    function rpMailInfoFormE($id)
    {
      //$cat = DB::table('form_e_file_mdls')->where('id', $id)->first();
      
        $cat = DB::table('form_e_file_mdls as fmB')
              ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
              ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
              ->where('fmB.form_e_selected_id', $id)
              ->where('fmB.submitted',1)
              ->select('fmB.id','fmB.user_id', 'fmB.form_e_selected_id', 'comp.name as company', 'fmB.user_unique_id as uId')
              ->orderBy('id','desc')
              ->first();

      $user = userMdl::select('name','email')->where('id',$cat->user_id)->first();
     
      $total_amt = DB::table("form_e_employee_detail_mdls")->where([['form_e_selected_id','=', $cat->form_e_selected_id],['form_e_id','=',$cat->id]])->sum('total_amt');
      $info = formEApprovalMdl::where('form_e_id',$id)->orderBy('id', 'desc')->first();

      $mail_details =  view('admin.modals.formEMail', compact("cat","user", "info"));
      echo $mail_details;
    
     // echo $total_amt;
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
        'mail_type'=>'User Claim Amount Approval Form-E',
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
