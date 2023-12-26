<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Services\UserRegistration;
use App\Models\formDMdls;
use Config;
use DB;
use Session;
use PDF;

class formDCntrlr extends Controller
{
    use MethodsTrait;


	function formDRegistration(Request $req)
    {
  
        $response = array();
        $user_id = Session::get('user_id'); 
        if ($req->fid!='') 
        {
            $where = [
            //'id'=>$req->fid
            'form_d_selected_id'=>$req->form_d_selected_id

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
       // $check =  $this->getFirstRow(Config::get('site.formDMdl'),$where);
       $check =  $this->getLatestRow(Config::get('site.formDMdl'),$where); 


      //  echo print_r($where); die();    

        if ($check) 
        {
            $Bunique_id = $check->unique_id;
            $user_unique_id = $check->user_unique_id!='' ? $check->user_unique_id : $this->gen_uid(Config::get('site.formDMdl'));
        }
        else
        {
            $Bunique_id = $unique_id;
            $user_unique_id = $this->gen_uid(Config::get('site.formDMdl'));
        }

        $sign = $this->uploadFile($req, $Bunique_id, Config::get('site.formDMdl'), $where, '/access/media/forms/formD/documents', 'operational_creditor_signature', 'sign');

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
           
            'company' =>$formA->company_id ?? '',//Session::has('company_id') ? Session::get('company_id') : '',
            'irp'  => $formA->user_id ?? '',//Session::has('ip_id') ? Session::get('ip_id') : '',
            'formA' => isset($check->formA) ? $check->formA : Session::get('form_a'),
            'user_id' => $user_id,
            'form_type'=>$req->form_type ?? "",
            'formName'=>'form-d',
            'ar'=> $req->ar ?? "",
            'form_d_selected_id' => isset($check->form_d_selected_id) ? $check->form_d_selected_id : '',
            
                'name'=>$req->name ?? "",
                'pancard_no'=>$req->pancard ?? "",
                'passport_no'=>$req->passport ?? "",
                'voter_id_no'=>$req->voter_id ?? "",
                'aadhar_no'=>$req->aadhar ?? "",
                'address'=>$req->address ?? "",
                'email'=>$req->email ?? "",
                'total_amount'=>$req->total_amount ?? "",
                'principle'=>$req->principle ?? "",
                'intrest'=>$req->interest ?? "",
                'details_of_documents'=>$req->details_of_documents ?? "",
                'dispute_details'=>$req->dispute ?? "",
                'claim_arose_details'=>$req->claim ?? "",
                'mutual_credit_details'=>$req->mutual_credit ?? "",
                'account_no'=>$req->account_number ?? "",
                'bank_name'=>$req->bank_name ?? "",
                'ifsc_code'=>$req->ifsc ?? "",
                'name_in_block_letter'=>$req->name_block_letter ?? "",
                'relation_to_creditor'=>$req->relation_to_creditor ?? "",
                'address_person_signing'=>$req->address_person_signing ?? "",
                'operational_creditor_signature' => $sign ?? "",

                'place'=> $cl_place,
                'insolvency_commencement_date' => isset($check->insolvency_commencement_date) ? $check->insolvency_commencement_date : $formDtl->corporate_debtor_insolvency_date,
                'select_option'=>$req->select_option ?? 1,
            'unique_id' => $Bunique_id,
            'user_unique_id'=>$user_unique_id,
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

            $this->senctionDetail($sanction_date, $section_amt, $other_senc_id, Config::get('site.formDSenctionMdl'), $check->id, Config::get('site.formDMdl'), 'form_d_selected_id', 'form_d_id');    
            
            $this->senctionDetail($sanct_date, $sect_amt, $othr_senc_id, Config::get('site.formDDecTblMdl'), $check->id, Config::get('site.formDMdl'), 'form_d_selected_id', 'form_d_id'); 
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
                    
                    $this->insertData(Config::get('site.formDMdl'),$data);
                    Session::forget('new_form_id');

                    $check2 = DB::table(Config::get('site.formDMdl'))->where([['unique_id','=', $Bunique_id],['user_id','=', $user_id]])->orderBy('id', 'desc')->first();      
                    
                    $where2 = [
                        'form_d_id' => $check->id
                    ];
                             
                    $data4 = $this->formFilesField(Config::get('site.formDFile'),$where2, $check->form_d_selected_id, 'form_d_selected_id');
                             $this->formOtherDocFields(Config::get('site.formDOtherDoc'),$where2, $check2->id, $check->form_d_selected_id, 'form_d_selected_id', 'form_d_id');
                             $this->formSenctionFields(Config::get('site.formDSenctionMdl'),$where2, $check2->id, $check->form_d_selected_id, 'form_d_selected_id', 'form_d_id');
                             $this->formSenctionFields(Config::get('site.formDDecTblMdl'),$where2, $check2->id, $check->form_d_selected_id, 'form_d_selected_id', 'form_d_id');

                    $data2 = [
                    'form_d_id' => $check2->id,
                    'user_id' => $user_id,
                    'unique_id' => $Bunique_id,
                    'submitted' => $check2->submitted,
                    'rem_addr' => $req->ip()
                    ];
                 
                    $finalArray = array_merge($data2, $data4);
                    $this->insertData(Config::get('site.formDFile'),$finalArray);  

                    Session::put('new_form_id',$check2->id);

                    }
                    else 
                    {
                        $this->updateData(Config::get('site.formDMdl'), $data, $condition);
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

               $res = $this->getFirstRow(Config::get('site.formDMdl'), $data3);    
               if ($res)
               {
                $this->updateData(Config::get('site.formDMdl'), $data, ['id'=>$res->id]);

                    $dt5=[
                        'form_d_selected_id'=>$res->id,
                        'operational_creditor_signature'=>$req->file('operational_creditor_signature') ? $sign : $res->operational_creditor_signature
                    ];

                    $this->updateData(Config::get('site.formDMdl'), $dt5, ['id'=>$res->id]);

                    $res2 = $this->getFirstRow(Config::get('site.formDMdl'), $data3);

                    // echo print_r($res2);die();

                    $where3 = [
                    'user_id' => $user_id,
                    'unique_id' => $res->unique_id
                    ];
                

                    $data2 = $this->formFilesField(Config::get('site.formDFile'),$where3, $res->id, 'form_d_selected_id');

                    $data4 = [
                        'form_d_id' => $res->id,
                        'user_id' => $user_id,
                        'unique_id' => $res->unique_id,
                        'submitted' => $res->submitted,
                        'rem_addr' => $req->ip()
                    ];
                     $finalArray = array_merge($data2, $data4);


                    $this->updateData(Config::get('site.formDFile'), $finalArray, ['form_d_id'=>$res->id,'submitted'=>2,'user_id'=>$user_id]);
               }
               else 
               {
                   
                $this->insertData(Config::get('site.formDMdl'),$data);        

                $res = $this->getFirstRow(Config::get('site.formDMdl'), $data3);   

                $where3 = [
                    'user_id' => $user_id,
                    'unique_id' => $res->unique_id
                ];    

                $this->updateData(Config::get('site.formDMdl'), ['form_d_selected_id'=>$res->id], ['id'=>$res->id]); 

                $data2 = $this->formFilesField(Config::get('site.formDFile'),$where3, $res->id, 'form_d_selected_id');

                $data4 = [
                    'form_d_id' => $res->id,
                    'user_id' => $user_id,
                    'unique_id' => $Bunique_id,
                    'submitted' => $res->submitted,
                    'rem_addr' => $req->ip()
                ];
                 $finalArray = array_merge($data2, $data4);

                $this->insertData(Config::get('site.formDFile'),$finalArray);  
                }    

                Session::put('new_form_id',$res->id);

                $response['error'] = false;
                $response['message'] = Session::get('new_form_id')." Data saved successfully.";
            }
        }
        catch (Exception $e)
        {
            $response['error'] = true;
            $response['message'] = $e->getMessage(); //"Something went wrong. Please refresh page and try again.";
        }
        
        echo json_encode($response);
    }




    function formDregistrationSave(Request $req)
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

        
        
        $check =  $this->getFirstRow(Config::get('site.formDMdl'),$where); 
        
        $unique_id = uniqid().time(); 

        $where2 = [
            'user_id'=>$check->user_id,
            'unique_id'=>$check->unique_id,
            'form_d_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id
        ];

        $check2 = $this->getFirstRow(Config::get('site.formDFile'),$where2); 

        //echo print_r($check2);die();

        $work_order_file = $this->uploadFile($req, $unique_id, Config::get('site.formDFile'), $where2, '/access/media/forms/formD/documents', 'work_purchase_order_file', 'work_purchase_order');
        $invoice_file = $this->uploadFile($req, $unique_id, Config::get('site.formDFile'), $where2, '/access/media/forms/formD/documents', 'invoices_file', 'invoice');
        $balance_file = $this->uploadFile($req, $unique_id, Config::get('site.formDFile'), $where2, '/access/media/forms/formD/documents', 'balance_confirmation_file', 'balance');
        $correspondence_file = $this->uploadFile($req, $unique_id, Config::get('site.formDFile'), $where2, '/access/media/forms/formD/documents', 'any_correspondence_file', 'correspondence');
        $authorisation_file = $this->uploadFile($req, $unique_id, Config::get('site.formDFile'), $where2, '/access/media/forms/formD/documents', 'authorisation_letter_file', 'authorisation_letter');
        $bank_stt_file = $this->uploadFile($req, $unique_id, Config::get('site.formDFile'), $where2, '/access/media/forms/formD/documents', 'bank_statement_file', 'stt');
        $ledger_file = $this->uploadFile($req, $unique_id, Config::get('site.formDFile'), $where2, '/access/media/forms/formD/documents', 'ledger_copy_file', 'ledger');
        $computation_file = $this->uploadFile($req, $unique_id, Config::get('site.formDFile'), $where2, '/access/media/forms/formD/documents', 'computation_sheet_file', 'computation_sheet');

        $pan_file = $this->uploadFile($req, $unique_id, Config::get('site.formDFile'), $where2, '/access/media/forms/formD/documents', 'pan_number_file', 'pan');
        $passport_file = $this->uploadFile($req, $unique_id, Config::get('site.formDFile'), $where2, '/access/media/forms/formD/documents', 'passport_file', 'passport');
        $aadhar_file = $this->uploadFile($req, $unique_id, Config::get('site.formDFile'), $where2, '/access/media/forms/formD/documents', 'aadhar_card', 'aadhar');

     //   echo print_r($req->work_purchase_order);die();

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
        
       
       $cats = DB::table(Config::get('site.formDOtherDoc'))->select('id')->where('unique_id', $check->unique_id)->first(); 
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
                                        DB::table(Config::get('site.formDOtherDoc'))->where('id', $oldRow[$k])->update($data5);
                               
                                }

                                } 

                        if(count($oth_dc_New)>0)
                                {         

                                    if($req->hasfile('other_doc_file'))
                                                 {
                                                    $dir = publicP()."/access/media/forms/formD/documents/".$check->unique_id;
                                                  
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
                                            'form_d_selected_id' => $check->form_d_selected_id ? $check->form_d_selected_id : $check->id,
                                            'form_d_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
                                            'document_name' => $oth_dc_New[$j] ?? '',
                                            'file' =>$oth_doc_fl6[$j] ?? "",
                                            'submitted'=>2,
                                            'unique_id' => $check->unique_id,
                                            'rem_addr' => $req->ip(),
                                            'created_at' => date('Y-m-d H:i:s'),
                                            'updated_at' => date('Y-m-d H:i:s')
                                            ];

                                          if (!empty($oth_dc_New[$j])) 
                                         {

                                       // echo print_r($data6); die();
                                           DB::table(Config::get('site.formDOtherDoc'))->insert($data6);
                                       }
                                    }             
                                   }         
                               
                                }        



                   } 
                   else
                   {
                        if($req->hasfile('other_doc_file'))
                             {
                                $dir = publicP()."/access/media/forms/formD/documents/".$check->unique_id;
                              
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
                            'form_d_selected_id' => $check->form_d_selected_id ? $check->form_d_selected_id : $check->id,
                            'form_d_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
                            'document_name' => $oth_dc[$i] ?? '',
                            'file' =>$oth_doc_fl[$i] ?? "",
                            'submitted'=>$check->submitted,
                            'unique_id' => $check->unique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                            ];

                         $this->insertData(Config::get('site.formDOtherDoc'),$data3);    
                        // if (!empty($oth_doc_fl[$i])) 
                        // {
                        //     $this->insertData(Config::get('site.formDOtherDoc'),$data3); 
                        

                        //     $log = [
                        //                     'user_type' => Session::has('admin_id') ? Config::get('site.adminType') : Config::get('site.userType'),
                        //                     'user_id' => Session::has('admin_id') ? Session::get('admin_id') : Session::get('user_id'),
                        //                     'page_name' => 'Form C',
                        //                     'page_url' => url()->current(),
                        //                     'mthd' => Route::getCurrentRoute()->getActionName(),
                        //                     'action' => Config::get('site.action_insert'),
                        //                     'action_output' => Config::get('site.action_success'),
                        //                     'err' => '',
                        //                     'err_msg' => '',
                        //                     'rem_addr' => $req->ip(),
                        //                     'date' => date('Y-m-d'),
                        //                     'created_at' => date('Y-m-d H:i:s'),
                        //                     'updated_at' => date('Y-m-d H:i:s'),
                        //                 ];

                        //                 $this->insertData(Config::get('site.logMdl'),$log); 

                        // }    
                        
                    } 
                    }
                }
                   }
     
        
          

 
    

        $data2 = [
            'company' => isset($check->company) ? $check->company : '',
            'irp' => isset($check->irp) ? $check->irp : '',
            'formA'  => isset($check->formA) ? $check->formA : '',
            'user_id' => $user_id,
            'form_d_selected_id' => $check->form_d_selected_id ? $check->form_d_selected_id : $check->id,
            'form_d_id' =>  Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,

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
                'form_d_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
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
                $dir = publicP()."/access/media/forms/formD/documents/".$check->unique_id;

                if ($check2->submitted == 2) 
                {
                    $this->updateData(Config::get('site.formDFile'), $data2, $condition);   
                }
                else
                {
                    $this->insertData(Config::get('site.formDFile'),$data2);       
                }


                $response['error'] = false;
                $response['cls'] = 'success';
                $response['message'] = "Form submitted successfully.";
            }
            else
            {
                $this->insertData(Config::get('site.formDFile'),$data2);
               
                
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


    function formDDeclaration(Request $req)
    {
        $this->formDeclaration('form_d_mdls', $req->updated_data, $req->fid, 'formD', Config::get('site.formDSenctionMdl'), Config::get('site.formDDecTblMdl'), 'form_d_selected_id', 'form_d_id');
    }

    function removeFormDData(Request $req, $id)
    {
        $this->removeFormData(Config::get('site.formDOtherDoc'), $id, 'formD');
    }

    function formDSignature(Request $req)
    {
        $this->getSignature(Config::get('site.formDMdl'), $req->updated_data, $req->fid, 'formD');
    }

    function getFormDUpdatedTable(Request $req)
    {
        $this->getFormUpdatedTable(Config::get('site.formDMdl'), Config::get('site.formDOtherDoc'), $req->updated_data, $req->fid, 'formD', 'form_d_id');
    }

    function getFormDUpdatedFileData(Request $req)
    {
        $this->getFormUpdatedFileData(Config::get('site.formDMdl'), Config::get('site.formDFile'), $req->updated_data, $req->fid, 'formD', 'form_d_id'); 
    }



     function getFormDPreview(Request $req)
    {
        $this->getFormPreview(Config::get('site.formDMdl'), Config::get('site.formDFile'), Config::get('site.formDOtherDoc'), Config::get('site.formDSenctionMdl'), Config::get('site.formDDecTblMdl'), $req->updated_data, $req->fid, 'formD', 'form_d_id'); 
	}

     function formDRegistrationSubmit(Request $req, UserRegistration $userReg)
    {
        $response = array();
        $user_id = Session::get('user_id'); 
        if ($req->fid!='') 
        {
            $where = [
            'id'=> Session::has('new_form_id') ? Session::get('new_form_id') : $req->fid //$req->fid
        ];
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }


        $cat = $this->getFirstRow(Config::get('site.formDMdl'),$where);

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
                    'table'=>Config::get('site.formDMdl'),
                    'subject'=> isset($req->notify) ? 'Form D Updation' : 'Form D Submission',
                    'desc'=> isset($req->notify) ? 'you have successfully updated Form D' : 'you have successfully submitted Form D',
                    'mail_type'=>'Form D',
                ];

                $data3=[
                    'submitted'=>1
                ];

                $where3=[
                    'user_id'=>$cat->user_id,
                    'unique_id'=>$cat->unique_id,
                    'form_d_id'=> Session::has('new_form_id') ? Session::get('new_form_id') : $cat->id,
                    'submitted'=>2
                ];

                $this->updateData(Config::get('site.formDFile'), $data3, $where3);  
                $this->updateData(Config::get('site.formDOtherDoc'), $data3, $where3); 
                $this->updateData(Config::get('site.formDSenctionMdl'), $data3, $where3); 
                $this->updateData(Config::get('site.formDDecTblMdl'), $data3, $where3);

                $userReg->send($where2, $others);

                }

                $this->updateData(Config::get('site.formDMdl'), $data, $where);   


                $whereCK=[
                    'submitted'=>1,
                    'user_id'=> $user_id
                ];

                $this->checkTableRecord(Config::get('site.formDMdl'), $whereCK, 'form_d_selected_id');

            
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
        $this->updateFileData(Config::get('site.formDOtherDoc'), $req->index, $req->table, $req->other_doc_file, $id, 'formD');     	
	}
}
