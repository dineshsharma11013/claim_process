<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use Config;
use Session;
use DB;

class employeeCntrlr extends Controller
{
	use MethodsTrait;

    function index()
    {
    	$jsl =  bPath().'/'.Config::get('site.general');
    	$result = DB::table('employee_details')->where('status_type','latest')->orderBy('id', 'desc')->get(); 
       	return view('admin.employeeDetails',compact("result","jsl"));
    }


    function addData(Request $req)
    {
    	$jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.employeeValidate');
        return view('admin.addEmployee', compact("jsl","a_vl"));
    }

    function saveData(Request $req)
    {
    	$response = array();

    	$unique_id = uniqid().time();

    	if ($req->file('file')) 
            {


            $pth = publicP()."/access/media/employee/".$unique_id;    
            $dir = $pth;
             if (!is_dir($dir)) 
              {
              mkdir($dir, 0777, TRUE);  
               }     

            $id=uniqid().time();
            $fileName = $id.".". $req->file('file')->getClientOriginalExtension();
            //dd($fileName);   
            $req->file("file")->move($dir, $fileName);  
            $picture = $fileName;
            }
            else
            {
                $picture = "";
            }

    	 $db = DB::table('employee_details')->select('emp_id')->where('emp_type',$req->emp_type)->orderBy('id','desc')->first();
    	 if ($db) 
    	 {
    	 	$invoice_no = $db->emp_id + 1; 
    	 }
    	 else
    	 {
    	 	$invoice_no = 1;
    	 }

    	$data = [
    		'main_id'=>'',
    		'name' => $req->user_name ?? "",
    		'email' => $req->email ?? "",
    		'contact' => $req->mobile ?? "",
    		'design' => $req->design ?? "",
    		'picture' => $picture,
    		'emp_type' => $req->emp_type,
    		'emp_id' => $invoice_no,
    		'empl_id'=> $req->emp_id,
    		'rem_addr' => $req->ip(),
    		'status' => $req->status,
    		'status_type' => 'latest',
    		'unique_id' => $unique_id,
    		'created_by' => Session::get('admin_id'),
    		'created_at' => date('Y-m-d H:i:s'),
    		'updated_by' => '',
    		'updated_at' => '',
    		'deleted_by' => '',
    		'deleted_at' => '',
    	];
    	
    	try
    	{
    		
    		$check = DB::table('employee_details')->where('email',$req->email)->first();
    		if ($check) 
    		{
    			$response['error'] = true;
           	 	$response['message'] = "Email already exists. Please try another";
    		}
    		else
    		{
    			$this->insertData('employee_details',$data);
    			$response['error'] = false;
            	$response['message'] = "Data saved successfully.";
    		}
        }
        catch (\Exception $e) 
        {
            $response['error'] = true;
            $response['message'] = $e->getMessage();//"Data not saved. Try again later";
        }
        echo json_encode($response);

    }


    function getInvoiceNo(Request $req)
    {
    	$emp = $req->emp;
    	$emp_id = $req->emp_id;

    	$inv_no = $this->getInvoice($emp, $emp_id);

    	

    	echo $inv_no;
    }

    function deleteData(Request $req,$id)
    {
    	
    	$response = array();
    	$data = [
    		'status_type'=>'deleted',
    		'rem_addr' => $req->ip(),
    		'deleted_by' => Session::get('admin_id'),
    		'deleted_at' => date('Y-m-d H:i:s'),
    	];

    	try
        {
        	$this->updateData('employee_details', $data, ['id'=>$id]);

            $response['error'] = false;
            $response['message'] = "Data deleted successfully.";
        }
        catch (\Exception $e)
        {
            $response['error'] = true;
            $response['message'] = "Data not deleted. Try again later";
        }
        echo json_encode($response);
    }


    function editData($id)
    {
    	$cat = DB::table('employee_details')->where('id',$id)->first();
        if($cat)
        {
            $jsl =  bPath().'/'.Config::get('site.general');
        	$a_vl =  Config::get('site.employeeValidate');
            return view('admin.updateEmployee', compact("cat","jsl","a_vl"));
        }
        else
        {
            no_data();
	        return redirect(admin().'/employee-details');
        }
    }



    function updateEmpData(Request $req, $id)
    {
    	$response = array();

    	$db = DB::table('employee_details')->where('id',$id)->first();

    	if ($req->file('file')) 
            {

            $pth = publicP()."/access/media/employee/".$db->unique_id;    
            $dir = $pth;
             if (!is_dir($dir)) 
              {
              mkdir($dir, 0777, TRUE);  
               }     

            $ide=uniqid().time();
            $fileName = $ide.".". $req->file('file')->getClientOriginalExtension();
            //dd($fileName);   
            $req->file("file")->move($dir, $fileName);  
            $picture = $fileName;
           

            }
            else
            {
                $picture = $db->picture;
            }
    	 
           //echo $picture;die();

    	 if($db->emp_type==$req->emp_type)
    	 {
    	 	$invoice_no = $db->emp_id;
    	 }
    	 else 
    	 {
    	 	$check = DB::table('employee_details')->select('emp_id')->where('emp_type',$req->emp_type)->orderBy('id','desc')->first();
			if ($check) 
			{
			
    	 	$invoice_no = $db->emp_id + 1; 
    	 	}
	    	 else
	    	 {
	    	 	$invoice_no = 1;
	    	 }
    	}

    	$data2 = [
    		'name' => $req->user_name ?? "",
    		'email' => $req->email ?? "",
    		'contact' => $req->mobile ?? "",
    		'design' => $req->design ?? "",
    		'picture' => $picture,
    		'emp_type' => $req->emp_type,
    		'emp_id' => $invoice_no,
    		'empl_id'=> $req->emp_id,
    		'rem_addr' => $req->ip(),
    		'status' => $req->status,
    		
    		'updated_by' => Session::get('admin_id'),
    		'updated_at' => date('Y-m-d H:i:s'),
    
    	];

    	try
        {
        	$check2 = DB::table('employee_details')->where([['id','!=',$db->id], ['email','=',$req->email]])->first();
    		if ($check2) 
    		{
    			$response['error'] = true;
           	 	$response['message'] = "Email already exists. Please try another";
    		}
    		else
    		{
    			//print_r($data2);die();
    			$this->updateData('employee_details', $data2, ['id'=>$id]);
    			$response['error'] = false;
            	$response['message'] = "Data updated successfully.";
    		}
        }
        catch (\Exception $e)
        {
            $response['error'] = true;
            $response['message'] = $e->getMessage(); //"Data not updated. Try again later";
        }
        echo json_encode($response);	
    }





}
