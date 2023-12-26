<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Events\fSignInFire;
use App\Events\fSignUpMail;
use App\Events\fForgotPasswardFire;
use Illuminate\Support\Facades\Hash;
use App\Models\companyDtl; 
use App\Models\arCreditorClassMdl;
use Config;
use DB;
use Mail;
use App\Mail\userSignUpMail;
use Session;
use event;
use Carbon\Carbon;
use PDF;

class front extends Controller
{       
    use MethodsTrait;

    function index(Request $req)
    {   
        $current_time = date("Y-m-d");
        
        $data = DB::table("form_a_mdls")->select('company_id')->where([['status','=',1],['deleted','=', 2]])->groupBy('company_id')->pluck('company_id');
        
        $comps = DB::table("company_dtls")->where([['status','=',1],['deleted','=', 2]])->whereIn('id', $data)->pluck('name','id');
        $jsl = bPath().'/'.Config::get('site.auth');

        $output = DB::table('form_a_mdls')
                    ->select('id','company_id','user_id', 'corporate_debtor_insolvency_date', 'insolvency_closing_date','unique_id')
                    ->where([['corporate_debtor_insolvency_date','<=',$current_time],['insolvency_closing_date','>=',$current_time]])
                    ->orderBy('id', 'desc')
                    ->get();

        $past = DB::table('form_a_mdls')
                    ->select('id','company_id','user_id', 'corporate_debtor_insolvency_date', 'insolvency_closing_date','unique_id')
                    ->where([['insolvency_closing_date','<',$current_time]])
                    ->orderBy('id', 'desc')
                    ->get(); 

        $upcomings = DB::table('form_a_mdls')
                    ->select('id','company_id','user_id', 'corporate_debtor_insolvency_date', 'insolvency_closing_date','unique_id')
                    ->where([['insolvency_closing_date','>',$current_time]])
                    ->orderBy('id', 'desc')
                    ->get();                           

        //dd($comps); die();

        return view('front.front', compact("jsl","comps", "output","past","upcomings"));
    }

    function formAView($id)
    {
        $cat = DB::table('form_a_mdls')->where('unique_id', $id)->first();
        $comp = DB::table('company_dtls')->select('name')->where('id', $cat->company_id)->first();  
       // $classes = arMdl::where('status',1)->orderBy('name')->pluck('name','id');

        $clss = arCreditorClassMdl::where([['ar_id','=', $cat->id],['status','=',1],['deleted','=',2]])->get(); 

        $asn = DB::table('assign_company_mdls')->select('ip_id')->where('id', $cat->id)->first();        

        $ips = DB::table('general_info_mdls')->select('username','profile_pic')->where('id', $cat->user_id)->first();
        $com_name = companyDtl::select('name')->where('id',$cat->company_id)->first();

        //echo print_r($ips);die();

        $ips_nms = DB::table('general_info_mdls')->where([['user_type','=',2],['sub_user','=',''],['status','=',1],['flag','=',2]])->pluck('username','id');

        $pdf = PDF::loadView('user.pdf.formA', compact("cat","comp","com_name","ips","clss", "ips_nms"));
        
        $now = time();
        return $pdf->stream($now.'.pdf');
    }


    function getIpDtl(Request $req, $comp)
    {
       // echo $comp;die(); 
        $response = array();
        try
        {
            $user_id = Session::has('user_id'); 
            $current_time = date("Y-m-d H:i");
            $data = DB::table('form_a_mdls')
                    ->select('user_id','id')
                    ->where([['company_id','=',$comp],['status','=',1],['deleted','=',2]])
                    ->orderBy('company_id', 'desc')
                    ->first();

            $ipData = DB::table('general_info_mdls')->select('username','id')->where([['id','=',$data->user_id],['flag','=',2],['status','=',1]])->first();
            
          //  echo print_r($data);die();
            //$response['message'] = $data;    

            
            if ($ipData) 
            {
                Session::put('company_id',$comp); 
                Session::put('ip_id',$ipData->id); 
                Session::put('form_a',$data->id);

                $response['error'] = false;
                // $response['user'] = $ipData->id;
                $response['message'] =  $ipData->username;   
            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'IP not available.';
            }
            

        }
        catch (\Exception $e) 
        {
            $response['error'] = true;
            $response['message'] = 'Please refresh page and try again.';// $e->getMessage();;
        }
        echo json_encode($response);
    }

    function formApply(Request $req)
    {
        // if (Session::has('user_id')) 
        // {
            
         // Session::get('company_id')       

        ///dd($req->company_name);die();

        // if (Session::has('form_a')) 
        // {
           
                $user_id = Session::get('user_id'); 
                $cat = DB::table("user_mdls")->select('id','name','email','mobile')->where('id',$user_id)->first();
                $ars = DB::table("ar_mdls")->where('status',1)->orderBy('name')->pluck('name','id');   
                
                $jsl = bPath().'/'.Config::get('site.auth');
                return view('home.index', compact("jsl", "cat","ars"));        
           
        // }
        // else
        // {
        //     return redirect('/');
        // }

        
      //  }
        // else
        // {
        //     return redirect('/');
        // }
    }

    function registerForm(Request $req)
    {
        //dd($req->type);
       // if (Session::has('user_id')) {

            $user_type = $req->type;
            $ar = $req->ar ?? "";
            $view_data = $req->view ?? "";
            $edit_data = $req->edit ?? "";
            

           // echo $view_data; die();
        // if ($view_data != '' || $edit_data != '') {  
        // if (Session::has('admin_id')) 
        // {
        //     $uuid = isset($req->uuid) ? base64_decode($req->uuid) : '';    
        //     $check = DB::table("user_mdls")->select('id','name','email','unique_id','mobile','password','pwd')->where([['unique_id',$uuid],['status',1],['auth_check',1]])->latest()->first();
        //     Session::put('user_id',$check->id);

        //     $admin_id = Session::get('admin_id');
        // }
        // }


       
        $user_id = Session::get('user_id');
        
        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user_id)->first();   
        

        if($req->type=='')
        {
            return redirect('/');
        }
       
        elseif($req->type=='operational-creditor' && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {
          
                $fid = isset($req->reg) ? base64_decode($req->reg) : '';  
                $user = DB::table(Config::get('site.formBMdl'));
                  

                if ($req->fm=='reg') 
                {    

                 $user = $user->where([['operational_creditor_mdls.form_b_selected_id','=',$fid],['operational_creditor_mdls.submitted','=',1]])->orderBy('operational_creditor_mdls.id','desc')->first();                
                }
                elseif ($req->fm=='unreg') 
                { 

                $user = $user->where([['operational_creditor_mdls.id','=',$fid]])->orderBy('operational_creditor_mdls.id','desc')->first();             
                }
                else
                {
                    $user = $user->where([['operational_creditor_mdls.user_id','=',$user_id],['operational_creditor_mdls.submitted','=',2]])->orderBy('operational_creditor_mdls.id','desc')->first();                
    
                }
          
            
        //   dd($user);die();  
          
            // $jsl = bPath().'/'.Config::get('site.operationalCreditor');
            
          $jsl = bPath().'/'.Config::get('site.formHandling');

          //  dd($user);die();
            if ($user && isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_b_id' => $user->id//Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
                ];

                $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');

                $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first(); 
                $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();  
                $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();
                $edit = isset($req->edit) ? $req->edit : '';

                $notify = DB::table("form_modification_mdls")
                            ->select('id')
                            ->where([['user_id','=',$user_id],['form_id','=',$user->form_b_selected_id],['approval_status','=',1],['form_update_status','=',2],['form_type','=','Form-B Update Request']])->first();     

                $other_files = $this->getRecords('form_b_other_documents_mdls',$where);     
                
             //  dd($other_files);die();   
                return view('home.operational_creditor_form_b_edit', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data","notify","comp","edit"));    
              //  dd($other_files);
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_b_id' => $user->id
            ];
            if (Session::has('form_a')) 
            {
                $form_a = isset(Session::has('form_a')) ? Session::get('form_a') : $user->formA; //isset($user->formA) ? $user->formA : Session::get('form_a');
                $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first(); 
                $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();  
                $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();

            $other_files = $this->getRecords('form_b_other_documents_mdls',$where);     
                
            //echo print_r($formA);die();   

                return view('home.operational_creditor_form_b', compact("jsl","cat","irp","user","other_files","user_type","ar","comp"));    
            }
            else
            {
                return redirect('/');
                
            }
            }
            elseif ($user && isset($req->view)) 
            { 
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_b_id' => $user->id//Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
            ];
            $jsl = bPath().'/'.Config::get('site.operationalCreditorV');

                $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');
                $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first(); 
                $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();  
                $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();
                $view = isset($req->view) ? $req->view : '';
                $other_files = $this->getRecords('form_b_other_documents_mdls',$where);     
             
               // dd($form_a); die();

                return view('home.operational_creditor_form_b_view', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data","comp","view"));    
            }
            else
            {
                if (Session::has('form_a')) 
                {
                $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',Session::get('form_a'))->first();   
                $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first(); 
                $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();   

               // dd($cat); die();
                return view('home.operational_creditor_form_b', compact("jsl","cat","irp","user_type","ar","comp"));
                }
                else
                {
                    return redirect('/');
                }

                
            }
            
          //  dd($jsl);
        }
        elseif($req->type=='financial-creditor'  && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {  

                $fid = isset($req->reg) ? base64_decode($req->reg) : ''; 
            
            // echo $fid;die();

            $user = DB::table('finanicial_creditor_form_c_mdls');
             
                if ($req->fm=='reg') 
                {
                    $user = $user->where([['finanicial_creditor_form_c_mdls.form_c_selected_id','=',$fid],['finanicial_creditor_form_c_mdls.submitted','=',1]])->orderBy('finanicial_creditor_form_c_mdls.id','desc')->first();        
                }
                elseif ($req->fm=='unreg') 
                {
                    $user = $user->where([['finanicial_creditor_form_c_mdls.id','=',$fid]])->orderBy('finanicial_creditor_form_c_mdls.id','desc')->first();    
                }
                else
                {
                    $user = $user->where([['finanicial_creditor_form_c_mdls.user_id','=',$user_id],['finanicial_creditor_form_c_mdls.submitted','=',2]])->orderBy('finanicial_creditor_form_c_mdls.id','desc')->first();
                }
                

            // $jsl = bPath().'/'.Config::get('site.financialCreditorFormC');
            $jsl = bPath().'/'.Config::get('site.formHandling');                    
           
           // dd($user);die();
            if ($user && isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                // 'form_c_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $user->id//$user->id
                'form_c_id' => $user->id
            ];

            $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();
            $edit = isset($req->edit) ? $req->edit : '';

            $notify = DB::table("form_modification_mdls")
                            ->select('id')
                            ->where([['user_id','=',$user_id],['form_id','=',$user->form_c_selected_id],['approval_status','=',1],['form_update_status','=',2],['form_type','=','Form-C Update Request']])->first();


            $other_files = $this->getRecords('form_c_other_document_mdls',$where);  
            
           // dd($user);die();  

            return view('home.financial_creditor_form_c_edit', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data","notify","comp","edit"));
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
           
             $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_c_id' => $user->id
            ];   

            if (Session::has('form_a')) 
            {
            
            $form_a = isset(Session::has('form_a')) ? Session::get('form_a') : $user->formA; // isset(Session::has('form_a')) ? Session::get('form_a') : $user->formA; //isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();

            $other_files = $this->getRecords('form_c_other_document_mdls',$where);
           // dd($user); die();  
            return view('home.financial_creditor_form_c', compact("jsl","cat","irp","user","other_files","user_type","ar","comp"));
               }
               else{
                return redirect('/');
               } 

            }
            elseif ($user && isset($req->view)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_c_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
            ];
            


            $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();
            $view = isset($req->view) ? $req->view : '';

            $jsl = bPath().'/'.Config::get('site.financialCreditorFormCV');
            $other_files = $this->getRecords('form_c_other_document_mdls',$where);  

           // dd($user); die();  
            return view('home.financial_creditor_form_c_view', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data","comp","view"));
            }

            else
            {

                if (Session::has('form_a')) 
                {
                    $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',Session::get('form_a'))->first();   
                    $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first(); 
                    $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();   

                //dd($cat); die();    
                return view('home.financial_creditor_form_c', compact("jsl","cat","irp","user_type","ar","comp"));
            }
            else
            {
                return redirect('/');
            }
        }

        }
        elseif($req->type=='financial-creditor-in-a-class'  && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {

            $fid = isset($req->reg) ? base64_decode($req->reg) : ''; 
            
            $user = DB::table('financial_creditor_form_ca_mdls');
               

                if ($req->fm=='reg') 
                {
                    $user = $user->where([['financial_creditor_form_ca_mdls.form_ca_selected_id','=',$fid],['financial_creditor_form_ca_mdls.submitted','=',1]])->orderBy('financial_creditor_form_ca_mdls.id','desc')->first();        
                }
                elseif ($req->fm=='unreg') 
                {
                    $user = $user->where([['financial_creditor_form_ca_mdls.id','=',$fid]])->orderBy('financial_creditor_form_ca_mdls.id','desc')->first();    
                }    
                else
                {
                    $user = $user->where([['financial_creditor_form_ca_mdls.user_id','=',$user_id],['financial_creditor_form_ca_mdls.submitted','=',2]])->orderBy('financial_creditor_form_ca_mdls.id','desc')->first();
                }

            
            //$jsl = bPath().'/'.Config::get('site.financialCreditorFormCA');                    
            
              $jsl = bPath().'/'.Config::get('site.formHandling');  
           // dd($user);die();

            if ($user && isset($req->edit))  
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_ca_id' => $user->id
            ];

            $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();
            $edit = isset($req->edit) ? $req->edit : '';

            $notify = DB::table("form_modification_mdls")
                            ->select('id')
                            ->where([['user_id','=',$user_id],['form_id','=',$user->form_ca_selected_id],['approval_status','=',1],['form_update_status','=',2],['form_type','=','Form-CA Update Request']])->first();

            $user->ar = $req->ar ?? "";
            $other_files = $this->getRecords('form_ca_other_document_mdls',$where);  
            return view('home.financial_creditor_form_ca_edit', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data","notify","comp","edit"));
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_ca_id' => $user->id
            ];

            if (Session::has('form_a')) 
            {
                $form_a = isset(Session::has('form_a')) ? Session::get('form_a') : $user->formA; //isset($user->formA) ? $user->formA : Session::get('form_a');
                $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
                $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
                $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();

                $other_files = $this->getRecords('form_ca_other_document_mdls',$where);  
                
                return view('home.financial_creditor_form_ca', compact("jsl","cat","irp","user","other_files","user_type","ar","comp"));
            }
            else
            {
                return redirect('/');
            }
            
            }
            elseif ($user && isset($req->view)) 
            { 
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_ca_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
            ];

            $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();
            $view = isset($req->view) ? $req->view : '';

                $jsl = bPath().'/'.Config::get('site.financialCreditorFormCAV'); 
                $other_files = $this->getRecords('form_ca_other_document_mdls',$where);  
                return view('home.financial_creditor_form_ca_view', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data","comp","view"));
            }
            else
            {
            
                if (Session::has('form_a')) 
                {
                    $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',Session::get('form_a'))->first();   
                    $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first(); 
                    $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();   
                
                    return view('home.financial_creditor_form_ca', compact("jsl","cat","irp","user_type","ar", "comp"));
            }
            else
            {
                return redirect('/');
            }
            }
        }
        elseif($req->type=='workmen-and-employee'  && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {
      
            $fid = isset($req->reg) ? base64_decode($req->reg) : ''; 
            $user = DB::table('form_d_mdls');
             

                    if ($req->fm=='reg') 
                    {
                        $user = $user->where([['form_d_mdls.form_d_selected_id','=',$fid],['form_d_mdls.submitted','=',1]])->orderBy('form_d_mdls.id','desc')->first();        
                    }
                    elseif ($req->fm=='unreg') 
                    {
                        $user = $user->where([['form_d_mdls.id','=',$fid]])->orderBy('form_d_mdls.id','desc')->first();    
                    }  
                    else
                    {
                        $user = $user->where([['form_d_mdls.user_id','=',$user_id],['form_d_mdls.submitted','=',2]])->orderBy('form_d_mdls.id','desc')->first(); 
                    }

            
            //dd($user);die();
            //$jsl = bPath().'/'.Config::get('site.financialCreditorFormD');
           
            $jsl = bPath().'/'.Config::get('site.formHandling');

            if ($user && isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_d_id' => $user->id
            ];

            $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();
            $edit = isset($req->edit) ? $req->edit : '';

            $notify = DB::table("form_modification_mdls")
                            ->select('id')
                            ->where([['user_id','=',$user_id],['form_id','=',$user->form_d_selected_id],['approval_status','=',1],['form_update_status','=',2],['form_type','=','Form-D Update Request']])->first();

            $other_files = $this->getRecords('form_d_other_document_mdls',$where);  
       
            //dd($comp);die();
            return view('home.workmen_and_employee_form_d_edit', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data","notify","comp","edit"));
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_d_id' => $user_id//Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
            ];

            if (Session::has('form_a')) 
                {
            $form_a = isset(Session::has('form_a')) ? Session::get('form_a') : $user->formA;//isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();

            $other_files = $this->getRecords('form_d_other_document_mdls',$where);  
            return view('home.workmen_and_employee_form_d', compact("jsl","cat","irp","user","other_files","user_type","ar","comp"));
            }
            else
            {
                return redirect('/');
            }
            }
            elseif ($user && isset($req->view)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_d_id' => $user->id//Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
            ];

            $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();

            $other_files = $this->getRecords('form_d_other_document_mdls',$where);  
            $jsl = bPath().'/'.Config::get('site.financialCreditorFormDV');
            $view = isset($req->view) ? $req->view : '';


           // dd($view);die();
            return view('home.workmen_and_employee_form_d_view', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data","comp","view"));
            }

            else
            {
                if (Session::has('form_a')) 
                {
                  $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',Session::get('form_a'))->first();   
                    $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first(); 
                    $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();   

                return view('home.workmen_and_employee_form_d', compact("jsl","cat","irp","user_type","ar","comp"));
            }
            else
            {
                return redirect('/');
            }
           
        }
        }
        elseif($req->type=='authorised-representative-of-workmen-and-employee'  && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {
            
        if (isset($req->view) || isset($req->edit)) 
          {
            $fid = isset($req->reg) ? base64_decode($req->reg) : '';  
            //$user = DB::table('form_e_file_mdls')->where([['form_e_file_mdls.id','=',$fid],['form_e_file_mdls.submitted','=',1]])->orderBy('form_e_file_mdls.id','desc')->first();
            $user = DB::table('form_e_file_mdls');

            if ($req->fm=='reg') 
                    {
                        $user = $user->where([['form_e_file_mdls.form_e_selected_id','=',$fid],['form_e_file_mdls.submitted','=',1]])->latest()->first();        
                    }
                    elseif ($req->fm=='unreg') 
                    {
                        $user = $user->where([['form_e_file_mdls.id','=',$fid]])->orderBy('form_e_file_mdls.id','desc')->first();    
                    } 
           }
           else
           {

            $user = DB::table('form_e_file_mdls')->where([['form_e_file_mdls.user_id','=',$user_id],['form_e_file_mdls.submitted','=',2]])->orderBy('form_e_file_mdls.id','desc')->first();

           } 
           
           // $jsl = bPath().'/'.Config::get('site.financialCreditorFormE');                    
            
            $jsl = bPath().'/'.Config::get('site.formHandling'); 

          //  dd($user);die();
            if ($user && isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_e_id' =>  $user->id //Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
            ];

            $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();
            $edit = isset($req->edit) ? $req->edit : '';

            $notify = DB::table("form_modification_mdls")
                            ->select('id')
                            ->where([['user_id','=',$user_id],['form_id','=',$user->form_e_selected_id],['approval_status','=',1],['form_update_status','=',2],['form_type','=','Form-E Update Request']])->first();

            $other_files = $this->getRecords('form_e_other_document_mdls',$where); 
            $emps =  $this->getRecords('form_e_employee_detail_mdls',$where); 
            
            //echo print_r($other_files); die();
            return view('home.authorised_representative_of_workmen_and_employee_form_e_edit', compact("jsl","cat","irp","user","other_files","emps","edit_data","user_type","ar","notify","comp","edit"));
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_e_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
            ];
            if (Session::has('form_a')) 
                {
                $form_a = isset(Session::has('form_a')) ? Session::get('form_a') : $user->formA; //isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();

                $other_files = $this->getRecords('form_e_other_document_mdls',$where); 
                $emps =  $this->getRecords('form_e_employee_detail_mdls',$where);
            //dd($emps);
            return view('home.authorised_representative_of_workmen_and_employee_form_e', compact("jsl","cat","irp","user","user_type","ar","emps","other_files","comp"));
                }
                else
                {
                    return redirect('/');
                }
            }
            elseif ($user && isset($req->view)) 
            { 
                
                if ($req->fm=='unreg') 
                {
                    $where = [
                    'user_id' => $user_id,
                    'unique_id' => $user->unique_id,
                    'form_e_id' => $user->id
                    ];
                }
                else
                {
                    $where = [
                    'user_id' => $user_id,
                    'unique_id' => $user->unique_id,
                    'form_e_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
                    ];
                }
            
            $reg = $req->fm;    
            $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();
            $view = isset($req->view) ? $req->view : '';

            $jsl = bPath().'/'.Config::get('site.financialCreditorFormEV');
            $other_files = $this->getRecords('form_e_other_document_mdls',$where); 
            $emps =  $this->getRecords('form_e_employee_detail_mdls',$where); 
            
            //dd($view);die();
            return view('home.authorised_representative_of_workmen_and_employee_form_e_view', compact("jsl","cat","irp","user","other_files","emps","user_type","ar","edit_data","reg","comp","view")); 
            }
            else
            {
                if (Session::has('form_a')) 
                {

                    $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',Session::get('form_a'))->first();   
                    $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first(); 
                    $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first(); 

            // dd($cat);
                return view('home.authorised_representative_of_workmen_and_employee_form_e', compact("jsl","cat","irp","user","user_type","ar"));
                }
                else
                {
                    return redirect('/');
                }

            }
        }
        elseif($req->type=='other-creditor' && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {
        
            $fid = isset($req->reg) ? base64_decode($req->reg) : '';  
           
            $user = DB::table('other_creditor_form_f_mdls');
               

                    if ($req->fm=='reg') 
                    {
                        $user = $user->where([['other_creditor_form_f_mdls.form_f_selected_id','=',$fid],['other_creditor_form_f_mdls.submitted','=',1]])->orderBy('other_creditor_form_f_mdls.id','desc')->first();        
                    }
                    elseif ($req->fm=='unreg') 
                    {
                        $user = $user->where([['other_creditor_form_f_mdls.id','=',$fid]])->orderBy('other_creditor_form_f_mdls.id','desc')->first();    
                    }
                    else
                    {
                        $user = $user->where([['other_creditor_form_f_mdls.user_id','=',$user_id],['other_creditor_form_f_mdls.submitted','=',2]])->orderBy('other_creditor_form_f_mdls.id','desc')->first();
                    } 
         
            
          // dd($user);die(); 
           // $jsl = bPath().'/'.Config::get('site.financialCreditorFormF');                    
            $jsl = bPath().'/'.Config::get('site.formHandling');    

           // dd($user);die();
            if ($user && isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_f_id' => $user->id
            ];
            
            $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();
            $edit = isset($req->edit) ? $req->edit : '';

            $notify = DB::table("form_modification_mdls")
                            ->select('id')
                            ->where([['user_id','=',$user_id],['form_id','=',$user->form_f_selected_id],['approval_status','=',1],['form_update_status','=',2],['form_type','=','Form-F Update Request']])->first();

            $other_files = $this->getRecords('form_f_other_document_mdls',$where);  
            return view('home.other_creditor_form_f_edit', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data","notify","comp","edit"));
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id,
                'form_f_id' => $user->id // Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
            ];

            if (Session::has('form_a')) 
                {
            $form_a = isset(Session::has('form_a')) ? Session::get('form_a') : $user->formA; // isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();

            $other_files = $this->getRecords('form_f_other_document_mdls',$where);  
            return view('home.other_creditor_form_f', compact("jsl","cat","irp","user","other_files","user_type","ar","comp"));   
                }
                else
                {
                    return redirect('/');
                }

            }
            elseif ($user && isset($req->view)) 
            {

                if ($req->fm=='unreg') 
                {
                    $where = [
                    'user_id' => $user_id,
                    'unique_id' => $user->unique_id,
                    'form_f_id' => $user->id
                    ];
                }
                else
                {
                    $where = [
                    'user_id' => $user_id,
                    'unique_id' => $user->unique_id,
                    'form_f_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
                    ];
                }

            //     $where = [
            //     'user_id' => $user_id,
            //     'unique_id' => $user->unique_id,
            //     'form_f_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $user->id
            // ];

            $form_a = isset($user->formA) ? $user->formA : Session::get('form_a');
            $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',$form_a)->first();   
            $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
            $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();
            $view = isset($req->view) ? $req->view : '';

            $jsl = bPath().'/'.Config::get('site.financialCreditorFormFV'); 
            $other_files = $this->getRecords('form_f_other_document_mdls',$where);  
            
           // dd($other_files);die();
            return view('home.other_creditor_form_f_view', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data","comp","view"));   
            }
            else
            {

                if (Session::has('form_a')) 
                {


                 $formA = DB::table("form_a_mdls")->select('id','user_id','company_id')->where('id',Session::get('form_a'))->first();   
                $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first(); 
                $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where('id',$formA->user_id)->first();      

                return view('home.other_creditor_form_f', compact("jsl","cat","irp","user_type","ar"));
            }
            
            else
            {
                return redirect('/');
            }
        }
        
        // }
        // else
        // {
        //     return redirect('/');
        // }
    }


    

    function userSignUp(Request $req)
    {
        $response = array();
        $data = [
            'name' => $req->name ?? "",
            'email' => $req->email ?? "",
            'mobile' => $req->mobile ?? "",
            'alt_mobile'=>'',
            'address' => "",
            'city' => '',
            'state' => '',
            'correspondance_address' =>'',
            'pincode' => '',
            'unique_id' => $req->unique_id ?? "", 
            'password' => $req->password ?? "",
            'pwd' => isset($req->password) ? Hash::make($req->password) : "",
            'creditor_type' => "",
            'img'=>'',
            'auth_type' => 'both',
            'rem_addr' => $req->ip(),
            'date' => date('Y-m-d') ?? "",
            'status' => 2,
            'auth_id' => '',
            'auth_check' => '',
            'forgot_link'=>'',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => '',
            'deleted' => 2,
            'deleted_by' => '',
            'deleted_time' => ''
        ];

        $unique_id = $req->unique_id;

        $com = DB::table("general_info_mdls")->where([['user_type','=',1],['sub_user','=',""]])->first();
        $timestamp =  $_SERVER["REQUEST_TIME"];
             
            Session::put('signup_time', $timestamp);  
            $otp = rand(100000,999999);
            Session::put('signUp_otp',$otp);

         $subject = $com->company_name.' - OTP Notification';   

         $check = DB::table("user_mdls")->where('unique_id',$unique_id)->first();   
        if ($check) 
        {
            if ($check->unique_id == $unique_id && $check->auth_check != "") 
            {
                $response['error'] = true;
                $response['message'] = "Unique-Id already exists. Please try another.";  
                echo json_encode($response);
                die(); 
            }

            if ($check->auth_check != "" && $check->status == 1) 
            {
                $response['error'] = true;
                $response['message'] = "Email-Id/mobile number already exists. Please try another.";   
            }
            elseif ($check->auth_check != "" && $check->status == 2) 
            {
                $response['error'] = true;
                $response['message'] = "You are not authourized to login.";      
            }
            elseif ($check->auth_check == "" && $check->status != "") 
            {
                 DB::table('user_mdls')->where('unique_id', $unique_id)->update(['email' => $req->email, 'mobile' => $req->mobile, 'name' => $req->name, 'password' => $req->password, 'pwd' => Hash::make($req->password), 'date' => date('Y-m-d')]);

                $cat2 = DB::table("user_mdls")->where('unique_id',$unique_id)->latest()->first();
                
                $txt = "<p style='color:green;'>Hi ".$cat2->name.", Your OTP is ".$otp." for ".$com->company_name." registration second. This is valid for 10 minutes only.</p>";   
                $myfile = fopen(base_path('resources/views/mail/front/signUp.blade.php'), "w") or die("Unable to open file!");
                fwrite($myfile, $txt);
                fclose($myfile); 

                

                if ($cat2) 
                {
                    $sntData = ['user_id'=>$cat2->id, 'name'=>$cat2->name, 'desc'=>$txt, 'email'=>$cat2->email, 'otp'=>$otp, 'company_name'=>$com->company_name, 'mobile'=>$cat2->mobile, 'rem_addr'=>$req->ip(), 'url'=>url()->current(), 'subject'=>$subject, 'mail_type'=>'registration'];    

                    event(new fSignUpMail($sntData, $subject));
                    Session::put('unique_id',$cat2->unique_id);  
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

            $cat3 = DB::table("user_mdls")->where('auth_check','')->where('unique_id',$unique_id)->latest()->first();  

            $txt = "<p style='color:green;'>Hi ".$cat3->name.", Your OTP is ".$otp." for ".$com->company_name." registration. This is valid for 10 minutes only.</p>";   
             $myfile = fopen(base_path('resources/views/mail/front/signUp.blade.php'), "w") or die("Unable to open file!");
                fwrite($myfile, $txt);
                fclose($myfile);  

            $sntData = ['user_id'=>$cat3->id,'name'=>$cat3->name, 'desc'=>$txt, 'email'=>$cat3->email, 'otp'=>$otp, 'company_name'=>$com->company_name, 'mobile'=>$cat3->mobile, 'rem_addr'=>$req->ip(), 'url'=>url()->current(), 'subject'=>$subject, 'mail_type'=>'registration'];

            event(new fSignUpMail($sntData, $subject));
            Session::put('unique_id',$cat3->unique_id);
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


function signUpResend(Request $req)
{
    $response = array();

    $timestamp =  $_SERVER["REQUEST_TIME"];
    $signup_time = Session::has('signup_time') ? Session::get('signup_time') : '';
    $calculate = $timestamp - $signup_time;
    
    $time = (600 - $calculate)/60;

    $duration = (int)($time); 

    $actime = $duration > 1 ? 'around '.$duration.' minutes' : $time.' seconds';

    //echo $timestamp." ".$signup_time." ".$calculate; die();

    if($calculate > 600) // 60 seconds equals 1 minute
        {

    Session::put('signup_time', $timestamp);  
    $otp = Session::get('signUp_otp');
    // $otp = rand(100000,999999);
    // Session::put('signUp_otp',$otp);
    $unique_id = Session::get('unique_id');

    
    $com = DB::table("general_info_mdls")->where([['user_type','=',1],['sub_user','=',""]])->first();
    

    $cat = DB::table("user_mdls")->where('auth_check','')->where('unique_id',$unique_id)->latest()->first();  
     if ($cat) 
        {
            $subject = $com->company_name.' - OTP Notification';

            $txt = "<p style='color:green;'>Hi ".$cat->name.", Your OTP is ".$otp." for ".$com->company_name." registration. This is valid for 10 minutes only.</p>";   
             $myfile = fopen(base_path('resources/views/mail/front/signUp.blade.php'), "w") or die("Unable to open file!");
                fwrite($myfile, $txt);
                fclose($myfile);  

            $sntData = ['user_id'=>$cat->id,'name'=>$cat->name, 'desc'=>$txt, 'email'=>$cat->email, 'otp'=>$otp, 'company_name'=>$com->company_name, 'mobile'=>$cat->mobile, 'rem_addr'=>$req->ip(), 'url'=>url()->current(), 'subject'=>$subject, 'mail_type'=>'registration'];

            event(new fSignUpMail($sntData, $subject));
            Session::put('unique_id',$cat->unique_id);
            $response['error'] = false;
            $response['message'] = "Otp sent to your email and mobile.";
        }
        else
        {
            $response['error'] = true;
            $response['message'] = "Otp not sent. Try again later";
        }
    }
    else
    {
        $response['attempt'] = true; 
        $response['error'] = true;
        $response['message'] = "Please wait ".$actime; //"Otp already sent. Please wait.".$calculate.'-- '.$time.'--'.$duration ;
    }

    echo json_encode($response);

}

function signInResend(Request $req)
{
    $response = array();

    $timestamp =  $_SERVER["REQUEST_TIME"];
    Session::put('signup_time', $timestamp); 
    // $otp = rand(100000,999999);
    // Session::put('signUp_otp',$otp);

    $otp = Session::has('signUp_otp') ? Session::get('signUp_otp') : rand(100000,999999);    
    
    Session::put('signUp_otp',$otp);

    $unique_id = Session::get('unique_id');


    $auth = DB::table("authentication_mdls")->select('type','status')->orderBy('id','desc')->first();
    
    $com = DB::table("general_info_mdls")->where([['user_type','=',1],['sub_user','=',""]])->first();

    $cat = DB::table("user_mdls")->select('id','name','email','auth_type','unique_id','mobile','password','pwd')->where([['unique_id',$unique_id],['status',1],['auth_check',1]])->latest()->first();
    
    $txt = "<p style='color:green;'>Hi ".$cat->name.", Your OTP is ".$otp." for ".$com->company_name." login. This is valid for 10 minutes only.</p>";   
             $myfile = fopen(base_path('resources/views/mail/front/signUp.blade.php'), "w") or die("Unable to open file!");
                fwrite($myfile, $txt);
                fclose($myfile);  
            $subject = $com->company_name.' - OTP Notification';
                
            $data = array(
            'user_id' => $cat->id,
            'name'  =>  $cat->name,
            'desc'   => $txt,    
            'email' => $cat->email,
            'company_name' => $com->company_name,
            'mobile' => $cat->mobile,
            'rem_addr' => $req->ip(),
            'url' => url()->current(),
            'subject' => $subject,
            'otp'    => $otp
            );   
    if ($cat) 
    {

     if ($cat->auth_type=='sms') 
     {
                event(new fSignInFire($data, $subject));
                $response['error']=false;
                $response['login_success']=false;
                $response['message']="OTP sent to your mobile";
            }
            elseif ($cat->auth_type=='email') {

                event(new fSignInFire($data, $subject));
                $response['error']=false;
                $response['login_success']=false;
                $response['message']= "OTP sent to your email-id.";
            }
            elseif ($cat->auth_type=='both') 
            {
                event(new fSignInFire($data, $subject));
                $response['error']=false;
                $response['login_success']=false;
                $response['message']="OTP sent to your email-id and mobile number.";
            }
        else
        {
            $response['error'] = true;
            $response['message'] = "Otp not sent. Try again later";
        }
    }
    else
    {
        $response['error'] = true;
        $response['message'] = "Something went wrong. Try again later";    
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
        
      //  echo $timestamp." ".$signup_time." ".$calculate;         

       // echo $signUp_otp;
        //die();

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

            
            DB::table('user_mdls')->where('unique_id', $unique_id)->update(['status' => 1, 'auth_check' => 1, 'date' => date('Y-m-d')]);

            $cat = DB::table("user_mdls")->where('unique_id',$unique_id)->latest()->first();
            Session::put('user_id',$cat->id);

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


function userSignIn(Request $req)
{
    $response = array();
        $email = $req->email;
        $password = $req->password;

        $com = DB::table("general_info_mdls")->where([['user_type','=',1],['sub_user','=',""]])->first();
       // $auth = DB::table("authentication_mdls")->select('type','status')->orderBy('id','desc')->first();
        $check = DB::table("user_mdls")->select('id','name','email','auth_type','unique_id','mobile','password','pwd')->where([['unique_id',$email],['status',1],['auth_check',1]])->latest()->first();
        //echo gettype($check); die();
        
        $otp = rand(100000,999999); 

        if ($check) 
        {
            
        if (Hash::check($password, $check->pwd)) {

            $timestamp =  $_SERVER["REQUEST_TIME"];
            Session::put('signup_time', $timestamp); 
            Session::put('signUp_otp',$otp);  
            Session::put('unique_id',$check->unique_id);
            
              

             $txt = "<p style='color:green;'>Hi ".$check->name.", Your OTP is ".$otp." for ".$com->company_name." login. This is valid for 10 minutes only.</p>";   
             $myfile = fopen(base_path('resources/views/mail/front/signUp.blade.php'), "w") or die("Unable to open file!");
                fwrite($myfile, $txt);
                fclose($myfile);     

            $subject = $com->company_name.' - OTP Notification';
                
             $data = array(
            'user_id' => $check->id,
            'name'  =>  $check->name,
            'desc'   => $txt,    
            'email' => $check->email,
            'company_name' => $com->company_name,
            'mobile' => $check->mobile,
            'rem_addr' => $req->ip(),
            'url' => url()->current(),
            'subject' => $subject,
            'otp'    => $otp
            );   


            if ($check->auth_type=='sms') 
            {
                event(new fSignInFire($data, $subject));
                $response['error']=false;
                $response['login_success']=false;
                $response['message']="OTP sent to your mobile";
            }
            elseif ($check->auth_type=='email') 
            {

                event(new fSignInFire($data, $subject));
                $response['error']=false;
                $response['login_success']=false;
                $response['message']= "OTP sent to your email-id.";
            }
            elseif ($check->auth_type=='both') 
            {
                event(new fSignInFire($data, $subject));
                $response['error']=false;
                $response['login_success']=false;
                $response['message']="OTP sent to your email-id and mobile number.";
            }
            elseif ($check->auth_type=='none') 
            {
                Session::put('user_id',$check->id);
              
                $response['error']=false;
                $response['login_success']=true;
                $response['message']="Login successfull.";
            }
            else
            {
                $response['error']=true;
                $response['message']= "OTP not sent. Try again later.";   
            }
        
        }
        else
        {
            $response['error']=true;
            $response['message']= "Password is incorrect";
        }    
        }
        else
        {
            $response['error']=true;
            $response['message']= "Unique-Id is incorrect";
        }
        

        echo json_encode($response);
}


function forgotPassword(Request $req)
{
    $response = array();

    $unique_id = $req->unique_id;
    $check = DB::table("user_mdls")->select('id','name','email','status','auth_check','unique_id')->where('unique_id',$unique_id)->latest()->first();
    $com = DB::table("general_info_mdls")->select('company_name')->where([['user_type','=',1],['sub_user','=',""]])->first();

    if ($check) 
    {
    if ($check->auth_check == "" || $check->auth_check == 2) 
    {
        $response['error']=true;
        $response['message']= "Please sign up first.";
    }
    elseif ($check->status == 2) 
    {
        $response['error']=true;
        $response['message']= "You are not authourized to login.";
    }
    else
    {    
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $link = substr(str_shuffle($str), 16,20);

        DB::table("user_mdls")->where('id',$check->id)->update(['forgot_link'=>$link]);

        $timestamp =  $_SERVER["REQUEST_TIME"];
        Session::put('fp_start_time', $timestamp);
        Session::put('fp_user_id', $check->id);
        
        $url = url('/')."/change-password/".$link;

        $txt = "<p style='color:green;'>Hi ".ucwords($check->name).", You can change your password by clicking on this link <a href='".$url."' target='_blank'>".$com->company_name."</a>.</p>";   
             $myfile = fopen(base_path('resources/views/mail/front/signUp.blade.php'), "w") or die("Unable to open file!");
                fwrite($myfile, $txt);
                fclose($myfile);            

        $subject = $com->company_name.' - password change link';        

        $sntData = ['user_id'=>$check->id, 'name'=>$check->name, 'desc'=>$txt, 'email'=>$check->email, 'company_name'=>$com->company_name, 'rem_addr'=>$req->ip(), 'url'=>url()->current(), 'subject'=>$subject, 'mail_type'=>'forgot password'];    

        event(new fForgotPasswardFire($sntData, $subject));        

        $response['error']=false;
        $response['message']= "Link sent to your registered email.";
    }
    }
    else
    {
        $response['error']=true;
        $response['message']= "Unique-Id is incorrect.";
    }
 
    echo json_encode($response);
    
}

function changePassword(Request $req, $val)
{
    $jsl = bPath().'/'.Config::get('site.auth');
    $val = $val;
    $db = DB::table("user_mdls")->select('forgot_link')->where('forgot_link',$val)->first();
    if ($db) 
    {
    if ($val==$db->forgot_link) 
    {
        return view('home.changePassword', compact("jsl","val"));
    }
    else
    {
        return abort(404);
    }
    }
    else
    {
        return redirect('/');
    }
}

function userChangePassword(Request $req)
{
    $response = array();
        
        $fp_user_id = Session::get('fp_user_id'); 

        $password = $req->password;
        $unique_id =  $req->unique_id;

        $cat = DB::table('user_mdls')->select('id','password','pwd','status','auth_check','forgot_link')->where('id', $fp_user_id)->first();

        $timestamp =  $_SERVER["REQUEST_TIME"];    
        $signup_time = Session::get('fp_start_time');  
        $calculate = $timestamp - $signup_time;     
        

        if ($unique_id != $cat->forgot_link) 
        {
            $response['error'] = true;
            $response['refresh'] = true;
            $response['message'] = "This link is not active now.";
            echo json_encode($response);
            die();
        }
        if ($cat) 
        {
            if ($cat->status != 1) 
            {
                $response['error'] = true;
                $response['message'] = "You are not authourized user.";       
            }
            elseif ($cat->auth_check != 1) 
            {
                $response['error'] = true;
                $response['message'] = "You are not registered user.";
            }
            elseif (Hash::check($password, $cat->pwd)) 
            {
                $response['error'] = true;
                $response['message'] = "This is old password. Please enter new.";
            }
            else
            {   

            DB::table('user_mdls')->where('id', $cat->id)->update(['password' => $password, 'pwd' => Hash::make($req->password), 'forgot_link'=>'']);
            $response['error'] = false;
            $response['refresh'] = true;
            $response['message'] = "Password changed successfully. Please login.";   
            Session::forget('forgot_link');
            Session::forget('fp_user_id');

            }
        }
        else
        {
            $response['error'] = true;
            $response['message'] = "User does not exist.";
        }

        echo json_encode($response);
}


function logOut(Request $req)
{
    Session::forget('company_id');
    Session::forget('ip_id');
    Session::forget('user_id');
    Session::forget('form_a');
    
      //Session::flush(); 
      return redirect('/');
}



}
