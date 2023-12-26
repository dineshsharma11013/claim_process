<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\generalInfoMdl;
use Config;
use Session;
use DB;
use Illuminate\Support\Facades\Hash;


class irpUserDetails extends Controller
{
    function irpUserDetails(Request $req)
	{

        $users = generalInfoMdl::select('username','sub_user','mobile','email','id','status')
        			->where([['user_type','=',2],['flag', 2],['sub_user','!=', '']])
        			->orderByDesc('id')
        			->get();

		$ips = generalInfoMdl::select('username','id')
        			->where([['user_type','=',2],['sub_user','=', '']])
        			->get();        			
        			
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
        
      
       // dd($ips);die();	
        return view('admin.irpUserDetails',compact("users","jsl","a_vl","ips"));
   		
	}

	function addIrp(Request $req)
	{
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.irpUserValidate');
        $ips = generalInfoMdl::where([['user_type','=',2],['flag', 2],['sub_user','=', ''],['status','=',1]])
        			->orderBy('username')
        			->pluck('username','id');
       // dd($ips); die();	
        return view('admin.add_irp_user',compact("jsl","a_vl", "ips"));	
	}

	function saveIrp(Request $req)
	{
		$response = array();
        $cat = new generalInfoMdl;
        $cat->company_name = "";
        
        $cat->address = $req->address ?? "";
        $cat->email = $req->email ?? "";
        $cat->mobile = $req->mobile ?? "";

        $cat->username = $req->username ?? ""; 
        $cat->password  = $req->password ?? "";
        $cat->pwd = Hash::make($req->password) ?? "";
        $cat->ibbi_reg_no = $req->ibbi_reg_no ?? "";
        $cat->token ="";
        $cat->gender ="";
        $cat->user_type =2;
        $cat->rem_addr = $req->ip();
        $cat->status= $req->status ?? "";
        $cat->logo = "";
        $cat->availability ="";
        $cat->banners = "";
        $cat->sub_user = $req->ip ?? "";
        $cat->rights = "";

        $cat->user_id = Session::get('admin_id');
        $cat->flag = 2;
        $cat->date = date("Y-m-d");

        if ($req->file('file')) 
        {

        $id=uniqid().time();
        $fileName = $id.".". $req->file('file')->getClientOriginalExtension();
        //dd($fileName);   
        $req->file("file")->move("public/access/media/general",$fileName);  
        $cat->profile_pic = $fileName;
    	}
    	else
    	{
    		$cat->profile_pic = "";
    	}
 		$cat->link = "";
 		
        
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

	function editIrp(Request $req, $id)
	{
		$cat = generalInfoMdl::find($id,['id','username','email','mobile','profile_pic','sub_user','status','address','password','ibbi_reg_no']);
        $ips = generalInfoMdl::where([['user_type','=',2],['flag', 2],['sub_user','=', ''],['status','=',1]])
        			->orderBy('username')
        			->pluck('username','id');
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.irpUserValidate');			

       // dd($cat->username);	
        return view('admin.edit_irp_user',compact("jsl","a_vl","cat","ips"));	
	}

	function updateIrp(Request $req, $id)
	{
		$response = array();
        $cat = generalInfoMdl::find($id);
        
        
        $cat->address = $req->address ?? "";
        $cat->email = $req->email ?? "";
        $cat->mobile = $req->mobile ?? "";

        $cat->username = $req->username ?? ""; 
        $cat->password  = $req->password ?? "";
        $cat->pwd = Hash::make($req->password) ?? "";
        $cat->ibbi_reg_no = $req->ibbi_reg_no ?? "";
        $cat->rem_addr = $req->ip();
        $cat->status= $req->status ?? "";
        
        $cat->sub_user = $req->ip ?? "";	
    

        $cat->user_id = Session::get('admin_id');
       

        if ($req->file('file')) 
        {

        	if(!empty($cat->profile_pic))
	        {
	            if(file_exists(publicP() . '/access/media/general/'.$cat->profile_pic))
	            {
	                unlink(publicP() . '/access/media/general/'.$cat->profile_pic);    
	            }
	        }

        $id=uniqid().time();
        $fileName = $id.".". $req->file('file')->getClientOriginalExtension();
        //dd($fileName);   
        $req->file("file")->move("public/access/media/general",$fileName);  
        $cat->profile_pic = $fileName;
    	}
    	else
    	{
    		$cat->profile_pic = $cat->profile_pic;
    	}
 		
 		
        
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

    function deleteIpDetail(Request $req, $id)
    {
        $response = array();
        $cat = generalInfoMdl::find($id); 

        $cat->rem_addr = $req->ip();
        $cat->user_id = Session::get('admin_id');
        $cat->flag = 1;

        if ($cat->save()) 
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

	function deleteIrp($id)
	{
		$response = array();
        $cat = generalInfoMdl::find($id); 
        if(!empty($cat->profile_pic))
        {
            if(file_exists(publicP() . '/access/media/general/'.$cat->profile_pic))
            {
                unlink(publicP() . '/access/media/general/'.$cat->profile_pic);    
            }
        }  
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
