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
        // $check =  $this->getFirstRow(Config::get('site.formEMdl'),$where); 
        $check =  $this->getFirstTableRow(Config::get('site.formEMdl'),$where);

        if ($check) 
        {
            $Bunique_id = $check->unique_id;
        }
        else
        {
            $Bunique_id = $unique_id; 
        }

        //echo print_r($check); die();

        $sign = $this->uploadFile($req, $unique_id, Config::get('site.formEMdl'), $where, '/access/media/forms/formE/documents', 'operational_creditor_signature', 'sign');

     
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
            'year' => '',
            'dat' => Session::has('admin_id') ? date("Y-m-d") : '',
            'admin_id'=> Session::has('admin_id') ? Session::get('admin_id') : '',
            'updated_date'=> Session::has('admin_id') ? \Carbon\Carbon::now() : '',
            'submitted' => isset($check->submitted) ? $check->submitted : 2,
            'mailed' => 2,
            'dat_update_user' => isset($check->dat_update_user) ? $check->dat_update_user : \Carbon\Carbon::now(),
            'date' => isset($check->date) ? $check->date : date("Y-m-d"), //date("Y-m-d"),
            'rem_addr'=> $req->ip(),
            'flag' => 2,
            'deleted' => 2,
            'status' => isset($check) ? 2 : 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now() 
        	];     	
        }
        else
        {
   
        $data = [
            'company' => '',
            'irp' => '',
            'formA'  => '',
            'user_id' => $user_id,
            'form_type'=>$req->form_type ?? "",
            'ar'=> $req->ar ?? "",
            'form_e_selected_id' => isset($req->fid) ? $req->fid : '', 
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
            'operational_creditor_signature' => $sign ?? "",
            
            'unique_id' => $Bunique_id,
            'year' => '',
            'dat' => Session::has('admin_id') ? date("Y-m-d") : '',
            'admin_id'=> Session::has('admin_id') ? Session::get('admin_id') : '',
            'updated_date'=> Session::has('admin_id') ? \Carbon\Carbon::now() : '',
            'submitted' => isset($check->submitted) ? $check->submitted : 2,
            'mailed' => 2,
            'dat_update_user' => isset($check->dat_update_user) ? $check->dat_update_user : \Carbon\Carbon::now(),
            'date' => isset($check->date) ? $check->date : date("Y-m-d"), //date("Y-m-d"),
            'rem_addr'=> $req->ip(),
            'flag' => 2,
            'deleted' => 2,
            'status' => isset($check) ? 2 : 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now() 
        ];
    }

        if ($check) 
        {
            $where2 = [
                    'user_id'=>$user_id,
                    'unique_id'=>$Bunique_id
                ];
            $check2 =  $this->getFirstRow(Config::get('site.formEEmpDtl'),$where2);
            if ($check2) 
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
                            'employee_name' => $employee_name[$i] ?? '',
                            'id_number' =>$id_number[$i] ?? "",
                            'id_details' => $id_details[$i] ?? "",
                            'total_amt' => $total_amt[$i] ?? "",
                            'due_amt_period' => $due_amt_period[$i] ?? "",
                            'unique_id' => $Bunique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now()
                            ];
                        $this->insertData(Config::get('site.formEEmpDtl'),$data3); 
                    } 
                    }
                }

        }
        else
        {
            if (count($employee_name)>0) 
                        {
                               
                        for ($i=0; $i < count($employee_name); $i++) 
                            {
                            if ($employee_name[$i]!="") 
                            {    

                        $data3 = [
                            'user_id'=> $user_id,
                            'form_e_selected_id' => '',
                            'form_e_id' => '',
                            'employee_name' => $employee_name[$i] ?? '',
                            'id_number' =>$id_number[$i] ?? "",
                            'id_details' => $id_details[$i] ?? "",
                            'total_amt' => $total_amt[$i] ?? "",
                            'due_amt_period' => $due_amt_period[$i] ?? "",
                            'submitted' => 2,
                            'unique_id' => $Bunique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now()
                            ];
                        $this->insertData(Config::get('site.formEEmpDtl'),$data3); 
                    } 
                    }
                }
        }



        try
        {
            if ($check) 
            {
                 $condition = [
                    'id'=>$check->id
                ];
                $this->updateData(Config::get('site.formEMdl'), $data, $condition);      
                $response['error'] = false;
                $response['message'] = "Data saved successfully."; 
            }
            else
            {

                $this->insertData(Config::get('site.formEMdl'),$data);
              
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
        
        $unique_id = uniqid().time(); 

        $where2 = [
            'user_id'=>$check->user_id,
            'unique_id'=>$check->unique_id
        ];


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
                                        'updated_at' => \Carbon\Carbon::now()
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
                                            'document_name' => $oth_dc_New[$j] ?? '',
                                            'file' =>$oth_doc_fl6[$j] ?? "",
                                            'unique_id' => $check->unique_id,
                                            'rem_addr' => $req->ip(),
                                            'created_at' => \Carbon\Carbon::now(),
                                            'updated_at' => \Carbon\Carbon::now()
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
                            'document_name' => $oth_dc[$i] ?? '',
                            'file' =>$oth_doc_fl[$i] ?? "",
                            'unique_id' => $check->unique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => \Carbon\Carbon::now(),
                            'updated_at' => \Carbon\Carbon::now()
                            ];
                        $this->insertData(Config::get('site.formEOtherDoc'),$data3); 
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
            'year' => '',
            'dat' => Session::has('admin_id') ? date("Y-m-d") : '',
            'admin_id'=> Session::has('admin_id') ? Session::get('admin_id') : '',
            'updated_date'=> Session::has('admin_id') ? \Carbon\Carbon::now() : '',
            'submitted' => isset($check->submitted) ? $check->submitted : 2,
            'mailed' => 2,
            'dat_update_user' => !Session::has('admin_id') ? \Carbon\Carbon::now() : '',
            'date' => !Session::has('admin_id') ? date("Y-m-d") : '', //date("Y-m-d"),
            'rem_addr'=> $req->ip(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now() 
        ];

        try
        {
            if ($check) 
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
                $dir = publicP()."/access/media/forms/formE/documents/".$check->unique_id;

                $this->updateData(Config::get('site.formEMdl'), $data2, $condition);   
                $cate = $this->formBFilesHandle(Config::get('site.formEMdl'), $condition, $files, $dir);
               // echo $cate; die();

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
        $user_id = Session::get('user_id'); 
        $output = "";
        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user_id)->first();
        if ($req->fid != '') 
        {
            $user = DB::table('form_e_file_mdls');
            $user = $user->where([['form_e_file_mdls.id','=',$req->fid]])->first();
        }
        else
        {
            $user = DB::table('form_e_file_mdls');
            $user = $user->where([['form_e_file_mdls.user_id','=',$user_id],['form_e_file_mdls.submitted','=',2]])->first();
        }
        $output = view('home.formE.partials.declaration', compact("user","cat"));
        echo $output;
       // echo print_r($cat);
    }

    function formERegistrationSubmit(Request $req, UserRegistration $userReg)
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



        $cat = $this->getFirstRow(Config::get('site.formEMdl'),$where);

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
                    'table'=>Config::get('site.formEMdl'),
                    'subject'=>'Form E Submission',
                    'desc'=> 'you have successfully submitted Form E',
                    'mail_type'=>'Form E',
                ];


                $userReg->send($where2, $others);   
                    
                }

                $this->updateData(Config::get('site.formEMdl'), $data, $where);

                $fid = base64_encode($cat->id);
                $user = formEFileMdl::getUser($fid);
              $other_files = formEFileMdl::find($cat->id)->fileB()->get();          
              $emps = formEFileMdl::find($cat->id)->getUserRData()->get();

              
              if(file_exists('public/access/media/forms/formE/documents/'.$user->unique_id.'/Form-E.pdf'))
                    {
                        unlink('public/access/media/forms/formE/documents/'.$user->unique_id.'/Form-E.pdf');    
                    }
              
              $pdf = PDF::loadView('admin.forms.formEPreview', compact("user","other_files","emps"));
              $pdf->save('public/access/media/forms/formE/documents/'.$user->unique_id.'/Form-E.pdf');

                
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

    function removeFormEData(Request $req, $id)
    {
        $response = array();
          
        try
        {
        $where = [
            'id'=>$id
        ];
        
        $cat = $this->getFirstRow(Config::get('site.formEOtherDoc'),$where);
        $pth = '/access/media/forms/formE/documents/'.$cat->unique_id;
        
            if ($cat) 
            {
                if (!empty($cat->file)) 
                {
                    if(file_exists(publicP() . $pth.'/'.$cat->file))
                    {
                        unlink(publicP() . $pth.'/'.$cat->file);    
                    }  
                }

                $this->deleteData(Config::get('site.formEOtherDoc'),$where);    
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


function getFormEUpdatedTable(Request $req)
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
        $check =  $this->getFirstRow(Config::get('site.formEMdl'),$where);

        $other_files = $this->getRecords(Config::get('site.formEOtherDoc'),['unique_id'=>$check->unique_id]);
        $output = view('home.formE.partials.table', compact('other_files'));
        echo $output;


    }

     function getFormEPreview(Request $req)
    {
        $user_id = Session::get('user_id');
        $fid = $req->fid;  
        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user_id)->first();
        if ($fid!='') 
        {
            $user = DB::table('form_e_file_mdls');

            $user = $user->where([['form_e_file_mdls.id','=',$fid]])->first();
        }
        else
        {
            $user = DB::table('form_e_file_mdls');

            $user = $user->where([['form_e_file_mdls.user_id','=',$user_id],['form_e_file_mdls.submitted','=',2]])->first();
        }

           	$where = [
                'user_id' => $user_id,
                'unique_id' => $user->unique_id
            ];
            
            $other_files = $this->getRecords(Config::get('site.formEOtherDoc'),$where); 
            $emps = $this->getRecords(Config::get('site.formEEmpDtl'),$where); 

        $output = view('home.formE.partials.preview', compact("cat","user","other_files","emps"));
        echo $output;

    
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

       // echo print_r($file);die();
        $cat =  $this->getFirstRow(Config::get('site.formEOtherDoc'),$where);

        if ($file) 
        {
        	if(!empty($cat->file))
        {
            if(file_exists(publicP() . '/access/media/forms/formE/documents/'.$cat->unique_id.'/'.$cat->file))
            {
                unlink(publicP() . '/access/media/forms/formE/documents/'.$cat->unique_id.'/'.$cat->file);    
            }
        }
        }

        $id=uniqid().time();
        $fileName = $id.".". $file->getClientOriginalExtension();
        //dd($fileName);   
        $file->move("public/access/media/forms/formE/documents/".$cat->unique_id, $fileName);  
        $updated_file = $fileName;
    	
        $data=[
    		'file'=>$updated_file
    	];

    	$this->updateData(Config::get('site.formEOtherDoc'), $data, $where);
    	//}
    	
    	// else
    	// {
    	// 	$updated_file = $cat->file;
    	// }

    	
     	
	}

}
