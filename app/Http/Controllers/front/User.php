<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Services\UserFormNotification;
use Illuminate\Support\Facades\Hash;
use Config;
use DB;
use Session;
use Mail;
use App\Mail\formNotification;
use PDF;

class User extends Controller
{
    use MethodsTrait;

    function index()
    {
        return view('user.dashboard');
    }

    function profile()
    {
        $user = DB::table(Config::get('site.userMdl'))->where('id',Session::get('user_id'))->first();
        $jsl = bPath().'/'.Config::get('site.userProfile');
        return view('user.profile', compact("user","jsl"));    
    }

    function updateProfile(Request $req)
    {
         $response = array();
        $user_id = Session::get('user_id'); 

        $user = DB::table(Config::get('site.userMdl'))->where('id',Session::get('user_id'))->first();

        $name = $req->neme ?? $user->name;
        $mobile =  $req->mobile ?? $user->mobile;
        $alt_mobile = $req->alt_mobile ?? '';
        $address = $req->address ?? $user->address;
        $correspondance_address = $req->correspondance_address ?? '';
        $city = $req->city ?? '';
        $state = $req->state ?? '';
        $pincode = $req->pincode ?? $user->pincode;

        $updated_at =  date('Y-m-d H:i:s');
        $rem_addr = $req->ip();    

        if ($req->file('file')) 
        {

        $id=uniqid().time();
        $fileName = $id.".". $req->file('file')->getClientOriginalExtension();
        //dd($fileName);   
        $req->file("file")->move("public/access/media/general/user",$fileName);  
        $img = $fileName;
        }
        else
        {
            $img = "";
        }


       $cat = DB::table('user_mdls')->where('id', $user_id)->update(['name' => $name, 'mobile' => $mobile, 'alt_mobile' => $alt_mobile, 'address' => $address, 'correspondance_address' => $correspondance_address, 'city' => $city, 'state' => $state, 'pincode' => $pincode, 'rem_addr' => $rem_addr, 'updated_at' => $updated_at, 'img' => $img]);

        if ($cat) 
        { 
            $response['error'] = false;
            $response['message'] = "Profile updated successfully.";   
            
        }
        else
        {
            $response['error'] = true;
            $response['message'] = "Please refresh page. Then try again.";
        }

        echo json_encode($response);
    }

    function userFormB()
    {
               
        $user = DB::table(Config::get('site.userMdl'))->where('id',Session::get('user_id'))->first();
        $jsl = bPath().'/'.Config::get('site.formBRequestEdit');

        $results1 = DB::table('operational_creditor_mdls as fb')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fb.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fb.user_id','=',Session::get('user_id')],['fb.submitted','=',1],['fb.status','=',1],['fb.deleted','=',2]]) 
                    ->select('fb.id','fb.claimant_name as signing_name','fb.operational_creditor_address','fb.operational_creditor_email','fb.operational_creditor_signature','fb.updated_at','fb.unique_id','fb.form_type','fb.ar', 'comp.name as company', 'formA.name as ip')
                    ->orderBy('fb.id','desc')
                    ->get();


     //   dd($results1);die();
        return view('user.formB', compact("results1","user","jsl"));
    }

    function userFormBDetails(Request $req, $id)
    {
        $fid = base64_decode($id);
       

        $user = DB::table('operational_creditor_mdls')->where('form_b_selected_id',$fid)->where('submitted',1)->orderBy('id','desc')->first();
        $cat = DB::table('form_b_approval_mdls')->where([['form_b_id','=',$fid],['formType','=','latest']])->orderBy('id', 'desc')->first();
        if ($cat) 
        {
            $ip = DB::table('general_info_mdls')->where('id', $cat->irp)->first();
        }
        $formB = bPath().'/'.Config::get('site.formBReportUser');
        $fms = DB::table('operational_creditor_mdls')->select('id','claimant_name','operational_creditor_name','user_id','admin_id','form_b_selected_id','status','created_at','updated_at','formType')->where([['form_b_selected_id','=', $fid],['submitted','=',1]])->get();             

        // dd($cat);die();
        if (isset($ip)) 
        {
            return view('user.formBDetails', compact("cat","user","ip","fms","formB"));
        }
        else
        {
            return view('user.formBDetails', compact("cat","user", "fms","formB"));
        }
        
    }

    function getFormBPdfReportUser($main_id, $other_id)
   {    
            $now = time();
            $pdf = $this->getFormBUserReport($main_id, $other_id);
            return $pdf->stream('FormB-'.$now.'.pdf');        
   }

   function getFormCPdfReportUser($main_id, $other_id)
   {
            $now = time();
            $pdf = $this->getFormCUserReport($main_id, $other_id);
            return $pdf->stream('FormC-'.$now.'.pdf'); 
   }

   function getFormDPdfReportUser($main_id, $other_id)
   {
        $now = time();
            $pdf = $this->getFormDUserReport($main_id, $other_id);
            return $pdf->stream('FormD-'.$now.'.pdf'); 
   }

   function getFormEPdfReportUser($main_id, $other_id)
   {
        $now = time();
            $pdf = $this->getFormEUserReport($main_id, $other_id);
            return $pdf->stream('FormE-'.$now.'.pdf'); 
   }

   function getFormFPdfReportUser($main_id, $other_id)
   {
        $now = time();
            $pdf = $this->getFormFUserReport($main_id, $other_id);
            return $pdf->stream('FormF-'.$now.'.pdf'); 
   }

   function getFormCAPdfReportUser($main_id, $other_id)
   {
        $now = time();
            $pdf = $this->getFormCAUserReport($main_id, $other_id);
            return $pdf->stream('FormCA-'.$now.'.pdf'); 
   }



    function userFormC()
    {
        //$results = DB::table(Config::get('site.formCMdl'))->select('id','fc_name','fc_address','fc_email','operational_creditor_signature','created_at','unique_id','form_type','ar')->where([['user_id','=',Session::get('user_id')],['submitted','=',1],['status','=',1],['admin_id','=', '']])->orderBy('id','desc')->get();        
        
        $user = DB::table(Config::get('site.userMdl'))->where('id',Session::get('user_id'))->first();
        $jsl = bPath().'/'.Config::get('site.formBRequestEdit');

        $results1 = DB::table('finanicial_creditor_form_c_mdls as fb')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fb.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fb.user_id','=',Session::get('user_id')],['fb.submitted','=',1],['fb.status','=',1]]) 
                    ->select('fb.id','fb.fc_name','fb.fc_address','fb.fc_email','fb.operational_creditor_signature','fb.created_at','fb.unique_id','fb.form_type','fb.ar', 'comp.name as company', 'formA.name as ip')
                    ->orderBy('fb.id','desc')
                    ->get();    


        //dd($results);die();
        return view('user.formC', compact("results1","user","jsl"));   
    }

    function userFormCDetails(Request $req, $id)
    {

        $fid = base64_decode($id);
       

        $user = DB::table('finanicial_creditor_form_c_mdls')->where('form_c_selected_id',$fid)->where('submitted',1)->orderBy('id','desc')->first();
        $cat = DB::table('form_c_aproval_mdls')->where([['form_c_id','=',$fid],['formType','=','latest']])->orderBy('id', 'desc')->first();
        if ($cat) 
        {
            $ip = DB::table('general_info_mdls')->where('id', $cat->irp)->first();
        }

        $fms = DB::table('finanicial_creditor_form_c_mdls')->where([['form_c_selected_id','=', $fid],['submitted','=',1]])->get();             
        $formB = bPath().'/'.Config::get('site.formBReportUser');
         //dd($user);die();
        if (isset($ip)) 
        {
            return view('user.formCDetails', compact("cat","user","ip","fms", "formB"));
        }
        else
        {
            return view('user.formCDetails', compact("cat","user", "fms", "formB"));
        }
    }

    function userFormD()
    {
        //$results = DB::table(Config::get('site.formDMdl'))->select('id','name','address','email','operational_creditor_signature','created_at','unique_id','form_type','ar')->where([['user_id','=',Session::get('user_id')],['submitted','=',1],['status','=',1],['admin_id','=', '']])->orderBy('id','desc')->get();        
        
        $user = DB::table(Config::get('site.userMdl'))->where('id',Session::get('user_id'))->first();

        $jsl = bPath().'/'.Config::get('site.formBRequestEdit');

        $results1 = DB::table('form_d_mdls as fb')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fb.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fb.user_id','=',Session::get('user_id')],['fb.submitted','=',1],['fb.status','=',1]]) 
                    ->select('fb.id','fb.name','fb.address','fb.email','fb.operational_creditor_signature','fb.created_at','fb.unique_id','fb.form_type','fb.ar', 'comp.name as company', 'formA.name as ip')
                    ->orderBy('fb.id','desc')
                    ->get(); 



       // dd($results1);die();
        return view('user.formD', compact("results1","user","jsl"));   
    }

    function userFormDDetails(Request $req, $id)
    {
        $fid = base64_decode($id);
       

        $user = DB::table('form_d_mdls')->where('form_d_selected_id',$fid)->where('submitted',1)->orderBy('id','desc')->first();
        $cat = DB::table('form_d_aproval_mdls')->where([['form_d_id','=',$fid],['formType','=','latest']])->orderBy('id', 'desc')->first();
        if ($cat) 
        {
            $ip = DB::table('general_info_mdls')->where('id', $cat->irp)->first();
        }

        $fms = DB::table('form_d_mdls')->where([['form_d_selected_id','=', $fid],['submitted','=',1]])->get();             
        $formB = bPath().'/'.Config::get('site.formBReportUser');
         //dd($user);die();
        if (isset($ip)) 
        {
            return view('user.formDDetails', compact("cat","user","ip","fms","formB"));
        }
        else
        {
            return view('user.formDDetails', compact("cat","user", "fms","formB"));
        }

    }


     function userFormUpdateRequest(Request $req, UserFormNotification $notify)
    {
        $response = array();
        $user_id = Session::get('user_id'); 
        if ($user_id) 
        {
            $cat = DB::table("user_mdls")->select('id','name','email','unique_id','mobile','password','pwd')->where('id',$user_id)->first();

            $form_id = $req->form_id;
            $fm_type = $req->fm_type;
            $fm_nm = $req->fm_nm;

            try
            {
                $data2 = [
                    'form_id'=>$form_id,
                    'user_id'=>$user_id,
                    'status'=>2
                ];

                $cat2 = $this->getLatestRow(Config::get('site.formModificationMdls'),$data2);

                if ($cat2) 
                {
                    $response['error'] = false;
                    $response['message'] = "Request has already sent.";   
                }
                else
                {

                $subject = ucwords($cat->name)." - $fm_nm updation request.";
                $txt = "<p>".ucwords($cat->name)." has sent request to update $fm_nm.</p>";   

                $dt1 = [
                    'user_id' => $user_id,
                    'form_type' => $fm_type,
                    'form_id' => $form_id,
                    'msg' => $txt,
                    'subject'=>$subject,
                    'date'=>date('Y-m-d'),
                    'rem_addr' => $req->ip(),
                    'approval_status'=>2,
                    'approval_person_id'=>'',
                    'approval_by_date'=>'',
                    'status'=>2,
                    'request_sent_time'=>date('Y-m-d H:i:s'),
                    'request_seen_time'=>date('Y-m-d H:i:s'),
                    'form_update_status'=>2,
                    'form_update_time'=>'',
                    'user_name' => $cat->name,
                    'mail_to'=>Config::get('site.mail_from'),
                    'action'=>'insert'
                ];    

                $dt2 = [
                    'subject' => $subject,
                    'email_from'=>$cat->email,
                    'formType'=>$fm_nm
                ];

                $notify->send($dt1, $dt2);
                

                $response['error'] = false;
                $response['message'] = "Request sent successfully.";   
               } 
            }
            catch(\Exception $e)
            {
                $response['error'] = true;
                $response['message'] = $e->getMessage();//"Request not sent. Please refresh and try again.";
            }
        }
        else
        {
            $response['error'] = true;
            $response['message'] = "User does not exist.";
        }


        echo json_encode($response);
    }



    function userFormE()
    {
        // $results1 = DB::table(Config::get('site.formEMdl'))
        //             ->select('id','user_id','operational_creditor_signature','created_at','unique_id','form_type','ar')
        //             ->where([['user_id','=',Session::get('user_id')],['submitted','=',1],['status','=',1]])
        //             ->orderBy('id','desc')
        //             ->get();        

        $results1 = DB::table('form_e_file_mdls as fb')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fb.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->select('fb.id','fb.created_at','fb.unique_id','fb.form_type','fb.ar', 'comp.name as company', 'formA.name as ip')
                    ->where([['fb.user_id','=',Session::get('user_id')],['fb.submitted','=',1],['fb.status','=',1]])
                    ->orderBy('fb.id','desc')
                    ->get();        
        
        $user = DB::table(Config::get('site.userMdl'))->where('id',Session::get('user_id'))->first();
        $jsl = bPath().'/'.Config::get('site.formBRequestEdit');        

       // dd($results1);die();
        return view('user.formE', compact("results1","user","jsl"));   
    }

    function userFormEDetails(Request $req, $id)
    {

        $fid = base64_decode($id);
       
        $user = DB::table('form_e_file_mdls')->where('form_e_selected_id',$fid)->where('submitted',1)->orderBy('id','desc')->first();
        $cat = DB::table('form_e_approval_mdls')->where([['form_e_id','=',$fid],['formType','=','latest']])->orderBy('id', 'desc')->first();
        if ($cat) 
        {
            $ip = DB::table('general_info_mdls')->where('id', $cat->irp)->first();
        }

        $fms = DB::table('form_e_file_mdls')->where([['form_e_selected_id','=', $fid],['submitted','=',1]])->get();             
        $emps = DB::table('form_e_employee_detail_mdls')->where('form_e_id',$user->id)->get();    
        $total_amt = DB::table("form_e_employee_detail_mdls")->where([['form_e_selected_id','=', $user->form_e_selected_id],['form_e_id','=',$user->id]])->sum('total_amt');
        $userIn = DB::table('user_mdls')->where('id',$user->user_id)->first();
        $formB = bPath().'/'.Config::get('site.formBReportUser');
        // dd($user);die();
        if (isset($ip)) 
        {
            return view('user.formEDetails', compact("cat","user","ip","fms", "total_amt", "emps", "userIn", "formB"));
        }
        else
        {
            return view('user.formEDetails', compact("cat","user", "fms", "total_amt", "emps", "userIn", "formB"));
        }

    }


    function userFormF()
    {
        //$results = DB::table(Config::get('site.formFMdl'))->select('id','fc_name','fc_address','fc_email','fc_signature','created_at','unique_id','form_type','ar')->where([['user_id','=',Session::get('user_id')],['submitted','=',1],['status','=',1],['admin_id','=', '']])->orderBy('id','desc')->get();        
        
        $user = DB::table(Config::get('site.userMdl'))->where('id',Session::get('user_id'))->first();
        
        $jsl = bPath().'/'.Config::get('site.formBRequestEdit');

        $results1 = DB::table('other_creditor_form_f_mdls as fb')
                   ->leftJoin('form_a_mdls As formA', 'formA.id','=','fb.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fb.user_id','=',Session::get('user_id')],['fb.submitted','=',1],['fb.status','=',1]]) 
                    ->select('fb.id','fb.fc_name','fb.fc_address','fb.fc_email','fb.signing_person_name','fb.signing_address','fb.fc_signature','fb.created_at','fb.unique_id','fb.form_type','fb.ar', 'comp.name as company', 'formA.name as ip')
                    ->orderBy('id','desc')
                    ->get(); 
       // dd($results1);die();

        return view('user.formF', compact("results1","user","jsl"));   
    }


    function userFormFDetails(Request $req, $id)
    {
        $fid = base64_decode($id);
       

        $user = DB::table('other_creditor_form_f_mdls')->where('form_f_selected_id',$fid)->where('submitted',1)->orderBy('id','desc')->first();
        $cat = DB::table('form_f_approval_mdls')->where([['form_f_id','=',$fid],['formType','=','latest']])->orderBy('id', 'desc')->first();
        if ($cat) 
        {
            $ip = DB::table('general_info_mdls')->where('id', $cat->irp)->first();
        }

        $fms = DB::table('other_creditor_form_f_mdls')->select('id','signing_person_name','user_id','admin_id','form_f_selected_id','status','created_at','updated_at')->where([['form_f_selected_id','=', $fid],['submitted','=',1]])->get();             
        $formB = bPath().'/'.Config::get('site.formBReportUser');
        // dd($user);die();
        if (isset($ip)) 
        {
            return view('user.formFDetails', compact("cat","user","ip","fms", "formB"));
        }
        else
        {
            return view('user.formFDetails', compact("cat","user", "fms", "formB"));
        }
        
        
    }

    function userFormCA()
    {
       // $results = DB::table(Config::get('site.formCaMdl'))->select('id','fc_name','fc_address','fc_email','fc_signature','created_at','unique_id','form_type','ar')->where([['user_id','=',Session::get('user_id')],['submitted','=',1],['status','=',1],['admin_id','=', '']])->orderBy('id','desc')->get();        
        
        $user = DB::table(Config::get('site.userMdl'))->where('id',Session::get('user_id'))->first();
        $jsl = bPath().'/'.Config::get('site.formBRequestEdit');

        $results1 = DB::table('financial_creditor_form_ca_mdls as fb')
                   ->leftJoin('form_a_mdls As formA', 'formA.id','=','fb.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fb.user_id','=',Session::get('user_id')],['fb.submitted','=',1],['fb.status','=',1]]) 
                    ->select('fb.id','fb.fc_name','fb.fc_address','fb.fc_email','fb.fc_signature','fb.created_at','fb.unique_id','fb.form_type','fb.ar', 'comp.name as company', 'formA.name as ip')
                    ->orderBy('fb.id','desc')
                    ->get(); 

        //dd($results);die();
        return view('user.formCA', compact("results1","user","jsl"));   
    }

    function userFormCADetails(Request $req, $id)
    {
        $fid = base64_decode($id);
       

        $user = DB::table('financial_creditor_form_ca_mdls')->where('form_ca_selected_id',$fid)->where('submitted',1)->orderBy('id','desc')->first();
        $cat = DB::table('form_c_a_aproval_mdls')->where([['form_ca_id','=',$fid],['formType','=','latest']])->orderBy('id', 'desc')->first();
        if ($cat) 
        {
            $ip = DB::table('general_info_mdls')->where('id', $cat->irp)->first();
        }

        $fms = DB::table('financial_creditor_form_ca_mdls')->where([['form_ca_selected_id','=', $fid],['submitted','=',1]])->get();             
        $formB = bPath().'/'.Config::get('site.formBReportUser');
         //dd($user);die();
        if (isset($ip)) 
        {
            return view('user.formCaDetails', compact("cat","user","ip","fms", "formB"));
        }
        else
        {
            return view('user.formCaDetails', compact("cat","user", "fms", "formB"));
        }
        
    }

    function changePassword()
    {
        $jsl = bPath().'/'.Config::get('site.changePassword');
        return view('user.changePassword', compact("jsl")); 
    }

    function userchangePassword(Request $req)
    {
        $response = array();
        $fp_user_id = Session::get('user_id'); 

        $password = $req->password;
        $confirm_password =  $req->confirm_password;

        $cat = DB::table('user_mdls')->select('id','password','pwd')->where('id', $fp_user_id)->first();

        if ($cat) 
        {
            if ($password == '') 
            {
                $response['error'] = true;
                $response['message'] = "Please enter password.";       
            }
            elseif (strlen($password) >= 30) 
            {
                $response['error'] = true;
                $response['message'] = "Maximum 30 characters allowed.";       
            }
            elseif ($confirm_password == '') 
            {
                $response['error'] = true;
                $response['message'] = "Please enter confirm password.";
            }
            elseif (strlen($confirm_password) >= 30) 
            {
                $response['error'] = true;
                $response['message'] = "Maximum 30 characters allowed.";       
            }
            elseif ($password !== $confirm_password) 
            {
                $response['error'] = true;
                $response['message'] = "Password does not match.";
            }
            else
            {   
            DB::table('user_mdls')->where('id', $cat->id)->update(['password' => $password, 'pwd' => Hash::make($req->password)]);
            $response['error'] = false;
            $response['message'] = "Password changed successfully.";   
            }
        }
        else
        {
            $response['error'] = true;
            $response['message'] = "User does not exist.";
        }

        echo json_encode($response);

    }
}
