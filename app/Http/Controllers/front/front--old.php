<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use Config;
use DB;
use Mail;
use App\Mail\userSignUpMail;
use Session;
use event;
use App\Events\fSignUpMail;

class front extends Controller
{   
    use MethodsTrait;

    function index(Request $req)
    {
        $jsl = bPath().'/'.Config::get('site.auth');
        return view('home.index', compact("jsl"));
    }

    function registerForm(Request $req)
    {
        //dd($req->type);
        if($req->type=='')
        {
            return redirect('/');
        }
        elseif($req->type=='operational-creditor-form-b')
        {
            $jsl = bPath().'/'.Config::get('site.formB');
            return view('home.operational_creditor_form_b', compact("jsl"));
          //  dd($jsl);
        }
        else
        {
            return abort(404);
        }
    }


    function formBregistration(Request $req)
    {
        $response = array();
        $data = [
            'user_id' => '',
            'creditor_type' => $req->creditor_type ?? "",
            'creditor_name' => $req->creditor_name ?? "",
            'registered_email' => $req->registered_email ?? "",
            'address' => $req->address ?? "",
            'mobile' => $req->mobile ?? "",
            'principal_amount' => $req->principal_amount ?? "",
            'interest' => $req->interest ?? "",
            'bank_name' => $req->bank_name ?? "",
            'account_number' => $req->account_number ?? "",
            'ifsc_code' => $req->account_number ?? "",
            'authorised_person_name' => $req->authorised_person_name ?? "",
            'authorized_person_address' => $req->authorized_person_address ?? "",
            'operational_creditor_signature' => $req->operational_creditor_signature ?? "",
            'authorized_representative_signature' => $req->authorized_representative_signature ?? "",
            'identification_number' => $req->identification_number ?? "",
            'document_details_reference' => $req->document_details_reference ?? "",
            'document_any_dispute' => $req->document_any_dispute ?? "",
            'debt_incurred_details' => $req->debt_incurred_details ?? "",
            'mutual_credit_details' => $req->mutual_credit_details ?? "",
            'any_details' => $req->any_details ?? "",
            'list_of_documents' => $req->list_of_documents ?? "",
            'rem_addr'=> $req->ip()
        ];

        $output =    $this->insertData(Config::get('site.formBMdl'),$data);

        if ($output) 
        {
            $response['error'] = false;
            $response['cls'] = 'success';
            $response['message'] = "Data saved successfully.";
        }
        else
        {
            $response['error'] = true;
            $response['cls'] = 'danger';
            $response['message'] = "Data not saved. Try again later";
        }
        echo json_encode($response);
    }

    function userSignUp(Request $req)
    {
        $response = array();
        $data = [
            'name' => $req->name ?? "",
            'email' => $req->email ?? "",
            'mobile' => $req->mobile ?? "",
            'address' => "",
            'unique_id' => $req->unique_id ?? "", 
            'password' => $req->password ?? "",
            'pwd' => $req->password ?? "",
            'creditor_type' => "",
            'rem_addr' => $req->ip(),
            'date' => date('Y-m-d') ?? "",
            'status' => 2,
            'auth_id' => '',
            'auth_check' => '',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ];

        $com = DB::table("general_info_mdls")->where([['user_type','=',1],['sub_user','=',""]])->first();
        $timestamp =  $_SERVER["REQUEST_TIME"];
             
            Session::put('signup_time', $timestamp);  
            $otp = rand(100000,999999);
            Session::put('signUp_otp',$otp);

        $check_first = DB::table("user_mdls")->where('unique_id',$req->unique_id)->first();
        if ($check_first) 
        {
            $response['error'] = true;
                $response['message'] = "Unique-Id already exists. Please login.";
                echo json_encode($response);
                die();
        }

        $check = DB::table("user_mdls")->where('email',$req->email)->orWhere('mobile',$req->mobile)->latest()->first();

        if ($check) 
        {

            if ($check->auth_check != "" && $check->status == 1) 
            {
                $response['error'] = true;
                $response['message'] = "Email-Id/mobile number already exists. Please Login.";   
            }
            elseif ($check->auth_check != "" && $check->status == 2) 
            {
                $response['error'] = true;
                $response['message'] = "You are not authourized to login.";      
            }
            elseif ($check->auth_check == "" && $check->status != "") 
            {
                 DB::table('user_mdls')->where('id', $check->id)->update(['email' => $req->email, 'mobile' => $req->mobile, 'name' => $req->name, 'password' => $req->password, 'pwd' => $req->password, 'date' => date('Y-m-d')]);

                $cat2 = DB::table("user_mdls")->where('unique_id',$req->unique_id)->latest()->first();
                
                if ($cat2) 
                {
                    $sntData = ['name'=>$cat2->name, 'email'=>$cat2->email, 'otp'=>$otp, 'company_name'=>$com->company_name, 'mobile'=>$cat2->mobile];    

                    event(new fSignUpMail($sntData));
                    Session::put('unique_id',$cat2->id);  
                    $response['error'] = false;
                    $response['message'] = "Otp sent to your email and mobile.";    
                }
                else
                {
                    $response['error'] = true;
                    $response['message'] = "Something went wrong. Refresh the page and try again.";       
                }
                
            }
            
        }
        else
        {

        $cat = $this->insertData(Config::get('site.userMdl'),$data);

        if ($cat) 
        {

            //$cat3 = DB::table("user_mdls")->where('auth_check','')->orWhere('email',$req->email)->orWhere('mobile',$req->mobile)->latest()->first();  

            $cat3 = DB::table("user_mdls")->where('auth_check','')->where('unique_id',$req->unique_id)->latest()->first();  

            $sntData = ['name'=>$cat3->name, 'email'=>$cat3->email, 'otp'=>$otp, 'company_name'=>$com->company_name, 'mobile'=>$cat3->mobile];

            event(new fSignUpMail($sntData));
            Session::put('unique_id',$cat3->id);
            $response['error'] = false;
            $response['message'] = "Otp sent to your email and mobile.";
        }
        else
        {
            $response['error'] = true;
            $response['message'] = "Otp not sent. Try again later";
        }
    }

        echo json_encode($response);
    }


    function userSignUpOtp(Request $req)
    {
        $response = array();
        
        $signUp_otp = Session::get('signUp_otp');
        $unique_id = Session::get('unique_id');
        
        $timestamp =  $_SERVER["REQUEST_TIME"];    
        $signup_time = Session::get('signup_time');  
         $calculate = $timestamp - $signup_time;     
        
       // echo $timestamp." ".$signup_time." ".$calculate;         

        if($calculate > 600) // 60 seconds equals 1 minute
        {
            Session::forget('signUp_otp');
            $response['error'] = true;
            $response['message'] = "Your otp is expired. Please signup again.";   
            echo json_encode($response);
            die();
        }
        if ($signUp_otp == $req->otp) 
        {

            Session::put('user_id',$unique_id);
            DB::table('user_mdls')->where('id', $unique_id)->update(['status' => 1, 'auth_check' => 1, 'date' => date('Y-m-d')]);

            $response['error'] = false;
            $response['message'] = "Otp verified successfully.";   
            Session::forget('unique_id');
            Session::forget('signUp_otp');
        }
        else
        {
            $response['error'] = true;
            $response['message'] = "Otp does not match. Please try again.";
        }

        echo json_encode($response);
    }






function logOut(Request $req)
{
    Session::forget('user_id');
      //Session::flush(); 
      return redirect('/');
}



}
