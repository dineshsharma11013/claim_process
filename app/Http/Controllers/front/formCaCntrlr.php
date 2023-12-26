<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Services\UserRegistration;
use App\Models\financialCreditorFormCaMdl;
use Config;
use DB;
use Session;
use PDF;

class formCaCntrlr extends Controller
{
    use MethodsTrait;

    function formCaRegistration(Request $req)
    {
    	$response = array();
        $user_id = Session::get('user_id'); 
        if ($req->fid!='') 
        {
            $where = [
            'form_ca_selected_id'=>$req->form_ca_selected_id
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
        $check =  $this->getLatestRow(Config::get('site.formCaMdl'),$where); 
        if ($check) 
        {
            $Bunique_id = $check->unique_id;
            $user_unique_id = $check->user_unique_id!='' ? $check->user_unique_id : $this->gen_uid(Config::get('site.formCaMdl'));
        }
        else
        {
            $Bunique_id = $unique_id;      
            $user_unique_id = $this->gen_uid(Config::get('site.formCaMdl'));      
        }

      //  echo print_r($where);die();

        $sign = $this->uploadFile($req, $Bunique_id, Config::get('site.formCaMdl'), $where, '/access/media/forms/formCa/documents', 'fc_signature', 'sign');

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


        $data = [
            
            'company' =>$formA->company_id ?? '',// Session::has('company_id') ? Session::get('company_id') : '',
            'irp'  => $formA->user_id ?? '',//Session::has('ip_id') ? Session::get('ip_id') : '',
            'formA' => isset($check->formA) ? $check->formA : Session::get('form_a'),
            'ar'	=> $req->ar ?? "",
            'form_ca_selected_id' => isset($check->form_ca_selected_id) ? $check->form_ca_selected_id : '', 
            'form_type'=>$req->form_type ?? "",
            'formName'=>'form-ca',
            'user_id' => $user_id,
            'fc_name' => $req->fc_name ?? "",
            'fc_identification_number' => $req->fc_identification_number ?? "",
            'fc_address' => $req->fc_address ?? "",
            'fc_email' => $req->fc_email ?? "",
            'claim_amt' => $req->claim_amt ?? "",
            'claim_principle' => $req->claim_principle ?? "",
            'claim_interest' => $req->claim_interest ?? "",
            'document_details' => $req->document_details ?? "",


            'debt_incurred_details' => $req->debt_incurred_details ?? "",
            'other_mutual_details' => $req->other_mutual_details ?? "",
            'security_held' => $req->security_held ?? "",

            'bank_account_number' => $req->bank_account_number ?? "",
            'bank_name' => $req->bank_name ?? "",
            'bank_ifsc_code'=> $req->bank_ifsc_code ?? "",
            'insolvency_professional_name' =>$req->insolvency_professional_name ?? "",
            
            'fc_signature' => $sign ?? "",
            'signing_person_name' => $req->creditor_name ?? "",
            'creditor_position' => $req->creditor_position ?? "",
            
            'signing_address' => $req->creditor_address ?? "",
            'place'=> $cl_place,
            'insolvency_commencement_date' => isset($check->insolvency_commencement_date) ? $check->insolvency_commencement_date : $formA->corporate_debtor_insolvency_date,
            'select_option'=>$req->select_option ?? 1,   
            'unique_id' => $Bunique_id,
            'user_unique_id' => $user_unique_id,
            'year' => '',
            'dat' => '',
            'admin_id'=> '',
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
            'created_at' => date('Y-m-d H:i:s'),
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

            $this->senctionDetail($sanction_date, $section_amt, $other_senc_id, Config::get('site.formCASenctionMdl'), $check->id, Config::get('site.formCaMdl'), 'form_ca_selected_id', 'form_ca_id');    
            
            $this->senctionDetail($sanct_date, $sect_amt, $othr_senc_id, Config::get('site.formCADecTblMdl'), $check->id, Config::get('site.formCaMdl'), 'form_ca_selected_id', 'form_ca_id'); 
        }
        
        
        try
        {
            if ($check) 
            {
                 $condition = [
                    'id'=>$check->id
                ];
               

              if ($check->submitted==1) {    
                   $this->insertData(Config::get('site.formCaMdl'),$data);

                   Session::forget('new_form_id');  
                    $check2 = DB::table(Config::get('site.formCaMdl'))->where([['unique_id','=', $Bunique_id],['user_id','=', $user_id]])->orderBy('id', 'desc')->first();      
                    
                    $where2 = [
                        'form_ca_id' => $check->id
                    ];

                    $data4 = $this->formFilesField(Config::get('site.formCaFile'),$where2, $check->form_ca_selected_id, 'form_ca_selected_id');
                            $this->formOtherDocFields(Config::get('site.formCaOtherDoc'),$where2, $check2->id, $check->form_ca_selected_id, 'form_ca_selected_id', 'form_ca_id');
                            $this->formSenctionFields(Config::get('site.formCASenctionMdl'),$where2, $check2->id, $check->form_ca_selected_id, 'form_ca_selected_id', 'form_ca_id');
                             $this->formSenctionFields(Config::get('site.formCADecTblMdl'),$where2, $check2->id, $check->form_ca_selected_id, 'form_ca_selected_id', 'form_ca_id');

                   // $res = $this->getFirstRow(Config::get('site.formCaMdl'), $data3);   
                    //echo print_r($data4); die();
                    $data2 = [
                    'form_ca_id' => $check2->id,
                    'user_id' => $user_id,
                    'unique_id' => $Bunique_id,
                    'submitted' => $check2->submitted,
                    'rem_addr' => $req->ip()
                    ];
                     $finalArray = array_merge($data2, $data4);
                     $this->insertData(Config::get('site.formCaFile'),$finalArray);  

                        Session::put('new_form_id',$check2->id); 
                    }  
                    else
                    {
                        $this->updateData(Config::get('site.formCaMdl'), $data, $condition); 
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

                $res = $this->getFirstRow(Config::get('site.formCaMdl'), $data3);   

               // echo print_r($res);die();

                if ($res) 
                {
                    $this->updateData(Config::get('site.formCaMdl'), $data, ['id'=>$res->id]);

                    $dt5=[
                        'form_ca_selected_id'=>$res->id,
                        'fc_signature'=>$req->file('fc_signature') ? $sign : $res->fc_signature
                    ];

                    $this->updateData(Config::get('site.formCaMdl'), $dt5, ['id'=>$res->id]);

                    $res2 = $this->getFirstRow(Config::get('site.formCaMdl'), $data3);

                    // echo print_r($res2);die();

                    $where3 = [
                    'user_id' => $user_id,
                    'unique_id' => $res->unique_id
                    ];
                

                    $data2 = $this->formFilesField(Config::get('site.formCaFile'),$where3, $res->id, 'form_ca_selected_id');

                    $data4 = [
                        'form_ca_id' => $res->id,
                        'user_id' => $user_id,
                        'unique_id' => $res->unique_id,
                        'submitted' => $res->submitted,
                        'rem_addr' => $req->ip()
                    ];
                     $finalArray = array_merge($data2, $data4);


                    $this->updateData(Config::get('site.formCaFile'), $finalArray, ['form_ca_id'=>$res->id,'submitted'=>2,'user_id'=>$user_id]);
                    //$this->updateData(Config::get('site.formCaOtherDoc'), ['unique_id'=>$res->unique_id], ['form_ca_id'=>$res->id,'submitted'=>2,'user_id'=>$user_id]);

                }
                else
                {
                    $this->insertData(Config::get('site.formCaMdl'),$data);    
                
                    $res = $this->getFirstRow(Config::get('site.formCaMdl'), $data3);
                    
                    $where3 = [
                    'user_id' => $user_id,
                    'unique_id' => $res->unique_id
                    ];

                 $this->updateData(Config::get('site.formCaMdl'), ['form_ca_selected_id'=>$res->id], ['id'=>$res->id]);   

                $data2 = $this->formFilesField(Config::get('site.formCaFile'),$where3, $res->id, 'form_ca_selected_id');

                $data4 = [
                    'form_ca_id' => $res->id,
                    'user_id' => $user_id,
                    'unique_id' => $Bunique_id,
                    'submitted' => $res->submitted,
                    'rem_addr' => $req->ip()
                ];
                 $finalArray = array_merge($data2, $data4);

                $this->insertData(Config::get('site.formCaFile'),$finalArray);

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


    


    function formCaregistrationSave(Request $req)
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

        
        
        $check =  $this->getFirstRow(Config::get('site.formCaMdl'),$where); 
        
        $unique_id = uniqid().time(); 

        $where2 = [
            'user_id'=>$check->user_id,
            'unique_id'=>$check->unique_id,
            'form_ca_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id
        ];

        $check2 = $this->getFirstRow(Config::get('site.formCaFile'),$where2); 


        $work_order_file = $this->uploadFile($req, $unique_id, Config::get('site.formCaFile'), $where2, '/access/media/forms/formCa/documents', 'work_purchase_order_file', 'work_purchase_order');
        $invoice_file = $this->uploadFile($req, $unique_id, Config::get('site.formCaFile'), $where2, '/access/media/forms/formCa/documents', 'invoices_file', 'invoice');
        $balance_file = $this->uploadFile($req, $unique_id, Config::get('site.formCaFile'), $where2, '/access/media/forms/formCa/documents', 'balance_confirmation_file', 'balance');
        $correspondence_file = $this->uploadFile($req, $unique_id, Config::get('site.formCaFile'), $where2, '/access/media/forms/formCa/documents', 'any_correspondence_file', 'correspondence');
        $authorisation_file = $this->uploadFile($req, $unique_id, Config::get('site.formCaFile'), $where2, '/access/media/forms/formCa/documents', 'authorisation_letter_file', 'authorisation_letter');
        $bank_stt_file = $this->uploadFile($req, $unique_id, Config::get('site.formCaFile'), $where2, '/access/media/forms/formCa/documents', 'bank_statement_file', 'stt');
        $ledger_file = $this->uploadFile($req, $unique_id, Config::get('site.formCaFile'), $where2, '/access/media/forms/formCa/documents', 'ledger_copy_file', 'ledger');
        $computation_file = $this->uploadFile($req, $unique_id, Config::get('site.formCaFile'), $where2, '/access/media/forms/formCa/documents', 'computation_sheet_file', 'computation_sheet');

        $pan_file = $this->uploadFile($req, $unique_id, Config::get('site.formCaFile'), $where2, '/access/media/forms/formCa/documents', 'pan_number_file', 'pan');
        $passport_file = $this->uploadFile($req, $unique_id, Config::get('site.formCaFile'), $where2, '/access/media/forms/formCa/documents', 'passport_file', 'passport');
        $aadhar_file = $this->uploadFile($req, $unique_id, Config::get('site.formCaFile'), $where2, '/access/media/forms/formCa/documents', 'aadhar_card', 'aadhar');



        $oth_dc = $req->other_doc;     
        $other_doc_id = $req->other_doc_id ?? "";      
        
        $this->fileHandling($req, Config::get('site.formCaOtherDoc'), $oth_dc, $other_doc_id, 'form_ca_selected_id', 'form_ca_id', 'formCa', 'other_doc_file', $where, Config::get('site.formCaMdl'));
 
    

        $data2 = [
            'company' => isset($check->company) ? $check->company : '',
            'irp' => isset($check->irp) ? $check->irp : '',
            'formA'  => isset($check->formA) ? $check->formA : '',
            'user_id' => $user_id,
            'form_ca_selected_id' => $check->form_ca_selected_id ? $check->form_ca_selected_id : $check->id,
            'form_ca_id' =>  Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
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
                'form_ca_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
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
                $dir = publicP()."/access/media/forms/formCa/documents/".$check->unique_id;

                if ($check2->submitted == 2) 
                {
                   $this->updateData(Config::get('site.formCaFile'), $data2, $condition); 
                }
                else
                {
                    $this->insertData(Config::get('site.formCaFile'),$data2);      
                }               
         

                $response['error'] = false;
                $response['cls'] = 'success';
                $response['message'] = "Form submitted successfully.";
            }
            else
            {
                $this->insertData(Config::get('site.formCaFile'),$data2);
               
                
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


    function formCaDeclaration(Request $req)
    {

        $this->formDeclaration('financial_creditor_form_ca_mdls', $req->updated_data, $req->fid, 'formCa', Config::get('site.formCASenctionMdl'), Config::get('site.formCADecTblMdl'), 'form_ca_selected_id', 'form_ca_id');
    }

    function formCaRegistrationSubmit(Request $req, UserRegistration $userReg)
    {
        $response = array();
        $user_id = Session::get('user_id'); 
        if ($req->fid!='') 
        {
            $where = [
            'id'=> Session::has('new_form_id') ? Session::get('new_form_id') : $req->fid    //$req->fid
        ];
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }



        $cat = $this->getFirstRow(Config::get('site.formCaMdl'),$where);

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
             //   'form_ca_selected_id'=> ($cat->form_ca_selected_id == '') ? $cat->id : $cat->form_ca_selected_id,         
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
                    'table'=>Config::get('site.formCaMdl'),
                    'subject'=> isset($req->notify) ? 'Form CA Updation' : 'Form CA Submission',
                    'desc'=> isset($req->notify) ? 'you have successfully updated Form CA' : 'you have successfully submitted Form CA',
                    'mail_type'=>'Form CA',
                ];

                $data3=[
                    'submitted'=>1
                ];

                $where3=[
                    'user_id'=>$cat->user_id,
                    'unique_id'=>$cat->unique_id,
                    'form_ca_id'=> Session::has('new_form_id') ? Session::get('new_form_id') : $cat->id,
                    'submitted'=>2
                ];

                    $this->updateData(Config::get('site.formCaFile'), $data3, $where3);  
                    $this->updateData(Config::get('site.formCaOtherDoc'), $data3, $where3); 
                    $this->updateData(Config::get('site.formCASenctionMdl'), $data3, $where3); 
                    $this->updateData(Config::get('site.formCADecTblMdl'), $data3, $where3);

                    $userReg->send($where2, $others);  

                }

                $this->updateData(Config::get('site.formCaMdl'), $data, $where);        


                $whereCK=[
                    'submitted'=>1,
                    'user_id'=> $user_id
                ];

                $this->checkTableRecord(Config::get('site.formCaMdl'), $whereCK, 'form_ca_selected_id');          


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

    function formCASignature(Request $req)
    {
        $this->getSignature(Config::get('site.formCaMdl'), $req->updated_data, $req->fid, 'formCa');
    }

    function removeFormCaData(Request $req, $id)
    {
        $this->removeFormData(Config::get('site.formCaOtherDoc'), $id, 'formCa');
    }

    function getFormCaUpdatedTable(Request $req)
    {
        $this->getFormUpdatedTable(Config::get('site.formCaMdl'), Config::get('site.formCaOtherDoc'), $req->updated_data, $req->fid, 'formCa', 'form_ca_id');
    }

    function getFormCaUpdatedFileData(Request $req)
    {
        $this->getFormUpdatedFileData(Config::get('site.formCaMdl'), Config::get('site.formCaFile'), $req->updated_data, $req->fid, 'formCa', 'form_ca_id'); 
    }

     function getFormCaPreview(Request $req)
    {
        $this->getFormPreview(Config::get('site.formCaMdl'), Config::get('site.formCaFile'), Config::get('site.formCaOtherDoc'), Config::get('site.formCASenctionMdl'), Config::get('site.formCADecTblMdl'), $req->updated_data, $req->fid, 'formCa', 'form_ca_id');   
	}

	function updateFile(Request $req, $id)
	{
        $this->updateFileData(Config::get('site.formCaOtherDoc'), $req->index, $req->table, $req->other_doc_file, $id, 'formCa');
	}
}
