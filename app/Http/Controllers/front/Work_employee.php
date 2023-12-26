<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Events\fSignInFire;
use App\Events\fSignUpMail;
use App\Events\fForgotPasswardFire;
use Illuminate\Support\Facades\Hash;
use Config;
use DB;
use Mail;
use App\Mail\userSignUpMail;
use App\Models\Workmen_step_four_doc;
use Session;
use event;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;


class Work_employee extends Controller
{   


    public function submit_workmen_and_employee(Request $request){



        $user_id = Session::get('user_id');
        $data_check=db::table('workmen_and_employee_form_details')->where('user_mdls_id',$user_id)->where('submitted',2)->get();
    
        // echo '<pre>';
        // print_r($data_check);
        // echo '</pre>';
        // die();

        if(isset($data_check[0])){
    
            $valid=Validator::make($request->all(),[
               
                'name'=>'required',
                // 'pancard'=>'required|digits:10',
                // 'passport'=>'required|',
                // 'voter_id'=>'required|max:15',
                // 'aadhar' => 'required|digits:12|numeric',
                // 'address'=>'required|max:100',
                // 'email'=> 'required|email',
                // 'total_amount'=>'numeric|required',
                // 'principle'=>'numeric|required',
                // 'interest'=>'numeric|required',
                // 'details_of_documents'=>'required',
                // 'dispute'=>'required',
                // 'claim'=>'required',
                // 'mutual_credit'=>'required',
                // 'account_number'=>'required|numeric',
                // 'bank_name'=>'required',
                // 'ifsc'=>'required',
                // 'name_block_letter'=>'required',
                // 'relation_to_creditor'=>'required',
                // 'address_person_signing'=>'required|max:100'
        
            ]);
            if($valid->fails()){
                return  response()->json(['status'=>'error','msg'=>$valid->errors()->toArray()]);
            }else{
    
            $signature=[];
            $file_name='';
            if($request->hasfile('signature')){
                $file_name=time().rand(111,999).".".$request->file('signature')->getClientOriginalExtension();
                $signatu=$request->file('signature')->move('image/',$file_name);
                if(!empty($data_check[0]->signature)){
                 unlink($data_check[0]->signature);
                }
                $signature=['signature' => $signatu ];
              
            }
            $day = $data_check[0]->day;
            $month = $data_check[0]->month;
            $year = $data_check[0]->year;
            $date = $data_check[0]->added_on;
    
            $data=array_merge_recursive([
                'name'=>$request->name,
                'pancard_no'=>$request->pancard,
                'passport_no'=>$request->passport,
                'voter_id_no'=>$request->voter_id,
                'aadhar_no'=>$request->aadhar,
                'address'=>$request->address,
                'email'=>$request->email,
                'total_amount'=>$request->total_amount,
                'principle'=>$request->principle,
                'intrest'=>$request->interest,
                'details_of_documents'=>$request->details_of_documents,
                'dispute_details'=>$request->dispute,
                'claim_arose_details'=>$request->claim,
                'mutual_credit_details'=>$request->mutual_credit,
                'account_no'=>$request->account_number,
                'bank_name'=>$request->bank_name,
                'ifsc_code'=>$request->ifsc,
                'name_in_block_letter'=>$request->name_block_letter,
                'relation_to_creditor'=>$request->relation_to_creditor,
                'address_person_signing'=>$request->address_person_signing,
                
            ],$signature);
        
            $insert=db::table('workmen_and_employee_form_details')->where(['user_mdls_id'=>$user_id])->where('submitted',2)->update($data);
    
            
            return response()->json(['status'=>'success', 'msg'=>'done', 'signature'=>$file_name, 'signature'=>$file_name, 'day'=>$day, 'month'=> $month, 'year' => $year,'date' =>$date ]);
        }
    
         }else{
    
            $valid=Validator::make($request->all(),[
               
                'name'=>'required',
                // 'pancard'=>'required|digits:10',
                // 'passport'=>'required|',
                // 'voter_id'=>'required|max:15',
                // 'aadhar' => 'required|digits:12|numeric',
                // 'address'=>'required|max:100',
                // 'email'=> 'required|email',
                // 'total_amount'=>'numeric|required',
                // 'principle'=>'numeric|required',
                // 'interest'=>'numeric|required',
                // 'details_of_documents'=>'required',
                // 'signature'=>'required',
                // 'dispute'=>'required',
                // 'claim'=>'required',
                // 'mutual_credit'=>'required',
                // 'account_number'=>'required|numeric',
                // 'bank_name'=>'required',
                // 'ifsc'=>'required',
                // 'name_block_letter'=>'required',
                // 'relation_to_creditor'=>'required',
                // 'address_person_signing'=>'required|max:100'
        
            ]);
            if($valid->fails()){
                return  response()->json(['status'=>'error','msg'=>$valid->errors()->toArray()]);
            }else{
    
            $signature='';
            if($request->hasfile('signature')){
                $file_name=time().rand(111,999).".".$request->file('signature')->getClientOriginalExtension();
                $signature=$request->file('signature')->move('image/',$file_name);
            }
            $day = date('d');
            $month = date('m');
            $year = date('y');
            $date = \Carbon\Carbon::now();
    
    
    
    
    
        $data=[
            'name'=>$request->name,
            'user_mdls_id'=> $user_id,
            'pancard_no'=>$request->pancard,
            'passport_no'=>$request->passport,
            'voter_id_no'=>$request->voter_id,
            'aadhar_no'=>$request->aadhar,
            'address'=>$request->address,
            'email'=>$request->email,
            'total_amount'=>$request->total_amount,
            'principle'=>$request->principle,
            'intrest'=>$request->interest,
            'details_of_documents'=>$request->details_of_documents,
            'dispute_details'=>$request->dispute,
            'claim_arose_details'=>$request->claim,
            'mutual_credit_details'=>$request->mutual_credit,
            'account_no'=>$request->account_number,
            'bank_name'=>$request->bank_name,
            'ifsc_code'=>$request->ifsc,
            'signature'=>$signature,
            'name_in_block_letter'=>$request->name_block_letter,
            'relation_to_creditor'=>$request->relation_to_creditor,
            'address_person_signing'=>$request->address_person_signing,
            'day' => $day,
            'month' => $month,
            'year' => $year,
            'submitted'=>2,
            'added_on'=> $date,
            
       
        ];
    
        $insert=db::table('workmen_and_employee_form_details')->insert($data);
    
        if($insert){
            return response()->json(['status'=>'success', 'msg'=>'done', 'signature'=>$file_name, 'day'=>$day, 'month'=> $month, 'year' => $year, 'date'=>$date]);
        }else{
            return response()->json(['status'=>'fail']);
        }
        
    }
    
    
    }
    
    }
    
    public function submit_workmen_and_employee_do(Request $request){
    
    
        $workmen_id = db::table('workmen_and_employee_form_details')->where('user_mdls_id',Session::get('user_id'))->where('submitted',2)->first();
    
        $update_doc_table = db::table('work_and_employee_from_step_four_doc')->where('user_id',Session::get('user_id'))->where('submitted',2)->get();
         
      
    
        $work_order_purchase_order_image='';
        if(!empty($request->work_order_purchase_order)){
        
            if($request->hasfile('work_order_purchase_order_image')){
              
                if(!empty($update_doc_table[0]->work_order_purchase_order_image)){
                    unlink($update_doc_table[0]->work_order_purchase_order_image);
                   }
    
                $file_name=time().rand(111,999).".".$request->file('work_order_purchase_order_image')->getClientOriginalExtension();
                $work_order_purchase_order_image=$request->file('work_order_purchase_order_image')->move('work_order_purchase/',$file_name);
            }
    
        }
       
    
        $invoices_image='';
        if(!empty($request->invoices)){
        
            if($request->hasfile('invoices_image')){
    
                if(!empty($update_doc_table[0]->invoices_image)){
                    unlink($update_doc_table[0]->invoices_image);
                   }
    
                $file_name=time().rand(111,999).".".$request->file('invoices_image')->getClientOriginalExtension();
                $invoices_image=$request->file('invoices_image')->move('work_order_purchase/',$file_name);
            }
    
        }
    
        $balance_confirmation_image='';
        if(!empty($request->balance_confirmation)){
        
            if($request->hasfile('balance_confirmation_image')){
    
                if(!empty($update_doc_table[0]->balance_confirmation_image)){
                    unlink($update_doc_table[0]->balance_confirmation_image);
                   }
                $file_name=time().rand(111,999).".".$request->file('balance_confirmation_image')->getClientOriginalExtension();
                $balance_confirmation_image=$request->file('balance_confirmation_image')->move('work_order_purchase/',$file_name);
            }
    
        }
    
    
        $any_correspondence_image='';
        if(!empty($request->any_correspondence)){
        
            if($request->hasfile('any_correspondence_image')){
    
                if(!empty($update_doc_table[0]->any_correspondence_image)){
                    unlink($update_doc_table[0]->any_correspondence_image);
                   }
    
                $file_name=time().rand(111,999).".".$request->file('any_correspondence_image')->getClientOriginalExtension();
                $any_correspondence_image=$request->file('any_correspondence_image')->move('work_order_purchase/',$file_name);
            }
    
        }
    
        $authorisation_image='';
        if(!empty($request->authorisation)){
        
            if($request->hasfile('authorisation_image')){
    
                if(!empty($update_doc_table[0]->authorisation_image)){
                    unlink($update_doc_table[0]->authorisation_image);
                   }
    
                $file_name=time().rand(111,999).".".$request->file('authorisation_image')->getClientOriginalExtension();
                $authorisation_image=$request->file('authorisation_image')->move('work_order_purchase/',$file_name);
            }
    
        }
    
        $bank_statement_image='';
        if(!empty($request->bank_statement)){
        
            if($request->hasfile('bank_statement_image')){
    
                if(!empty($update_doc_table[0]->bank_statement_image)){
                    unlink($update_doc_table[0]->bank_statement_image);
                   }
    
                $file_name=time().rand(111,999).".".$request->file('bank_statement_image')->getClientOriginalExtension();
                $bank_statement_image=$request->file('bank_statement_image')->move('work_order_purchase/',$file_name);
            }
    
        }
    
        $copy_of_ledger_image='';
        if(!empty($request->copy_of_ledger)){
        
            if($request->hasfile('copy_of_ledger_image')){
    
                if(!empty($update_doc_table[0]->copy_of_ledger_image)){
                    unlink($update_doc_table[0]->copy_of_ledger_image);
                   }
    
                $file_name=time().rand(111,999).".".$request->file('copy_of_ledger_image')->getClientOriginalExtension();
                $copy_of_ledger_image=$request->file('copy_of_ledger_image')->move('work_order_purchase/',$file_name);
            }
    
        }
    
        $computation_sheet_image='';
        if(!empty($request->computation_sheet)){
        
            if($request->hasfile('computation_sheet_image')){
    
                if(!empty($update_doc_table[0]->computation_sheet_image)){
                    unlink($update_doc_table[0]->computation_sheet_image);
                   }
    
                $file_name=time().rand(111,999).".".$request->file('computation_sheet_image')->getClientOriginalExtension();
                $computation_sheet_image=$request->file('computation_sheet_image')->move('work_order_purchase/',$file_name);
            }
    
        }
    
        $pan_number_image='';
            if($request->hasfile('pan_number_image')){
    
                if(!empty($update_doc_table[0]->pan_number_image)){
                    unlink($update_doc_table[0]->pan_number_image);
                   }
    
                $file_name=time().rand(111,999).".".$request->file('pan_number_image')->getClientOriginalExtension();
                $pan_number_image=$request->file('pan_number_image')->move('work_order_purchase/',$file_name);
            }
    
            $passport_image='';
            if($request->hasfile('passport_image')){
    
                if(!empty($update_doc_table[0]->passport_image)){
                    unlink($update_doc_table[0]->passport_image);
                   }
    
    
                $file_name=time().rand(111,999).".".$request->file('passport_image')->getClientOriginalExtension();
                $passport_image=$request->file('passport_image')->move('work_order_purchase/',$file_name);
            }
    
            $aadhar_card='';
            if($request->hasfile('aadhar_card')){
    
                if(!empty($update_doc_table[0]->aadhar_card)){
                    unlink($update_doc_table[0]->aadhar_card);
                   }
    
                $file_name=time().rand(111,999).".".$request->file('aadhar_card')->getClientOriginalExtension();
                $aadhar_card=$request->file('aadhar_card')->move('work_order_purchase/',$file_name);
            }
    
    
        if(!isset($update_doc_table[0])){
     
    
        $data= new Workmen_step_four_doc;
        $data->workmen_and_employee_form_details_id = $workmen_id->id;
        $data->user_id = Session::get('user_id');
        $data->work_order_purchase_order_image = $work_order_purchase_order_image;
        $data->invoices_image = $invoices_image;
        $data->balance_confirmation_image = $balance_confirmation_image;
        $data->any_correspondence_image = $any_correspondence_image;
        $data->authorisation_image = $authorisation_image;
        $data->bank_statement_image = $bank_statement_image;
        $data->copy_of_ledger_image = $copy_of_ledger_image;
        $data->computation_sheet_image = $computation_sheet_image;
        $data->pan_number_image = $pan_number_image;
        $data->passport_image = $passport_image;
        $data->aadhar_card = $aadhar_card;
        $data->submitted = 2;
        $data->added_on = date('y-m-d h:i:s');
        $data->save();
    
    
    if(isset($request->document_name[0])){
        $document_name=[];
        $doc=[];
     
       $i=0;
       foreach($request->file('document_image') as $do){
         $doc[]=$do;
       }
        foreach($request->document_name as $name){
        
            $file_name=time().rand(111,999).".".$doc[$i]->getClientOriginalExtension();
            $multi_image_insert=$doc[$i]->move('work_order_purchase/',$file_name);
        
                $inser_multi_docs=db::table('work_and_employee_multi_docs')->insert([
                    'work_and_employee_from_step_four_doc_id' => $data->id,
                    'user_id' => Session::get('user_id'),
                    'document_name' => $name,
                    'document_image' => $multi_image_insert,
                    'submitted' => 2,
                    'added_on' => date('y-m-d h:i:s')
                    ]);
    
                    $i++;
          }
        }
       
       $html=$this->setHtmlDocs();
    
    
    return response()->json(['status'=>'success', 'msg'=>'insert', 'html'=>$html]);
    
    
    
        }else{
              
            
    
            $update_data=Workmen_step_four_doc::find($update_doc_table[0]->id);
            
            $update_data->work_order_purchase_order_image = (!empty($work_order_purchase_order_image) ? $work_order_purchase_order_image : $request->work_order_purchase_order_image_up);
    
            $update_data->invoices_image = (!empty($invoices_image) ? $invoices_image : $request->invoices_image_up);
    
    
    
            $update_data->balance_confirmation_image =  (!empty($balance_confirmation_image) ? $balance_confirmation_image : $request->balance_confirmation_image_up);
    
            $update_data->any_correspondence_image =  (!empty($any_correspondence_image) ? $any_correspondence_image : $request->any_correspondence_image_up);
    
            $update_data->authorisation_image =  (!empty($authorisation_image) ? $authorisation_image : $request->authorisation_image_up);
    
            $update_data->bank_statement_image =  (!empty($bank_statement_image) ? $bank_statement_image : $request->bank_statement_image_up);
    
            $update_data->copy_of_ledger_image =  (!empty($copy_of_ledger_image) ? $copy_of_ledger_image : $request->copy_of_ledger_image_up);
    
            $update_data->computation_sheet_image =  (!empty($computation_sheet_image) ? $computation_sheet_image : $request->computation_sheet_image_up);
    
            $update_data->pan_number_image =  (!empty($pan_number_image) ? $pan_number_image : $request->pan_number_image_up);
    
            $update_data->passport_image = (!empty($pan_number_image) ? $pan_number_image : $request->passport_image_up);
    
            $update_data->aadhar_card =   (!empty($aadhar_card) ? $aadhar_card : $request->aadhar_card_up);
           
            $update_data->save();
            
            /////////////////////////////////add if and else condition for protecting server error///////////////////////////////////////////////////
        
           
            $multi_doc_image =  db::table('work_and_employee_multi_docs')->where('user_id',Session::get('user_id'))->where('submitted',2)->get();
            
            $document_name=[];
            $doc=[];
         
    
        // if(isset($request->file('document_image')[0])){
        // foreach($request->file('document_image') as $image){
        //     $doc[]=$image;
        // }
        // }
    
        
  
        
        $i=0;
      
    
        foreach($request->document_name as $name){
          
          
           if(isset($multi_doc_image[$i])){
    
            $multi_image_insert='';

            if(!empty($request->file('document_image')[$i])){  

                if(!empty($multi_doc_image[$i]->document_image)){
                    unlink($multi_doc_image[$i]->document_image);
                 }

                $file_name=time().rand(111,999).".".$request->file('document_image')[$i]->getClientOriginalExtension();
                $multi_image_insert=$request->file('document_image')[$i]->move('work_order_purchase/',$file_name);


            }
                
             

            $abc='';
             if(!empty($request->get('document_image_up_')[$i])){
               $abc=$request->get('document_image_up_')[$i];
             }
            
               db::table('work_and_employee_multi_docs')->where('id',$multi_doc_image[$i]->id)->where('submitted',2)->update([
    
                'document_name' => $name,
                'document_image' => (!empty($multi_image_insert) ? $multi_image_insert : $abc  ),
    
              ]);
              
            }else{
                $multi_image_insert='';
                if(!empty($request->file('document_image')[$i])){  
                    $file_name=time().rand(111,999).".".$request->file('document_image')[$i]->getClientOriginalExtension();
                    $multi_image_insert=$request->file('document_image')[$i]->move('work_order_purchase/',$file_name);
                }
  
    if(!empty($name)){
                db::table('work_and_employee_multi_docs')->insert([
                    'work_and_employee_from_step_four_doc_id' => $update_data->id,
                    'user_id' => Session::get('user_id'),
                    'document_name' =>$name,
                    'document_image' => (!empty($multi_image_insert) ? $multi_image_insert : ''),
                    'submitted'=>2,
                    'added_on' => date('y-m-d h:i:s')
                ]);
            }
            }
    
            $i++;
    
            }
         
           $html=$this->setHtmlDocs();
           return response()->json(['status'=>'success', 'msg'=>'update', 'html'=>$html]);
    
        }
    
        
    
     }
    
     public function setHtmlDocs(){
    
        $docs_html = db::table('work_and_employee_from_step_four_doc')->where('user_id',Session::get('user_id'))->where('submitted',2)->first();
        $multiple_doc_html = db::table('work_and_employee_multi_docs')->where('user_id',Session::get('user_id'))->where('submitted',2)->get();
        
        $html ='  <div class="form-group" >
        <label style="margin-top:60px"> LIST OF DOCUMENTS ATTACHED TO THIS PROOF CLIAM IN ORDER TO PROVE THE EXISTENCE AND NON-PAYMENT OF CLAIM DUE TO THE OPERATIONAL CREDITOR</label><br><br>
            
           
            <div class="row">
            <div class="col-md-6">
            <div class="form-check">
      
            <input class="form-check-input" type="checkbox" '.(!empty($docs_html->work_order_purchase_order_image) ? "checked" :  "").' disabled id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">Work order/ Purchase order</label></div>
            </div>
            <div class="col-md-6"><a href="'.asset($docs_html->work_order_purchase_order_image).'" target="_blank">  '.(!empty($docs_html->work_order_purchase_order_image) ? "view-work-order-purchase-doc" : "" ).'</a></div>
            </div>
            
    
            <div class="row">
            <div class="col-md-6">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" '.(!empty($docs_html->invoices_image) ? "checked" :  "").' disabled id="flexCheckDefault"">
            <label class="form-check-label" for="flexCheckDefault">Invoices</label></div></div>
            <div class="col-md-6"><a target="_blank" href="'.asset($docs_html->invoices_image).'" >  '.(!empty($docs_html->invoices_image) ? "view-invoice-doc" : "" ).'</a></div>
            </div>
    
            <div class="row">
            <div class="col-md-6"><div class="form-check">
            <input class="form-check-input" type="checkbox" '.(!empty($docs_html->balance_confirmation_image) ? "checked" :  "").' disabled id="flexCheckDefault"">
            <label class="form-check-label" for="flexCheckDefault">Balance Confirmation</label></div></div>
            <div class="col-md-6"><a href="'.asset($docs_html->balance_confirmation_image).'" target="_blank">  '.(!empty($docs_html->balance_confirmation_image) ? "view-balance-confirmation-doc" : "" ).'</a></div>
            </div>
    
            <div class="row">
            <div class="col-md-6"><div class="form-check">
            <input class="form-check-input" type="checkbox" '.(!empty($docs_html->any_correspondence_image) ? "checked" :  "").' disabled id="flexCheckDefault"">
            <label class="form-check-label" for="flexCheckDefault">Any correspondence etc</label></div></div>
            <div class="col-md-6"><a href="'.asset($docs_html->any_correspondence_image).'" target="_blank">  '.(!empty($docs_html->any_correspondence_image) ? "view-correspondece-doc" : "" ).'</a></div>
            </div>
    
            <div class="row">
            <div class="col-md-6"><div class="form-check">
            <input class="form-check-input" type="checkbox" '.(!empty($docs_html->authorisation_image) ? "checked" :  "").' disabled id="flexCheckDefault"">
            <label class="form-check-label" for="flexCheckDefault">Authorisation letter</label></div></div>
            <div class="col-md-6"><a href="'.asset($docs_html->authorisation_image).'" target="_blank">  '.(!empty($docs_html->authorisation_image) ? "view-authorisation-doc" : "" ).'</a></div>
            </div>
    
            <div class="row">
            <div class="col-md-6"><div class="form-check">
            <input class="form-check-input" type="checkbox" '.(!empty($docs_html->bank_statement_image) ? "checked" :  "").' disabled id="flexCheckDefault"">
            <label class="form-check-label" for="flexCheckDefault">Bank Statement</label></div></div>
            <div class="col-md-6"><a href="'.asset($docs_html->bank_statement_image).'" target="_blank">  '.(!empty($docs_html->bank_statement_image) ? "view-bank-statement-doc" : "" ).'</a></div>
            </div>
    
            <div class="row">
            <div class="col-md-6"><div class="form-check">
            <input class="form-check-input" type="checkbox" '.(!empty($docs_html->copy_of_ledger_image) ? "checked" :  "").' disabled id="flexCheckDefault"">
            <label class="form-check-label" for="flexCheckDefault">Copy of ledger</label></div></div>
            <div class="col-md-6"><a href="'.asset($docs_html->copy_of_ledger_image).'" target="_blank">  '.(!empty($docs_html->copy_of_ledger_image) ? "view-ladger-doc" : "" ).'</a></div>
            </div>
    
            <div class="row">
            <div class="col-md-6"><div class="form-check">
            <input class="form-check-input" type="checkbox" '.(!empty($docs_html->computation_sheet_image) ? "checked" :  "").' disabled id="flexCheckDefault"">
            <label class="form-check-label" for="flexCheckDefault">Computation sheet</label></div></div>
            <div class="col-md-6"><a href="'.asset($docs_html->computation_sheet_image).'" target="_blank">  '.(!empty($docs_html->computation_sheet_image) ? "view-computation-doc" : "" ).'</a></div>
            </div>
         
          </div>
          
                    <div class="form-group" style="margin-top:30px">
                    <label>PAN card</label>
                    <p><a href="'.asset($docs_html->pan_number_image).'" target="_blank"> '.(!empty($docs_html->pan_number_image) ? "view-pancard" : '').' </a></p></div> 
    
                    <div class="form-group" style="margin-top:30px">
                    <label>Passport card</label>
                    <p><a href="'.asset($docs_html->passport_image).'"  target="_blank"> '.(!empty($docs_html->passport_image) ? "view-passport" : '').' </a></p></div> 
    
                    <div class="form-group" style="margin-top:30px">
                    <label>AADHAR card</label>
                    <p><a href="'.asset($docs_html->aadhar_card).'"  target="_blank"> '.(!empty($docs_html->aadhar_card) ? "view-aadhar-card" : '').' </a></p></div> 
    
                    <p>Add Other Important Documents</p>
    
                    <table id="myTable">
                      <tr>
                    
               ';
    
          foreach($multiple_doc_html as $list){
               $html.='<tr><td><input type="text" readonly  value="'.$list->document_name.'"></td> <td style="padding-left:10px"><a href="'.asset($list->document_image).'" target="_blank">View Doc</a></td>
              
               </tr>';
    
          }
    
              $html.=' </tr>
    
              </table>
              <br>  ';
    
               return $html;
     }
    
     public function submit_workmen_and_employee_delete_multi_docs(Request $request){
    
        $res=db::table('work_and_employee_multi_docs')->where('id',$request->id)->where('submitted',2)->delete();
    
        if($res){
            return response()->json(['status'=>'delete', 'msg'=>'success deleted']);
        }
     }

     public function form_final_submit_(){

        db::table('workmen_and_employee_form_details')->where('user_mdls_id',Session::get('user_id'))->where('submitted',2)->update([
            'submitted'=>1
        ]);

        db::table('work_and_employee_from_step_four_doc')->where('user_id',Session::get('user_id'))->where('submitted',2)->update([
            'submitted'=>1
        ]);

        db::table('work_and_employee_multi_docs')->where('user_id',Session::get('user_id'))->where('submitted',2)->update([
            'submitted'=>1
        ]);

        return response()->json(['status'=>'success']);

     }

     public function  mutidocs_detete_btn(){
        
        $data=db::table('work_and_employee_multi_docs')->where('user_id',Session::get('user_id'))->where('submitted',2)->get();
        $html='';

        foreach($data as $list){

           $html.='<tr id="delete_multi'.$list->id.'"><td><input type="text" name="document_name[]" value="'.$list->document_name.'" placeholder="enter document name"></td>
           <td><input name="document_image[]" type="file"></td>
           <input type="hidden" name="id_miltiple[]" value="'.$list->id.'">
           <input type="hidden" name="document_image_up_[]" value="'.$list->document_image.'"/>
           <td><input class="btn btn-danger" type="button" onclick="remove_image_del('.$list->id.')" value="delete"></td></tr>';

        }

        return response()->json(['status'=>'success', 'data'=>$html]);


     }
    
    }
    