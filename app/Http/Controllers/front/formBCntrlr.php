<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Services\UserRegistration;
use App\Models\operationalCreditorMdl;
use Config;
use DB;
use Session;
use PDF;

class formBCntrlr extends Controller
{
    use MethodsTrait;

    function formBregistration(Request $req)
    {
        $response = array();
        $user_id = Session::get('user_id'); 
        
        if ($req->fid!='') 
        {
            $where = [
            //'id'=>$req->fid
               'form_b_selected_id'=>$req->form_b_selected_id
               //'submitted'=>1 

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
        $check =  $this->getLatestRow(Config::get('site.formBMdl'),$where); 
  

       // echo print_r($check);die();

        if ($check) 
        {
            $Bunique_id = $check->unique_id;
            $user_unique_id = $check->user_unique_id!='' ? $check->user_unique_id : $this->gen_uid(Config::get('site.formBMdl'));
        }
        else
        {
            $Bunique_id = $unique_id; 
            $user_unique_id = $this->gen_uid(Config::get('site.formBMdl'));
        }


        $sign = $this->uploadFile($req, $Bunique_id, Config::get('site.formBMdl'), $where, '/access/media/forms/formB/documents', 'operational_creditor_signature', 'sign');
       // echo print_r($sign); die();

       // echo $sign;die();

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

        if (isset($req->select_option)) 
        {
            $select_option = $req->select_option;
        }
        elseif (isset($check->select_option)) 
        {
            $select_option =  $check->select_option;
        }
        else
        {
            $select_option = 1;
        }

        $data = [
           
            'company' => $formA->company_id ?? '',  //Session::has('company_id') ? Session::get('company_id') : '',
            'irp'  => $formA->user_id ?? '', //Session::has('ip_id') ? Session::get('ip_id') : '',
            'formA' => isset($check->formA) ? $check->formA : Session::get('form_a'),
            'user_id' => $user_id,
            'form_type'=>$req->form_type ?? "",
            'formName'=>'form-b',
            'ar'=> $req->ar ?? "",
            'form_b_selected_id' => isset($check->form_b_selected_id) ? $check->form_b_selected_id : '', 
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
            'claimant_name' => isset($req->claimant_name) ? $req->claimant_name : "",
            'creditor_relation' => $req->creditor_relation ?? "",
            'signing_person_address' => $req->signing_person_address ?? "",
            
            'unique_id' => $Bunique_id,
            'user_unique_id' => $user_unique_id,
            
            'year' => '',
            'dat' => '',
            'place'=> $cl_place,
            'insolvency_commencement_date' => isset($check->insolvency_commencement_date) ? $check->insolvency_commencement_date : $formA->corporate_debtor_insolvency_date,
            'select_option'=>$select_option,
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

      // echo print_r($sanction_date); die();

        if (isset($check->id)) 
        {

            $this->senctionDetail($sanction_date, $section_amt, $other_senc_id, Config::get('site.formBSenctionMdl'), $check->id, Config::get('site.formBMdl'), 'form_b_selected_id', 'form_b_id');    
            
            $this->senctionDetail($sanct_date, $sect_amt, $othr_senc_id, Config::get('site.formBDecTblMdl'), $check->id, Config::get('site.formBMdl'), 'form_b_selected_id', 'form_b_id'); 
        }

        //echo print_r($where); die();


        try
        {
            if ($check) 
            {
                 $condition = [
                    'id'=>$check->id
                ];
               

                // if ($check->submitted==1 && $check->status == 1) {   
                if ($check->submitted==1) {  
                   $this->insertData(Config::get('site.formBMdl'),$data);

                

                   Session::forget('new_form_id');  
                    $check2 = DB::table(Config::get('site.formBMdl'))->where([['unique_id','=', $Bunique_id],['user_id','=', $user_id]])->orderBy('id', 'desc')->first();      
                    
                    $where2 = [
                        'form_b_id' => $check->id
                    ];

                    //print_r($where2);die();

                    $data4 = $this->formFilesField(Config::get('site.formBFile'),$where2, $check->form_b_selected_id, 'form_b_selected_id');
                            $this->formOtherDocFields(Config::get('site.formBOtherDoc'),$where2, $check2->id, $check->form_b_selected_id, 'form_b_selected_id', 'form_b_id');
                            $this->formSenctionFields(Config::get('site.formBSenctionMdl'),$where2, $check2->id, $check->form_b_selected_id, 'form_b_selected_id', 'form_b_id');
                             $this->formSenctionFields(Config::get('site.formBDecTblMdl'),$where2, $check2->id, $check->form_b_selected_id, 'form_b_selected_id', 'form_b_id');        


                    $data2 = [
                    'form_b_id' => $check2->id,
                    'user_id' => $user_id,
                    'unique_id' => $Bunique_id,
                    'submitted' => $check2->submitted,
                    'rem_addr' => $req->ip()
                ];
                 $finalArray = array_merge($data2, $data4);
                 $this->insertData(Config::get('site.formBFile'),$finalArray);  

                    Session::put('new_form_id',$check2->id); 
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
                    'user_id' => $user_id,
                    'submitted'=>2
                ];

                $res = $this->getFirstRow(Config::get('site.formBMdl'), $data3);  

                if ($res) 
                {
                    $this->updateData(Config::get('site.formBMdl'), $data, ['id'=>$res->id]);

                    $dt5=[
                        'form_b_selected_id'=>$res->id,
                        'operational_creditor_signature'=>$req->file('operational_creditor_signature') ? $sign : $res->operational_creditor_signature
                    ];

                    $this->updateData(Config::get('site.formBMdl'), $dt5, ['id'=>$res->id]);

                    $res2 = $this->getFirstRow(Config::get('site.formBMdl'), $data3);

                  //  echo print_r($res2);die();

                    $where3 = [
                    'user_id' => $user_id,
                    'unique_id' => $res->unique_id
                    ];
                

                    $data2 = $this->formFilesField(Config::get('site.formBFile'),$where3, $res->id, 'form_b_selected_id'); 

                    $data4 = [
                        'form_b_id' => $res->id,
                        'user_id' => $user_id,
                        'unique_id' => $res2->unique_id,
                        'submitted' => $res->submitted,
                        'rem_addr' => $req->ip()
                    ];
                     $finalArray = array_merge($data2, $data4);


                    $this->updateData(Config::get('site.formBMdl'), $finalArray, ['form_b_id'=>$res->id]);
                }
                else
                {

                $this->insertData(Config::get('site.formBMdl'),$data);
                 
                $res = $this->getFirstRow(Config::get('site.formBMdl'), $data3);

                $where3 = [
                    'user_id' => $user_id,
                    'unique_id' => $res->unique_id
                ];    

                $this->updateData(Config::get('site.formBMdl'), ['form_b_selected_id'=>$res->id], ['id'=>$res->id]); 

                $data2 = $this->formFilesField(Config::get('site.formBFile'),$where3, $res->id, 'form_b_selected_id');

                $data4 = [
                    'form_b_id' => $res->id,
                    'user_id' => $user_id,
                    'unique_id' => $Bunique_id,
                    'submitted' => $res->submitted,
                    'rem_addr' => $req->ip()
                ];
                 $finalArray = array_merge($data2, $data4);

                // echo print_r($finalArray);die();


                 $this->insertData(Config::get('site.formBFile'),$finalArray);  
                //$this->insertData(Config::get('site.formBFile'),$data2); 
                
            }

                Session::put('new_form_id',$res->id);
                $response['error'] = false;
                $response['message'] = "Data saved successfully.";
            


            }


        }
        catch (Exception $e)
        {
            $response['error'] = true;
            $response['message'] = "Something went wrong. Please refresh page and try again."; //$e->getMessage();
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
            'id'=> $req->fid
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
            'unique_id'=>$check->unique_id,
            'form_b_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id
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
                                        'updated_at' => date('Y-m-d H:i:s')
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
                                            'form_b_selected_id' => $check->id,
                                            'form_b_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
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
                            'form_b_selected_id' => $check->id,
                            'form_b_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
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
            'user_id' => $user_id,
            'form_b_selected_id' => $check->id,
            'form_b_id' =>  Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
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
                'form_b_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
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

                if ($check2->submitted == 2) 
                {
                   $this->updateData(Config::get('site.formBFile'), $data2, $condition); 
                }
                else
                {
                    $this->insertData(Config::get('site.formBFile'),$data2);      
                }               
                
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


        $cat = $this->getFirstRow(Config::get('site.formBMdl'),$where);

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
                 'form_b_selected_id'=> ($cat->form_b_selected_id == '') ? $cat->id : $cat->form_b_selected_id,      
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
                    'table'=>Config::get('site.formBMdl'),
                    'subject'=>isset($req->notify) ? 'Form B Updation' : 'Form B Submission',
                    'desc'=>isset($req->notify) ? 'you have successfully updated Form B' : 'you have successfully submitted Form B',
                    'mail_type'=>'Form B',
                ];

                $data3=[
                    'submitted'=>1
                ];

                $where3=[
                    'user_id'=>$cat->user_id,
                    'unique_id'=>$cat->unique_id,
                    'form_b_id'=> Session::has('new_form_id') ? Session::get('new_form_id') : $cat->id,
                    'submitted'=>2
                ];

                    $this->updateData(Config::get('site.formBFile'), $data3, $where3);  
                    $this->updateData(Config::get('site.formBOtherDoc'), $data3, $where3); 
                    $this->updateData(Config::get('site.formBSenctionMdl'), $data3, $where3); 
                    $this->updateData(Config::get('site.formBDecTblMdl'), $data3, $where3); 

                    $userReg->send($where2, $others);    

                }


                $this->updateData(Config::get('site.formBMdl'), $data, $where);  


                $whereCK=[
                    'submitted'=>1,
                    'user_id'=> $user_id
                ];

                $this->checkTableRecord(Config::get('site.formBMdl'), $whereCK, 'form_b_selected_id');

                 
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
            $response['message'] = "Something went wrong. Please refresh page and try again.";//$e->getMessage(); 
        }
        echo json_encode($response);


    }

    function formBSignature(Request $req)
    {
        $this->getSignature(Config::get('site.formBMdl'), $req->updated_data, $req->fid, 'formB');
    }


    function getFormBUpdatedTable(Request $req)
    {

        $this->getFormUpdatedTable(Config::get('site.formBMdl'), Config::get('site.formBOtherDoc'), $req->updated_data, $req->fid, 'formB', 'form_b_id');
    }


    function getFormBUpdatedFileData(Request $req)
    {
        $this->getFormUpdatedFileData(Config::get('site.formBMdl'), Config::get('site.formBFile'), $req->updated_data, $req->fid, 'formB', 'form_b_id');
    }


    function removeFormBData(Request $req, $id)
    {
        $this->removeFormData(Config::get('site.formBOtherDoc'), $id, 'formB');
    }

    function removeSenctionData(Request $req, $id)
    {
        $table = $req->table;  
        $this->removeSenctData($table, $id);
    }

    function getFormBPreview(Request $req)
    {

        $this->getFormPreview(Config::get('site.formBMdl'), Config::get('site.formBFile'), Config::get('site.formBOtherDoc'), Config::get('site.formBSenctionMdl'), Config::get('site.formBDecTblMdl'), $req->updated_data, $req->fid, 'formB', 'form_b_id');  
    }

    function updateFile(Request $req, $id)
    {
        $this->updateFileData(Config::get('site.formBOtherDoc'), $req->index, $req->table, $req->other_doc_file, $id, 'formB'); 
    }

    function formBDeclaration(Request $req)
    {
        $this->formDeclaration(Config::get('site.formBMdl'), $req->updated_data, $req->fid, 'formB', Config::get('site.formBSenctionMdl'), Config::get('site.formBDecTblMdl'), 'form_b_selected_id', 'form_b_id');
    }

}
