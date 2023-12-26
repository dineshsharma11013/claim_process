<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Models\caseAssignMdl;
use Config;
use Session;
use DB;

class caseCntrlr extends Controller
{
	use MethodsTrait;

    function index($id)
    {
    	$users = DB::table('case_assign_mdls as td')
              ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to')
              ->leftJoin('company_dtls as cm', 'cm.id', '=', 'td.company_id');
          $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['td.company_id', '=', $id]]); 

          $users =  $users->select('td.id as id', 'td.company_id','gen.first_name as name', 'td.cases', 'td.status', 'td.created_at', 'td.updated_at', 'cm.name as company')->orderBy('td.id', 'desc')->get();
 			   	
		//echo $id;die();          

 	// echo "<pre>";
 	// echo print_r($users);
 	// echo "</pre>";
 	// die();				   	
    	return view('admin.caseAssignList', compact("users", "id"));	
    }

    function assignCase($id)
    {

    	$jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.caseAssign');
    	
        $users = DB::table('general_info_mdls as gen')
        			->where([['gen.sub_user', '=', Session::get('admin_id')], ['gen.status', '=', 1], ['gen.flag', '=', 2]])
        			->orderBy('first_name')
        			->pluck('first_name', 'id');

  //       echo "<pre>";
 	// echo print_r($users);
 	// echo "</pre>";
 	// die();

    	return view('admin.caseAssign', compact("id", "a_vl", "jsl", "users"));	
    }

    function saveAssignCase(Request $req, $id)
    {
    	$response = array();

    	$check = DB::table("case_assign_mdls")->where([['created_by_id', '=', Session::get('admin_id')], ['company_id', '=', $req->company_id], ['assigned_to', '=', $req->assigned_to]])->first();
    	if($check)
          {
            $response['error'] = true;
            $response['message'] = "Task already assined to this team member.";
            echo json_encode($response);die();
          }

    	$data = [
    		'created_by_id'=> Session::get('admin_id'),
    		'company_id' => $req->company_id,
    		'assigned_to' => $req->assigned_to,
    		'cases' => implode(', ', $req->rights) ?? "",
    		'rem_addr' => $req->ip(),
    		'status' => $req->status,
    		'created_at' => date('Y-m-d H:i:s'),
    		'updated_at' => '',
    		'deleted_at' => '',
    		'updated_by' => '',
    		'deleted_by' => ''
    	];

    	$check = $this->insertData('case_assign_mdls',$data); 

		if($check)
		{
		            $response['error'] = false;  
		            $response['message'] = "Case Assigned Successfully";
		}
		 else
		 {
		    		$response['error'] = true;
		            $response['message'] = "Case Not Assigned. Try Again Later.";
		 }   

		    echo json_encode($response);
		    
    }


 function editAssignCase($cmp, $id)
    {

    	$jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.caseAssign');
    	
        $users = DB::table('general_info_mdls as gen')
        			->where([['gen.sub_user', '=', Session::get('admin_id')], ['gen.status', '=', 1], ['gen.flag', '=', 2]])
        			->orderBy('first_name')
        			->pluck('first_name', 'id');
       $cat = DB::table('case_assign_mdls')->where('id', $id)->first(); 			

  	//     echo "<pre>";
 	// echo print_r($users);
 	// echo "</pre>";
 	// die();

    	return view('admin.editCaseAssign', compact("id", "a_vl", "jsl", "users", "cmp", "cat"));	
    }

    function updateAssignCase(Request $req, $cmp, $id)
    {
    	$response = array();

    	$check = DB::table("case_assign_mdls")->where([['created_by_id', '=', Session::get('admin_id')], ['company_id', '=', $req->company_id], ['assigned_to', '=', $req->assigned_to], ['id', '!=', $id]])->first();
    	if($check)
          {
            $response['error'] = true;
            $response['message'] = "Task already assined to this team member.";
            echo json_encode($response);die();
          }

    	$data = [
    		
    		
    		'assigned_to' => $req->assigned_to,
    		'cases' => implode(', ', $req->rights) ?? "",
    		'rem_addr' => $req->ip(),
    		'status' => $req->status,
    		
    		'updated_at' => date('Y-m-d H:i:s'),
    		
    		'updated_by' => Session::get('admin_id'),
    		
    	];

    	$check = $this->updateData('case_assign_mdls',$data, ['id'=>$id]); 

		if($check)
		{
		            $response['error'] = false;  
		            $response['message'] = "Case Updated Successfully";
		}
		 else
		 {
		    		$response['error'] = true;
		            $response['message'] = "Case Not Updated. Try Again Later.";
		 }   

		    echo json_encode($response);
		    
    }


    function deleteAssignCase($id)
    {
    	$response = array();
        $cat = caseAssignMdl::find($id); 
   
        if ($cat->delete()) 
          {
            $response['error'] = false;
            $response['message'] = "Successfully Deleted";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Not Deleted. Try Again Later.";
          }
        
        echo json_encode($response);
    }

}
