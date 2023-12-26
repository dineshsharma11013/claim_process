<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserClaimServiceNotification;
use App\Models\formDMdls;
use App\Models\formDAprovalMdl;
use App\Traits\MethodsTrait;
use App\Models\userMdl;
use Config;
use Session;
use DB;
use PDF;

class formDDtlCntrlr extends Controller
{
    use MethodsTrait;

    function formDDetails()
    {
        //$users = formDMdls::getRData();  
    	  $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
      
        $cat2 = DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-D Update Request']])->first();
        if ($cat2) 
        {
          DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-D Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
        }

        $users = formDMdls::where([['submitted','=',1],['status','=',1],['form_d_selected_id','=','']])->get();
        
        if (count($users)>0) 
        {
        foreach ($users as $us) 
        {
            DB::table('form_d_mdls')->where([['id','=',$us->id],['form_d_selected_id','=','']])->update(['form_d_selected_id'=>$us->id]);
        }
        }  

        // $userDtls = userMdl::all();
        // $regs = formDMdls::all();

        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

        $usrs = DB::table('form_d_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','fmB.company')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'fmB.irp')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]); 
                    if (userType()->user_type==2) 
                    {
                        $usrs = $usrs->where('fmB.irp', Session::get('admin_id'));
                      }
                      elseif (userType()->user_type==4) 
                      {
                         $usrs = $usrs->where('fmB.irp', userType()->sub_user); 
                      }
                    
             $usrs = $usrs->select('fmB.id','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','fmB.name','fmB.operational_creditor_signature','usr.email','usr.mobile','usr.unique_id','fmB.ar','comp.name as company', 'ip.first_name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();

      return view('admin.formDDetails',compact("usrs","jsl","a_vl"));
    }

    function formDUnRegDetails()
   {
        $users = formDMdls::getData();
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
   // dd($users);
      return view('admin.formDUnRegDetail',compact("users","jsl","a_vl")); 
   } 

   function viewFormDDetails($id)
   {
      $fid = base64_decode($id);
      $user = DB::table('form_d_mdls')->where('form_d_selected_id',$fid)->where('submitted',1)->orderBy('id','desc')->first();//operationalCreditorMdl::find($fid);
      
      if ($user) 
      {
      
      $userInfo = DB::table('user_mdls')->get();
      //$fms = DB::table('form_d_mdls')->where('form_d_selected_id', $fid)->get(); 

      $fms = DB::table('form_d_mdls')->select('id','name_in_block_letter','user_id','admin_id','form_d_selected_id','status','created_at','updated_at')->where([['form_d_selected_id','=', $fid],['submitted','=',1]])->get(); 

      $admins = DB::table('general_info_mdls')->get();

      $jsl =  bPath().'/'.Config::get('site.general');
      $a_vl =  Config::get('site.formCApprovalValidate');
      $mail = bPath().'/'.Config::get('site.mailRP');
      $formD = bPath().'/'.Config::get('site.formBReport');

      $cat2 = DB::table('form_modification_mdls')->where([['form_id','=',$fid],['status','=',2],['form_type','=','Form-D Update Request']])->first();
      if ($cat2) 
      {
        DB::table('form_modification_mdls')->where([['form_id','=',$fid],['status','=',2],['form_type','=','Form-D Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
      }

      $cat = formDAprovalMdl::where('form_d_id',$fid)->orderBy('id', 'desc')->first();
      
     // dd($fid);die();
      if ($cat) 
      {
         return view('admin.formDRegViewDetail', compact("jsl","a_vl","user","fid","cat","mail","userInfo","fms", "admins","formD"));   
      }     
      else
      {
        return view('admin.formDRegViewDetail', compact("jsl","a_vl","user","fid","mail","userInfo","fms", "admins","formD"));  
      }
    }
    else
    {
      return redirect(admin().'/form-d-registered');
    }

      
   }

   function viewFormDDocDetails($id)
   {
      $fm = DB::table('form_d_mdls as fm')
                ->leftJoin('form_d_files_mdls as ff', 'ff.form_d_id','=', 'fm.id');
                      if (userType()->user_type==2) 
                        {
                          $fm = $fm->where('fm.irp', Session::get('admin_id'));
                        }
                        elseif (userType()->user_type==4) 
                        {
                          $fm = $fm->where('fm.irp', userType()->sub_user);
                        }

               $fm = $fm->select('fm.id', 'fm.operational_creditor_signature', 'fm.name_in_block_letter as claimant_name', 'fm.unique_id', 'ff.work_purchase_order_file', 'ff.invoices_file', 'ff.balance_confirmation_file', 'ff.any_correspondence_file', 'ff.authorisation_letter_file', 'ff.bank_statement_file', 'ff.ledger_copy_file', 'ff.computation_sheet_file', 'ff.pan_number_file', 'ff.passport_file', 'ff.aadhar_card')
               ->where('fm.id', $id)->first();

        $where = [
          'form_d_id'=>$id
        ];       

       $other_files = $this->getRecords(Config::get('site.formDOtherDoc'), $where);
        // $senctions = $this->getRecords(Config::get('site.formCSenctionMdl'), $where);  
        // $declarationMdls = $this->getRecords(Config::get('site.formCDecTblMdl'), $where);          

    //   dd($fm);die();        
      if ($fm) 
      {

          return view('admin.formDDocDetail', compact("fm", "other_files"));  
      }         
      else
      {

        return redirect(admin().'/form-d-registered');
      }
   }


   function getFormDPdfReport(Request $req, $main_id, $other_id)
   {
       
        $pdf = $this->getFormDUserReport($main_id, $other_id);
        $now = time();
        return $pdf->stream('FormD-'.$now.'.pdf');
 
   }

   function rpMailInfoFormD($id)
    {
     // $cat = DB::table('form_d_mdls')->where('form_d_selected_id', $id)->where('submitted',1)->orderBy('id','desc')->first();
      $cat = DB::table('form_d_mdls as fmB')
              ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
              ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
              ->where('fmB.form_d_selected_id', $id)
              ->where('fmB.submitted',1)
              ->select('fmB.id','fmB.name_in_block_letter as name', 'fmB.email as email', 'fmB.user_id', 'comp.name as company', 'fmB.user_unique_id as uId')
              ->orderBy('id','desc')
              ->first();

     $info = formDAprovalMdl::where('form_d_id',$id)->orderBy('id', 'desc')->first();         
    //  $user = userMdl::select('name','email')->where('id',$cat->user_id)->first();

      $mail_details =  view('admin.modals.formDMail', compact("cat", "info"));
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
        'mail_type'=>'User Claim Amount Approval Form-D',
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


   function formDDetailsApproval(Request $req)
   {
    $response = array();

    $fb = DB::table('form_d_mdls')->where('form_d_selected_id',$req->form_id)->where('submitted',1)->orderBy('id','desc')->first();

    $check1 = DB::table('form_d_aproval_mdls')->where('form_d_id',$req->form_id)->first();

    if (!$check1) 
    {
      $formTyp = "first";
    }
    else
    {
      $formTyp = "updated";
    }


    $cat = new formDAprovalMdl;


    $cat->company = $fb->company;
    $cat->irp = $fb->irp;
    $cat->user_id = $fb->user_id;
    $cat->form_d_id = $req->form_id;
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
                    'form_d_id'=>$req->form_id
                ];      

           $this->updateFormApproval('form_d_aproval_mdls', $whereCK, 'form_d_id');      

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

    function removeFormDDetails($id)
    {
    	$response = array();
        $cat = formDMdls::find($id); 
   		
   		$dir = publicP()."/access/media/forms/formD/documents/".$cat->unique_id;
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
}
