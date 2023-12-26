<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\todoMdl;
use App\Models\generalInfoMdl;
use App\Traits\MethodsTrait;
use Config;
use Session;
use DB;


class todoCntrlr extends Controller
{
	use MethodsTrait;

    function index(Request $req)
    {
    	$jsl =  bPath().'/'.Config::get('site.general');	


    	if (userType()->user_type==2 && userType()->sub_user!='') 
    	{
    		$users = DB::table('todo_mdls as td')
    					->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');
 
    			$users = $users->where([['td.assigned_to', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['task_type', '=', 'latest']]);
    					
    			$users = $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.status', 'td.start_date', 'td.created_at', 'td.updated_at')->orderBy('td.id', 'desc')->get();

    		return view('admin.todoDetails_subIp', compact("jsl", "users"));
    	}

    	else if (userType()->user_type==2 && userType()->sub_user=='')
    					{
    	$users = DB::table('todo_mdls as td')
    					->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to'); 		
    			$users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['task_type', '=', 'latest']]);
    					
    			$users =	$users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.status', 'td.start_date', 'td.created_at', 'td.updated_at', 'td.cirp_name', 'td.comapny')->orderBy('td.id', 'desc')->get();

    	$companies = DB::table('company_dtls')->select('id','name')->get();		

    	//echo dd($users);die();
    			// echo "<pre>";
    			// echo print_r($companies);
    			// echo "</pre>";
    			// die();

    	return view('admin.todoDetails', compact("jsl", "users", "companies"));
    
    	}
    }


    function assignTask()
    {
    	$jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.todoVal');

        $updated_uniqueUsers = getCompanyDetails();

        // echo "<pre>";
        // echo print_r($updated_uniqueUsers);
        // echo "</pre>";die();

        $users = DB::table('general_info_mdls')->where([['sub_user', '=', Session::get('admin_id')], ['flag', '=', 2]])->pluck('first_name', 'id');
       // dd($users);die();
    	return view('admin.assignTask', compact("jsl", "a_vl", "users", "updated_uniqueUsers"));
    }

    function saveAssignTask(Request $req)
    {
    	$response = array();
        $cat = new todoMdl;

        $cat->task_main_id = "";
        
        $cat->cirp_name = $req->cirp_name ?? "";
        $cat->comapny = $req->comapny ?? "";

        $cat->task = $req->task ?? "";
        $cat->assigned_to = $req->assigned_to ?? "";
        $cat->message = $req->desc ?? "";
        $cat->status = $req->status ?? "";

        $cat->start_date = $req->start_date ?? ""; 
        $cat->end_date =  $req->end_date ?? "";
        $cat->set_as_draft = "";	

        $cat->rem_addr = $req->ip();
      
        $cat->created_at = date('Y-m-d H:i:s');
        $cat->updated_at = "";
        $cat->deleted_at = "";

        $cat->created_by_id = Session::get('admin_id');
        $cat->updated_by = "";
        $cat->deleted_by = "";
        $cat->task_type = "latest";
        

      
        if($cat->save())
        {
        	$cat = DB::table('todo_mdls')->where([['created_by_id', '=', Session::get('admin_id')], ['deleted_by', '=', '']])->orderBy('id', 'desc')->first();
        	DB::table('todo_mdls')->where('id', $cat->id)->update(['task_main_id'=>$cat->id]);

            $response['error'] = false;	
            $response['message'] = "Task Assigned Successfully";

          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Task Not Assigned. Try Again Later.";
          }
        
        echo json_encode($response);
    }


    function editAssignTask(Request $req, $id)
    {
    	$jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.todoVal');
       
        $updated_uniqueUsers = getCompanyDetails();

        $cat = DB::table('todo_mdls');
        			if (userType()->user_type==2 && userType()->sub_user=='')
    					{
        	$cat =	$cat->where([['created_by_id', '=', Session::get('admin_id')], ['deleted_by', '=', '']]);
        			}
        			elseif (userType()->user_type==2 && userType()->sub_user!='')
        			{
        			$cat =	$cat->where([['assigned_to', '=', Session::get('admin_id')], ['deleted_by', '=', '']]);	
        			}
        	$cat = $cat->where('id', $id)->orderBy('id', 'desc')->first();		



        $users = DB::table('general_info_mdls')->where([['sub_user', '=', Session::get('admin_id')], ['flag', '=', 2]])->pluck('first_name', 'id');
      //  dd($cat);die();
    	return view('admin.editAssignTask', compact("jsl", "a_vl", "users", "cat", "updated_uniqueUsers"));	
    }


    function updateAssignTask(Request $req, $id)
    {
    	$response = array();

    	if (userType()->user_type==2 && userType()->sub_user!='')
    	{
    		$check = DB::table('todo_mdls')->where('id',$id)->first();

    		$cat2 = DB::table('todo_mdls')->where([['task_main_id','=', $check->task_main_id]])->orderBy('id', 'desc')->first();
    		if ($cat2) 
    		{
    			DB::table('todo_mdls')->where([['id', '=', $cat2->id], ['task_main_id', '=', $cat2->id]])->update(['task_type'=>'first']);

    			$cat3 = DB::table('todo_mdls')->where([['task_main_id','=', $check->task_main_id], ['task_type', '!=', 'first']])->orderBy('id', 'desc')->first();
    			if ($cat3) 
    			{
    				// DB::table('todo_mdls')->where([['task_main_id', '=', $cat2->id], ['task_type', '!=', 'first']])->update(['task_type'=>'updated']);
    				DB::table('todo_mdls')->where('id', $cat3->id)->update(['task_type'=>'updated']);
    			}
    		}
    		
    				
    		// echo "<pre>";
    		//  print_r($cat2);
    		// echo "</pre>";die();

        	$cat = new todoMdl;
    		
    		$cat->task_main_id = $cat2->task_main_id;
	        
    		$cat->cirp_name = $cat2->cirp_name ?? "";
        	$cat->comapny = $cat2->comapny ?? "";
	        $cat->task = $cat2->task;
	        $cat->assigned_to = $cat2->assigned_to;
	        $cat->message = $req->desc ?? $cat2->message;
	        $cat->status = $req->status ?? $cat2->status;

	        $cat->start_date = $cat2->start_date; 
	        $cat->end_date =  $cat2->end_date ?? "";
	        $cat->set_as_draft = "";	

	        $cat->rem_addr = $req->ip();
	      
	        $cat->created_at = $cat2->created_at; 
	        $cat->updated_at = date('Y-m-d H:i:s');;
	        $cat->deleted_at = "";

	        $cat->created_by_id = $cat2->created_by_id; 
	        $cat->updated_by = Session::get('admin_id');
	        $cat->deleted_by = "";
	        $cat->task_type = "latest";

    		if($cat->save())
	        {
	            $response['error'] = false;	
	            $response['message'] = "Task Updated Successfully";

	          }
	          else
	          {
	            $response['error'] = true;
	            $response['message'] = "Task Not Updated. Try Again Later.";
	          }
    	}
    	else
    	{
    		$cat = todoMdl::find($id);	
  			
  			$cat->cirp_name = $req->cirp_name ?? "";
        	$cat->comapny = $req->comapny ?? "";
	        $cat->task = $req->task ?? "";
	        $cat->assigned_to = $req->assigned_to ?? "";
	        $cat->message = $req->desc ?? "";
	        $cat->status = $req->status ?? "";

	        $cat->start_date = $req->start_date ?? ""; 
	        $cat->end_date =  $req->end_date ?? "";
	      
	        $cat->rem_addr = $req->ip();
	        $cat->updated_at = date('Y-m-d H:i:s');
	        $cat->updated_by = Session::get('admin_id');
	      	
	      	if($cat->save())
	        {
	            $response['error'] = false;	
	            $response['message'] = "Task Updated Successfully";

	          }
	          else
	          {
	            $response['error'] = true;
	            $response['message'] = "Task Not Updated. Try Again Later.";
	          }

    	}
        
        echo json_encode($response);
    }


    function deleteAssignTask(Request $req, $id)
        {
        	$response = array();
        	$cat = todoMdl::find($id); 
   
	        if ($cat) 
	          {

	            $cat->rem_addr = $req->ip();
	            $cat->deleted_at = date('Y-m-d H:i:s');
	            $cat->deleted_by = Session::get('admin_id');
	            
	            if ($cat->save()) 
	            {
	              $response['error'] = false;
	              $response['message'] = "Successfully Deleted";
	            }
	            else
	            {
	              $response['error'] = true;
	              $response['message'] = "Not Deleted. Please refresh the page.";   
	            }
	            
	          }
	          else
	          {
	            $response['error'] = true;
	            $response['message'] = "Data not available";
	          }
	        
	        echo json_encode($response);
        }


        function detailAssignTask($id)
        {
        	$main_id = DB::table('todo_mdls')->select('task_main_id')->where('id', $id)->first();

        	$users =  DB::table('todo_mdls as td')
    					->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');
    					//->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', '']]);
    					if ((userType()->user_type==2 && userType()->sub_user=='') || (userType()->user_type==1))
    					{ 		
    						$users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', '']]);
    					}
    					else if (userType()->user_type==2 && userType()->sub_user!='')
    					{ 		
    						$users = $users->where([['td.assigned_to', '=', Session::get('admin_id')], ['td.deleted_by', '=', '']]);
    					}
    					
    			$users =	$users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.status', 'td.start_date', 'td.created_at', 'td.updated_at')->where('td.task_main_id', $main_id->task_main_id)->orderBy('td.id', 'desc')->get();

    		$cat = DB::table('todo_mdls as td')
    					->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to')
    					->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['td.id', '=', $id]]);
    					
    			$cat =	$cat->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.status', 'td.start_date', 'td.created_at', 'td.updated_at')->orderBy('td.id', 'asc')->first();	

    		// echo "<pre>";
    		// 	echo print_r($cat);
    		// 	echo "</pre>";
    		// 	die();

    	return view('admin.detailsTodo', compact("users", "cat"));	

        }


}
