<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\userTypeMdl;
use App\Traits\MethodsTrait;
use Config;
use Session;
use DB;

class userTypeCntrlr extends Controller
{
    use MethodsTrait;

    function userTypeDetails(Request $req)
	{

        $users = DB::table('user_type_mdls as type')
                    ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'type.created_by');
        			   if (userType()->user_type==2) 
                    {
                    $users = $users->where('created_by', Session::get('admin_id'));
                    }
          $users = $users->where('deleted', 2)
                    ->select('type.id as id', 'type.name as name', 'type.created_at', 'type.updated_at', 'type.status as status', 'gen.first_name as ip')
                  ->orderBy('id', 'desc')
        			   ->get();
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
        
      
      //  dd($users);	
        return view('admin.userTypeDetails',compact("users","jsl","a_vl"));
   		
	}

	function addUserType(Request $req)
	{
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.arValidation');
       // dd($users);	
        return view('admin.add_user_type',compact("jsl","a_vl"));	
	}

	function saveUserType(Request $req)
	{
		$response = array();
        
        $data = [
          'created_by'=> Session::get('admin_id'),
          'name'=> $req->username ?? "",
          'status'=>$req->status ?? "",
          'rem_addr'=>$req->ip(),
          'date'=> date('Y-m-d'),
          'created_at'=>date('Y-m-d H:i:s'),
          'updated_at'=>'',
          'updated_by'=>'',
          'deleted_at'=>'',
          'deleted_by'=>''
        ];
      
        $cat = $this->insertData('user_type_mdls', $data);

        if($cat)
        {
            $response['error'] = false;	
            $response['message'] = "User Type Added Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "User Type Not Added. Try Again Later.";
          }
        
        echo json_encode($response);
	}

	function editUserType(Request $req, $id)
	{
		$cat = userTypeMdl::find($id,['id','name','status']);
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.arValidation');
       // dd($cat->username);	
        return view('admin.editUserType',compact("jsl","a_vl","cat"));	
	}

	function updateUserType(Request $req, $id)
	{
		$response = array();
        $data = [
          'name'=> $req->username ?? "",
          'status'=>$req->status ?? "",
          'rem_addr'=>$req->ip(),
          'updated_at'=>date('Y-m-d H:i:s'),
          'updated_by'=>Session::get('admin_id')
        ];
      
        $cat = $this->updateData('user_type_mdls', $data, ['id'=>$id]);
        
        if($cat)
        {
            $response['error'] = false;	
            $response['message'] = "User Type Updated Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "User Type Not Updated. Try Again Later.";
          }
        
        echo json_encode($response);
	}

	function deleteUserType(Request $req, $id)
	{
		$response = array();
        $data = [
          
          'rem_addr'=>$req->ip(),
          'deleted'=>1,
          'deleted_at'=>date('Y-m-d H:i:s'),
          'deleted_by'=>Session::get('admin_id')
        ];
      
        $cat = $this->updateData('user_type_mdls', $data, ['id'=>$id]);

   
        if ($cat) 
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
