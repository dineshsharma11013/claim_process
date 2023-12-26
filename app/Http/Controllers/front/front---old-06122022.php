<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Events\fSignInFire;
use App\Events\fSignUpMail;
use App\Events\fForgotPasswardFire;
use App\Services\UserRegistration;
use App\Models\operationalCreditorMdl;
use Illuminate\Support\Facades\Hash;
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
        $user_id = Session::get('user_id'); 
        $cat = DB::table("user_mdls")->select('id','name','email','mobile')->where('id',$user_id)->first();
        $ars = DB::table("ar_mdls")->where('status',1)->orderBy('name')->pluck('name','id');   
        
        $jsl = bPath().'/'.Config::get('site.auth');
        return view('home.index', compact("jsl", "cat","ars"));
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
        if ($view_data != '' || $edit_data != '') {  
        if (Session::has('admin_id')) 
        {
            $uuid = isset($req->uuid) ? base64_decode($req->uuid) : '';    
            $check = DB::table("user_mdls")->select('id','name','email','unique_id','mobile','password','pwd')->where([['unique_id',$uuid],['status',1],['auth_check',1]])->latest()->first();
            Session::put('user_id',$check->id);

            $admin_id = Session::get('admin_id');
        }
        }
       
        $user_id = Session::get('user_id');
        
        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user_id)->first();   
        $irp = DB::table("general_info_mdls")->select('id','username','email','mobile','address')->where([['user_type',2],['status',1]])->latest()->first();   


        if($req->type=='')
        {
            return redirect('/');
        }
       
        elseif($req->type=='operational-creditor' && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {
          
          if (isset($req->view) || isset($req->edit)) 
          {
                $fid = isset($req->reg) ? base64_decode($req->reg) : '';  
                $user = DB::table(Config::get('site.formBMdl'))
                    ->leftJoin('form_b_files_mdls', 'form_b_files_mdls.unique_id','=', 'operational_creditor_mdls.unique_id')
                    ->select('operational_creditor_mdls.*','form_b_files_mdls.work_purchase_order','form_b_files_mdls.invoices','form_b_files_mdls.balance_confirmation','form_b_files_mdls.any_correspondence','form_b_files_mdls.authorisation_letter','form_b_files_mdls.bank_statement','form_b_files_mdls.ledger_copy','form_b_files_mdls.computation_sheet','form_b_files_mdls.work_purchase_order_file','form_b_files_mdls.invoices_file','form_b_files_mdls.balance_confirmation_file','form_b_files_mdls.any_correspondence_file','form_b_files_mdls.authorisation_letter_file','form_b_files_mdls.bank_statement_file','form_b_files_mdls.ledger_copy_file','form_b_files_mdls.computation_sheet_file');


                $user = $user->where([['operational_creditor_mdls.id','=',$fid],['operational_creditor_mdls.submitted','=',1]])->orderBy('operational_creditor_mdls.id','desc')->first();             
          }
          else
          {
            $user = DB::table(Config::get('site.formBMdl'))
                    ->leftJoin('form_b_files_mdls', 'form_b_files_mdls.unique_id','=', 'operational_creditor_mdls.unique_id')
                    ->select('operational_creditor_mdls.*','form_b_files_mdls.work_purchase_order','form_b_files_mdls.invoices','form_b_files_mdls.balance_confirmation','form_b_files_mdls.any_correspondence','form_b_files_mdls.authorisation_letter','form_b_files_mdls.bank_statement','form_b_files_mdls.ledger_copy','form_b_files_mdls.computation_sheet','form_b_files_mdls.work_purchase_order_file','form_b_files_mdls.invoices_file','form_b_files_mdls.balance_confirmation_file','form_b_files_mdls.any_correspondence_file','form_b_files_mdls.authorisation_letter_file','form_b_files_mdls.bank_statement_file','form_b_files_mdls.ledger_copy_file','form_b_files_mdls.computation_sheet_file');



            $user = $user->where([['operational_creditor_mdls.user_id','=',$user_id],['operational_creditor_mdls.submitted','=',2]])->orderBy('operational_creditor_mdls.id','desc')->first();                
    
          }
            
         // dd($user);die();  

            $jsl = bPath().'/'.Config::get('site.operationalCreditor');
            
           // dd(print_r($user->id));die();
            if ($user && isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];

            $other_files = $this->getRecords('form_b_other_documents_mdls',$where);     
                return view('home.operational_creditor_form_b_edit', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data"));    
              //  dd($other_files);
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];

            $other_files = $this->getRecords('form_b_other_documents_mdls',$where);     
                return view('home.operational_creditor_form_b', compact("jsl","cat","irp","user","other_files","user_type","ar"));    
              //  dd($other_files);
            }
            elseif ($user && isset($req->view)) 
            { 
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            $jsl = bPath().'/'.Config::get('site.operationalCreditorV');

                $other_files = $this->getRecords('form_b_other_documents_mdls',$where);     
                return view('home.operational_creditor_form_b_view', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data"));    
            }
            else
            {
                return view('home.operational_creditor_form_b', compact("jsl","cat","irp","user_type","ar"));
            }
            
          //  dd($jsl);
        }
        elseif($req->type=='financial-creditor'  && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {  

        if (isset($req->view) || isset($req->edit)) 
          {
            $fid = isset($req->reg) ? base64_decode($req->reg) : ''; 
            $user = DB::table('finanicial_creditor_form_c_mdls')
                    ->leftJoin('form_c_files_mdls', 'form_c_files_mdls.unique_id','=', 'finanicial_creditor_form_c_mdls.unique_id');

            $user = $user->where([['finanicial_creditor_form_c_mdls.id','=',$fid]])->first();
            }
            else
            {
                $user = DB::table('finanicial_creditor_form_c_mdls')
                    ->leftJoin('form_c_files_mdls', 'form_c_files_mdls.unique_id','=', 'finanicial_creditor_form_c_mdls.unique_id');

            $user = $user->where([['finanicial_creditor_form_c_mdls.user_id','=',$user_id],['finanicial_creditor_form_c_mdls.submitted','=',2]])->first();   
            }

            $jsl = bPath().'/'.Config::get('site.financialCreditorFormC');                    
           
            //dd($user->operational_creditor_signature);die();
            if ($user && isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            $other_files = $this->getRecords('form_c_other_document_mdls',$where);  
            return view('home.financial_creditor_form_c_edit', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data"));
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            $other_files = $this->getRecords('form_c_other_document_mdls',$where);  
            return view('home.financial_creditor_form_c', compact("jsl","cat","irp","user","other_files","user_type","ar"));
            }
            elseif ($user && isset($req->view)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            $other_files = $this->getRecords('form_c_other_document_mdls',$where);  
            $jsl = bPath().'/'.Config::get('site.financialCreditorFormCV');

            return view('home.financial_creditor_form_c_view', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data"));
            }

            else
            {

            return view('home.financial_creditor_form_c', compact("jsl","cat","irp","user_type","ar"));
            }

        }
        elseif($req->type=='financial-creditor-in-a-class'  && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {

        if (isset($req->view) || isset($req->edit)) 
          {
            $fid = isset($req->reg) ? base64_decode($req->reg) : '';  
            $user = DB::table('financial_creditor_form_ca_mdls')
                    ->leftJoin('form_ca_files_mdls', 'form_ca_files_mdls.unique_id','=', 'financial_creditor_form_ca_mdls.unique_id');

            $user = $user->where([['financial_creditor_form_ca_mdls.id','=',$fid]])->first();
          }
          else
          {
            $user = DB::table('financial_creditor_form_ca_mdls')
                    ->leftJoin('form_ca_files_mdls', 'form_ca_files_mdls.unique_id','=', 'financial_creditor_form_ca_mdls.unique_id');

            $user = $user->where([['financial_creditor_form_ca_mdls.user_id','=',$user_id],['financial_creditor_form_ca_mdls.submitted','=',2]])->first();
          }

            
            
            $jsl = bPath().'/'.Config::get('site.financialCreditorFormCA');                    
            
           // dd($user);die();

            if ($user && isset($req->edit))  
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            $user->ar = $req->ar ?? "";
            $other_files = $this->getRecords('form_ca_other_document_mdls',$where);  
            return view('home.financial_creditor_form_ca_edit', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data"));
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            $other_files = $this->getRecords('form_ca_other_document_mdls',$where);  
            return view('home.financial_creditor_form_ca', compact("jsl","cat","irp","user","other_files","user_type","ar"));
            }
            elseif ($user && isset($req->view)) 
            { 
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
                $jsl = bPath().'/'.Config::get('site.financialCreditorFormCAV'); 
                $other_files = $this->getRecords('form_ca_other_document_mdls',$where);  
                return view('home.financial_creditor_form_ca_view', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data"));
            }
            else
            {
            
            return view('home.financial_creditor_form_ca', compact("jsl","cat","irp","user_type","ar"));
            }
        }
        elseif($req->type=='workmen-and-employee'  && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {
        if (isset($req->view) || isset($req->edit)) 
          {
            $fid = isset($req->reg) ? base64_decode($req->reg) : ''; 
            $user = DB::table('form_d_mdls')
                    ->leftJoin('form_d_files_mdls', 'form_d_files_mdls.unique_id','=', 'form_d_mdls.unique_id');

            $user = $user->where([['form_d_mdls.id','=',$fid]])->first();
            }
            else
            {
                $user = DB::table('form_d_mdls')
                    ->leftJoin('form_d_files_mdls', 'form_d_files_mdls.unique_id','=', 'form_d_mdls.unique_id');

            $user = $user->where([['form_d_mdls.user_id','=',$user_id],['form_d_mdls.submitted','=',2]])->first();   
            }
            
            $jsl = bPath().'/'.Config::get('site.financialCreditorFormD');
           
            if ($user && isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            $other_files = $this->getRecords('form_d_other_document_mdls',$where);  
            return view('home.workmen_and_employee_form_d_edit', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data"));
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            $other_files = $this->getRecords('form_d_other_document_mdls',$where);  
            return view('home.workmen_and_employee_form_d', compact("jsl","cat","irp","user","other_files","user_type","ar"));
            }
            elseif ($user && isset($req->view)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            $other_files = $this->getRecords('form_d_other_document_mdls',$where);  
            $jsl = bPath().'/'.Config::get('site.financialCreditorFormDV');

            return view('home.workmen_and_employee_form_d_view', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data"));
            }

            else
            {

            return view('home.workmen_and_employee_form_d', compact("jsl","cat","irp","user_type","ar"));
            }
           
           
        }
        
        elseif($req->type=='authorised-representative-of-workmen-and-employee'  && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {
            
        if (isset($req->view) || isset($req->edit)) 
          {
            $fid = isset($req->reg) ? base64_decode($req->reg) : '';  
            $user = DB::table('form_e_file_mdls')->where([['form_e_file_mdls.id','=',$fid]])->first();
           }
           else
           {
            $user = DB::table('form_e_file_mdls')->where([['form_e_file_mdls.user_id','=',$user_id],['form_e_file_mdls.submitted','=',2]])->first();
           } 
           
            $jsl = bPath().'/'.Config::get('site.financialCreditorFormE');                    
            
           // dd($user);die();
            if ($user && isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];

            $other_files = $this->getRecords('form_e_other_document_mdls',$where); 
            $emps =  $this->getRecords('form_e_employee_detail_mdls',$where); 
            return view('home.authorised_representative_of_workmen_and_employee_form_e_edit', compact("jsl","cat","irp","user","other_files","emps","edit_data","user_type","ar",));
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
                $other_files = $this->getRecords('form_e_other_document_mdls',$where); 
                $emps =  $this->getRecords('form_e_employee_detail_mdls',$where);
           // dd($user);
            return view('home.authorised_representative_of_workmen_and_employee_form_e', compact("jsl","cat","irp","user","user_type","ar","emps","other_files"));
            }
            elseif ($user && isset($req->view)) 
            { 
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            $jsl = bPath().'/'.Config::get('site.financialCreditorFormEV');
            $other_files = $this->getRecords('form_e_other_document_mdls',$where); 
            $emps =  $this->getRecords('form_e_employee_detail_mdls',$where); 
            return view('home.authorised_representative_of_workmen_and_employee_form_e_view', compact("jsl","cat","irp","user","other_files","emps","user_type","ar","edit_data")); 
            }
            else
            {
           // dd($user);
            return view('home.authorised_representative_of_workmen_and_employee_form_e', compact("jsl","cat","irp","user","user_type","ar",));
            }
        }
        elseif($req->type=='other-creditor' && $req->name == $cat->name && $req->email == $cat->email && $req->mobile == $cat->mobile)
        {
            
            if (isset($req->view) || isset($req->edit)) 
          {
            $fid = isset($req->reg) ? base64_decode($req->reg) : '';  
           
            $user = DB::table('other_creditor_form_f_mdls')
                    ->leftJoin('form_f_files_mdls', 'form_f_files_mdls.unique_id','=', 'other_creditor_form_f_mdls.unique_id');

            $user = $user->where([['other_creditor_form_f_mdls.id','=',$fid]])->first();
          }
          else
          {
            $user = DB::table('other_creditor_form_f_mdls')
                    ->leftJoin('form_f_files_mdls', 'form_f_files_mdls.unique_id','=', 'other_creditor_form_f_mdls.unique_id');

            $user = $user->where([['other_creditor_form_f_mdls.user_id','=',$user_id],['other_creditor_form_f_mdls.submitted','=',2]])->first();
          }
            
           
            $jsl = bPath().'/'.Config::get('site.financialCreditorFormF');                    
            
           // dd($user);die();
            if ($user && isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            
            $other_files = $this->getRecords('form_f_other_document_mdls',$where);  
            return view('home.other_creditor_form_f_edit', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data"));
            }
            elseif ($user && !isset($req->view) && !isset($req->edit)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
           
            $other_files = $this->getRecords('form_f_other_document_mdls',$where);  
            return view('home.other_creditor_form_f', compact("jsl","cat","irp","user","other_files","user_type","ar"));   
            }
            elseif ($user && isset($req->view)) 
            {
                $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            $jsl = bPath().'/'.Config::get('site.financialCreditorFormFV'); 
            $other_files = $this->getRecords('form_f_other_document_mdls',$where);  
            return view('home.other_creditor_form_f_view', compact("jsl","cat","irp","user","other_files","user_type","ar","edit_data"));   
            }
            else
            {
            return view('home.other_creditor_form_f', compact("jsl","cat","irp","user_type","ar"));
            }
            
          
        }
        else
        {
            return abort(404);
        }
        // }
        // else
        // {
        //     return redirect('/');
        // }
    }


    function formBregistration(Request $req)
    {
        $response = array();
        $user_id = Session::get('user_id'); 
        
        if ($req->fid!='') 
        {
            $where = [
            'id'=>$req->fid
        ];
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }
        
        $unique_id = uniqid().time();
        $check =  $this->getFirstRow(Config::get('site.formBMdl'),$where); 
        if ($check) 
        {
            $Bunique_id = $check->unique_id;
        }
        else
        {
            $Bunique_id = $unique_id; 
        }


        $sign = $this->uploadFile($req, $unique_id, Config::get('site.formBMdl'), $where, '/access/media/forms/formB/documents', 'operational_creditor_signature', 'sign');
        //echo $ch; die();

        $data = [
            'user_id' => '',
            'company' => '',
            'irp'  => '',
            'formA' => '',
            'user_id' => $user_id,
            'form_type'=>$req->form_type ?? "",
            'ar'=> $req->ar ?? "",
            'operational_creditor_name' => $req->operational_creditor_name ?? "",
            'operational_creditor_address' => $req->operational_creditor_address ?? "",
            'identification_number' => $req->identification_number ?? "",
            'operational_creditor_correspondence_address' => $req->operational_creditor_correspondence_address ?? "",
            'operational_creditor_email' => $req->operational_creditor_email ?? "",
            'total_amount' => $req->total_amount ?? "",
            'principle_amount' => $req->principle_amount ?? "",
            'interest' => $req->interest ?? "",
            'document_details' => $req->document_details ?? "",
            'any_dispute_deatails' => $req->any_dispute_deatails ?? "",
            'debt_incurred_details' => $req->debt_incurred_details ?? "",
            'any_mutual_details' => $req->any_mutual_details ?? "",
            'any_security_details' => $req->any_security_details ?? "",
            'account_number' => $req->account_number ?? "",
            'bank_name' => $req->bank_name ?? "",
            'ifsc_code' => $req->ifsc_code ?? "",
            'document_attached_list' => "",
            'operational_creditor_signature' => $sign ? $sign : $req->operational_creditor_signature_val ?? '' ,
            'creditor_relation' => $req->creditor_relation ?? "",
            'signing_person_address' => $req->signing_person_address ?? "",
            
            'unique_id' => $Bunique_id,
            
            'year' => '',
            'dat' => Session::has('admin_id') ? date("Y-m-d") : '',
            'admin_id'=> Session::has('admin_id') ? Session::get('admin_id') : '',
            'updated_date'=> Session::has('admin_id') ? \Carbon\Carbon::now() : '',
            'submitted' => isset($check->submitted) && $check->submitted != '' ? $check->submitted : 2,
            'mailed' => 2,
            'dat_update_user' => isset($check->dat_update_user) ? $check->dat_update_user : \Carbon\Carbon::now(),
            'date' => isset($check->date) ? $check->date : date("Y-m-d"), //date("Y-m-d"),
            'rem_addr'=> $req->ip(),
            'created_at' => \Carbon\Carbon::now(),	
            'updated_at' => \Carbon\Carbon::now() 
        ];
         
        $data2 = [
            'company' => '',
            'irp' => '',
            'formA'  => '',
            'user_id' => $user_id,
            'work_purchase_order' => '',
            'invoices' => '',
            'balance_confirmation' => '',
            'any_correspondence' => '',
            'authorisation_letter' => '',
            'bank_statement' => '',
            'ledger_copy' => '',
            'computation_sheet' => '',
            'work_purchase_order_file' => '',
            'invoices_file' => '',
            'balance_confirmation_file' => '',
            'any_correspondence_file' => '',
            'authorisation_letter_file' => '',
            'bank_statement_file' => '',
            'ledger_copy_file' => '',
            'computation_sheet_file' => '',
            'pan_number_file' => '',
            'passport_file' => '',
            'aadhar_card' => '',
            'unique_id' => $Bunique_id,
            'rem_addr'=> $req->ip(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now() 
        ];



        try
        {
            if ($check) 
            {
                 $condition = [
                    'id'=>$check->id
                ];
               

              if ($check->submitted==1) {
                   $this->insertData(Config::get('site.formBMdl'),$data);
                
                }  
                else
                {
                    $this->updateData(Config::get('site.formBMdl'), $data, $condition);       
                }

                $response['error'] = false;
                $response['message'] = "Data saved successfully."; 
            }
            else
            {
                $data3 = [
                    'user_id' => $user_id
                ];

                $this->insertData(Config::get('site.formBMdl'),$data);
                $res = $this->getFirstRow(Config::get('site.formBMdl'), $data3);   

                $data4 = [
                    'form_b_id' => $res->id
                ];
                $finalArray = array_merge($data2, $data4);
                $this->insertData(Config::get('site.formBFile'),$finalArray);  
              
                $response['error'] = false;
                $response['message'] = "Data saved successfully.";
            }
        }
        catch (Exception $e)
        {
            $response['error'] = true;
            $response['message'] = $e->getMessage(); //"Something went wrong. Please refresh page and try again.";
        }
        
        echo json_encode($response);
    }

    function formBregistrationSave(Request $req)
    {
        $response = array();
        $user_id = Session::get('user_id'); 
        if ($req->fid!='') 
        {
            $where = [
            'id'=>$req->fid
        ];
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }

        
        
        $check =  $this->getFirstRow(Config::get('site.formBMdl'),$where); 
        
        $unique_id = uniqid().time(); 

        $where2 = [
            'user_id'=>$check->user_id,
            'unique_id'=>$check->unique_id
        ];

        $check2 = $this->getFirstRow(Config::get('site.formBFile'),$where2); 


        $work_order_file = $this->uploadFile($req, $unique_id, Config::get('site.formBFile'), $where2, '/access/media/forms/formB/documents', 'work_purchase_order_file', 'work');
        $invoice_file = $this->uploadFile($req, $unique_id, Config::get('site.formBFile'), $where2, '/access/media/forms/formB/documents', 'invoices_file', 'invoice');
        $balance_file = $this->uploadFile($req, $unique_id, Config::get('site.formBFile'), $where2, '/access/media/forms/formB/documents', 'balance_confirmation_file', 'balance');
        $correspondence_file = $this->uploadFile($req, $unique_id, Config::get('site.formBFile'), $where2, '/access/media/forms/formB/documents', 'any_correspondence_file', 'corres');
        $authorisation_file = $this->uploadFile($req, $unique_id, Config::get('site.formBFile'), $where2, '/access/media/forms/formB/documents', 'authorisation_letter_file', 'auth');
        $bank_stt_file = $this->uploadFile($req, $unique_id, Config::get('site.formBFile'), $where2, '/access/media/forms/formB/documents', 'bank_statement_file', 'stt');
        $ledger_file = $this->uploadFile($req, $unique_id, Config::get('site.formBFile'), $where2, '/access/media/forms/formB/documents', 'ledger_copy_file', 'ledger');
        $computation_file = $this->uploadFile($req, $unique_id, Config::get('site.formBFile'), $where2, '/access/media/forms/formB/documents', 'computation_sheet_file', 'computation');

        $pan_file = $this->uploadFile($req, $unique_id, Config::get('site.formBFile'), $where2, '/access/media/forms/formB/documents', 'pan_number_file', 'pan');
        $passport_file = $this->uploadFile($req, $unique_id, Config::get('site.formBFile'), $where2, '/access/media/forms/formB/documents', 'passport_file', 'passport');
        $aadhar_file = $this->uploadFile($req, $unique_id, Config::get('site.formBFile'), $where2, '/access/media/forms/formB/documents', 'aadhar_card', 'aadhar');



        $oth_dc = $req->other_doc;     
        $other_doc_id = $req->other_doc_id ?? "";      
        $newRow = array();
        $oldRow = array();
        $oth_dc_New = array();

        if ($other_doc_id) 
        {
        foreach ($other_doc_id as $val) 
        {
            if ($val != '') 
            {
                $oldRow[]=$val;

            }
            elseif($val == '')
            {
                $newRow[]=$val;
                 
            }
        }
        }
        if (count($newRow)>0) 
        {
            $oth_dc_New = array_slice($oth_dc, count($oldRow)); 
        }
           
        //echo count($oth_dc_New); die();
           /// echo print_r($newRow); die();
      //   echo print_r($req->other_doc_file); die();
       
             

       $cats = DB::table(Config::get('site.formBOtherDoc'))->select('id')->where('unique_id', $check->unique_id)->first(); 
            if ($cats)    
                    {  
                       if (count($oldRow)>0) 
                          {
                                                
                            for ($k=0; $k < count($oldRow); $k++) 
                            {   
                                        $data5 = [
                                        'document_name' => $oth_dc[$k] ?? "",
                                        'rem_addr' => $req->ip(),
                                        'updated_at' => \Carbon\Carbon::now()
                                        ]; 
                                        DB::table(Config::get('site.formBOtherDoc'))->where('id', $oldRow[$k])->update($data5);

                                }
                                } 

                        if(count($oth_dc_New)>0)
                                {         

                                    if($req->hasfile('other_doc_file'))
                                                 {
                                                    $dir = publicP()."/access/media/forms/formB/documents/".$check->unique_id;
                                                  
                                                    foreach($req->file('other_doc_file') as $image)
                                                    {
                                                        $id=uniqid().time();
                                                        $name=$id.'.'.$image->getClientOriginalExtension();
                                                        $image->move($dir, $name);  
                                                        $oth_doc_fl6[] = $name;
                                                    }
                                                }  
                                  for ($j=0; $j < count($oth_dc_New); $j++) 
                                  {
                                    if ($oth_dc_New[$j]!='') 
                                    {
                                    
                                  $data6 = [
                                            'user_id'=> $user_id,
                                            'form_b_id'=>$check->id,
                                            'document_name' => $oth_dc_New[$j] ?? '',
                                            'file' =>$oth_doc_fl6[$j] ?? "",
                                            'unique_id' => $check->unique_id,
                                            'rem_addr' => $req->ip(),
                                            'created_at' => \Carbon\Carbon::now(),
                                            'updated_at' => \Carbon\Carbon::now()
                                            ];
                                          

                                       // echo print_r($data6); die();
                                         if (!empty($oth_dc_New[$j])) 
                                         {
                                               DB::table(Config::get('site.formBOtherDoc'))->insert($data6);
                                            }   
                                           
                                    }             
                                   }         
                               
                                }        



                   } 
                   else
                   {
                        if($req->hasfile('other_doc_file'))
                             {
                                $dir = publicP()."/access/media/forms/formB/documents/".$check->unique_id;
                              
                                foreach($req->file('other_doc_file') as $image)
                                {
                                    $id=uniqid().time();
                                    $name=$id.'.'.$image->getClientOriginalExtension();
                                    $image->move($dir, $name);  
                                    $oth_doc_fl[] = $name;
                                }
                            }

                        if ($oth_dc) 
                        {
                               
                        for ($i=0; $i < count($oth_dc); $i++) 
                            {
                            if ($oth_dc[$i]!="") 
                            {    

                        $data3 = [
                            'user_id'=> $user_id,
                            'form_b_id'=>$check->id,
                            'document_name' => $oth_dc[$i] ?? '',
                            'file' =>$oth_doc_fl[$i] ?? "",
                            'unique_id' => $check->unique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now()
                            ];

                        if (!empty($oth_doc_fl[$i])) 
                        {
                            $this->insertData(Config::get('site.formBOtherDoc'),$data3); 
                            }    
                        
                    } 
                    }
                }
                   }
     
        
          

 
    

        $data2 = [
            'company' => isset($check->company) ? $check->company : '',
            'irp' => isset($check->irp) ? $check->irp : '',
            'formA'  => isset($check->formA) ? $check->formA : '',
            'form_b_id' => $check->id,
            'user_id' => $user_id,
            'work_purchase_order' => (!empty($work_order_file)) ? $req->work_purchase_order ?? '' : '',
            'invoices' => (!empty($invoice_file)) ? $req->invoices ?? '' : '',
            'balance_confirmation' => (!empty($balance_file)) ? $req->balance_confirmation ?? '' : '',
            'any_correspondence' => (!empty($correspondence_file)) ? $req->any_correspondence ?? '' : '',
            'authorisation_letter' => (!empty($authorisation_file)) ? $req->authorisation_letter ?? '' : '',
            'bank_statement' => (!empty($bank_stt_file)) ? $req->bank_statement ?? '' : '',
            'ledger_copy' => (!empty($ledger_file)) ? $req->ledger_copy ?? '' : '',
            'computation_sheet' => (!empty($computation_file)) ? $req->computation_sheet ?? '' : '',
            'work_purchase_order_file' => $work_order_file,
            'invoices_file' => $invoice_file,
            'balance_confirmation_file' => $balance_file,
            'any_correspondence_file' => $correspondence_file,
            'authorisation_letter_file' => $authorisation_file,
            'bank_statement_file' => $bank_stt_file,
            'ledger_copy_file' => $ledger_file,
            'computation_sheet_file' => $computation_file,
            'pan_number_file' => $pan_file ?? '',
            'passport_file' => $passport_file ?? '',
            'aadhar_card' => $aadhar_file ?? '',
          
            'unique_id' => $check->unique_id,
            'rem_addr'=> $req->ip(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now() 
        ];

        try
        {
            if ($check2) 
            {
               $condition = [
                'user_id'=>$check->user_id,
                'unique_id'=>$check->unique_id
                ]; 

                $files = [
                    'work_purchase_order'=>'work_purchase_order_file',
                    'invoices' => 'invoices_file',
                    'balance_confirmation' => 'balance_confirmation_file',
                    'any_correspondence' => 'any_correspondence_file',
                    'authorisation_letter' => 'authorisation_letter_file',
                    'bank_statement' => 'bank_statement_file',
                    'ledger_copy' => 'ledger_copy_file',
                    'computation_sheet' => 'computation_sheet_file',

                ];
                $dir = publicP()."/access/media/forms/formB/documents/".$check->unique_id;

                $this->updateData(Config::get('site.formBFile'), $data2, $condition);   
                $cate = $this->formBFilesHandle(Config::get('site.formBFile'), $condition, $files, $dir);
               // echo $cate; die();

                $response['error'] = false;
                $response['cls'] = 'success';
                $response['message'] = "Form submitted successfully.";
            }
            else
            {
                $this->insertData(Config::get('site.formBFile'),$data2);
               
                
                $response['error'] = false;
                $response['cls'] = 'success';
                $response['message'] = "Form submitted successfully.";
            }
            
        }
        catch (Exception $e)
        {
            $response['error'] = true;
            $response['cls'] = 'danger';
            $response['message'] = "Something went wrong. Please refresh page and try again.";//$e->getMessage(); //"Something went wrong. Please refresh page and try again.";
        }
        echo json_encode($response);

    }

    function formBregistrationSubmit(Request $req, UserRegistration $userReg)
    {
        $response = array();
        $user_id = Session::get('user_id'); 
        if ($req->fid!='') 
        {
            $where = [
            'id'=>$req->fid
        ];
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }


        $cat = $this->getFirstRow(Config::get('site.formBMdl'),$where);

        try
            {
              
                if ($cat->submitted ==1) 
               {
                    $data = [
                'rem_addr'=> $req->ip(),
                'updated_at' => \Carbon\Carbon::now()
                    ];
                } 
                else
                {
                    $data = [
                'submitted' => 1,
                'dat_update_user' => \Carbon\Carbon::now(),
                'date' => date("Y-m-d"),
                'rem_addr'=> $req->ip(),
                'updated_at' => \Carbon\Carbon::now()
                    ];

         		$where2 = [
		            'user_id'=>$user_id,
		            'submitted'=>2,
		            'rem_addr'=>$req->ip(),
		        ];           

                $others = [
                    'table'=>Config::get('site.formBMdl'),
                    'subject'=>'Form B Submission',
                    'desc'=> 'you have successfully submitted Form B',
                    'mail_type'=>'Form B',
                ];


                $userReg->send($where2, $others);    

                }


                $this->updateData(Config::get('site.formBMdl'), $data, $where);   
            

                $fid = base64_encode($cat->id);
                $user = operationalCreditorMdl::getUserRData($fid);
                $other_files = operationalCreditorMdl::find($cat->id)->fileB()->get();          
      
            if(file_exists('public/access/media/forms/formB/documents/'.$user->unique_id.'/Form-B.pdf'))
            {
                unlink('public/access/media/forms/formB/documents/'.$user->unique_id.'/Form-B.pdf');    
            }
      
              $pdf = PDF::loadView('admin.forms.formBPreview', compact("user","other_files"));
              $pdf->save('public/access/media/forms/formB/documents/'.$user->unique_id.'/Form-B.pdf');



                $response['error'] = false;
                $response['cls'] = 'success';
                $response['message'] = "Form submitted successfully.";
            }
        catch (Exception $e)
        {
            $response['error'] = true;
            $response['cls'] = 'danger';
            $response['message'] = "Something went wrong. Please refresh page and try again.";//$e->getMessage(); //"Something went wrong. Please refresh page and try again.";
        }
        echo json_encode($response);


    }



    function formBFilesHandle($tbl, $condition, $files, $dir)
    {
        $cat = $this->getFirstRow($tbl, $condition);
        if ($cat) 
        {
            foreach ($files as $fk => $fv) 
            {
                if (empty($cat->$fk)) 
                {
                    
                    if (!empty($cat->$fv)) 
                        {
                        
                        if(file_exists($dir.'/'.$cat->$fv))
                            {
                                unlink($dir.'/'.$cat->$fv);    
                            }


                            $vl = $fk.'_file';
                            $data = [
                            $vl=>''
                            ];
                            $this->updateData($tbl,$data,$condition);
                        }

                }
            }   
            
        }
    }




    function getFormBUpdatedTable(Request $req)
    {
        $user_id = Session::get('user_id'); 
        if ($req->fid!='') 
        {
            $where = [
            'id'=>$req->fid
        ];
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }
        $check =  $this->getFirstRow(Config::get('site.formBMdl'),$where);

       // echo print_r($where);die();

        $other_files = $this->getRecords('form_b_other_documents_mdls',['form_b_id'=>$check->id]);
        $output = view('home.formb.partials.table', compact('other_files'));
        echo $output;


    }



    function removeFormBData(Request $req, $id)
    {
        $response = array();
          
        try
        {
        $where = [
            'id'=>$id
        ];
        
        $cat = $this->getFirstRow(Config::get('site.formBOtherDoc'),$where);
        $pth = '/access/media/forms/formB/documents/'.$cat->unique_id;
        
            if ($cat) 
            {
                if (!empty($cat->file)) 
                {
                    if(file_exists(publicP() . $pth.'/'.$cat->file))
                    {
                        unlink(publicP() . $pth.'/'.$cat->file);    
                    }  
                }

                $this->deleteData(Config::get('site.formBOtherDoc'),$where);    
                $response['error'] = false;
                $response['message'] = 'data removed successfully.';
            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'There is no data.';   
            }
        }    
        catch (Exception $e)
        {
            $response['error'] = true;
            $response['message'] = "Something went wrong. Please refresh page and try again.";
        }
        echo json_encode($response);
        }
    

    function getFormBPreview(Request $req)
    {
        $user_id = Session::get('user_id');
        $fid = $req->fid; 
        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user_id)->first();  
        
        if ($fid!='') 
        {
            $user = DB::table(Config::get('site.formBMdl'))
                    ->leftJoin('form_b_files_mdls', 'form_b_files_mdls.unique_id','=', 'operational_creditor_mdls.unique_id');
            $user = $user->where([['operational_creditor_mdls.id','=',$fid]])->first();
        }
        else
        {
            $user = DB::table(Config::get('site.formBMdl'))
                    ->leftJoin('form_b_files_mdls', 'form_b_files_mdls.unique_id','=', 'operational_creditor_mdls.unique_id');

        $user = $user->where([['operational_creditor_mdls.user_id','=',$user_id],['operational_creditor_mdls.submitted','=',2]])->first();
        }
        
        
        $where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];

        $other_files = $this->getRecords('form_b_other_documents_mdls',$where); 
        
        $output = view('home.formb.partials.preview', compact("cat","user","other_files"));
        echo $output;
       // echo print_r($user);
    }

    function updateFile(Request $req, $id)
    {
        $user_id = Session::get('user_id'); 
        $index = $req->index;
        $table = $req->table;
        $files = $req->other_doc_file;
        
        $file = $files[$index];
        

        $where= [
            'id'=>$id
        ];  


        $cat =  $this->getFirstRow(Config::get('site.formBOtherDoc'),$where);

        if ($file) 
        {
            if(!empty($cat->file))
        {
            if(file_exists(publicP() . '/access/media/forms/formB/documents/'.$cat->unique_id.'/'.$cat->file))
            {
                unlink(publicP() . '/access/media/forms/formB/documents/'.$cat->unique_id.'/'.$cat->file);    
            }
        }

    }
        $id=uniqid().time();
        $fileName = $id.".". $file->getClientOriginalExtension();
        //dd($fileName);   
        $file->move("public/access/media/forms/formB/documents/".$cat->unique_id, $fileName);  
        $updated_file = $fileName;
        
        $data=[
            'file'=>$updated_file
        ];

        $this->updateData(Config::get('site.formBOtherDoc'), $data, $where);
        //}
        
        // else
        // {
        //  $updated_file = $cat->file;
        // }

        
        
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
            'pwd' => isset($req->password) ? Hash::make($req->password) : "",
            'creditor_type' => "",
            'rem_addr' => $req->ip(),
            'date' => date('Y-m-d') ?? "",
            'status' => 2,
            'auth_id' => '',
            'auth_check' => '',
            'forgot_link'=>'',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
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
                $response['message'] = "Unique-Id already exists. Please Login.";  
                echo json_encode($response);
                die(); 
            }

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

function formBDeclaration(Request $req)
    {
        $user_id = Session::get('user_id'); 
        $output = "";
        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user_id)->first();
        if ($req->fid != '') 
        {
            $user = DB::table('operational_creditor_mdls')
                    ->leftJoin('form_b_files_mdls', 'form_b_files_mdls.unique_id','=', 'operational_creditor_mdls.unique_id');

            $user = $user->where([['operational_creditor_mdls.id','=',$req->fid]])->first();
        }
        else
        {
            $user = DB::table('operational_creditor_mdls')
                    ->leftJoin('form_b_files_mdls', 'form_b_files_mdls.unique_id','=', 'operational_creditor_mdls.unique_id');

            $user = $user->where([['operational_creditor_mdls.user_id','=',$user_id],['operational_creditor_mdls.submitted','=',2]])->first();
        }
        

        $output = view('home.formb.partials.declaration', compact("user","cat"));
        echo $output;
        //echo $req->fid;
    }


function signUpResend(Request $req)
{
    $response = array();

    $timestamp =  $_SERVER["REQUEST_TIME"];
    Session::put('signup_time', $timestamp);  
    $otp = rand(100000,999999);
    Session::put('signUp_otp',$otp);
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

    echo json_encode($response);

}

function signInResend(Request $req)
{
    $response = array();

    $timestamp =  $_SERVER["REQUEST_TIME"];
    Session::put('signup_time', $timestamp); 
    $otp = rand(100000,999999);
    Session::put('signUp_otp',$otp);  
    $unique_id = Session::get('unique_id');


    $auth = DB::table("authentication_mdls")->select('type','status')->orderBy('id','desc')->first();
    
    $com = DB::table("general_info_mdls")->where([['user_type','=',1],['sub_user','=',""]])->first();

    $cat = DB::table("user_mdls")->select('id','name','email','unique_id','mobile','password','pwd')->where([['unique_id',$unique_id],['status',1],['auth_check',1]])->latest()->first();
    
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

     if ($auth->type=='sms' and $auth->status=='yes') 
     {
                event(new fSignInFire($data, $subject));
                $response['error']=false;
                $response['login_success']=false;
                $response['message']="OTP sent to your mobile";
            }
            elseif ($auth->type=='email' and $auth->status=='yes') {

                event(new fSignInFire($data, $subject));
                $response['error']=false;
                $response['login_success']=false;
                $response['message']= "OTP sent to your email-id.";
            }
            elseif ($auth->type=='both' and $auth->status=='yes') 
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
        
       // echo $timestamp." ".$signup_time." ".$calculate;         

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
        $auth = DB::table("authentication_mdls")->select('type','status')->orderBy('id','desc')->first();
        $check = DB::table("user_mdls")->select('id','name','email','unique_id','mobile','password','pwd')->where([['unique_id',$email],['status',1],['auth_check',1]])->latest()->first();
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


            if ($auth->type=='sms' and $auth->status=='yes') {
                event(new fSignInFire($data, $subject));
                $response['error']=false;
                $response['login_success']=false;
                $response['message']="OTP sent to your mobile";
            }
            elseif ($auth->type=='email' and $auth->status=='yes') {

                event(new fSignInFire($data, $subject));
                $response['error']=false;
                $response['login_success']=false;
                $response['message']= "OTP sent to your email-id.";
            }
            elseif ($auth->type=='both' and $auth->status=='yes') 
            {
                event(new fSignInFire($data, $subject));
                $response['error']=false;
                $response['login_success']=false;
                $response['message']="OTP sent to your email-id and mobile number.";
            }
            elseif ($auth->type=='none' and $auth->status=='yes') 
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
    Session::forget('user_id');
      //Session::flush(); 
      return redirect('/');
}



}
