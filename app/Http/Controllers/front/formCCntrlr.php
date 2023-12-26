<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Services\UserRegistration;
use App\Models\finanicialCreditorFormCMdl;
use Config;
use DB;
use Session;
use PDF;

class formCCntrlr extends Controller
{
	use MethodsTrait;

    function formCregistration(Request $req)
    {
    	$response = array();
        $user_id = Session::get('user_id'); 
        
        if ($req->fid!='') 
        {
       //     $cid = $req->fid;
            $where = [
            //'id'=>$req->fid
            'form_c_selected_id'=>$req->form_c_selected_id
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
        $check =  $this->getLatestRow(Config::get('site.formCMdl'),$where); 
        
      //  echo print_r($check);die();

        if ($check) 
        {
            $Bunique_id = $check->unique_id;
            $user_unique_id = $check->user_unique_id!='' ? $check->user_unique_id : $this->gen_uid(Config::get('site.formCMdl'));
        }
        else
        {
            $Bunique_id = $unique_id; 
            $user_unique_id = $this->gen_uid(Config::get('site.formCMdl'));
        }

        $sign = $this->uploadFile($req, $unique_id, Config::get('site.formCMdl'), $where, '/access/media/forms/formC/documents', 'operational_creditor_signature', 'sign');

        // $comp_id = DB::table("form_a_mdls")->select('company_id')->where('id', Session::get('form_a'))->first();
        // $formDtl = DB::table("form_a_mdls")->select('corporate_debtor_insolvency_date')->where('company_id', $comp_id->company_id)->orderBy('id', 'desc')->first();
        
        
        $formA_where = [
            'id' => $req->fA//isset($check->formA) ? $check->formA : Session::get('form_a')
        ];

        $formDtl = DB::table("form_a_mdls")->select('corporate_debtor_insolvency_date')->where('id', Session::get('form_a'))->first();
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


        $data = [
       
            'company' => $formA->company_id ?? '', //Session::has('company_id') ? Session::get('company_id') : '',
            'irp'  => $formA->user_id ?? '', //Session::has('ip_id') ? Session::get('ip_id') : '',
            'formA' => isset($check->formA) ? $check->formA : Session::get('form_a'),
            'user_id' => $user_id,
            'form_type'=>$req->form_type ?? "",
            'formName'=>'form-c',
            'ar'=> $req->ar ?? "",
            'form_c_selected_id' => isset($check->form_c_selected_id) ? $check->form_c_selected_id : '',
            'fc_name' => $req->fc_name ?? "",
            'fc_identification_number' => $req->fc_identification_number ?? "",
            'fc_address' => $req->fc_address ?? "",
            'fc_email' => $req->fc_email ?? "",
            'borrower_claim_amount' => $req->borrower_claim_amount ?? "",
            'borrower_security_interest_amount' => $req->borrower_security_interest_amount ?? "",
            'borrower_guarantee_amt' => $req->borrower_guarantee_amt ?? "",
            'borrower_guarantor_name' => $req->borrower_guarantor_name ?? "",
            'borrower_guarantor_address' => $req->borrower_guarantor_address ?? "",
            'guarantor_claim_amount' => $req->guarantor_claim_amount ?? "",
            'guarantor_security_interest_amount' => $req->guarantor_security_interest_amount ?? "",
            'guarantor_gaurantee_amt' => $req->guarantor_gaurantee_amt ?? "",
            'guarantor_principal_borrower' => $req->guarantor_principal_borrower ?? "",
            'guarantor_address_borrower' => $req->guarantor_address_borrower ?? "",
            'financial_claim_amt' => $req->financial_claim_amt ?? "",
            'financial_beneficiary_name' => $req->financial_beneficiary_name ?? "",
            'financial_beneficiary_address' => $req->financial_beneficiary_address ?? "",
            'debt_incurred_details' => $req->debt_incurred_details ?? "",
            'other_mutual_details' => $req->other_mutual_details ?? "",
            'bank_account_details' => $req->bank_account_details ?? "",
            'creditor_position' => $req->creditor_position ?? "",
            'operational_creditor_signature' => $sign ?? "",
            'signing_person_name' => $req->signing_person_name ?? "",
            'signing_address' => $req->signing_address ?? "",
            'place'=> $cl_place,
            'insolvency_commencement_date' => isset($check->insolvency_commencement_date) ? $check->insolvency_commencement_date : $formDtl->corporate_debtor_insolvency_date,
            'select_option'=>$req->select_option ?? 1,
            'unique_id' => $Bunique_id,
            'user_unique_id' => $user_unique_id,
            'year' => '',
            'dat' => '',
            'admin_id'=> '',
            'updated_date'=> '',
            
            'submitted' => 2,//isset($check->submitted) ? $check->submitted : 2,
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
         
        $sanction_date = $req->sanction_date ?? "";     
        $section_amt = $req->section_amt ?? "";   
        $other_senc_id = $req->other_senc_id ?? "";
       
       $sanct_date = $req->sanct_date ?? "";
       $sect_amt = $req->sect_amt ?? ""; 
       $othr_senc_id = $req->othr_senc_id ?? "";

        if (isset($check->id)) 
        {

            $this->senctionDetail($sanction_date, $section_amt, $other_senc_id, Config::get('site.formCSenctionMdl'), $check->id, Config::get('site.formCMdl'), 'form_c_selected_id', 'form_c_id');    
            
            $this->senctionDetail($sanct_date, $sect_amt, $othr_senc_id, Config::get('site.formCDecTblMdl'), $check->id, Config::get('site.formCMdl'), 'form_c_selected_id', 'form_c_id'); 
        }


        try
        {
            if ($check) 
            {
                
               $condition = [
                    'id'=>$check->id
                ];

                 if($check->submitted==1) 
                 {
                    $this->insertData(Config::get('site.formCMdl'),$data);
                    Session::forget('new_form_id');

                    $check2 = DB::table(Config::get('site.formCMdl'))->where([['unique_id','=', $Bunique_id],['user_id','=', $user_id]])->orderBy('id', 'desc')->first();      
                    
                    $where2 = [
                        'form_c_id' => $check->id
                    ];

                    $data4 = $this->formFilesField(Config::get('site.formCFile'),$where2, $check->form_c_selected_id, 'form_c_selected_id');
                             $this->formOtherDocFields(Config::get('site.formCOtherDoc'),$where2, $check2->id, $check->form_c_selected_id, 'form_c_selected_id', 'form_c_id');
                             $this->formSenctionFields(Config::get('site.formCSenctionMdl'),$where2, $check2->id, $check->form_c_selected_id, 'form_c_selected_id', 'form_c_id');
                            $this->formSenctionFields(Config::get('site.formCDecTblMdl'),$where2, $check2->id, $check->form_c_selected_id, 'form_c_selected_id', 'form_c_id');

                    $data2 = [
                    'form_c_id' => $check2->id,
                    'user_id' => $user_id,
                    'unique_id' => $Bunique_id,
                    'submitted' => $check2->submitted,
                    'rem_addr' => $req->ip()
                    ];
                 
                     $finalArray = array_merge($data2, $data4);
                     $this->insertData(Config::get('site.formCFile'),$finalArray);  

                    Session::put('new_form_id',$check2->id);

                    }
                    else 
                    {
                        $this->updateData(Config::get('site.formCMdl'), $data, $condition);

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

                $res = $this->getFirstRow(Config::get('site.formCMdl'), $data3);   

                if ($res) 
                {
                    $this->updateData(Config::get('site.formCMdl'), $data, ['id'=>$res->id]);

                    $dt5=[
                        'form_c_selected_id'=>$res->id,
                        'operational_creditor_signature'=>$req->file('operational_creditor_signature') ? $sign : $res->operational_creditor_signature
                    ];

                    $this->updateData(Config::get('site.formCMdl'), $dt5, ['id'=>$res->id]);

                    $res2 = $this->getFirstRow(Config::get('site.formCMdl'), $data3);

                    //echo print_r($res2);die();

                    $where3 = [
                    'user_id' => $user_id,
                    'unique_id' => $res->unique_id
                    ];
                

                    $data2 = $this->formFilesField(Config::get('site.formCFile'),$where3, $res->id, 'form_c_selected_id');

                    $data4 = [
                        'form_c_id' => $res->id,
                        'user_id' => $user_id,
                        'unique_id' => $res2->unique_id,
                        'submitted' => $res->submitted,
                        'rem_addr' => $req->ip()
                    ];
                     $finalArray = array_merge($data2, $data4);


                    $this->updateData(Config::get('site.formCFile'), $finalArray, ['form_c_id'=>$res->id]);

                }
                else
                {
                    $this->insertData(Config::get('site.formCMdl'),$data);  
                
                    $res = $this->getFirstRow(Config::get('site.formCMdl'), $data3);

                    $where3 = [
                    'user_id' => $user_id,
                    'unique_id' => $res->unique_id
                    ];
 
                    $this->updateData(Config::get('site.formCMdl'), ['form_c_selected_id'=>$res->id], ['id'=>$res->id]); 

                $data2 = $this->formFilesField(Config::get('site.formCFile'),$where3, $res->id, 'form_c_selected_id');

                $data4 = [
                    'form_c_id' => $res->id,
                    'user_id' => $user_id,
                    'unique_id' => $Bunique_id,
                    'submitted' => $res->submitted,
                    'rem_addr' => $req->ip()
                ];
                 $finalArray = array_merge($data2, $data4);

                $this->insertData(Config::get('site.formCFile'),$finalArray);

                }

                //echo print_r($res->id);
  
                
                Session::put('new_form_id',$res->id);

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


    function formCregistrationSave(Request $req)
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
        
        $check =  $this->getFirstRow(Config::get('site.formCMdl'),$where); 
        //echo print_r($check);die();
        $unique_id = uniqid().time(); 

        $form_c_id = $req->updated_data=='edit' ? Session::get('new_form_id') : $check->id;

        $where2 = [
            'user_id'=>$check->user_id,
            'unique_id'=>$check->unique_id,
            'form_c_id' => $form_c_id//$req->updated_data=='edit' ? Session::get('new_form_id') : $check->id
            // 'form_c_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id
        ];

        $check2 = $this->getFirstRow(Config::get('site.formCFile'),$where2); 

       // echo print_r($where2);die();

        $work_order_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'work_purchase_order_file', 'work_purchase_order');
        $invoice_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'invoices_file', 'invoice');
        $balance_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'balance_confirmation_file', 'balance');
        $correspondence_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'any_correspondence_file', 'correspondence');
        $authorisation_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'authorisation_letter_file', 'authorisation_letter');
        $bank_stt_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'bank_statement_file', 'stt');
        $ledger_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'ledger_copy_file', 'ledger');
        $computation_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'computation_sheet_file', 'computation_sheet');

        $pan_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'pan_number_file', 'pan');
        $passport_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'passport_file', 'passport');
        $aadhar_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'aadhar_card', 'aadhar');



        $oth_dc = $req->other_doc ?? "";     
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
        
       
       $cats = DB::table(Config::get('site.formCOtherDoc'))->select('id')->where('unique_id', $check->unique_id)->first(); 
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
                                        DB::table(Config::get('site.formCOtherDoc'))->where('id', $oldRow[$k])->update($data5);

                                }
                                } 

                        if(count($oth_dc_New)>0)
                                {         

                                    if($req->hasfile('other_doc_file'))
                                                 {
                                                    $dir = publicP()."/access/media/forms/formC/documents/".$check->unique_id;
                                                  
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
                                            'form_c_selected_id' => $check->id,
                                            'form_c_id' => $form_c_id,//Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
                                            'document_name' => $oth_dc_New[$j] ?? '',
                                            'file' =>$oth_doc_fl6[$j] ?? "",
                                            'submitted'=>2,    
                                            'unique_id' => $check->unique_id,
                                            'rem_addr' => $req->ip(),
                                            'created_at' => date('Y-m-d H:i:s'),
                                            'updated_at' => date('Y-m-d H:i:s')
                                            ];
                                          

                                       // echo print_r($data6); die();
                                         if (!empty($oth_dc_New[$j])) 
                                         {

                                           DB::table(Config::get('site.formCOtherDoc'))->insert($data6);
                                        
                                       }
                                    }             
                                   }         
                               
                                }        



                   } 
                   else
                   {
                    if($req->hasfile('other_doc_file'))
                             {
                                $dir = publicP()."/access/media/forms/formC/documents/".$check->unique_id;
                              
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
                            'form_c_selected_id' => $check->id,
                            'form_c_id' => $form_c_id,//Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
                            'document_name' => $oth_dc[$i] ?? '',
                            'file' =>$oth_doc_fl[$i] ?? "",
                            'submitted'=>$check->submitted,
                            'unique_id' => $check->unique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                            ];

                        if (!empty($oth_doc_fl[$i])) 
                        {
                            $this->insertData(Config::get('site.formCOtherDoc'),$data3); 
                        
                        }    
                        
                    } 
                    }
                }
                   
                }
        
          

 
    

        $data2 = [
            'company' => isset($check->company) ? $check->company : '',
            'irp' => isset($check->irp) ? $check->irp : '',
            'formA'  => isset($check->formA) ? $check->formA : '',
            'user_id' => $user_id,
            'form_c_selected_id' => $check->id,
            'form_c_id' =>  $form_c_id, //Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
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
                'form_c_id' => $form_c_id//$req->updated_data=='edit' ? Session::get('new_form_id') : $check->id//Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
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
                $dir = publicP()."/access/media/forms/formC/documents/".$check->unique_id;

               // echo print_r($data2);die();

                if ($check2->submitted == 2) 
                {
                    $this->updateData(Config::get('site.formCFile'), $data2, $condition);   
                }
                else
                {
                    $this->insertData(Config::get('site.formCFile'),$data2);       
                }

                $cate = $this->formBFilesHandle(Config::get('site.formCFile'), $condition, $files, $dir);
               // echo $cate; die();

                $response['error'] = false;
                $response['cls'] = 'success';
                $response['message'] = "Form submitted successfully.";
            }
            else
            {
                $this->insertData(Config::get('site.formCFile'),$data2);
               
                
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



    function formCDeclaration(Request $req)
    {
        $this->formDeclaration('finanicial_creditor_form_c_mdls', $req->updated_data, $req->fid, 'formC', Config::get('site.formCSenctionMdl'), Config::get('site.formCDecTblMdl'), 'form_c_selected_id', 'form_c_id');
    }


    function removeFormCData(Request $req, $id)
    {
        $this->removeFormData(Config::get('site.formCOtherDoc'), $id, 'formC');
    }


    function formCSignature(Request $req)
    {
        $this->getSignature(Config::get('site.formCMdl'), $req->updated_data, $req->fid, 'formC');
    }


    function getFormCUpdatedTable(Request $req)
    {
        $this->getFormUpdatedTable(Config::get('site.formCMdl'), Config::get('site.formCOtherDoc'), $req->updated_data, $req->fid, 'formC', 'form_c_id');
    }

    function getFormCUpdatedFileData(Request $req)
    {
        $this->getFormUpdatedFileData(Config::get('site.formCMdl'), Config::get('site.formCFile'), $req->updated_data, $req->fid, 'formC', 'form_c_id');
    }



     function getFormCPreview(Request $req)
    {

        $this->getFormPreview(Config::get('site.formCMdl'), Config::get('site.formCFile'), Config::get('site.formCOtherDoc'), Config::get('site.formCSenctionMdl'), Config::get('site.formCDecTblMdl'), $req->updated_data, $req->fid, 'formC', 'form_c_id'); 
	}

     function formCregistrationSubmit(Request $req, UserRegistration $userReg)
    {
        $response = array();
        $user_id = Session::get('user_id'); 
        if ($req->fid!='') 
        {
            $where = [
            'id'=> $req->updated_data=='edit' ? Session::get('new_form_id') : $req->fid  //Session::has('new_form_id') ? Session::get('new_form_id') : $req->fid //$req->fid
        ];
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }

      //  echo print_r($where);die();

        $cat = $this->getFirstRow(Config::get('site.formCMdl'),$where);

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
                'form_c_selected_id'=> ($cat->form_c_selected_id == '') ? $cat->id : $cat->form_c_selected_id,      
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
                    'table'=>Config::get('site.formCMdl'),
                    'subject'=> isset($req->notify) ? 'Form C Updation' : 'Form C Submission','Form C Submission',
                    'desc'=> isset($req->notify) ? 'you have successfully updated Form C' : 'you have successfully submitted Form C',
                    'mail_type'=>'Form C',
                ];

                $data3=[
                    'submitted'=>1
                ];

                $where3=[
                    'user_id'=>$cat->user_id,
                    'unique_id'=>$cat->unique_id,
                    'form_c_id'=> $req->updated_data=='edit' ? Session::get('new_form_id') : $req->fid,//Session::has('new_form_id') ? Session::get('new_form_id') : $cat->id,
                    'submitted'=>2
                ];

                $this->updateData(Config::get('site.formCFile'), $data3, $where3);  
                $this->updateData(Config::get('site.formCOtherDoc'), $data3, $where3); 
                $this->updateData(Config::get('site.formCSenctionMdl'), $data3, $where3); 
                $this->updateData(Config::get('site.formCDecTblMdl'), $data3, $where3);

                $userReg->send($where2, $others);
                
                }

                $this->updateData(Config::get('site.formCMdl'), $data, $where);   

                $whereCK=[
                    'submitted'=>1,
                    'user_id'=> $user_id
                ];

                $this->checkTableRecord(Config::get('site.formCMdl'), $whereCK, 'form_c_selected_id');


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
            }
        catch (Exception $e)
        {
            $response['error'] = true;
            $response['cls'] = 'danger';
            $response['message'] = "Something went wrong. Please refresh page and try again.";//$e->getMessage(); //"Something went wrong. Please refresh page and try again.";
        }
        echo json_encode($response);


    }

	function updateFile(Request $req, $id)
	{
        $this->updateFileData(Config::get('site.formCOtherDoc'), $req->index, $req->table, $req->other_doc_file, $id, 'formC');
	}


  
}


