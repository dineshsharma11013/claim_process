<?php
  
namespace App\Traits;
  
use Illuminate\Http\Request;
use Config;
use DB; 
use Session;
use App\Models\operationalCreditorMdl;
use App\Models\finanicialCreditorFormCMdl;
use App\Models\formDMdls;
use App\Models\formEFileMdl;
use App\Models\otherCreditorFormFMdl;
use App\Models\financialCreditorFormCaMdl;
use PDF;

trait MethodsTrait {

	 public static function insertData($tbl,$data)
    {
    	$db = DB::table($tbl)->insert($data);
    	if($db)
    	{
    		return $db;
    	}
    	else
    	{
    		return false;
    	}
    }

    public static function signUpAuth($tbl)
    {
        $db = DB::table($tbl)->orderBy('id','desc')->first();
        if($db)
        {
            return $db;
        }
        else
        {
            return false;
        }   
    }


    public static function getLatestRow($tbl,$data)
    {
        $db = DB::table($tbl)->where($data)->orderBy('id','desc')->first();
        if($db)
        {
            return $db;
        }
        else
        {
            return false;
        }
    }        

    public static function gen_uid($tbl, $l=11){
            

            $unique_id = substr(str_shuffle("0123456789"), 0, $l);
            
            $check = DB::table($tbl)->where([['user_id','!=',Session::get('user_id')],['user_unique_id','=', $unique_id]])->first();
            if ($check) 
            {
                $unique_id = $unique_id.substr(str_shuffle("0123456789"), 0, 3);
            }

            return $unique_id;
        }


    public static function getFirstRow($tbl,$data)
    {
        $db = DB::table($tbl)->where($data)->latest()->first();
        if($db)
        {
            return $db;
        }
        else
        {
            return false;
        }
    }    

    public static function getRow($tbl,$data)
    {
        $db = DB::table($tbl)->where($data)->first();
        if($db)
        {
            return $db;
        }
        else
        {
            return false;
        }
    }        

    public static function getFirstTableRow($tbl,$data)
    {
        
        $cat = DB::table($tbl)->where($data)->latest()->first();
        if (isset($cat->form_c_selected_id) && $cat->form_c_selected_id != '') 
        {
            $cat = DB::table($tbl)->where('form_c_selected_id',$cat->id)->latest()->first();
        }
        if($cat)
        {
            return $cat;
        }
        else
        {
            return false;
        }
    }    



	public static function deleteData($tbl,$id)
    {
    	$db = DB::table($tbl)->where('id', $id)->delete();
    	if($db)
    	{
    		return $db;
    	}
    	else
    	{
    		return false;
    	}
    }    

    public static function removeData($tbl,$data)
    {
        $db = DB::table($tbl)->where($data)->delete();
        if($db)
        {
            return $db;
        }
        else
        {
            return false;
        }
    }


	public static function editData($tbl,$id)
    {
    	$db = DB::table($tbl)->where('id', $id)->first();
    	if($db)
    	{
    		return $db;
    	}
    	else
    	{
    		return false;
    	}
    }    

    public static function updateData($tbl,$data,$condition)
    {
    	$db = DB::table($tbl)->where($condition)->update($data);
    	if($db)
    	{
    		return $db;
    	}
    	else
    	{
    		return false;
    	}
    }

    public static function getData($tbl,$nm)
    {
        $db = DB::table($tbl)->orderBy($nm, 'desc')->get();
        if($db)
        {
            return $db;
        }
        else
        {
            return false;
        }
    }

    public static function getRecords($tbl,$where, $orderBy="")
    {
        if ($orderBy!='') 
        {
            $db = DB::table($tbl)->where($where)->orderBy($orderBy)->get();
        }
        else
        {
            $db = DB::table($tbl)->where($where)->get();
        }
        
        if($db)
        {
            return $db;
        }
        else
        {
            return false;
        }
    }

   
    public static function getMultipleRecords($tbl, $where)
    {
        $db = DB::table($tbl)->whereIn('id',$where)->get();
        
        if($db)
        {
            return $db;
        }
        else
        {
            return false;
        }   
    }

    function uploadFormFile($req, $unique_id, $tbl, $where, $pth, $file_name, $nm)
    {   
        $check =  DB::table($tbl)->where($where)->latest()->first();
        
        if ($check) 
        {
         $dir = publicP().$pth."/".$check->unique_id;
         if (!is_dir($dir)) 
          {
          mkdir($dir, 0777, TRUE);  
           }  
        if ($req->file($file_name)) 
        {
            if(!empty($check->$file_name))
        {
            if(file_exists($dir.'/'.$check->$file_name))
            {
                unlink($dir.'/'.$check->$file_name);    
            }
        }

        
        $fileName = $nm.'-'.$unique_id.".". $req->file($file_name)->getClientOriginalExtension();
          
        $req->file($file_name)->move($dir,$fileName);  
        $uploaded_file = $fileName;
        return $uploaded_file;
        }
        else
        {
            $uploaded_file = $check->$file_name;
            return $uploaded_file;
        }
        }
        else
        {
            $uploaded_file = "";  
            return $uploaded_file; 
        }

    }


    function uploadFile($req, $unique_id, $tbl, $where, $pth, $file_name, $nm)
    {   
        $check =  DB::table($tbl)->where($where)->orderBy('id','desc')->first();
        
         if ($req->file($file_name)) 
        {  
            if ($check) 
            {
                $dir = publicP().$pth."/".$check->unique_id;
                 if (!is_dir($dir)) 
                  {
                  mkdir($dir, 0777, TRUE);  
                   }                
            }
            else
            {
                $dir = publicP().$pth."/".$unique_id;
                 if (!is_dir($dir)) 
                  {
                  mkdir($dir, 0777, TRUE);  
                   }
            }

            // if (isset($check->submitted)) 
            // {
            // if ($check->submitted == 2) 
            // {
            // if(!empty($check->$file_name))
            // {
            // if(file_exists($dir.'/'.$check->$file_name))
            //     {
            //     unlink($dir.'/'.$check->$file_name);    
            //     }
            // }
            // }
            // }

          
        $uniqueId = uniqid().time();     

        $fileName = $nm.'_'.$uniqueId.".". $req->file($file_name)->getClientOriginalExtension();  
        $req->file($file_name)->move($dir,$fileName);  
        $uploaded_file = $fileName;
        return $uploaded_file;
        }
        else
        {
            // $uploaded_file = $check->$file_name;
            // return $uploaded_file;
            if ($check) 
            {   
            $uploaded_file = $check->$file_name;
            return $uploaded_file;
            }
            else
            {
                $uploaded_file = "";  
                return $uploaded_file;
            }
        }

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
    
    function removeSenctData($table, $id)
    {
        $response = array();
          
        try
        {
        $where = [
            'id'=>$id
        ];
        
        $cat = $this->getFirstRow($table,$where);
            if ($cat) 
            {
                $this->deleteData($table,$where);    
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


    function rmFilesDirs($dir)
    {
        $files = glob($dir.'/*');
            foreach($files as $file){ 
              if(is_file($file)) {
                unlink($file); 
              }
            }
            rmdir($dir);
    }

    function formFilesField($tbl, $where, $selected, $selected_id)
    {


        $check3 =   DB::table($tbl)->where($where)->latest()->first(); //$this->getFirstRow($tbl,$where);


        $result = [
            'company' => isset($check3->company) ? $check3->company : '',
            'irp' => isset($check3->irp) ? $check3->irp : '',
            'formA'  => isset($check3->formA) ? $check3->formA : '',

             $selected_id => $selected, 
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
           
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s') 
        ];
        return $result;
    }

    function formOtherDocFields($tbl, $where, $newId, $selected, $first, $second)
    {
        $records = $this->getRecords($tbl, $where);

        foreach ($records as $rc) 
        { 

            $data=[
                'user_id' => $rc->user_id,
                 $first => $selected,
                 $second => $newId,
                'document_name' => $rc->document_name,
                'file' => $rc->file,
                'submitted' => 2,
                'unique_id' => $rc->unique_id,
                'rem_addr' => $rc->rem_addr,
                'created_at' => date('Y-m-d H:i:s') ,
                'updated_at' => date('Y-m-d H:i:s') 
            ];

            $this->insertData($tbl, $data);
        }

    }

    function formDeclaration($table, $updated_data, $fid, $fm, $sancTbl, $declTbl, $form_selected_id, $form_id)
    {
        $user_id = Session::get('user_id'); 
        $fm_id = Session::get('new_form_id') ? Session::get('new_form_id') : $fid;//Session::get('new_form_id');

        $output = "";
        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user_id)->first();
        
        if ($updated_data == 'edit') 
        {
            $user = DB::table("$table as tbl");
            $user = $user->where([['tbl.id','=',$fm_id]])->first();
        }
        elseif ($updated_data == 'view') 
        {
            $user = DB::table("$table as tbl");
            $user = $user->where([['tbl.id','=',$fid]])->first();
        }
        else
        {
            $user = DB::table("$table as tbl");
            $user = $user->where([['tbl.user_id','=',$user_id],['tbl.submitted','=',2]])->first();
        }
        

        $formA = DB::table("form_a_mdls")->select('id','company_id')->where('id',$user->formA)->first();
        $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
        $senctionDetails = DB::table($sancTbl)->where([[$form_selected_id,'=',$user->$form_selected_id],[$form_id, $user->id]])->get();
        $declarationMdls = DB::table($declTbl)->where([[$form_selected_id,'=',$user->$form_selected_id],[$form_id, $user->id]])->get();

        $output = view('home.'.$fm.'.partials.declaration', compact("user","cat","comp", "senctionDetails", "declarationMdls","updated_data"));
        echo $output;

    }

     function getFormPreview($mainTbl, $fileTbl, $otherTbl, $senctionTbl, $decTbl, $updated_data, $fid, $fm, $fm_id)
    {
       $user_id = Session::get('user_id');
     
        if ($updated_data =='view' || $updated_data =='') 
        {
            $Fid = $fid; 
        }
        else{
            $Fid = Session::has('new_form_id') ? Session::get('new_form_id') : $fid;   
        }    

        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user_id)->first();  
        
        if ($Fid) 
        {
            $user = DB::table("$mainTbl as mnT")
                    ->leftJoin("$fileTbl as flT", 'flT.'.$fm_id,'=', 'mnT.id')
                    ->select('mnT.*','flT.work_purchase_order','flT.invoices','flT.balance_confirmation','flT.any_correspondence','flT.authorisation_letter','flT.bank_statement','flT.ledger_copy','flT.computation_sheet','flT.work_purchase_order_file','flT.invoices_file','flT.balance_confirmation_file','flT.any_correspondence_file','flT.authorisation_letter_file','flT.bank_statement_file','flT.ledger_copy_file','flT.computation_sheet_file','flT.pan_number_file','flT.passport_file','flT.aadhar_card');

                $user = $user->where('mnT.id','=',$Fid)->first();
        }
        else
        {
            $user = DB::table("$mainTbl as mnT")
                    ->leftJoin("$fileTbl as flT", 'flT.'.$fm_id,'=', 'mnT.id')
                    ->select('mnT.*','flT.work_purchase_order','flT.invoices','flT.balance_confirmation','flT.any_correspondence','flT.authorisation_letter','flT.bank_statement','flT.ledger_copy','flT.computation_sheet','flT.work_purchase_order_file','flT.invoices_file','flT.balance_confirmation_file','flT.any_correspondence_file','flT.authorisation_letter_file','flT.bank_statement_file','flT.ledger_copy_file','flT.computation_sheet_file','flT.pan_number_file','flT.passport_file','flT.aadhar_card');

                $user = $user->where([['mnT.user_id','=',$user_id],['mnT.submitted','=',2]])->first();
        }
        $where = [
                'user_id' => $user_id,
                 $fm_id => isset($Fid) ? $Fid : Session::get('new_form_id'),//Session::has('new_form_id') ? Session::get('new_form_id') : $fid,
                'unique_id' => $user->unique_id
            ];

        $other_files = $this->getRecords($otherTbl, $where); 
        
        $formA = DB::table('form_a_mdls')->where('id',$user->formA)->first(); 
        $comp = DB::table("company_dtls")->select('id','name')->where('id',$formA->company_id)->first();
        $ip = DB::table('general_info_mdls')->select('username', 'address')->where('id',$formA->user_id)->first(); 

        $senctions = $this->getRecords($senctionTbl,$where);  
        $declarationMdls = $this->getRecords($decTbl,$where); 

        $output = view('home.'.$fm.'.partials.preview', compact("cat","user","other_files","ip","comp", "senctions", "declarationMdls", "updated_data"));
        echo $output;
      
    
    }


    function getSignature($tbl, $updated_data, $fid, $fm)
    {
         $user_id = Session::get('user_id'); 
        if ($updated_data =='view') 
        {
            $where = [
            'id'=>$fid
        ];
        }
        elseif ($updated_data =='edit') 
        {
         $where = [
            'id'=> Session::has('new_form_id') ? Session::get('new_form_id') : $fid
        ];   
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }

        if ($fm=='formB' || $fm == 'formC' || $fm == 'formD' || $fm == 'formE') 
        {
            $img = 'operational_creditor_signature';
        }
        elseif ($fm == 'formF' || $fm == 'formCa') 
        {
            $img = 'fc_signature';
        }
        



        //echo print_r($where);die();

        $db = DB::table($tbl)
                ->select($img.' as sign', 'unique_id as unId', 'id')
                ->where($where)
                ->first();
        $form = $fm;    

       // echo print_r($db);die();

        $output = view('front.include.signature', compact("db", "form"));
        echo $output;

    }


    function getFormUpdatedTable($mnT, $otherTbl, $updated_data, $fid, $fl, $fm_id)
    {
        $user_id = Session::get('user_id'); 
        // if ($updated_data =='view' || $updated_data =='') 
        if ($updated_data =='view') 
        {
            $where = [
            'id'=>$fid
        ];
        }
        elseif ($updated_data =='edit') 
        {
         $where = [
            'id'=> Session::has('new_form_id') ? Session::get('new_form_id') : $fid
        ];   
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }

        $check =  $this->getFirstRow($mnT,$where);

       //  echo print_r($check);die();

      //  echo "string";die();

        $other_files = $this->getRecords($otherTbl,[$fm_id=>$check->id]);
            
       // echo print_r($other_files);die();    

        $output = view('home.'.$fl.'.partials.table', compact('other_files', 'check'));
        echo $output;
    }


    function getFormUpdatedFileData($mnT, $fileTbl, $updated_data, $fid, $fl, $fm_id)
    {
        $user_id = Session::get('user_id'); 
        if ($updated_data =='view') 
        {
            $where = [
            'id'=>$fid
        ];
        }
        elseif ($updated_data =='edit') 
        {
         $where = [
            'id'=> Session::has('new_form_id') ? Session::get('new_form_id') : $fid
        ];   
        }
        else
        {
        $where = [
            'user_id'=>$user_id,
            'submitted'=>2
        ];
        }
        $check =  $this->getFirstRow($mnT,$where);
        // echo print_r($check);die();
        $user = $this->getLatestRow($fileTbl,[$fm_id=>$check->id]);
        $output = view('home.'.$fl.'.partials.files', compact('user'));
        echo $output;   
    }


    function removeFormData($tbl, $id, $fm)
    {
        $response = array();
          
        try
        {
        $where = [
            'id'=>$id
        ];
        
        $cat = $this->getFirstRow($tbl, $where);
        $pth = '/access/media/forms/'.$fm.'/documents/'.$cat->unique_id;
        
            if ($cat) 
            {
                // if (!empty($cat->file)) 
                // {
                //     if(file_exists(publicP() . $pth.'/'.$cat->file))
                //     {
                //         unlink(publicP() . $pth.'/'.$cat->file);    
                //     }  
                // }

                $this->deleteData($tbl,$where);    
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


    function updateFileData($tbl, $indx, $rqTbl, $other_doc_file, $id, $fm)
    {
        $user_id = Session::get('user_id'); 
        $index = $indx;
        $table = $rqTbl;
        $files = $other_doc_file;
        
        $file = $files[$index];
        

        $where= [
            'id'=>$id
        ];  


        $cat =  $this->getFirstRow($tbl,$where);

        $id=uniqid().time();
        $fileName = $id.".". $file->getClientOriginalExtension();
        //dd($fileName);   
        $file->move("public/access/media/forms/".$fm."/documents/".$cat->unique_id, $fileName);  
        $updated_file = $fileName;
        
        $data=[
            'file'=>$updated_file
        ];
        $this->updateData($tbl, $data, $where);   
    }

    function checkTableRecord($tbl, $where, $selected_id)
    {
        $check = $this->getLatestRow($tbl, $where);
        $user_id = Session::get('user_id'); 


        $cond1 = [
           'user_id'=>$user_id,                 
            $selected_id=>$check->$selected_id,
            'submitted'=>1,
            'status'=>2
        ];

        $cond2 = [
            'user_id'=>$user_id,
            $selected_id=>$check->$selected_id,
            'submitted'=>1,
            'status'=>1
        ];


        $this->updateData($tbl, ['formType'=>'first'], $cond2);
        
        $ch2 = $this->getLatestRow($tbl, $cond1);

        if ($ch2) 
        {
            $this->updateData($tbl, ['formType'=>'updated'], $cond1);
        }
        
        $this->updateData($tbl, ['formType'=>'latest'], ['id'=>$check->id]);             

    }

 function updateFormApproval($tbl, $where, $selected_id)
    {
         $check = $this->getLatestRow($tbl, $where);

         $this->updateData($tbl, ['formType'=>'updated'], [$selected_id=>$check->$selected_id]);                    

         $this->updateData($tbl, ['formType'=>'latest'], ['id'=>$check->id]);                     
    }

    function formSenctionFields($tbl, $where, $newId, $selected, $fId, $sId)
    {
        $records = $this->getRecords($tbl, $where);

        foreach ($records as $rc) 
        { 

            $data=[
                'user_id' => $rc->user_id,
                 $fId => $selected,
                 $sId => $newId,
                'date' => $rc->date,
                'senction_amt' => $rc->senction_amt,
                'submitted' => 2,
                'unique_id' => $rc->unique_id,
                'rem_addr' => $rc->rem_addr,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s') 
            ];

            $this->insertData($tbl, $data);
        }

    }



    function fileHandling($req, $tbl, $oth_dc, $other_doc_id, $selected_id, $fm_id, $fm, $file_name, $where, $mnT)
    {
        $check =  $this->getFirstRow($mnT,$where); 

        $user_id = Session::get('user_id'); 
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
        
       
       $cats = DB::table($tbl)->select('id')->where('unique_id', $check->unique_id)->first(); 
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
                                        DB::table($tbl)->where('id', $oldRow[$k])->update($data5);
                               
                                }

                                } 

                        if(count($oth_dc_New)>0)
                                {         

                                    if($req->hasfile($file_name))
                                                 {
                                                    $dir = publicP()."/access/media/forms/".$fm."/documents/".$check->unique_id;
                                                  
                                                    foreach($req->file($file_name) as $image)
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
                                             $selected_id => $check->$selected_id ? $check->$selected_id : $check->id,
                                             $fm_id => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
                                            'document_name' => $oth_dc_New[$j] ?? '',
                                            'file' =>$oth_doc_fl6[$j] ?? "",
                                            'submitted'=>2,
                                            'unique_id' => $check->unique_id,
                                            'rem_addr' => $req->ip(),
                                            'created_at' => date('Y-m-d H:i:s'),
                                            'updated_at' => date('Y-m-d H:i:s')
                                            ];
                                          

                                       // echo print_r($data6); die();
                                           DB::table($tbl)->insert($data6);
                                    }             
                                   }         
                               
                                }        



                   } 
                   else
                   {
                        if($req->hasfile($file_name))
                             {
                                $dir = publicP()."/access/media/forms/".$fm."/documents/".$check->unique_id;
                              
                                foreach($req->file($file_name) as $image)
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
                             $selected_id => $check->$selected_id ? $check->$selected_id : $check->id,
                             $fm_id => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
                            'document_name' => $oth_dc[$i] ?? '',
                            'file' =>$oth_doc_fl[$i] ?? "",
                            'submitted'=>$check->submitted,
                            'unique_id' => $check->unique_id,
                            'rem_addr' => $req->ip(),
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                            ];
                        $this->insertData($tbl, $data3); 
                    } 
                    }
                }
                   }
    }




    function senctionDetail($dt, $secDtl, $other_senc_id, $tbl, $tbl_id, $selected_tbl, $form_selected_id, $form_id)
    {
        $newRow = array();
        $oldRow = array();
        $other = array();

        $check = DB::table($selected_tbl)->where('id', $tbl_id)->first();

        if ($other_senc_id) 
        {
        foreach ($other_senc_id as $val) 
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
      //echo print_r($check);die();

        if (count($newRow)>0) 
        {
            $other = array_slice($dt, count($oldRow)); 
            $other2 = array_slice($secDtl, count($oldRow));
        }
       //  echo print_r($selected_tbl);die();

        $cats = DB::table($tbl)->select('id')->where('unique_id', $check->unique_id)->first(); 
         //echo print_r($cats);die();    

            if ($cats)    
                    {  
                       if (count($oldRow)>0) 
                          {
                                                
                            for ($k=0; $k < count($oldRow); $k++) 
                            {   
                                        $data5 = [
                                        'date' => $dt[$k] ?? "",
                                        'senction_amt'=>$secDtl[$k] ?? "",
                                        'rem_addr' => $check->rem_addr,
                                        'updated_at' => date('Y-m-d H:i:s')
                                        ]; 
                                        DB::table($tbl)->where('id', $oldRow[$k])->update($data5);
                                      //  echo $oldRow[$k];
                                }
                                } 
                        if(count($other)>0)
                                {         

                    
                                  for ($j=0; $j < count($other); $j++) 
                                  {
                                    if ($other[$j]!='') 
                                    {
                                    
                                  $data6 = [
                                            'user_id'=> Session::get('user_id'),
                                            $form_selected_id => $check->$form_selected_id,
                                            $form_id => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
                                            'date' => $other[$j] ?? '',
                                            'senction_amt' =>$other2[$j] ?? "",
                                            'submitted'=>2,    
                                            'unique_id' => $check->unique_id,
                                            'rem_addr' => $check->rem_addr,
                                            'created_at' => date('Y-m-d H:i:s'),
                                            'updated_at' => date('Y-m-d H:i:s')
                                            ];
                                          
                                         if (!empty($other[$j])) 
                                         {

                                           DB::table($tbl)->insert($data6);
                                        
                                       }
                                    }             
                                   }         
                               
                                }        

                   } 
                   else
                   {

                        if ($dt) 
                        { 
                           
                      //   echo print_r($tbl);die();        
                        for ($i=0; $i < count($dt); $i++) 
                            {
                            if ($dt[$i]!="") 
                            {    

                        $data3 = [
                            'user_id'=> Session::get('user_id'),
                            $form_selected_id => $check->$form_selected_id,
                            $form_id => Session::has('new_form_id') ? Session::get('new_form_id') : $check->id,
                            'date' => $dt[$i] ?? '',
                            'senction_amt' =>$secDtl[$i] ?? "",
                            'submitted'=>$check->submitted,
                            'unique_id' => $check->unique_id,
                            'rem_addr' => $check->rem_addr,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s')
                            ];

                        if (!empty($secDtl[$i])) 
                        {
                            $this->insertData($tbl,$data3); 

                        }    
                        
                    } 
                    }
                }
                   
                }
    }


    function getFormBUserReport($main_id, $other_id)
    {
        $first = DB::table('operational_creditor_mdls')->where([['id','=', $other_id],['form_b_selected_id','=',$main_id]])->first(); 


        $fid = base64_encode($other_id);

        $formA = DB::table('form_a_mdls')->where('id',$first->formA)->first(); 

        $comp = DB::table('company_dtls')->select('id', 'name')->where('id',$formA->company_id)->first();         
        $ip = DB::table('general_info_mdls')->select('username', 'address')->where('id',$formA->user_id)->first();         

        $user = operationalCreditorMdl::getUserRData($fid);
        //$other_files = operationalCreditorMdl::fileB($other_id);

        $where = [
          'form_b_id'=>$other_id
        ];

        $other_files = $this->getRecords(Config::get('site.formBOtherDoc'), $where);
        $senctions = $this->getRecords(Config::get('site.formBSenctionMdl'), $where);  
        $declarationMdls = $this->getRecords(Config::get('site.formBDecTblMdl'), $where);  
        
      //  echo print_r($declarationMdls);die();

        $pdf = PDF::loadView('admin.pdf.formB', compact("user","other_files","ip", "comp", "senctions", "declarationMdls"));
        return $pdf;
    }

    function getFormCUserReport($main_id, $other_id)
    {
        $first = DB::table('finanicial_creditor_form_c_mdls')->where([['id','=', $other_id],['form_c_selected_id','=',$main_id]])->first(); 

        $fid = base64_encode($other_id);

        $formA = DB::table('form_a_mdls')->where('id',$first->formA)->first(); 
        $comp = DB::table('company_dtls')->select('id', 'name')->where('id',$formA->company_id)->first(); 
        $ip = DB::table('general_info_mdls')->select('username', 'address')->where('id',$formA->user_id)->first();

        $user = finanicialCreditorFormCMdl::getUserRData($fid);
       
        $where = [
          'form_c_id'=>$other_id
        ];

        $other_files = $this->getRecords(Config::get('site.formCOtherDoc'), $where);
        $senctions = $this->getRecords(Config::get('site.formCSenctionMdl'), $where);  
        $declarationMdls = $this->getRecords(Config::get('site.formCDecTblMdl'), $where);  

        $borrower_claim_amount = is_numeric($user->borrower_claim_amount) ? $user->borrower_claim_amount : 0;
        $guarantor_claim_amount = is_numeric($user->guarantor_claim_amount) ? $user->guarantor_claim_amount : 0;
        $financial_claim_amt = is_numeric($user->financial_claim_amt) ? $user->financial_claim_amt : 0;

         $total_amount = $borrower_claim_amount + $guarantor_claim_amount + $financial_claim_amt;


        // echo print_r($user);die();

        $pdf = PDF::loadView('admin.pdf.formC', compact("user","other_files","ip","comp","total_amount","senctions","declarationMdls"));
        return $pdf;
    }

    function getFormDUserReport($main_id, $other_id)
    {
        $first = DB::table('form_d_mdls')->where([['id','=', $other_id],['form_d_selected_id','=',$main_id]])->first(); 

        $fid = base64_encode($other_id);

        $formA = DB::table('form_a_mdls')->where('id',$first->formA)->first(); 
        $comp = DB::table('company_dtls')->select('id', 'name')->where('id',$formA->company_id)->first();
        $ip = DB::table('general_info_mdls')->select('username', 'address')->where('id',$formA->user_id)->first();

        $user = formDMdls::getUserRData($fid);
        $where = [
          'form_d_id'=>$other_id
        ];

    
        $other_files = $this->getRecords(Config::get('site.formDOtherDoc'), $where);
        $senctions = $this->getRecords(Config::get('site.formDSenctionMdl'), $where);  
        $declarationMdls = $this->getRecords(Config::get('site.formDDecTblMdl'), $where); 


        $pdf = PDF::loadView('admin.pdf.formD', compact("user","other_files","ip","comp", "senctions", "declarationMdls"));
        return $pdf;
    }

    function getFormEUserReport($main_id, $other_id)
    {
         $fid = base64_encode($other_id);
        //$user = formEFileMdl::find($fid)->getUserRData()->get();//formEFileMdl::getUserRData();
        $user = formEFileMdl::find($other_id);
        $emps =  formEFileMdl::empDetail($other_id);
        $other_files = formEFileMdl::fileB($other_id);

        $formA = DB::table('form_a_mdls')->where('id',$user->formA)->first(); 
        $comp = DB::table('company_dtls')->select('id', 'name')->where('id',$formA->company_id)->first();
        $ip = DB::table('general_info_mdls')->select('username', 'address')->where('id',$formA->user_id)->first();

        $total_amt = DB::table("form_e_employee_detail_mdls")->where([['form_e_selected_id','=', $user->form_e_selected_id],['form_e_id','=',$user->id]])->sum('total_amt');
        
        $cat = DB::table("user_mdls")->select('id','name','email','mobile','address')->where('id',$user->user_id)->first();

        $pdf = PDF::loadView('admin.pdf.formE', compact("user","other_files","emps","cat","ip","comp", "total_amt"));
        return $pdf;
    }

    function getFormFUserReport($main_id, $other_id)
    {
        $first = DB::table('other_creditor_form_f_mdls')->where([['id','=', $other_id],['form_f_selected_id','=',$main_id]])->first(); 

        $formA = DB::table('form_a_mdls')->where('id',$first->formA)->first(); 
        $comp = DB::table('company_dtls')->select('id', 'name')->where('id',$formA->company_id)->first();
        $ip = DB::table('general_info_mdls')->select('username', 'address')->where('id',$formA->user_id)->first();

        $fid = base64_encode($other_id);
        $user = otherCreditorFormFMdl::getUserRData($fid);
        
        $where = [
          'form_f_id'=>$other_id
        ];

        $other_files = $this->getRecords(Config::get('site.formFOtherDoc'), $where);
        $senctions = $this->getRecords(Config::get('site.formFSenctionMdl'), $where);  
        $declarationMdls = $this->getRecords(Config::get('site.formFDecTblMdl'), $where); 
        $pdf = PDF::loadView('admin.pdf.formF', compact("user","other_files","ip","comp", "senctions", "declarationMdls"));
        return $pdf;

    }

    function getFormCAUserReport($main_id, $other_id)
    {
        $first = DB::table('financial_creditor_form_ca_mdls')->where([['id','=', $other_id],['form_ca_selected_id','=',$main_id]])->first(); 

        $formA = DB::table('form_a_mdls')->where('id',$first->formA)->first(); 
        $comp = DB::table('company_dtls')->select('id', 'name')->where('id',$formA->company_id)->first();
        $ip = DB::table('general_info_mdls')->select('username', 'address')->where('id',$formA->user_id)->first();

        $fid = base64_encode($other_id);
        $user = financialCreditorFormCaMdl::getUserRData($fid);

        $where = [
          'form_ca_id'=>$other_id
        ];

    
        $other_files = $this->getRecords(Config::get('site.formCaOtherDoc'), $where);
        $senctions = $this->getRecords(Config::get('site.formCASenctionMdl'), $where);  
        $declarationMdls = $this->getRecords(Config::get('site.formCADecTblMdl'), $where); 

        $pdf = PDF::loadView('admin.pdf.formCA', compact("user","other_files","ip","comp", "senctions", "declarationMdls"));
        return $pdf;
    }


    public static function singleData($dt, $other_senc_id, $tbl, $tbl_id, $selected_tbl)
    {
        $newRow = array();
        $oldRow = array();
        $other = array();

        $check = DB::table($selected_tbl)->where('id', $tbl_id)->first();

        if ($other_senc_id) 
        {
        foreach ($other_senc_id as $val) 
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
  
          //echo print_r($dt);die();

        if (count($newRow)>0) 
        {
            $other = array_slice($dt, count($oldRow)); 
        }
       //  echo print_r($selected_tbl);die();

        $cats = DB::table($tbl)->select('id')->where('form2_id', $tbl_id)->first(); 
       // echo print_r($cats);die();    
       
        if ($cats)    
                    {  
                       if (count($oldRow)>0) 
                          {
                                                
                            for ($k=0; $k < count($oldRow); $k++) 
                            {   
                                        $data5 = [
                                        'in_matter_corporate_debtor_name' => $dt[$k] ?? "",    
                                        'updated_at' => date('Y-m-d H:i:s')
                                        ]; 
                                        DB::table($tbl)->where('id', $oldRow[$k])->update($data5);
                                      //  echo $oldRow[$k];
                                }
                                } 
                        if(count($other)>0)
                                {         

                    
                                  for ($j=0; $j < count($other); $j++) 
                                  {
                                    if ($other[$j]!='') 
                                    {
                                    
                                  $data6 = [
                                            'in_matter_corporate_debtor_name' => $other[$j] ?? '',
                                            'ip_id'=> $check->created_by_id,//Session::get('admin_id'),
                                            'form2_id'=>$check->id, 
                                            'created_at'=>date('Y-m-d H:i:s'), 
                                            'updated_at'=>date('Y-m-d H:i:s')
                                            ];
                                         if (!empty($other[$j])) 
                                         {

                                           DB::table($tbl)->insert($data6);
                                        
                                       }
                                    }             
                                   }         
                               
                                }        

                   } 
                   else
                   {

                        if ($dt) 
                        { 
                           
                        // echo print_r($dt);die();        
                        for ($i=0; $i < count($dt); $i++) 
                            {
                            if ($dt[$i]!="") 
                            {    

                        $data3 = [
                            'ip_id'=> Session::get('admin_id'),
                            'form2_id'=>$check->id, 
                            'in_matter_corporate_debtor_name' => $dt[$i] ?? '',
                            'created_at'=>date('Y-m-d H:i:s'), 
                            'updated_at'=>''
                            ];
                            DB::table($tbl)->insert($data3);
                                                       
                    } 
                    }
                }
                   
                }

    }

     function multipleData2($name, $comDt, $expDt, $tbl, $fm_id, $other=NULL)
    {
        $otherVl = $other ?? [];
        $otherC = count($otherVl);

        if ($otherC>0) 
        {
            for($i=0; $i < count($name); $i++) 
             {
                if($i < $otherC)
                {



                DB::table($tbl)
            ->where('id', $otherVl[$i])
            ->update(['name_of_corporate_debtor'=>$name[$i] ?? '', 'commencement_date'=>$comDt[$i] ?? '' ,'expected_date_closure_process'=>$expDt[$i] ?? '', 'updated_at'=>date('Y-m-d H:i:s')]);    
                }
                else
                {
                   $data = [
                            'form2_id'=>$fm_id, 
                            'name_of_corporate_debtor' => $name[$i] ?? '',
                            'commencement_date'=>$comDt[$i] ?? '',
                            'expected_date_closure_process'=> $expDt[$i] ?? '',
                            'created_at'=>date('Y-m-d H:i:s'), 
                            'updated_at'=>''
                            ];
                $this->insertData($tbl , $data); 
                    }
                }
        }
        else
        {
            if(count($name) > 0)
            {
             for($i=0; $i < count($name); $i++) 
             {
                if ($name[$i]!='') 
                {

                    $data = [
                            'form2_id'=>$fm_id, 
                            'name_of_corporate_debtor' => $name[$i] ?? '',
                            'commencement_date'=>$comDt[$i] ?? '',
                            'expected_date_closure_process'=> $expDt[$i] ?? '',
                            'created_at'=>date('Y-m-d H:i:s'), 
                            'updated_at'=>''
                            ];
                $this->insertData($tbl , $data);
                }
                 
             }
            }    
        }
    }

     function addMulData($dsclsrd, $tbl, $fm_id, $mnT, $fd1, $fd2, $other=NULL)
    {
        
        $otherVl = $other ?? [];
        $otherC = count($otherVl);

        if ($otherC>0) 
        {
            for($i=0; $i < count($dsclsrd); $i++) 
             {
                if($i < $otherC)
                {
                DB::table($tbl)
            ->where('id', $otherVl[$i])
            ->update([$fd2=>$dsclsrd[$i], 'updated_at'=>date('Y-m-d H:i:s')]);    
                }
                else
                {
                    $data= [
                $fd1=>$fm_id,
                $fd2=>$dsclsrd[$i] ?? '', 
                'created_at'=>date('Y-m-d H:i:s'), 
                'updated_at'=>''];
                $this->insertData($tbl , $data); 
                    }
                }
        }
        else
        {
            if(count($dsclsrd) > 0)
            {
             for($i=0; $i < count($dsclsrd); $i++) 
             {
                if ($dsclsrd[$i]!='') 
                {
                    $data= [
                $fd1=>$fm_id,
                $fd2=>$dsclsrd[$i] ?? '', 
                'created_at'=>date('Y-m-d H:i:s'), 
                'updated_at'=>''];
                $this->insertData($tbl , $data);
                }
                 
             }
            }    
        }
        

        
    }

    public function getInvoice($emp, $emp_id=NULL)
    {
        $check = DB::table('employee_details')->select('empl_id')->where([['id','=',$emp_id],['emp_type','=',$emp]])->first();

        if ($check) 
        {
            $inv_no = $check->empl_id;
        }
        else
        {
        $db = DB::table('employee_details')->select('emp_id')->where('emp_type',$emp)->orderBy('id','desc')->first();
         if ($db) 
         {
            $invoice_no = $db->emp_id + 1; 
         }
         else
         {
            $invoice_no = 1;
         }
         $inv_no = $emp.'1'.str_pad($invoice_no,3,"0",STR_PAD_LEFT);
        }

         
        return $inv_no;
    }


    



}