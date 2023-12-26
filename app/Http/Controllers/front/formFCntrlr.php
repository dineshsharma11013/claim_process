<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Services\UserRegistration;
use App\Models\otherCreditorFormFMdl;
use Config;
use DB;
use Session;
use PDF;

class formFCntrlr extends Controller
{
    use MethodsTrait;

    function formFRegistration(Request $req)
    {
    	$response = array();
        $user_id = Session::get('user_id'); 
        if ($req->fid!='') 
        {
            $where = [
            //'id'=>$req->fid
            'form_f_selected_id'=>$req->form_f_selected_id
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
        $check =  $this->getLatestRow(Config::get('site.formFMdl'),$where); 
        if ($check) 
        {
            $Bunique_id = $check->unique_id;
            $user_unique_id = $check->user_unique_id!='' ? $check->user_unique_id : $this->gen_uid(Config::get('site.formFMdl'));
        }
        else
        {
            $Bunique_id = $unique_id; 
            $user_unique_id = $this->gen_uid(Config::get('site.formFMdl'));
        }

      //  echo print_r($Bunique_id);die();

        $sign = $this->uploadFile($req, $Bunique_id, Config::get('site.formFMdl'), $where, '/access/media/forms/formF/documents', 'fc_signature', 'sign');

     //  echo $sign;die();

        $formA_where = [
            'id' => $req->fA//isset($check->formA) ? $check->formA : Session::get('form_a')
        ];

       // $comp_id = DB::table("form_a_mdls")->select('company_id')->where('id', Session::get('form_a'))->first();
        //$formDtl = DB::table("form_a_mdls")->select('corporate_debtor_insolvency_date')->where('company_id', $comp_id->company_id)->orderBy('id', 'desc')->first();

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
           
            'company' => $formA->company_id ?? '',//Session::has('company_id') ? Session::get('company_id') : '',
            'irp'  => $formA->user_id ?? '', //Session::has('ip_id') ? Session::get('ip_id') : '',
            'formA' => isset($check->formA) ? $check->formA : Session::get('form_a'),
            
            'user_id' => $user_id,
            'form_type'=>$req->form_type ?? "",
            'formName'=>'form-f',
            'ar'=> $req->ar ?? "",
            'form_f_selected_id' => isset($check->form_f_selected_id) ? $check->form_f_selected_id : '', ///isset($req->fid) ? $req->fid : '',
            'fc_name' => $req->fc_name ?? "",
            'fc_identification_number' => $req->fc_identification_number ?? "",
            'fc_address' => $req->fc_address ?? "",
            'fc_email' => $req->fc_email ?? "",
            'claim_amt' => $req->claim_amt ?? "",    
            'claim_amt_desc' => $req->claim_amt_desc ?? "",
            
            'document_details' => $req->document_details ?? "",


            'claim_details' => $req->claim_details ?? "",
            'other_mutual_details' => $req->other_mutual_details ?? "",
            'security_held' => $req->security_held ?? "",

            'bank_account_number' => $req->bank_account_number ?? "",
            'bank_name' => $req->bank_name ?? "",
            'bank_ifsc_code'=> $req->bank_ifsc_code ?? "",
            
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
             
            $this->senctionDetail($sanction_date, $section_amt, $other_senc_id, Config::get('site.formFSenctionMdl'), $check->id, Config::get('site.formFMdl'), 'form_f_selected_id', 'form_f_id');    
            
            $this->senctionDetail($sanct_date, $sect_amt, $othr_senc_id, Config::get('site.formFDecTblMdl'), $check->id, Config::get('site.formFMdl'), 'form_f_selected_id', 'form_f_id'); 
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
                    
                    $this->insertData(Config::get('site.formFMdl'),$data);
                    Session::forget('new_form_id');

                    $check2 = DB::table(Config::get('site.formFMdl'))->where([['unique_id','=', $Bunique_id],['user_id','=', $user_id]])->orderBy('id', 'desc')->first();      
                        
                    $where2 = [
                        'form_f_id' => $check->id
                    ];

                   // echo print_r($check2);die();

                    $data4 = $this->formFilesField(Config::get('site.formFFile'),$where2, $check->form_f_selected_id, 'form_f_selected_id');
                             $this->formOtherDocFields(Config::get('site.formFOtherDoc'),$where2, $check2->id, $check->form_f_selected_id, 'form_f_selected_id', 'form_f_id');
                             $this->formSenctionFields(Config::get('site.formFSenctionMdl'),$where2, $check2->id, $check->form_f_selected_id, 'form_f_selected_id', 'form_f_id');
                             $this->formSenctionFields(Config::get('site.formFDecTblMdl'),$where2, $check2->id, $check->form_f_selected_id, 'form_f_selected_id', 'form_f_id');

                    $data2 = [
                    'form_f_id' => $check2->id,
                    'user_id' => $user_id,
                    'unique_id' => $Bunique_id,
                    'submitted' => $check2->submitted,
                    'rem_addr' => $req->ip()
                    ];
                 

                 $finalArray = array_merge($data2, $data4);
                // echo print_r($finalArray);die();
                 $this->insertData(Config::get('site.formFFile'),$finalArray);  

                    Session::put('new_form_id',$check2->id);

                 }
                 else
                 {
                    $this->updateData(Config::get('site.formFMdl'), $data, $condition);    
                    
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

               $res = $this->getFirstRow(Config::get('site.formFMdl'), $data3);    
               if ($res)
               {
                $this->updateData(Config::get('site.formFMdl'), $data, ['id'=>$res->id]);

                    $dt5=[
                        'form_f_selected_id'=>$res->id,
                        'fc_signature'=>$req->file('fc_signature') ? $sign : $res->fc_signature
                    ];

                    $this->updateData(Config::get('site.formFMdl'), $dt5, ['id'=>$res->id]);

                    $res2 = $this->getFirstRow(Config::get('site.formFMdl'), $data3);

                    // echo print_r($res2);die();

                    $where3 = [
                    'user_id' => $user_id,
                    'unique_id' => $res->unique_id
                    ];
                

                    $data2 = $this->formFilesField(Config::get('site.formFFile'),$where3, $res->id, 'form_f_selected_id');

                    $data4 = [
                        'form_f_id' => $res->id,
                        'user_id' => $user_id,
                        'unique_id' => $res->unique_id,
                        'submitted' => $res->submitted,
                        'rem_addr' => $req->ip()
                    ];
                     $finalArray = array_merge($data2, $data4);


                    $this->updateData(Config::get('site.formFFile'), $finalArray, ['form_f_id'=>$res->id,'submitted'=>2,'user_id'=>$user_id]);
               }
               else 
               {
                   
                $this->insertData(Config::get('site.formFMdl'),$data);        

                $res = $this->getFirstRow(Config::get('site.formFMdl'), $data3);   

                $where3 = [
                    'user_id' => $user_id,
                    'unique_id' => $res->unique_id
                ];    

                $this->updateData(Config::get('site.formFMdl'), ['form_f_selected_id'=>$res->id], ['id'=>$res->id]); 

                $data2 = $this->formFilesField(Config::get('site.formFFile'),$where3, $res->id, 'form_f_selected_id');

                $data4 = [
                    'form_f_id' => $res->id,
                    'user_id' => $user_id,
                    'unique_id' => $Bunique_id,
                    'submitted' => $res->submitted,
                    'rem_addr' => $req->ip()
                ];
                 $finalArray = array_merge($data2, $data4);

                $this->insertData(Config::get('site.formFFile'),$finalArray);  
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


    function formFregistrationSave(Request $req)
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

        $check =  $this->getFirstRow(Config::get('site.formFMdl'),$where); 
        
        $unique_id = uniqid().time(); 

        $where2 = [
            'user_id'=>$check->user_id,
            'unique_id'=>$check->unique_id,
            'form_f_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id
        ];

        $check2 = $this->getFirstRow(Config::get('site.formFFile'),$where2); 


        $work_order_file = $this->uploadFile($req, $unique_id, Config::get('site.formFFile'), $where2, '/access/media/forms/formF/documents', 'work_purchase_order_file', 'work_purchase_order');
        $invoice_file = $this->uploadFile($req, $unique_id, Config::get('site.formFFile'), $where2, '/access/media/forms/formF/documents', 'invoices_file', 'invoice');
        $balance_file = $this->uploadFile($req, $unique_id, Config::get('site.formFFile'), $where2, '/access/media/forms/formF/documents', 'balance_confirmation_file', 'balance');
        $correspondence_file = $this->uploadFile($req, $unique_id, Config::get('site.formFFile'), $where2, '/access/media/forms/formF/documents', 'any_correspondence_file', 'correspondence');
        $authorisation_file = $this->uploadFile($req, $unique_id, Config::get('site.formFFile'), $where2, '/access/media/forms/formF/documents', 'authorisation_letter_file', 'authorisation_letter');
        $bank_stt_file = $this->uploadFile($req, $unique_id, Config::get('site.formFFile'), $where2, '/access/media/forms/formF/documents', 'bank_statement_file', 'stt');
        $ledger_file = $this->uploadFile($req, $unique_id, Config::get('site.formFFile'), $where2, '/access/media/forms/formF/documents', 'ledger_copy_file', 'ledger');
        $computation_file = $this->uploadFile($req, $unique_id, Config::get('site.formFFile'), $where2, '/access/media/forms/formF/documents', 'computation_sheet_file', 'computation_sheet');

        $pan_file = $this->uploadFile($req, $unique_id, Config::get('site.formFFile'), $where2, '/access/media/forms/formF/documents', 'pan_number_file', 'pan');
        $passport_file = $this->uploadFile($req, $unique_id, Config::get('site.formFFile'), $where2, '/access/media/forms/formF/documents', 'passport_file', 'passport');
        $aadhar_file = $this->uploadFile($req, $unique_id, Config::get('site.formFFile'), $where2, '/access/media/forms/formF/documents', 'aadhar_card', 'aadhar');



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
        
       
       $cats = DB::table(Config::get('site.formFOtherDoc'))->select('id')->where('unique_id', $check->unique_id)->first(); 
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
                                        DB::table(Config::get('site.formFOtherDoc'))->where('id', $oldRow[$k])->update($data5);
                               
                                }

                                } 

                        if(count($oth_dc_New)>0)
                                {         

                                    if($req->hasfile('other_doc_file'))
                                                 {
                                                    $dir = publicP()."/access/media/forms/formF/documents/".$check->unique_id;
                                                  
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
                                            'form_f_selected_id' => $check->form_f_selected_id ? $check->form_f_selected_id : $check->id,
                                            'form_f_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
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
                                           DB::table(Config::get('site.formFOtherDoc'))->insert($data6);
                                       }
                                    }             
                                   }         
                               
                                }        



                   } 
                   else
                   {
                        if($req->hasfile('other_doc_file'))
                             {
                                $dir = publicP()."/access/media/forms/formF/documents/".$check->unique_id;
                              
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
                            'form_f_selected_id' => $check->form_f_selected_id ? $check->form_f_selected_id : $check->id,
                            'form_f_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
                            'document_name' => $oth_dc[$i] ?? '',
                            'file' =>$oth_doc_fl[$i] ?? "",
                            'submitted'=>$check->submitted,
                            'unique_id' => $check->unique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                            ];
                        $this->insertData(Config::get('site.formFOtherDoc'),$data3); 
                    } 
                    }
                }
                   }
     
        
          

 
    

        $data2 = [
            'company' => isset($check->company) ? $check->company : '',
            'irp' => isset($check->irp) ? $check->irp : '',
            'formA'  => isset($check->formA) ? $check->formA : '',
            'user_id' => $user_id,
            'form_f_selected_id' => $check->form_f_selected_id ? $check->form_f_selected_id : $check->id,
            'form_f_id' =>  Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,

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
                'form_f_id' => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
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
                $dir = publicP()."/access/media/forms/formF/documents/".$check->unique_id;

                if ($check2->submitted == 2) 
                {
                    $this->updateData(Config::get('site.formFFile'), $data2, $condition);   
                }
                else
                {
                    $this->insertData(Config::get('site.formFFile'),$data2);       
                }

               // $cate = $this->formFFilesHandle(Config::get('site.formFFile'), $condition, $files, $dir);
               // echo $cate; die();

                $response['error'] = false;
                $response['cls'] = 'success';
                $response['message'] = "Form submitted successfully.";
            }
            else
            {
                $this->insertData(Config::get('site.formFFile'),$data2);
               
                
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

function formFFilesHandle($tbl, $condition, $files, $dir)
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
                        
                        // if(file_exists($dir.'/'.$cat->$fv))
                        //     {
                        //         unlink($dir.'/'.$cat->$fv);    
                        //     }


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


    function formFDeclaration(Request $req)
    {
        //echo print_r($req);die();
        $this->formDeclaration('other_creditor_form_f_mdls', $req->updated_data, $req->fid, 'formF', Config::get('site.formFSenctionMdl'), Config::get('site.formFDecTblMdl'), 'form_f_selected_id', 'form_f_id');

    }

    function formFRegistrationSubmit(Request $req, UserRegistration $userReg)
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

        $cat = $this->getFirstRow(Config::get('site.formFMdl'),$where);

       // echo print_r($cat);die();

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
                    'table'=>Config::get('site.formFMdl'),
                    'subject'=> isset($req->notify) ? 'Form F Updation' : 'Form F Submission',
                    'desc'=> isset($req->notify) ? 'you have successfully updated Form F' : 'you have successfully submitted Form F',
                    'mail_type'=>'Form F',
                ];

                $data3=[
                    'submitted'=>1
                ];

                $where3=[
                    'user_id'=>$cat->user_id,
                    'unique_id'=>$cat->unique_id,
                    'form_f_id'=> Session::has('new_form_id') ? Session::get('new_form_id') : $cat->id,
                    'submitted'=>2
                ];

                 $this->updateData(Config::get('site.formFFile'), $data3, $where3);  
                 $this->updateData(Config::get('site.formFOtherDoc'), $data3, $where3); 
                 $this->updateData(Config::get('site.formFSenctionMdl'), $data3, $where3); 
                $this->updateData(Config::get('site.formFDecTblMdl'), $data3, $where3);

                 $userReg->send($where2, $others);
               // echo print_r($data);die();
                
                }



                $this->updateData(Config::get('site.formFMdl'), $data, $where);  



                $whereCK=[
                    'submitted'=>1,
                    'user_id'=> $user_id
                ];

                $this->checkTableRecord(Config::get('site.formFMdl'), $whereCK, 'form_f_selected_id');


              
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

    function formFSignature(Request $req)
    {
        $this->getSignature(Config::get('site.formFMdl'), $req->updated_data, $req->fid, 'formF');
    }

    function removeFormFData(Request $req, $id)
    {
        $this->removeFormData(Config::get('site.formFOtherDoc'), $id, 'formF');
    }


function getFormFUpdatedTable(Request $req)
    {

        $this->getFormUpdatedTable(Config::get('site.formFMdl'), Config::get('site.formFOtherDoc'), $req->updated_data, $req->fid, 'formF', 'form_f_id');
    }

    function getFormFUpdatedFileData(Request $req)
    {
        $this->getFormUpdatedFileData(Config::get('site.formFMdl'), Config::get('site.formFFile'), $req->updated_data, $req->fid, 'formF', 'form_f_id'); 
    }


     function getFormFPreview(Request $req)
    {
        $this->getFormPreview(Config::get('site.formFMdl'), Config::get('site.formFFile'), Config::get('site.formFOtherDoc'), Config::get('site.formFSenctionMdl'), Config::get('site.formFDecTblMdl'), $req->updated_data, $req->fid, 'formF', 'form_f_id');       
	}

	function updateFile(Request $req, $id)
	{
        $this->updateFileData(Config::get('site.formFOtherDoc'), $req->index, $req->table, $req->other_doc_file, $id, 'formF');
	}
}
