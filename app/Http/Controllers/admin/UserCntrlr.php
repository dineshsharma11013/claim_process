<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userMdl;
use App\Models\userTypeMdl;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ExcelImport;
use App\Exports\UserExport;
use Config;
use Session;
use DB;
use Illuminate\Support\Facades\Hash;

class UserCntrlr extends Controller
{
    function userDetails(Request $req)
	{
        $total_rc = Config::get('site.total_rc');
        $users = DB::table('user_mdls as user')
                  ->leftJoin('general_info_mdls as gen', 'gen.id','=','user.admin_id')
                ->where('deleted',2);
              if (userType()->user_type==2) 
                    {
                    $users = $users->where('user.admin_id', Session::get('admin_id'));
                    }
                    elseif (userType()->user_type==4) 
                    {
                      $users = $users->where('user.admin_id', userType()->sub_user);
                    }

        $users =	$users->select('user.creditor_type','user.name','user.mobile','user.email','user.id', 'user.auth_type','user.status', 'user.created_at', 'gen.first_name')
                ->orderByDesc('user.id')
        			->paginate($total_rc);

        $userTypes = userTypeMdl::pluck('name','id');            
        $jsl =  bPath().'/'.Config::get('site.general');
        $pgnt =  bPath().'/'.Config::get('site.userPaginate');

        $a_vl =  Config::get('site.UserValidate');
        $rect = 2;
      
        //dd($users);	
        return view('admin.userDetails',compact("users","jsl","a_vl","userTypes","pgnt","rect"));
   		
	}


  function uploadUser(Request $req)
    {
        $response = array();
        $file = $req->file;
        if (Excel::import(new ExcelImport, $file)) 
        {
         //   $id=uniqid().time();
       // $fileName = $id.".". $req->file('file')->getClientOriginalExtension();
        //dd($fileName);   
        //$req->file("file")->move("public/access/user_excel",$fileName);  
            
            $response['error'] = false;
            $response['message'] = "Data Uploaded Successfully.";
          } else {
              
            $response['error'] = true;
            $response['message'] = "Data Not Uploaded.";
          }
      
          echo json_encode($response);
    }


    function exportExcel()
      {
        return Excel::download(new UserExport(), 'users.xlsx');
      }


    function userDetailsByData(Request $req)
    {
        if($req->ajax())
         {
          $rect = 2;
          


          $total_rc = $req->total_records ? $req->total_records : Config::get('site.total_rc');//Config::get('site.total_rc');
          $status_type = $req->status_type ?? '';
          
          $users = DB::table('user_mdls as user')
                  ->leftJoin('general_info_mdls as gen', 'gen.id','=','user.admin_id')
                ->where('deleted',2);
              if (userType()->user_type==2) 
                    {
                    $users = $users->where('user.admin_id', Session::get('admin_id'));
                    }
              if (!empty($status_type)) 
              {
                $users = $users->where('user.status','like', '%'.$status_type.'%');
              }       

        $users =  $users->select('user.creditor_type','user.name','user.mobile','user.email','user.id', 'user.auth_type','user.status', 'user.created_at', 'gen.first_name')
                ->orderByDesc('user.id')
              ->paginate($total_rc);


          return view('pagination.userDetails', compact('users','rect'))->render();
         }
    }

    function filterDetails(Request $request)
    {
        if($request->ajax())
        {
      
            $rect = 2;
            $total_record = $request->total_record ?? '';
            $status_type = $request->status_type ?? '';


            Session::put('pg_total_record', $request->total_record);

            $users = DB::table('user_mdls as user')
                  ->leftJoin('general_info_mdls as gen', 'gen.id','=','user.admin_id')
                ->where('deleted',2);
              if (userType()->user_type==2) 
                    {
                    $users = $users->where('user.admin_id', Session::get('admin_id'));
                    }
              if (!empty($status_type)) 
              {
                $users = $users->where('user.status', $status_type);
              }       
            $users =  $users->select('user.creditor_type','user.name','user.mobile','user.email','user.id', 'user.auth_type','user.status', 'user.created_at', 'gen.first_name')
                ->orderByDesc('user.id')
              ->paginate($total_record);

         
            return view('pagination.userDetails', compact('users','rect'))->render();  
                    
        }
    }

    function filterStatus(Request $request)
    {
        if($request->ajax())
        {
      
            $rect = 2;
            $total_record = $request->total_record ?? '';
            $status_type = $request->status_type ?? '';


            Session::put('pg_total_record', $request->total_record);

            $users = DB::table('user_mdls as user')
                  ->leftJoin('general_info_mdls as gen', 'gen.id','=','user.admin_id')
                ->where('deleted',2);
              if (userType()->user_type==2) 
                    {
                    $users = $users->where('user.admin_id', Session::get('admin_id'));
                    }
              if (!empty($status_type)) 
              {
                $users = $users->where('user.status', $status_type);
              }      
            $users =  $users->select('user.creditor_type','user.name','user.mobile','user.email','user.id', 'user.auth_type','user.status', 'user.created_at', 'gen.first_name')
                ->orderByDesc('user.id')
              ->paginate($total_record);

         
            return view('pagination.userDetails', compact('users','rect'))->render();  
                    
        }     
    }

    function searchUserInfo(Request $request)
    {
            $total_record = $request->total_record ? $request->total_record : Config::get('site.total_rc'); 
            $status_type = $request->status_type ?? '';

            $rect = 2;
            
            $search = $request->nm ?? '';

         //   echo "string";die(); Unauthourised User

            $users = DB::table('user_mdls as user')
                  ->leftJoin('general_info_mdls as gen', 'gen.id','=','user.admin_id')
                ->where('user.deleted',2);
              if (userType()->user_type==2) 
                    {
                    $users = $users->where('user.admin_id', Session::get('admin_id'));
                    }
              if (!empty($search)) 
            {
                $users = $users->where('user.name','like', '%'.$search.'%');
                $users = $users->orWhere('user.email','like', '%'.$search.'%');
                $users = $users->orWhere('user.mobile','like', '%'.$search.'%');
                $users = $users->orWhere('gen.first_name','like', '%'.$search.'%');
                $users = $users->orWhere('user.admin_id','like', '%'.$search.'%');
            }      
            $users =  $users->select('user.creditor_type','user.name','user.mobile','user.email','user.id', 'user.auth_type','user.status', 'user.created_at', 'gen.first_name')
                ->orderByDesc('user.id')
              ->paginate($total_record);


            // $users = userMdl::select('creditor_type','name','mobile','email','auth_type','id','status');
            // if (!empty($search)) 
            // {
            //     $users = $users->where('name','like', '%'.$search.'%');
            //     $users = $users->orWhere('email','like', '%'.$search.'%');
            //     $users = $users->orWhere('mobile','like', '%'.$search.'%');
            // } 
            // $users = $users->where('deleted',2);
            // $users = $users->orderByDesc('id')->paginate($total_record);
             // echo print_r($users);die();

            return view('pagination.userDetails', compact('users','rect'))->render();  
      //   echo "string";           
     
    }

    function deleteSelectedUsers($ids)
    {
      $response = array();
      
      $query = DB::table("user_mdls")->whereIn('id',explode(",",$ids))->chunkById(10, function($users){
        foreach ($users as $user) 
        {
          DB::table("user_mdls")->whereIn('id',explode(",",$user->id))->update(['deleted'=>1, 'deleted_by'=>Session::get('admin_id'), 'deleted_time'=>date('Y-m-d H:i:s')]);
        }
      });  
       if ($query) 
      {
          $response['error'] = false;
          $response['message'] = "Successfully Deleted";              
      }
      else
      {
        $response['error'] = true;
        $response['message'] = "Not Deleted. Try Again Later.";
      }
      return json_encode($response);    
    }

    function updateSelectedUsers(Request $req, $st,$ids)
    {
      $response = array();
      
     // echo $st." ".$ids;

      $query = DB::table("user_mdls")->whereIn('id',explode(",",$ids))->update(['status' => $st, 'updated_at' => date('Y-m-d H:i:s'), 'rem_addr' => $req->ip()]);

      if ($query) 
      {
          $response['error'] = false;
          $response['message'] = "Successfully Updated";              
      }
      else
      {
        $response['error'] = true;
        $response['message'] = "Not Updated. Try Again Later.";
      }
      return json_encode($response);    
    }

    function updateSelectedAuth(Request $req, $st,$ids)
    {
      $response = array();
      
     // echo $st." ".$ids;

      $query = DB::table("user_mdls")->whereIn('id',explode(",",$ids))->update(['auth_type' => $st, 'updated_at' => date('Y-m-d H:i:s'), 'rem_addr' => $req->ip()]);

      if ($query) 
      {
          $response['error'] = false;
          $response['message'] = "Successfully Updated";              
      }
      else
      {
        $response['error'] = true;
        $response['message'] = "Not Updated. Try Again Later.";
      }
      return json_encode($response);    
    }


	function addUser(Request $req)
	{
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.UserValidate');
        $userTypes = userTypeMdl::pluck('name');  
       // dd($users);	
        return view('admin.add_user',compact("jsl","a_vl","userTypes"));	
	}

	function saveUser(Request $req)
	{
		$response = array();

      $check = DB::table('user_mdls')->where('unique_id', $req->unique_id)->first();
      if ($check) 
      {
        $response['error'] = true;
        $response['message'] = "Username already exists. Please select another.";
        echo json_encode($response);
        die();
      }
      if ($req->unique_id == $req->password) 
      {
        $response['error'] = true;
        $response['message'] = "Username and password should be different.";
        echo json_encode($response);
        die();
      }

        $cat = new userMdl;
        
        $cat->admin_id = Session::get('admin_id');
        $cat->name = $req->name ?? ""; 
        $cat->address = $req->address ?? "";
        $cat->email = $req->email ?? "";
        $cat->mobile = $req->mobile ?? "";
        $cat->alt_mobile = "";
        
        $cat->city="";
        $cat->state="";
        $cat->correspondance_address="";
        $cat->pincode ="";
        $cat->img="";

        $cat->password  = $req->password ?? "";
        $cat->pwd = Hash::make($req->password) ?? "";
        $cat->unique_id = $req->unique_id ?? "";
        
        $cat->creditor_type ="";
        $cat->user_type = $req->user_type ?? 'claimant';

        $cat->auth_type =$req->auth_type ?? "both";  

        $cat->rem_addr = $req->ip();

        $cat->date = date("Y-m-d");
        $cat->status= $req->status ?? "";
        
        $cat->auth_id ="";
        $cat->auth_check = 1;
        $cat->forgot_link = "";
        
        $cat->created_at = date('Y-m-d H:i:s');
        $cat->updated_at = "";

        $cat->deleted = 2;
        $cat->deleted_by = "";
        $cat->deleted_time = "";


        
        if($cat->save())
        {
            $response['error'] = false;	
            $response['message'] = "User Added Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "User Not Added. Try Again Later.";
          }
        
        echo json_encode($response);
	}

    function editUserInfo(Request $req, $id)
    {
      $cat = userMdl::find($id);
      if ($cat) 
      {
        $userTypes = userTypeMdl::pluck('name'); 
        $a_vl =  Config::get('site.UserValidate');
        $user_details = view('admin.users.editUser', compact("cat","a_vl","userTypes"));
        echo $user_details;
      }
      else
      {
        echo "<p>User does not exist.</p>";
      }
      
    }

	// function editUser(Request $req, $id)
	// {
	// 	$cat = userMdl::find($id);
 //        $jsl =  bPath().'/'.Config::get('site.general');
 //        $a_vl =  Config::get('site.UserValidate');
 //        $userTypes = userTypeMdl::pluck('name');  
 //       // dd($cat->username);	
 //        return view('admin.edit_user',compact("jsl","a_vl","cat","userTypes"));	
	// }

	function updateUser(Request $req, $id)
	{
		$response = array();

      $check = DB::table('user_mdls')->where([['unique_id','=', $req->unique_id],['id','!=', $id]])->first();
      if ($check) 
      {
        $response['error'] = true;
        $response['message'] = "Username already exists. Please select another.";
        echo json_encode($response);
        die();
      }
      if ($req->unique_id == $req->password) 
      {
        $response['error'] = true;
        $response['message'] = "Username and password should be different.";
        echo json_encode($response);
        die();
      }


        $cat = userMdl::find($id);
        
       // $cat->admin_id = Session::get('admin_id');
        $cat->name = $req->name ?? ""; 
        $cat->address = $req->address ?? "";
        $cat->email = $req->email ?? "";
        $cat->mobile = $req->mobile ?? "";

        
        $cat->password  = $req->password ?? "";
        $cat->pwd = Hash::make($req->password) ?? "";
        $cat->unique_id = $req->unique_id ?? "";
        
        $cat->creditor_type ="";
        $cat->user_type = $req->user_type ?? 'claimant';
        
        $cat->rem_addr = $req->ip();  
        $cat->auth_type =$req->auth_type ?? "both"; 

        $cat->date = date("Y-m-d");
        $cat->status= $req->status ?? "";
        
        $cat->auth_id ="";
        $cat->auth_check = 1;
        $cat->forgot_link = "";
      
        $cat->updated_at = date('Y-m-d H:i:s');

        if($cat->save())
        {
            $response['error'] = false;	
            $response['message'] = "User Updated Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "User Not Updated. Try Again Later.";
          }
        
        echo json_encode($response);
	}

	function deleteUser(Request $req, $id)
	{
		$response = array();
        $cat = userMdl::find($id); 

        if ($cat) 
          {

            $cat->deleted = 1;
            $cat->deleted_by = Session::get('admin_id');
            $cat->deleted_time = date('Y-m-d H:i:s');
            $cat->rem_addr = $req->ip();

            if ($cat->save()) 
            {
              $response['error'] = false;
              $response['message'] = "Successfully Deleted";
            }
            else
            {
              $response['error'] = true;
              $response['message'] = "Data not deleted. Please refresh page.";
            }
            
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Data not available. Please refresh page.";
          }
        
        echo json_encode($response);
	}
}
