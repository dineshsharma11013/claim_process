<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use Config;
use DB;
use Session;

class formCCntrlr extends Controller
{
	use MethodsTrait;

    function formCregistration(Request $req)
    {
    	$response = array();
        $user_id = Session::get('user_id'); 
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];

        
        $unique_id = uniqid().time();
        $check =  $this->getFirstRow(Config::get('site.formCMdl'),$where); 
        if ($check) 
        {
            $Bunique_id = $check->unique_id;
        }
        else
        {
            $Bunique_id = $unique_id; 
        }

        $sign = $this->uploadFile($req, $unique_id, Config::get('site.formCMdl'), $where, '/access/media/forms/formC/documents', 'operational_creditor_signature', 'sign');

     //  echo $sign;die();

        $data = [
            'user_id' => '',
            'company' => '',
            'irp'  => '',
            'formA' => '',
            'user_id' => $user_id,
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
            'signing_address' => $req->signing_address ?? "",
            'unique_id' => $Bunique_id,
            'dat' => date("d"),
            'month' => date("m"),
            'year' => date("Y"),
            'submitted' => 2,
            'date' => date("Y-m-d"),
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
                $this->updateData(Config::get('site.formCMdl'), $data, $condition);      
                $response['error'] = false;
                $response['message'] = "Data saved successfully."; 
            }
            else
            {
                $this->insertData(Config::get('site.formCMdl'),$data);
                $this->insertData(Config::get('site.formCFile'),$data2);  
              
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
        $where = [
            'user_id'=>Session::get('user_id'),
            'submitted'=>2
        ];

        
        
        $check =  $this->getFirstRow(Config::get('site.formCMdl'),$where); 
        
        $unique_id = uniqid().time(); 

        $where2 = [
            'user_id'=>$check->user_id,
            'unique_id'=>$check->unique_id
        ];

        $check2 = $this->getFirstRow(Config::get('site.formCFile'),$where2); 


        $work_order_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'work_purchase_order_file', 'work');
        $invoice_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'invoices_file', 'invoice');
        $balance_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'balance_confirmation_file', 'balance');
        $correspondence_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'any_correspondence_file', 'corres');
        $authorisation_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'authorisation_letter_file', 'auth');
        $bank_stt_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'bank_statement_file', 'stt');
        $ledger_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'ledger_copy_file', 'ledger');
        $computation_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'computation_sheet_file', 'comptation');

        $pan_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'pan_number_file', 'pan');
        $passport_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'passport_file', 'passport');
        $aadhar_file = $this->uploadFile($req, $unique_id, Config::get('site.formCFile'), $where2, '/access/media/forms/formC/documents', 'aadhar_card', 'aadhar');



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
                                        'updated_at' => \Carbon\Carbon::now()
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
                                            'document_name' => $oth_dc_New[$j] ?? '',
                                            'file' =>$oth_doc_fl6[$j] ?? "",
                                            'unique_id' => $check->unique_id,
                                            'rem_addr' => $req->ip(),
                                            'created_at' => \Carbon\Carbon::now(),
                                            'updated_at' => \Carbon\Carbon::now()
                                            ];
                                          

                                       // echo print_r($data6); die();
                                           DB::table(Config::get('site.formCOtherDoc'))->insert($data6);
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
                            'document_name' => $oth_dc[$i] ?? '',
                            'file' =>$oth_doc_fl[$i] ?? "",
                            'unique_id' => $check->unique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now()
                            ];
                        $this->insertData(Config::get('site.formCOtherDoc'),$data3); 
                    } 
                    }
                }
                   }
     
        
          

 
    

        $data2 = [
            'company' => isset($check->company) ? $check->company : '',
            'irp' => isset($check->irp) ? $check->irp : '',
            'formA'  => isset($check->formA) ? $check->formA : '',
            'user_id' => $user_id,
            'work_purchase_order' => $req->work_purchase_order ?? '',
            'invoices' => $req->invoices ?? '',
            'balance_confirmation' => $req->balance_confirmation ?? '',
            'any_correspondence' => $req->any_correspondence ?? '',
            'authorisation_letter' => $req->authorisation_letter ?? '',
            'bank_statement' => $req->bank_statement ?? '',
            'ledger_copy' => $req->ledger_copy ?? '',
            'computation_sheet' => $req->computation_sheet ?? '',
            'work_purchase_order_file' => $work_order_file,
            'invoices_file' => $invoice_file,
            'balance_confirmation_file' => $balance_file,
            'any_correspondence_file' => $correspondence_file,
            'authorisation_letter_file' => $authorisation_file,
            'bank_statement_file' => $bank_stt_file,
            'ledger_copy_file' => $ledger_file,
            'computation_sheet_file' => $computation_file,
            'pan_number_file' => $pan_file,
            'passport_file' => $passport_file,
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
                $dir = publicP()."/access/media/forms/formC/documents/".$check->unique_id;

                $this->updateData(Config::get('site.formCFile'), $data2, $condition);   
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
        $user_id = Session::get('user_id'); 
        $output = "";
        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user_id)->first();
        $user = DB::table('finanicial_creditor_form_c_mdls')
                    ->leftJoin('form_c_files_mdls', 'form_c_files_mdls.unique_id','=', 'finanicial_creditor_form_c_mdls.unique_id');

            $user = $user->where([['finanicial_creditor_form_c_mdls.user_id','=',$user_id],['finanicial_creditor_form_c_mdls.submitted','=',2]])->first();

        $output = view('home.formC.partials.declaration', compact("user","cat"));
        echo $output;

    }

    function removeFormCData(Request $req, $id)
    {
        $response = array();
          
        try
        {
        $where = [
            'id'=>$id
        ];
        
        $cat = $this->getFirstRow(Config::get('site.formCOtherDoc'),$where);
        $pth = '/access/media/forms/formC/documents/'.$cat->unique_id;
        
            if ($cat) 
            {
                if (!empty($cat->file)) 
                {
                    if(file_exists(publicP() . $pth.'/'.$cat->file))
                    {
                        unlink(publicP() . $pth.'/'.$cat->file);    
                    }  
                }

                $this->deleteData(Config::get('site.formCOtherDoc'),$where);    
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


function getFormCUpdatedTable(Request $req)
    {
        $user_id = Session::get('user_id'); 
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        $check =  $this->getFirstRow(Config::get('site.formCMdl'),$where);

        $other_files = $this->getRecords(Config::get('site.formCOtherDoc'),['unique_id'=>$check->unique_id]);
        $output = view('home.formb.partials.table', compact('other_files'));
        echo $output;


    }

     function getFormCPreview()
    {
        $user_id = Session::get('user_id'); 
        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user_id)->first();
        $user = DB::table('finanicial_creditor_form_c_mdls')
                    ->leftJoin('form_c_files_mdls', 'form_c_files_mdls.unique_id','=', 'finanicial_creditor_form_c_mdls.unique_id');

            $user = $user->where([['finanicial_creditor_form_c_mdls.user_id','=',$user_id],['finanicial_creditor_form_c_mdls.submitted','=',2]])->first();

           	$where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            
            $other_files = $this->getRecords('form_c_other_document_mdls',$where); 

        $output = view('home.formC.partials.preview', compact("cat","user","other_files"));
        echo $output;

    
	}
  
}


