<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\generalInfoMdl;
use Config;
use Session;
use DB;
use Illuminate\Support\Facades\Hash;

class irpCntrlr extends Controller
{
    function irpDetails(Request $req)
	{
        $segment = \Request::segment(2);

        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');

        if ($segment == 'ip-details') 
        {
            if (userType()->user_type==1)
            {
            // $users = generalInfoMdl::select('first_name','mobile','email','id','user_type','status', 'created_at')
            //         ->where([['user_type','!=','1'],['flag','=', 2],['sub_user','=','']])
            //         ->orderByDesc('id')
            //         ->get();


              $users = DB::table('general_info_mdls as gn')
                    ->where([['gn.user_type','!=','1'],['gn.flag','=', 2],['gn.sub_user','=','']])
                    ->select('gn.id','gn.first_name','gn.mobile','gn.email','gn.user_type','gn.sub_user','gn.status', 'gn.created_at', 
                        DB::raw("(SELECT count(gns.sub_user) FROM general_info_mdls as gns WHERE gns.sub_user=gn.id) as total"))
                    ->orderByDesc('gn.id')
                    ->get();  

              //  dd($users);die();   
             return view('admin.irpDetails',compact("users","jsl","a_vl"));       
            }
            else
            {
                return redirect(admin());
            }
        }
        elseif ($segment == 'sub-ip-details') 
        {
            //dd("sdf");die();
    
            $users = generalInfoMdl::select('first_name','mobile','email','id','status','sub_user','created_at')
                        ->where([['sub_user','!=','']]);
                    if (userType()->user_type==2) 
                    {
                    $users = $users->where([['sub_user', '=', Session::get('admin_id')], ['flag', '=', 2]]);
                    }
                    elseif (userType()->user_type==4) 
                    {
                        $users = $users->where([['sub_user', '=', userType()->sub_user], ['flag', '=', 2]]);
                    }
                $users = $users->orderByDesc('id')->get();

            // echo "<pre>";
            // echo $users; 
            // echo "</pre>";die();   

        
                return view('admin.subIrpDetails',compact("users","jsl","a_vl"));
        }
	}

    function subirpDetails($id)
    {
        $users = DB::table('general_info_mdls as gn')
                    ->where('gn.sub_user', $id)
                    ->select('gn.id','gn.first_name','gn.mobile','gn.email','gn.status', 'gn.created_at', 'flag')
                    ->orderByDesc('gn.id')
                    ->get();  
        $ip = DB::table('general_info_mdls as gn')
                        ->where('gn.id', $id)
                        ->select('gn.first_name')
                        ->first();            

              //  dd($users);die();   
             return view('admin.subIpDetails',compact("users", "ip"));
    }

	function addIrp(Request $req, $id=null)
	{
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  \Request::segment(2)=='add-ip' ? Config::get('site.irpValidate') : Config::get('site.irpValidate2');
     //   dd($a_vl);	

        $segment = \Request::segment(2);
        if ($segment == 'add-ip') 
        {
            
            return view('admin.add_irp',compact("jsl","a_vl"));	
	    }   
        elseif ($segment=='add-sub-ip')
        {
         
            $ips = generalInfoMdl::where([['user_type','!=','1'],['flag','=', 2]]);
                    if (userType()->user_type==2) 
                    {
                    $ips = $ips->where('id', Session::get('admin_id'));
                    }
                    else
                    {
                        $ips = $ips->where('sub_user', '');   
                    }
                    $ips = $ips->orderBy('first_name')->pluck('first_name','id'); 
          
            return view('admin.addSubIp',compact("jsl","a_vl","ips", "id")); 
        }

    }

	function saveIrp(Request $req, $id=null)
	{
		$response = array();
        
        $check = generalInfoMdl::where('username', $req->username)->where('flag', 2)->first();
        $check2 = generalInfoMdl::where('email', $req->email)->where('flag', 2)->first();
        if ($check2) 
        {
            $response['error'] = true; 
            $response['message'] = "Email already exists. Please try another.";
            echo json_encode($response);
            die();
        }
        if ($check) 
        {
            $response['error'] = true; 
            $response['message'] = "Username already exists. Please try another.";
            echo json_encode($response);
            die();
        }

        $cat = new generalInfoMdl;
        $cat->company_name = "";
        
        $cat->first_name = $req->name ?? $req->username;
        $cat->last_name = "";
        $cat->address = $req->address ?? "";
        $cat->email = $req->email ?? "";
        $cat->mobile = $req->mobile ?? "";

        $cat->username = $req->username ?? ""; 
        $cat->password  = $req->password ?? "";
        $cat->pwd = Hash::make($req->password) ?? "";
        $cat->ibbi_reg_no = $req->ibbi_reg_no ?? "";
        $cat->token ="";
        $cat->gender ="";
        $cat->url = $req->ip_type ? "ip" : "team";
        $cat->user_type =$req->ip_type ?? 4;
        
        $cat->company_id = $id ?? '';
        $cat->case_type = $req->case_type ?? '';

        $cat->authorised_person = $req->authorised_person ?? '';
        $cat->rem_addr = $req->ip();
        $cat->status= $req->status ?? "";
        $cat->logo = "";
        $cat->availability ="";
        $cat->banners = "";
        $cat->sub_user = $req->ip ?? "";
        $cat->rights = "";


        $cat->date = $req->date ?? "";
        
        $cat->member_of_ipa = $req->member_of_ipa ?? "";
        $cat->member_of_ipe = $req->member_of_ipe ?? "";
        $cat->have_valid_afa = $req->have_valid_afa ?? "";
        $cat->afa_certificate_no = $req->afa_certificate_no ?? "";
        $cat->afa_valid_upto = $req->afa_valid_upto ?? "";
        $cat->total_cpe_earned = $req->total_cpe_earned ?? "";

        $cat->user_id = Session::get('admin_id');
        $cat->flag = 2;
       // $cat->date = date("Y-m-d");

        $cat->created_at = date('Y-m-d H:i:s');
        $cat->updated_at = "";
        $cat->deleted_by = "";
        $cat->deleted_time = "";

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
            $response['message'] = "IP Added Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "IP Not Added. Try Again Later.";
          }
        
        echo json_encode($response);
	}

	function editIrp(Request $req, $id)
	{
		//$cat = generalInfoMdl::find($id,['id', 'first_name','sub_user','username','email','mobile','profile_pic','status','address','password','ibbi_reg_no', 'user_type', 'authorised_person']);
        $cat = generalInfoMdl::find($id);
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  \Request::segment(2)=='add-ip' ? Config::get('site.irpValidate') : Config::get('site.irpValidate2');
       
        $segment = \Request::segment(2);

        //dd($cat);die();

        if ($segment == 'edit-ip') 
        {
            return view('admin.edit_irp',compact("jsl","a_vl","cat"));    
        }
        elseif ($segment == 'edit-sub-ip')
        {
            $ips = generalInfoMdl::where([['user_type','!=','1'],['flag','=', 2]]);
                    if (userType()->user_type==2) 
                    {
                        $ips = $ips->where('id', Session::get('admin_id'));
                    }
                    else
                    {
                        $ips = $ips->where('sub_user', '');   
                    }
                    $ips = $ips->orderBy('first_name')->pluck('first_name','id'); 
          
            return view('admin.edit_SubIp',compact("jsl","a_vl","cat","ips"));
             
        }
       // dd($cat->username);	
        	
	}

	function updateIrp(Request $req, $id)
	{
        $response = array();


        $check = generalInfoMdl::where([['id','!=', $id], ['username', '=', $req->username],['flag', '=', 2]])->get();
        $check2 = generalInfoMdl::where([['id','!=', $id], ['email', '=', $req->email],['flag', '=', 2]])->get();

        if (count($check)>0) 
        {
            $response['error'] = true;
            $response['message'] = "Username already exists. Please try another.";
            echo json_encode($response);
            die();
        }
        if (count($check2)>0) 
        {
            $response['error'] = true;
            $response['message'] = "Email already exists. Please try another.";
            echo json_encode($response);
            die();
        }
     
        $cat = generalInfoMdl::find($id);
        
        $cat->first_name = $req->name ?? "";
        $cat->address = $req->address ?? "";
        $cat->email = $req->email ?? "";
        $cat->mobile = $req->mobile ?? "";

        $cat->username = $req->username ?? "";

        $cat->password  = $req->password ?? "";
        $cat->pwd = Hash::make($req->password) ?? "";
        $cat->ibbi_reg_no = $req->ibbi_reg_no ?? "";
        $cat->rem_addr = $req->ip();
        $cat->status= $req->status ?? "";

        $cat->member_of_ipa = $req->member_of_ipa ?? "";
        $cat->member_of_ipe = $req->member_of_ipe ?? "";
        $cat->have_valid_afa = $req->have_valid_afa ?? "";
        $cat->afa_certificate_no = $req->afa_certificate_no ?? "";
        $cat->afa_valid_upto = $req->afa_valid_upto ?? "";
        $cat->total_cpe_earned = $req->total_cpe_earned ?? "";
        
        $cat->url = $req->ip_type ? "ip" : "team";
        $cat->user_type =$req->ip_type ?? 4;

        $cat->authorised_person = $req->authorised_person ?? '';

        $cat->updated_at = date('Y-m-d H:i:s');
        $cat->deleted_by = "";
        $cat->deleted_time = "";
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
            $response['message'] = "Info Updated Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Info Not Updated. Try Again Later.";
          }
      
        
        echo json_encode($response);
	}

    function deleteIpDetail(Request $req, $id)
    {
        $response = array();
        $cat = generalInfoMdl::find($id); 

        $cat->flag = 1;
        $cat->rem_addr = $req->ip();
            $cat->updated_at = date('Y-m-d H:i:s');
            $cat->deleted_by = Session::get('admin_id');
            $cat->deleted_time = date('Y-m-d H:i:s');

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

	// function deleteIrp($id)
	// {
	// 	$response = array();
 //        $cat = generalInfoMdl::find($id); 
       
 //            $cat->flag = 1;
 //            $cat->rem_addr = $req->ip();
 //            $cat->updated_at = date('Y-m-d H:i:s');
 //            $cat->deleted_by = Session::get('admin_id');
 //            $cat->deleted_time = date('Y-m-d H:i:s');
        
          
 //        if ($cat->delete()) 
 //          {
 //            $response['error'] = false;
 //            $response['message'] = "Successfully Deleted";
 //          }
 //          else
 //          {
 //            $response['error'] = true;
 //            $response['message'] = "Not Deleted. Try Again Later.";
 //          }
        
 //        echo json_encode($response);
	// }

}
