<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\sabredgerepMdl;
use App\Models\companyDtl;
use Config;
use Session;
use DB;

class sabredgerepCntrlr extends Controller
{
    function index(Request $req)
    {
        Session::put('tree','');
        Session::put('act_link','sabredge');
        
        if (userType()->user_type==1)
        {
        $users = DB::table('sabredgerep_mdls as sb')
                        ->leftJoin('company_dtls as com', 'com.id','=','sb.company_id')
                        ->leftJoin('employee_details as emp', 'emp.id', '=', 'sb.name')
                        ->where('sb.deleted',2)
                        ->select('sb.id', 'com.name as company', 'emp.name as employee', 'sb.design', 'sb.contact', 'sb.signature')
                        ->get();
            return view('admin.sabredge',compact("users"));
        }
        elseif (userType()->user_type==2 || userType()->user_type==4) 
        {

           $us = DB::table('assign_company_mdls as asn')
                        ->leftJoin('sabredgerep_mdls as sb', 'sb.company_id','=','asn.company_id')
                        ->leftJoin('company_dtls as com', 'com.id','=','sb.company_id')
                        ->leftJoin('employee_details as emp', 'emp.id', '=', 'sb.name')
                        ->where([['asn.deleted','=',2],['asn.status','=',1]]);
                        if (userType()->user_type==2) 
                        {
                          $us = $us->where('asn.ip_id',Session::get('admin_id'));
                        }
                        elseif (userType()->user_type==4) 
                        {
                         $us = $us->where('asn.ip_id', userType()->sub_user);
                        }    
                $us =  $us->select('sb.id', 'com.name as company', 'emp.name as employee', 'sb.design', 'sb.contact', 'sb.signature')  
                        ->orderBy('asn.id','desc')
                        ->first();
            //dd($users);die();            
            return view('admin.sabredge_ip',compact("us"));
        }                
    
    }

    function addData(Request $req)
    {   
        Session::put('tree','');
        Session::put('act_link','sabredge');
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.sabredgeValidate');

        $employees = DB::table('employee_details')->where([['status','=', 1],['deleted_by','=','']])->orderBy('name')->pluck('name','id');
        $company = companyDtl::where([['status','=', 1],['deleted','=',2]])->orderBy('name')->pluck('name','id');
        $ips = DB::table('general_info_mdls')->where([['status','=', 1],['deleted_by','=',''], ['flag','=',2], ['user_type', '=', 2], ['sub_user', '=', '']])->orderBy('first_name')->pluck('first_name','id');
        
       // dd($ips);die();
        return view('admin.addSabredge', compact("jsl","a_vl","company","employees", "ips"));

    }

    function getCompany($id)
    {
        $company = DB::table('assign_company_mdls as asn')
                    ->leftJoin('company_dtls as com', 'com.id', '=', 'asn.company_id');
                       
         $company = $company->where([['asn.status','=', 1],['asn.deleted','=',2], ['asn.ip_id', '=', $id]])->orderBy('com.name')->pluck('com.name','com.id');    

        if (count($company)==0) 
        {
            echo "1";
        }
        else
        {
        return json_encode($company);
        }
    }

    function saveData(Request $req)
    {
        $response = array();
        $cat = new sabredgerepMdl;

        $cat->ip_name = $req->ip_name ?? '';
        $cat->company_id = $req->company_name ?? '';
        $cat->name = $req->user_name;
        $cat->design = $req->design;
        $cat->contact = $req->mobile;

        $cat->rem_addr = $req->ip(); 
        $cat->status = $req->status;

        $cat->created_time = date('Y-m-d H:i:s');
        $cat->created_by_id  = Session::get('admin_id');
        $cat->update_time = "";
        $cat->updated_by = "";

        $cat->deleted = 2;
        $cat->deleted_time ="";
        $cat->deleted_by ="";

        if ($req->file("file")) 
        {
        $id=uniqid().time();
        $fileName = $id.".". $req->file('file')->getClientOriginalExtension();
        //dd($fileName);   
        $req->file("file")->move("public/access/media/sabredge",$fileName);  

        $cat->signature = $fileName;
        }
        else
        {
        	$cat->signature = "";
        }	

        if($cat->save())
        {
            $response['error'] = false;
            $response['message'] = "Representative Added Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Representative Not Added. Try Again Later.";
          }
        
        echo json_encode($response);
    }

    function deleteData(Request $req, $id)
    {
        $response = array();
        $cat = sabredgerepMdl::find($id); 


        // if (compDtl() == 2) 
        // {
            $cat->deleted = 1;
            $cat->deleted_time = date('Y-m-d H:i:s');
            $cat->deleted_by = Session::get('admin_id');    
            $cat->rem_addr = $req->ip(); 
            
            if($cat->save())
            {
                $response['error'] = false;
                $response['message'] = "Successfully Deleted";
            }
            else
              {
                $response['error'] = true;
                $response['message'] = "Not Deleted. Try Again Later.";
              }

        // }
        // else
        // {
        
        // if(!empty($cat->signature))
        // {
        //     if(file_exists(publicP() . '/access/media/sabredge/'.$cat->signature))
        //     {
        //         unlink(publicP() . '/access/media/sabredge/'.$cat->signature);    
        //     }
        // }  
        // if ($cat->delete()) 
        //   {
        //     $response['error'] = false;
        //     $response['message'] = "Successfully Deleted";
        //   }
        //   else
        //   {
        //     $response['error'] = true;
        //     $response['message'] = "Not Deleted. Try Again Later.";
        //   }
        // }    

        echo json_encode($response);
    }


    function editData(Request $req, $id)
    {
        Session::put('tree','');
        Session::put('act_link','sabredge');
        $cat = sabredgerepMdl::find($id);
        if($cat)
        {
           
            $employees = DB::table('employee_details')->where([['status','=', 1],['deleted_by','=','']])->orderBy('name')->pluck('name','id');
            $jsl =  bPath().'/'.Config::get('site.general');
        	$a_vl =  Config::get('site.sabredgeValidate');
            

            $company = DB::table('assign_company_mdls as asn')
                    ->leftJoin('company_dtls as com', 'com.id', '=', 'asn.company_id');
                       
         $company = $company->where([['asn.status','=', 1],['asn.deleted','=',2], ['asn.ip_id', '=', $cat->ip_name]])->orderBy('com.name')->pluck('com.name','com.id');  

            $ips = DB::table('general_info_mdls')->where([['status','=', 1],['deleted_by','=',''], ['flag','=',2], ['user_type', '=', 2], ['sub_user', '=', '']])->orderBy('first_name')->pluck('first_name','id');


         // echo "<pre>";
         // echo print_r($company);
         // echo "</pre>";
         // die();   
            
            return view('admin.editSabredge', compact("cat","jsl","a_vl","company","employees", "ips"));
        }
        else
        {
            no_data();
	        return redirect(admin().'/sabredge-representative');
        }

    }

    function updateData(Request $req, $id)
    {
        $response = array();
        $cat = sabredgerepMdl::find($id);
        
        $cat->ip_name = $req->ip_name ?? '';    
        $cat->company_id = $req->company_name ?? '';
        $cat->name = $req->user_name;
        $cat->design = $req->design;
        $cat->contact = $req->mobile;

        $cat->status = $req->status;

        $cat->update_time = date('Y-m-d H:i:s');
        $cat->updated_by  = Session::get('admin_id');



        if($req->file('file'))
        {
        if(!empty($cat->signature))
        {
            if(file_exists(publicP() . '/access/media/sabredge/'.$cat->signature))
            {
                unlink(publicP() . '/access/media/sabredge/'.$cat->signature);    
            }
          
        
        $id=uniqid().time();
        $fileName = $id.".". $req->file('file')->getClientOriginalExtension();
        //dd($fileName);   
        $req->file("file")->move("public/access/media/sabredge",$fileName);  
        $cat->signature = $fileName;
        }
    	}
        else
        {
            $cat->signature = $cat->signature;
        }

        
        if ($cat->save()) 
          {
            $response['error'] = false;
            $response['message'] = "Data Updated Successfully.";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Data Not Updated. Try Again Later.";
          }
        
        echo json_encode($response);
    }
}
