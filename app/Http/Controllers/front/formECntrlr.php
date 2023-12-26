<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Services\UserRegistration;
use App\Models\formEFileMdl;
use Config;
use DB;
use Session;
use PDF;

class formECntrlr extends Controller
{
    use MethodsTrait;


    function formERegistration(Request $req)
    {
        $response = array();
        $user_id = Session::get('user_id'); 
        if ($req->fid!='') 
        {
            $where = [
           // 'id'=>$req->fid
            'form_e_selected_id'=>$req->form_e_selected_id
        ];
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }

        //echo print_r($where); die();
        $unique_id = uniqid().time();
        // $check =  $this->getFirstRow(Config::get('site.formEMdl'),$where); 
        $check =  $this->getLatestRow(Config::get('site.formEMdl'),$where);

        if ($check) 
        {
            $Bunique_id = $check->unique_id;
            $user_unique_id = $check->user_unique_id!='' ? $check->user_unique_id : $this->gen_uid(Config::get('site.formEMdl'));
        }
        else
        {
            $Bunique_id = $unique_id; 
            $user_unique_id = $this->gen_uid(Config::get('site.formEMdl'));
        }

      // echo print_r($check); die();

        $sign = $this->uploadFile($req, $Bunique_id, Config::get('site.formEMdl'), $where, '/access/media/forms/formE/documents', 'operational_creditor_signature', 'sign');

        
        $formA_where = [
            'id' => $req->fA //isset($check->formA) ? $check->formA : Session::get('form_a')
        ];

        
         $formA = $this->getRow('form_a_mdls',$formA_where); 

        if (isset($req->place)) 
        {
            $cl_place = $req->place;   
        }
        elseif (isset($check->place)) 
        {
            $cl_place = $check->place;
        }
        else
        {
            $cl_place = "";
        }

     //  echo $cl_place;die();

        $emp_type = $req->emp_type ?? "";
        $employee_name = $req->employee_name ?? ""; 
        $id_number = $req->id_number ?? "";
        $id_details = $req->id_details ?? "";
        $total_amt = $req->total_amt ?? "";
        $due_amt_period = $req->due_amt_period ?? "";

         //echo print_r($employee_name);die();

        if ($check) 
        {

            $data = [
            'user_id' => $user_id,
            'operational_creditor_signature' => $sign ?? "",
            'rem_addr'=> $req->ip(),
            'place'=>$cl_place,
            'select_option'=>$req->select_option ?? 1,
            'updated_at' => date('Y-m-d H:i:s') 
            ];


        }
        else
        {
   
        $data = [
            'company' => $formA->company_id ?? '',//Session::has('company_id') ? Session::get('company_id') : '',
            'irp' => $formA->user_id ?? '',///Session::has('ip_id') ? Session::get('ip_id') : '',
            'formA'  => isset($check->formA) ? $check->formA : Session::get('form_a'),
            'user_id' => $user_id,
            'form_type'=>$req->form_type ?? "",
            'formName'=>'form-e',
            'ar'=> $req->ar ?? "",
            'form_e_selected_id' => isset($check->form_e_selected_id) ? $check->form_e_selected_id : '',//isset($req->fid) ? $req->fid : '', 
            'work_purchase_order' => isset($check->work_purchase_order) ? $check->work_purchase_order : '',
            'invoices' => isset($check->invoices) ? $check->invoices : '',
            'balance_confirmation' => isset($check->balance_confirmation) ? $check->balance_confirmation : '',
            'any_correspondence' => isset($check->any_correspondence) ? $check->any_correspondence : '',
            'authorisation_letter' => isset($check->authorisation_letter) ? $check->authorisation_letter : '',
            'bank_statement' => isset($check->bank_statement) ? $check->bank_statement : '',
            'ledger_copy' => isset($check->ledger_copy) ? $check->ledger_copy : '',
            'computation_sheet' => isset($check->computation_sheet) ? $check->computation_sheet : '',
            'work_purchase_order_file' => isset($check->work_purchase_order_file) ? $check->work_purchase_order_file : '',
            'invoices_file' => isset($check->invoices_file) ? $check->invoices_file : '',
            'balance_confirmation_file' => isset($check->balance_confirmation_file) ? $check->balance_confirmation_file : '',
            'any_correspondence_file' => isset($check->any_correspondence_file) ? $check->any_correspondence_file : '',
            'authorisation_letter_file' => isset($check->authorisation_letter_file) ? $check->authorisation_letter_file : '',
            'bank_statement_file' => isset($check->bank_statement_file) ? $check->bank_statement_file : '',
            'ledger_copy_file' => isset($check->ledger_copy_file) ? $check->ledger_copy_file : '',
            'computation_sheet_file' => isset($check->computation_sheet_file) ? $check->computation_sheet_file : '',
            'pan_number_file' => isset($check->pan_number_file) ? $check->pan_number_file : '',
            'passport_file' => isset($check->passport_file) ? $check->passport_file : '',
            'aadhar_card' => isset($check->aadhar_card) ? $check->aadhar_card : '',
            'operational_creditor_signature' => $sign ?? $check->operational_creditor_signature, //$sign ?? "",
            'place'=> $cl_place,
            'insolvency_commencement_date' => isset($check->insolvency_commencement_date) ? $check->insolvency_commencement_date : $formA->corporate_debtor_insolvency_date,
            'select_option'=>$req->select_option ?? 1,
            'unique_id' => $Bunique_id,
            'user_unique_id'=>$user_unique_id,
            'year' => '',
            'dat' =>'',
            'admin_id'=>'',
            'updated_date'=> '',
            'submitted' => 2,
            'mailed' => 2,
            'dat_update_user' => isset($check->dat_update_user) ? $check->dat_update_user : date('Y-m-d H:i:s'),
            'date' => isset($check->date) ? $check->date : date("Y-m-d"), //date("Y-m-d"),
            'rem_addr'=> $req->ip(),
            'flag' => 2,
            'deleted' => 2,
            'status' => 2,
            'formType' => isset($check->formType) ? $check->formType : 'latest',
            'created_at' => isset($check->created_at) ? $check->created_at : date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s') 
        ];
    }

        $sanction_date = $req->sanction_date ?? "";     
        $section_amt = $req->section_amt ?? "";   
        $other_senc_id = $req->other_senc_id ?? "";
       
       $sanct_date = $req->sanct_date ?? "";
       $sect_amt = $req->sect_amt ?? ""; 
       $othr_senc_id = $req->othr_senc_id ?? "";


    if (isset($check->id)) 
        {

            $this->senctionDetail($sanction_date, $section_amt, $other_senc_id, Config::get('site.formESenctionMdl'), $check->id, Config::get('site.formEMdl'), 'form_e_selected_id', 'form_e_id');    
            
            $this->senctionDetail($sanct_date, $sect_amt, $othr_senc_id, Config::get('site.formEDecTblMdl'), $check->id, Config::get('site.formEMdl'), 'form_e_selected_id', 'form_e_id'); 
        }


        try
        {
            if ($check) 
            {
                $condition = [
                    'id'=>$check->id
                ];

                if ($check->submitted==1) 
                 {
                    
                // $this->insertData(Config::get('site.formEMdl'),$data);
                  
                // Session::forget('new_form_id');

                $whre2 = [
                    'user_id' => $user_id,
                    'form_e_selected_id' => $check->form_e_selected_id,
                    'submitted' => 1
                ];    


                $data4 = $this->formEFilesField(Config::get('site.formEMdl'),$whre2, $check->form_e_selected_id);    

                $data2 = [
                    'operational_creditor_signature' => $sign ?? $check->operational_creditor_signature,
                    'rem_addr' => $req->ip()
                    ];
                 
                    $finalArray = array_merge($data2, $data4);
                    $this->insertData(Config::get('site.formEMdl'),$finalArray); 

                 $check2 = DB::table(Config::get('site.formEMdl'))->where([['unique_id','=', $Bunique_id],['user_id','=', $user_id]])->orderBy('id', 'desc')->first();      

                 $where2 = [
                        'form_e_id' => $check->id
                    ];

                 if ($employee_name) 
                            {
                                   
                            for ($i=0; $i < count($employee_name); $i++) 
                                {
                                if ($employee_name[$i]!="") 
                                {    

                            $data3 = [
                                'user_id'=> $user_id,
                                'form_e_selected_id' => $check2->form_e_selected_id,
                                'form_e_id' => $check2->id,
                                'emp_type' => $emp_type[$i] ?? '',
                                'employee_name' => $employee_name[$i] ?? '',
                                'id_number' =>$id_number[$i] ?? "",
                                'id_details' => $id_details[$i] ?? "",
                                'total_amt' => $total_amt[$i] ?? "",
                                'due_amt_period' => $due_amt_period[$i] ?? "",
                                'submitted' => 2,
                                'unique_id' => $Bunique_id,
                                'rem_addr' => $req->ip(),
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s')
                                ];
                            $this->insertData(Config::get('site.formEEmpDtl'),$data3); 
                        } 
                        }
                    }   


                $this->formOtherDocFields(Config::get('site.formEOtherDoc'),$where2, $check2->id, $check->form_e_selected_id, 'form_e_selected_id', 'form_e_id');
                $this->formSenctionFields(Config::get('site.formESenctionMdl'),$where2, $check2->id, $check->form_e_selected_id, 'form_e_selected_id', 'form_e_id');
                $this->formSenctionFields(Config::get('site.formEDecTblMdl'),$where2, $check2->id, $check->form_e_selected_id, 'form_e_selected_id', 'form_e_id');


               
                Session::put('new_form_id',$check2->id); 

                }
                else
                {
                    
               // echo " test 2"; die();   
                $this->updateData(Config::get('site.formEMdl'), $data, $condition);     

                $where2 = [
                    'user_id'=>$user_id,
                    'submitted'=>2,
                    'form_e_id'=>$check->id
                ];
               // echo print_r($where2); die();

                $check2 =  $this->getFirstRow(Config::get('site.formEMdl'),$where);
                $rmT =  $this->getFirstRow(Config::get('site.formEEmpDtl'),$where2);
               // echo print_r($where2); die();                    
                if ($rmT) 
                {
                    $this->removeData(Config::get('site.formEEmpDtl'),$where2);
                }
                if ($employee_name) 
                            {
                                   
                            for ($i=0; $i < count($employee_name); $i++) 
                                {
                                if ($employee_name[$i]!="") 
                                {    

                            $data3 = [
                                'user_id'=> $user_id,
                                'form_e_selected_id' => $check2->form_e_selected_id,
                                'form_e_id' => $check2->id,
                                'emp_type' => $emp_type[$i] ?? '',
                                'employee_name' => $employee_name[$i] ?? '',
                                'id_number' =>$id_number[$i] ?? "",
                                'id_details' => $id_details[$i] ?? "",
                                'total_amt' => $total_amt[$i] ?? "",
                                'due_amt_period' => $due_amt_period[$i] ?? "",
                                'submitted' => 2,
                                'unique_id' => $Bunique_id,
                                'rem_addr' => $req->ip(),
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s')
                                ];
                            $this->insertData(Config::get('site.formEEmpDtl'),$data3); 
                        } 
                        }
                    }
                }


                $response['error'] = false;
                $response['message'] = "Data saved successfully."; 
            }
            else
            {

               $data3 = [
                    'user_id' => $user_id,
                    'submitted'=>2
                ]; 

                $res = $this->getFirstRow(Config::get('site.formEMdl'), $data3);

               if ($res) 
               {
                    //echo "string df";
                    // $this->updateData(Config::get('site.formEMdl'), $data, ['id'=>$res->id]);

                    // $check2 = $this->getFirstRow(Config::get('site.formEMdl'), $data3);


                    //echo print_r($res);die();

                    if (count($employee_name)>0) 
                        {
                               
                        for ($i=0; $i < count($employee_name); $i++) 
                            {
                            if ($employee_name[$i]!="") 
                            {    

                        $data5 = [
                            'user_id'=> $user_id,
                            'form_e_selected_id' => $res->id,
                            'form_e_id' => $res->id,
                            'emp_type' => $emp_type[$i] ?? '',
                            'employee_name' => $employee_name[$i] ?? '',
                            'id_number' =>$id_number[$i] ?? "",
                            'id_details' => $id_details[$i] ?? "",
                            'total_amt' => $total_amt[$i] ?? "",
                            'due_amt_period' => $due_amt_period[$i] ?? "",
                            'submitted' => 2,
                            'unique_id' => $Bunique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                            ];
                        $this->insertData(Config::get('site.formEEmpDtl'),$data5); 
                        } 
                         }
                    }
                    Session::put('new_form_id',$res->id);
                } 
                else
                {
                
                $this->insertData(Config::get('site.formEMdl'),$data);
                $check2 =  $this->getLatestRow(Config::get('site.formEMdl'),$data3);

                $this->updateData(Config::get('site.formEMdl'), ['form_e_selected_id'=>$check2->id], ['id'=>$check2->id]);       
                    
                if (count($employee_name)>0) 
                        {
                               
                        for ($i=0; $i < count($employee_name); $i++) 
                            {
                            if ($employee_name[$i]!="") 
                            {    

                        $data5 = [
                            'user_id'=> $user_id,
                            'form_e_selected_id' => $check2->id,
                            'form_e_id' => $check2->id,
                            'emp_type' => $emp_type[$i] ?? '',
                            'employee_name' => $employee_name[$i] ?? '',
                            'id_number' =>$id_number[$i] ?? "",
                            'id_details' => $id_details[$i] ?? "",
                            'total_amt' => $total_amt[$i] ?? "",
                            'due_amt_period' => $due_amt_period[$i] ?? "",
                            'submitted' => 2,
                            'unique_id' => $Bunique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                            ];
                        $this->insertData(Config::get('site.formEEmpDtl'),$data5); 
                    } 
                    }
                }

                Session::put('new_form_id',$check2->id);

                }
                
              
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

 function formEFilesField($tbl, $where, $selected)
    {


        $check3 =   DB::table($tbl)->where($where)->latest()->first(); //$this->getFirstRow($tbl,$where);

        $insolvency_commencement_date = isset($check3->insolvency_commencement_date) ? $check3->insolvency_commencement_date : '';

        $result = [
            'company' => isset($check3->company) ? $check3->company : '',
            'irp' => isset($check3->irp) ? $check3->irp : '',
            'formA'  => isset($check3->formA) ? $check3->formA : '',

            'user_id' => isset($check3->user_id) ? $check3->user_id : '', 
            'form_type' => isset($check3->form_type) ? $check3->form_type : '', 
            'ar' => isset($check3->ar) ? $check3->ar : '', 
            
            'form_e_selected_id' => $selected, 
            'work_purchase_order' => isset($check3->work_purchase_order) ? $check3->work_purchase_order : '',
            'invoices' => isset($check3->invoices) ? $check3->invoices : '',
            'balance_confirmation' => isset($check3->balance_confirmation) ? $check3->balance_confirmation : '',
            'any_correspondence' => isset($check3->any_correspondence) ? $check3->any_correspondence : '',
            'authorisation_letter' => isset($check3->authorisation_letter) ? $check3->authorisation_letter : '',
            'bank_statement' => isset($check3->bank_statement) ? $check3->bank_statement : '',
            'ledger_copy' => isset($check3->ledger_copy) ? $check3->ledger_copy : '',
            'computation_sheet' => isset($check3->computation_sheet) ? $check3->computation_sheet : '',
            'work_purchase_order_file' => isset($check3->work_purchase_order_file) ? $check3->work_purchase_order_file : '',
            'invoices_file' => isset($check3->invoices_file) ? $check3->invoices_file : '',
            'balance_confirmation_file' => isset($check3->balance_confirmation_file) ? $check3->balance_confirmation_file : '',
            'any_correspondence_file' => isset($check3->any_correspondence_file) ? $check3->any_correspondence_file : '',
            'authorisation_letter_file' => isset($check3->authorisation_letter_file) ? $check3->authorisation_letter_file : '',
            'bank_statement_file' => isset($check3->bank_statement_file) ? $check3->bank_statement_file : '',
            'ledger_copy_file' => isset($check3->ledger_copy_file) ? $check3->ledger_copy_file : '',
            'computation_sheet_file' => isset($check3->computation_sheet_file) ? $check3->computation_sheet_file : '',
            'pan_number_file' => isset($check3->pan_number_file) ? $check3->pan_number_file : '',
            'passport_file' => isset($check3->passport_file) ? $check3->passport_file : '',
            'aadhar_card' => isset($check3->aadhar_card) ? $check3->aadhar_card : '',
            'place' => isset($check3->place) ? $check3->place : '',
            'insolvency_commencement_date' => $insolvency_commencement_date,

            'unique_id' => isset($check3->unique_id) ? $check3->unique_id : '',
            'year' => '',
            'dat' => '',
            'admin_id' => '',
            'updated_date' => '',
            'submitted' => 2,
            'mailed' => 2,
            'dat_update_user' => date('Y-m-d H:i:s'),
            'date' => date("Y-m-d"),
            'flag' => isset($check3->flag) ? $check3->flag : 2,
            'deleted' => isset($check3->deleted) ? $check3->deleted : 2,
            'status' => 2,

            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s') 
        ];
        return $result;
        
    }







    function formEregistrationSave(Request $req)
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
        
        
        $check =  $this->getFirstRow(Config::get('site.formEMdl'),$where); 
        
       // echo print_r($check);die();

        $unique_id = uniqid().time(); 

        $where2 = [
            'user_id'=>$check->user_id,
            'unique_id'=>$check->unique_id,
            'id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id
        ];

    
        $check2 = $this->getFirstRow(Config::get('site.formEMdl'),$where2); 


        //echo print_r($check2);die();

        $work_order_file = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where2, '/access/media/forms/formE/documents', 'work_purchase_order_file', 'work_purchase_order');
        $invoice_file = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where2, '/access/media/forms/formE/documents', 'invoices_file', 'invoice');
        $balance_file = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where2, '/access/media/forms/formE/documents', 'balance_confirmation_file', 'balance');
        $correspondence_file = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where2, '/access/media/forms/formE/documents', 'any_correspondence_file', 'correspondence');
        $authorisation_file = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where2, '/access/media/forms/formE/documents', 'authorisation_letter_file', 'authorisation_letter');
        $bank_stt_file = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where2, '/access/media/forms/formE/documents', 'bank_statement_file', 'stt');
        $ledger_file = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where2, '/access/media/forms/formE/documents', 'ledger_copy_file', 'ledger');
        $computation_file = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where2, '/access/media/forms/formE/documents', 'computation_sheet_file', 'computation_sheet');

        $pan_file = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where2, '/access/media/forms/formE/documents', 'pan_number_file', 'pan');
        $passport_file = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where2, '/access/media/forms/formE/documents', 'passport_file', 'passport');
        $aadhar_file = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where2, '/access/media/forms/formE/documents', 'aadhar_card', 'aadhar');



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
        
       
       $cats = DB::table(Config::get('site.formEOtherDoc'))->select('id')->where('unique_id', $check->unique_id)->first(); 
            if ($cats)    
                    {  
                       if (count($oldRow)>0) 
                          {
                                                
                            for ($k=0; $k < count($oldRow); $k++) 
                            {   
                                        $data5 = [
                                        'document_name' => $oth_dc[$k] ?? "",
                                        'rem_addr' => $req->ip(),
                                        'updated_at' => date('Y-m-d H:i:s')
                                        ]; 
                                        DB::table(Config::get('site.formEOtherDoc'))->where('id', $oldRow[$k])->update($data5);
                               
                                }

                                } 

                        if(count($oth_dc_New)>0)
                                {         

                                    if($req->hasfile('other_doc_file'))
                                                 {
                                                    $dir = publicP()."/access/media/forms/formE/documents/".$check->unique_id;
                                                  
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
                                            'form_e_selected_id' => !empty($check->form_e_selected_id) ? $check->form_e_selected_id : $check->id,
                                            'form_e_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
                                            'document_name' => $oth_dc_New[$j] ?? '',
                                            'file' =>$oth_doc_fl6[$j] ?? "",
                                            'submitted'=>2,
                                            'unique_id' => $check->unique_id,
                                            'rem_addr' => $req->ip(),
                                            'created_at' => date('Y-m-d H:i:s'),
                                            'updated_at' => date('Y-m-d H:i:s')
                                            ];
                                          

                                       // echo print_r($data6); die();
                                           DB::table(Config::get('site.formEOtherDoc'))->insert($data6);
                                    }             
                                   }         
                               
                                }        



                   } 
                   else
                   {
                        if($req->hasfile('other_doc_file'))
                             {
                                $dir = publicP()."/access/media/forms/formE/documents/".$check->unique_id;
                              
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
                            'form_e_selected_id' => $check->id,
                            'form_e_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
                            'document_name' => $oth_dc[$i] ?? '',
                            'file' =>$oth_doc_fl[$i] ?? "",
                            'submitted'=>2,
                            'unique_id' => $check->unique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                            ];
                        $this->insertData(Config::get('site.formEOtherDoc'),$data3); 
                    } 
                    }
                    //echo print_r($data3);die();
                }
                   }
  

        $data2 = [
            'company' => isset($check->company) ? $check->company : '',
            'irp' => isset($check->irp) ? $check->irp : '',
            'formA'  => isset($check->formA) ? $check->formA : '',
            'user_id' => $user_id,
            'form_type' => isset($check->form_type) ? $check->form_type :$req->form_type,
            'ar' => '',
            'form_e_selected_id' => isset($check->form_e_selected_id) ? $check->form_e_selected_id : '',
            
            'work_purchase_order' => (!empty($work_order_file)) ? $req->work_purchase_order ?? '' : '',
            'invoices' => (!empty($invoice_file)) ? $req->invoices ?? '' : '',
            'balance_confirmation' => (!empty($balance_file)) ? $req->balance_confirmation ?? '' : '',
            'any_correspondence' => (!empty($correspondence_file)) ? $req->any_correspondence ?? '' : '',
            'authorisation_letter' => (!empty($authorisation_file)) ? $req->authorisation_letter ?? '' : '',
            'bank_statement' => (!empty($bank_stt_file)) ? $req->bank_statement ?? '' : '',
            'ledger_copy' => (!empty($ledger_file)) ? $req->ledger_copy ?? '' : '',
            'computation_sheet' => (!empty($computation_file)) ? $req->computation_sheet ?? '' : '',

            'work_purchase_order_file' => (!empty($req->work_purchase_order)) ? $work_order_file : '',
            'invoices_file' => (!empty($req->invoices)) ? $invoice_file : '',
            'balance_confirmation_file' => (!empty($req->balance_confirmation)) ? $balance_file : '',
            'any_correspondence_file' => (!empty($req->any_correspondence)) ? $correspondence_file : '',
            'authorisation_letter_file' => (!empty($req->authorisation_letter)) ? $authorisation_file : '',
            'bank_statement_file' => (!empty($req->bank_statement)) ? $bank_stt_file : '',
            'ledger_copy_file' => (!empty($req->ledger_copy)) ? $ledger_file : '',
            'computation_sheet_file' => (!empty($req->computation_sheet)) ? $computation_file : '',

            
            'pan_number_file' => $pan_file,
            'passport_file' => $passport_file,
            'aadhar_card' => $aadhar_file ?? '',

            'operational_creditor_signature' => isset($check2->operational_creditor_signature) ? $check2->operational_creditor_signature : $check->operational_creditor_signature,
            'place'=> isset($check2->place) ? $check2->place : '',

            'unique_id' => $check->unique_id,

            'year' => '',
            'dat' =>'',
            'admin_id'=>'',
            'updated_date'=> '',
            'submitted' => 2,
            'mailed' => 2,
            'dat_update_user' => isset($check->dat_update_user) ? $check->dat_update_user : date('Y-m-d H:i:s'),
            'date' => isset($check->date) ? $check->date : date("Y-m-d"), //date("Y-m-d"),

            'flag' => 2,
            'deleted' => 2,
            'status' => 2,

            'rem_addr'=> $req->ip(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s') 
        ];

        try
        {
            if ($check2) 
            {
               $condition = [
                'user_id'=>$check->user_id,
                'unique_id'=>$check->unique_id,
                'id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id
                //'form_e_selected_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id
                ]; 

               

                if ($check2->submitted == 2) 
                {
                    $this->updateData(Config::get('site.formEMdl'), $data2, $condition);   
                }
                else
                {
                    $this->insertData(Config::get('site.formEMdl'),$data2);       
                }

                $response['error'] = false;
                $response['cls'] = 'success';
                $response['message'] = "Form submitted successfully.";


            }
            else
            {
                $this->insertData(Config::get('site.formEMdl'),$data2);
               
                
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




    function formEDeclaration(Request $req)
    {
        $this->formDeclaration('form_e_file_mdls', $req->updated_data, $req->fid, 'formE', Config::get('site.formESenctionMdl'), Config::get('site.formEDecTblMdl'), 'form_e_selected_id', 'form_e_id');
    }

    function formERegistrationSubmit(Request $req, UserRegistration $userReg)
    {
        $response = array();
        $user_id = Session::get('user_id'); 
        if ($req->fid!='') 
        {
            $where = [
            'id' => Session::has('new_form_id') ? Session::get('new_form_id') : $req->fid//$req->fid
        ];
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }



        $cat = $this->getFirstRow(Config::get('site.formEMdl'),$where);

        try
            {
              
                if ($cat->submitted ==1) 
               {
                    $data = [
                'rem_addr'=> $req->ip(),
                'updated_at' => date('Y-m-d H:i:s')
                    ];
                } 
                else
                {
                    $data = [
                'submitted' => 1,
                'dat_update_user' => date('Y-m-d H:i:s'),
                'date' => date("Y-m-d"),
                'status' => isset($req->notify) ? 2 : 1,
                'mailed' => 1,
                'rem_addr'=> $req->ip(),
                'updated_at' => date('Y-m-d H:i:s')
                    ];


                 $where2 = [
                    'user_id'=>$user_id,
                    'submitted'=>2,
                    'rem_addr'=>$req->ip(),

                ];           

                $others = [
                    'table'=>Config::get('site.formEMdl'),
                    'subject'=>isset($req->notify) ? 'Form E Updation' : 'Form E Submission',
                    'desc'=> isset($req->notify) ? 'you have successfully updated Form E' : 'you have successfully submitted Form E',
                    'mail_type'=>'Form E',
                ];

                $data3=[
                    'submitted'=>1
                ];

                $where3=[
                    'user_id'=>$cat->user_id,
                    'unique_id'=>$cat->unique_id,
                    'form_e_id'=> Session::has('new_form_id') ? Session::get('new_form_id') : $cat->id,
                    'submitted'=>2
                ];

                $this->updateData(Config::get('site.formEEmpDtl'), $data3, $where3);
                $this->updateData(Config::get('site.formEOtherDoc'), $data3, $where3);
                $this->updateData(Config::get('site.formESenctionMdl'), $data3, $where3); 
                $this->updateData(Config::get('site.formEDecTblMdl'), $data3, $where3);

                $userReg->send($where2, $others);   
                    
                }

                $this->updateData(Config::get('site.formEMdl'), $data, $where);
                

                $whereCK=[
                    'submitted'=>1,
                    'user_id'=> $user_id
                ];

                $this->checkTableRecord(Config::get('site.formEMdl'), $whereCK, 'form_e_selected_id');



               if ($req->notify) 
                {
                    $notify_data = [
                        'form_update_status'=>1,
                        'form_update_time'=>date('Y-m-d H:i:s')
                    ];

                    $this->updateData(Config::get('site.formModificationMdls'), $notify_data, ['id'=>$req->notify]);     
                    $response['error'] = false;
                    $response['cls'] = 'success';
                    $response['message'] = "Form updated successfully.";
                }
                else
                {     
                Session::forget('form_a');    
                $response['error'] = false;
                $response['cls'] = 'success';
                $response['message'] = "Form submitted successfully.";
                }  
                Session::forget('new_form_id');
            }
        catch (Exception $e)
        {
            $response['error'] = true;
            $response['cls'] = 'danger';
            $response['message'] = "Something went wrong. Please refresh page and try again.";//$e->getMessage(); //"Something went wrong. Please refresh page and try again.";
        }
        echo json_encode($response);


    }

    function formESignature(Request $req)
    {
        $this->getSignature(Config::get('site.formEMdl'), $req->updated_data, $req->fid, 'formE');
    }

    function removeFormEData(Request $req, $id)
    {

        $this->removeFormData(Config::get('site.formEOtherDoc'), $id, 'formE');
    }


    function getFormEUpdatedTable(Request $req)
    {
        $this->getFormUpdatedTable(Config::get('site.formEMdl'), Config::get('site.formEOtherDoc'), $req->updated_data, $req->fid, 'formE', 'form_e_id');
    }


    function getFormEUpdatedFileData(Request $req)
    {

        $user_id = Session::get('user_id'); 
        if ($req->updated_data =='view') 
        {
            $where = [
            'id'=>$req->fid
        ];
        }
        elseif ($req->updated_data =='edit') 
        {
         $where = [
            'id'=> Session::has('new_form_id') ? Session::get('new_form_id') : $req->fid
        ];   
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }
        $user =  $this->getFirstRow(Config::get('site.formEMdl'),$where);

     //   $user = $this->getLatestRow(Config::get('site.formEMdl'),['form_e_selected_id'=>$check->form_e_selected_id]);
        $output = view('home.formE.partials.files', compact('user'));
        echo $output;   
        
        //echo print_r($user);die();
    }

     function getFormEPreview(Request $req)
    {
        $user_id = Session::get('user_id');
        //$fid = $req->fid;//Session::has('new_form_id') ? Session::get('new_form_id') : $req->fid;//$req->fid;
       // $fid = Session::has('new_form_id') ? Session::get('new_form_id') : $req->fid; 
        if ($req->updated_data =='view') 
        {
            $fid = $req->fid; 
        }
        else
        {
            $fid = Session::has('new_form_id') ? Session::get('new_form_id') : $req->fid;     
        }    

        if ($fid) 
        {
            $user = DB::table('form_e_file_mdls')->where('form_e_file_mdls.id',$fid)->first();   
        }
        else
        {
            $user = DB::table('form_e_file_mdls')->where([['form_e_file_mdls.user_id','=',$user_id],['form_e_file_mdls.submitted','=',2]])->first();
        }


    //echo print_r($user);die();
      //  echo $req->updated_data;die();
            $where = [
                'user_id' => $user_id,
                'form_e_id' => isset($fid) ? $fid : Session::get('new_form_id'), //Session::has('new_form_id') ? Session::get('new_form_id') : $req->fid,
                'unique_id' => $user->unique_id
            ];
            
            $other_files = $this->getRecords(Config::get('site.formEOtherDoc'),$where); 
            $emps = $this->getRecords(Config::get('site.formEEmpDtl'),$where); 
            $senctions = $this->getRecords(Config::get('site.formESenctionMdl'),$where);  
            $declarationMdls = $this->getRecords(Config::get('site.formEDecTblMdl'),$where);   

         
            $total_amt = DB::table("form_e_employee_detail_mdls")->where([['form_e_selected_id','=', $user->form_e_selected_id],['form_e_id','=',$user->id]])->sum('total_amt');

        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user_id)->first();    
        $formA = DB::table('form_a_mdls')->where('id',$user->formA)->first(); 
        $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
        $ip = DB::table('general_info_mdls')->select('username', 'address')->where('id',$formA->user_id)->first();    

      // echo print_r($user);die();

        $output = view('home.formE.partials.preview', compact("cat","user","other_files","emps","ip","comp","total_amt", "senctions", "declarationMdls"));
        echo $output;

       //echo print_r($emps);
    
    }

    function updateFile(Request $req, $id)
    {
        $this->updateFileData(Config::get('site.formEOtherDoc'), $req->index, $req->table, $req->other_doc_file, $id, 'formE');
    }

}



