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
        $a_vl =  Config::get('site.todoVal');
        $companies = DB::table('company_dtls')->select('id','name')->get();


        $total_rc = Config::get('site.total_rc');

    	if (userType()->user_type==4)
    	{
    		$users = DB::table('todo_mdls as td')
    					->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');

    			$users = $users->where([['td.assigned_to', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['td.task_type', '=', 'latest']]);

    			$users = $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.priority', 'td.status', 'td.start_date', 'td.created_at', 'td.updated_at')->orderBy('td.id', 'desc')->get();

    		return view('admin.todoDetails_subIp', compact("jsl", "users", "companies", "a_vl"));
    	}

    	else if (userType()->user_type==2 || userType()->user_type==1)
    					{
    	$users = DB::table('todo_mdls as td')
    					->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');
    			$users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''],['td.task_type', '=', 'latest']]);

    			$users =	$users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.priority', 'td.status', 'td.start_date', 'td.end_date', 'td.created_at', 'td.updated_at', 'td.cirp_name', 'td.comapny', 'td.start_at', 'td.end_at')->orderBy('td.id', 'desc')->paginate($total_rc);
        $rect = 2;


        $res['status_type'] = DB::table("todo_mdls")->select('status')->distinct()->orderBy('status')->get();
        $res['team'] = DB::table("general_info_mdls")->select('first_name', 'id');

            if(userType()->user_type==2)
            {
                $res['team'] = $res['team']->where('sub_user', Session::get('admin_id'));
            }

            $res['team']=    $res['team']->where('flag', 2)->distinct()->orderBy('first_name')->get();

        $res['tasks'] =  DB::table("todo_mdls")->select('task');   

            if(userType()->user_type==2)
            {
                $res['tasks'] = $res['tasks']->where('created_by_id', Session::get('admin_id'));
            }

            $res['tasks']=    $res['tasks']->distinct()->orderBy('task')->get();



    	//echo dd(Session::get('admin_id'));die();
    			// echo "<pre>";
    			// echo print_r($companies);
    			// echo "</pre>";
    			// die();

    	return view('admin.todoDetails', compact("jsl", "users", "companies", "a_vl", "res", "rect"));

    	}
    }


    function filterTodo(Request $request)
    {
        if($request->ajax())
        {

            $rect = 2;
            $companies = DB::table('company_dtls')->select('id','name')->get();
            $total_record = $request->total_record ?? '';
            $status_type = $request->status_type ?? '';
            $team = $request->team ?? '';
            $from = $request->from ?? '';
            $to = $request->to ?? '';
            $task = $request->task ?? '';
            $cid = $request->cid ?? '';

        //    Session::put('pg_total_record', $request->total_record);


            $users = DB::table('todo_mdls as td')
                        ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');

                    $users =  $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.priority', 'td.status', 'td.start_date', 'td.end_date', 'td.created_at', 'td.updated_at', 'td.cirp_name', 'td.comapny', 'td.start_at', 'td.end_at');

                if (!empty($status_type))
                  {
                    $users = $users->where('td.status', $status_type);
                  }
                if (!empty($team))
                  {
                    $users = $users->where('td.assigned_to', $team);
                  }
                  if (!empty($task))
                  {
                    $users = $users->where('td.task', $task);
                  } 
                  if (!empty($from) && empty($to))
                  {
                    $users = $users->where('td.start_date', $from);
                  }
                  if (empty($from) && !empty($to))
                  {
                    $users = $users->where('td.end_date', $to);
                  }
                  if (!empty($from) && !empty($to))
                  {
                    $users = $users->whereBetween('td.start_date',[$from, $to]);
                  }

                if ($cid!='') 
                {
                    $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['cirp_name', '=', $cid], ['td.task_type', '=', 'latest']])->orderBy('td.id', 'desc')->paginate($total_record);
                }
                else
                {  
                $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''],['td.task_type', '=', 'latest']])->orderBy('td.id', 'desc')->paginate($total_record);
            }
                // echo "<pre>";
                // echo print_r($users);
                // echo "</pre>";die();

            return view('pagination.todoDetails', compact('users','rect', 'companies'))->render();

        }
    }


   function filterPagination(Request $request)
   {
        if($request->ajax())
         {
          $rect = 2;
          $total_rc = Config::get('site.total_rc');
            $companies = DB::table('company_dtls')->select('id','name')->get();
            $total_record = $request->total_record ?? '';
            $status_type = $request->status_type ?? '';
            $team = $request->team ?? '';
            $from = $request->from ?? '';
            $to = $request->to ?? '';
            $task = $request->task ?? '';
            $cid = $request->cid ?? '';

          $users = DB::table('todo_mdls as td')
                        ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');

          $users =    $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.priority', 'td.status', 'td.start_date', 'td.end_date', 'td.created_at', 'td.updated_at', 'td.cirp_name', 'td.comapny', 'td.start_at', 'td.end_at');

                if (!empty($status_type))
                  {
                    $users = $users->where('td.status', $status_type);
                  }
                if (!empty($team))
                  {
                    $users = $users->where('td.assigned_to', $team);
                  }
                if (!empty($task))
                  {
                    $users = $users->where('td.task', $task);
                  }  

                 if (!empty($from) && empty($to))
                  {
                    $users = $users->where('td.start_date', $from); 
                  }
                  if (!empty($from) && !empty($to))
                  {
                    $users = $users->whereBetween('td.start_date',[$from, $to]);
                  }

                  if ($cid != '') 
                  {
                      $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['cirp_name', '=', $cid], ['td.task_type', '=', 'latest']])->orderBy('td.id', 'desc')->paginate($total_rc);
                  }
                  else
                  {
                    $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['td.task_type', '=', 'latest']])->orderBy('td.id', 'desc')->paginate($total_rc);    
                  }
                

            return view('pagination.todoDetails', compact('users','rect','companies'))->render();

        }
   }




    function getDetailAssignTask($id)
    {
        $updated_uniqueUsers = getCompanyDetails();
        $cat = DB::table('todo_mdls');
            if (userType()->user_type==2)
                {
                    $cat =  $cat->where([['created_by_id', '=', Session::get('admin_id')]]);
                }
            elseif (userType()->user_type==4)
                {
                    $cat =  $cat->where([['assigned_to', '=', Session::get('admin_id')]]);
                }
            $cat = $cat->where('id', $id)->orderBy('id', 'desc')->first();

        $users = DB::table('general_info_mdls')->where([['sub_user', '=', Session::get('admin_id')], ['flag', '=', 2]])->pluck('first_name', 'id');

        $details = view('admin.modals.todoInfoDetails', compact("cat", "users", "updated_uniqueUsers"));

        echo $details;

        // echo "<pre>";
        //         echo print_r($cat);
        //         echo "</pre>";
        //         die();
    }


    function assignTask($id=null)
    {
    	$jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.todoVal');

       // $updated_uniqueUsers = getCompanyDetails();

        // echo "<pre>";
        // echo print_r($updated_uniqueUsers);
        // echo "</pre>";die();

        $users = DB::table('general_info_mdls')->where([['sub_user', '=', Session::get('admin_id')], ['flag', '=', 2]])->orderBy('first_name')->pluck('first_name', 'id');
       // dd($users);die();
    	if ($id != null) 
        {
            return view('admin.assignTask', compact("jsl", "a_vl", "users", "id"));
        }
        else
        {
            return view('admin.assignTask', compact("jsl", "a_vl", "users"));    
        }
        
    }

    function saveAssignTask(Request $req, $id=null)
    {
        // $start_at = date('Y-m-d', strtotime($req->start_date));
        // echo $start_at; die();

    	$response = array();
        $cat = new todoMdl;

         if (isset($id)) 
         {
            $cirp_nm = $id;
         }   
         else
         {
            $cirp_nm = $req->cirp_name ?? '';
         }

        $cat->task_main_id = "";

        $cat->cirp_name = $cirp_nm;
        
        $cat->comapny = $req->comapny ?? "";

        $cat->task = $req->task ?? "";
        $cat->priority = $req->priority ?? "";
        $cat->assigned_to = $req->assigned_to ?? "";
        $cat->message = $req->desc ?? "";
        $cat->status = $req->status ?? "";

        $cat->start_date = $req->start_date ? date('Y-m-d', strtotime($req->start_date)) : ''; 
        $cat->end_date = $req->end_date ? date('Y-m-d', strtotime($req->end_date)) : ''; 
        $cat->start_at = $req->start_date ?? "";
        $cat->end_at = $req->end_date ?? "";

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


    function editAssignTask(Request $req, $id, $cmp=null)
    {
    	$jsl =  bPath().'/'.Config::get('site.general');   
        $a_vl =  Config::get('site.todoVal');

        $updated_uniqueUsers = getCompanyDetails();

        $cat = DB::table('todo_mdls');
        			if (userType()->user_type==2)
    					{
        	$cat =	$cat->where([['created_by_id', '=', Session::get('admin_id')], ['deleted_by', '=', '']]);
        			}
        			elseif (userType()->user_type==4)
        			{
        			$cat =	$cat->where([['assigned_to', '=', Session::get('admin_id')], ['deleted_by', '=', '']]);
        			}
        	$cat = $cat->where('id', $id)->orderBy('id', 'desc')->first();



        $users = DB::table('general_info_mdls')->where([['sub_user', '=', Session::get('admin_id')], ['flag', '=', 2]])->pluck('first_name', 'id');
      //  dd($cat);die();
        if (isset($cmp)) 
        {
            return view('admin.editAssignTask', compact("jsl", "a_vl", "users", "cat", "updated_uniqueUsers", "cmp"));
        }
        else
        {
            return view('admin.editAssignTask', compact("jsl", "a_vl", "users", "cat", "updated_uniqueUsers"));    
        }
        
    
    }


    function updateAssignTask(Request $req, $id, $cmp=null)
    {
    	$response = array();

    	if (userType()->user_type==4)
    	{
    		$check = DB::table('todo_mdls')->where('id',$id)->first();

    		$cat2 = DB::table('todo_mdls')->where([['task_main_id','=', $check->task_main_id]])->orderBy('id', 'desc')->first();
    		if ($cat2)
    		{
    			// DB::table('todo_mdls')->where([['id', '=', $cat2->id], ['task_main_id', '=', $cat2->id]])->update(['task_type'=>'first']);
                if ($cat2->task_type=='latest') 
                {
                    DB::table('todo_mdls')->where([['task_main_id', '=', $cat2->id]])->update(['task_type'=>'first']);
                }
                
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

            if (isset($cmp)) 
             {
                $cirp_nm = $cmp;
             }   
             else
             {
                $cirp_nm = $req->cirp_name ?? '';
             }

    		$cat->task_main_id = $cat2->task_main_id;

    		$cat->cirp_name = $cirp_nm;
        	$cat->comapny = $cat2->comapny ?? "";
	        $cat->task = $cat2->task;
            $cat->priority = $req->priority ?? $cat2->priority;
	        $cat->assigned_to = $cat2->assigned_to;
	        $cat->message = $req->desc ?? $cat2->message;
	        $cat->status = $req->status ?? $cat2->status;

	        $cat->start_date = $req->start_date ? date('Y-m-d', strtotime($req->start_date)) : ''; 
            $cat->end_date = $req->end_date ? date('Y-m-d', strtotime($req->end_date)) : ''; 
            $cat->start_at = $req->start_date ?? "";
            $cat->end_at = $req->end_date ?? "";
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

            if (isset($cmp)) 
             {
                $cirp_nm = $cmp;
             }   
             else
             {
                $cirp_nm = $req->cirp_name ?? '';
             }

  			$cat->cirp_name = $cirp_nm ?? "";
        	$cat->comapny = $req->comapny ?? "";
	        $cat->task = $req->task ?? "";
            $cat->priority = $req->priority ?? "";
	        $cat->assigned_to = $req->assigned_to ?? "";
	        $cat->message = $req->desc ?? "";
	        $cat->status = $req->status ?? "";

	        $cat->start_date = $req->start_date ? date('Y-m-d', strtotime($req->start_date)) : ''; 
            $cat->end_date = $req->end_date ? date('Y-m-d', strtotime($req->end_date)) : ''; 
            $cat->start_at = $req->start_date ?? "";
            $cat->end_at = $req->end_date ?? "";

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
    					if (userType()->user_type==2 || userType()->user_type==1)
    					{
    						$users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', '']]);
    					}
    					else if (userType()->user_type==4)
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
