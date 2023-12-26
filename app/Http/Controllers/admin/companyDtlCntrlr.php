<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\companyDtl;
use App\Models\generalInfoMdl;
use App\Traits\MethodsTrait;
use Config;
use Session;
use DB;

class companyDtlCntrlr extends Controller
{
  use MethodsTrait;

  function companyDetails(Request $req)
	{

        $user = generalInfoMdl::find(Session::get('admin_id'),['id','first_name','user_type','sub_user']);

        //dd($user);die();
        
        if (userType()->user_type==1)
        {
          $users = DB::table('company_dtls as com')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','com.user_id')
                    ->select('com.id', 'com.name', 'com.address', 'com.created_at', 'gen.first_name', 'gen.user_type')
                    ->where('com.deleted',2);
                    if ($user->user_type!=1) 
                    {
                      $users = $users->where('com.user_id',$user->id);
                    }
              $users = $users->orderBy('id','desc')
                    ->get();
         $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.companyVal');
        
      
   
        return view('admin.company_details',compact("users","jsl","a_vl","user"));             
        }
        elseif (userType()->user_type==2 || userType()->user_type==4) 
        {

        $check = DB::table('assign_company_mdls');
              if (userType()->user_type==2) 
              {
                $check = $check->where('ip_id', Session::get('admin_id'));
              }
              elseif (userType()->user_type==4) {
                $check = $check->where('ip_id', userType()->sub_user);
              }
            
          $check =  $check->where('deleted',2)->get();

        $check2 = DB::table('company_dtls');
        if (userType()->user_type==2) 
        {
          $check2 = $check2->where('user_id', Session::get('admin_id'));
        }
        elseif (userType()->user_type==4) {
          $check2 = $check2->where('user_id', userType()->sub_user);
        }
        
        
        $check2 = $check2->where('deleted',2)->get();




        // $users = [];
        //  echo "<pre>";
        //  echo print_r($check);
        //  echo "</pre>";
        //  die();  

        if (count($check)>0 && count($check2)>0) 
        {
          $data1 = DB::table('company_dtls as com')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','com.user_id')
                    ->select('com.id as id', 'com.id as company_id', 'com.name', 'com.address', 'com.created_at', 'gen.first_name', 'gen.user_type')
                    ->where('com.deleted',2);
                    if (userType()->user_type==2) 
                    {
                      $data1 = $data1->where('com.user_id',userType()->id);
                    }
                    elseif (userType()->user_type==4) 
                    {
                      $data1 = $data1->where('com.user_id',userType()->sub_user);
                    }
                    
                $data1 = $data1->orderBy('com.id', 'desc')
                    ->get()->toArray();


          $data2 = DB::table('assign_company_mdls as asn')
                    ->leftJoin('company_dtls as com', 'com.id','=','asn.company_id')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','asn.created_by_id')
                    ->select('asn.company_id as id', 'asn.id as asn_id', 'com.name', 'com.address', 'asn.created_time as created_at', 'gen.first_name', 'gen.user_type')
                    ->where('asn.deleted',2);
                   if (userType()->user_type==2) 
                   {
                    $data2 = $data2->where('asn.ip_id',userType()->id);
                    }
                    elseif (userType()->user_type==4) 
                    {
                      $data2 = $data2->where('asn.ip_id',userType()->sub_user);
                     } 
                    
                $data2 = $data2->orderBy('asn.id', 'desc')
                    ->get()->toArray();

          $users = array_merge($data1, $data2);

                      
        
         // echo "<pre>";
         // echo print_r($users);
         // echo "</pre>";
         // die();           
        }
        elseif (count($check)>0 && !count($check2)>0) 
        {
          $users = DB::table('assign_company_mdls as asn')
                    ->leftJoin('company_dtls as com', 'com.id','=','asn.company_id')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','asn.ip_id')
                    ->select('asn.id as id', 'asn.id as asn_id', 'com.name', 'com.address', 'asn.created_time as created_at', 'gen.first_name', 'gen.user_type')
                    ->where('asn.deleted',2);
                    if (userType()->user_type==2) 
                    {
                      $users = $users->where('asn.ip_id',userType()->id);
                    }
                    elseif (userType()->user_type==4) 
                    {
                      $users = $users->where('asn.ip_id',userType()->sub_user);
                    }
                    
                $users =   $users->get()->toArray();

        // echo "<pre>";
        //  echo print_r($users);
        //  echo "</pre>";
        //  die();             
        }
        elseif (!count($check)>0 && count($check2)>0) 
        {
          $users = DB::table('company_dtls as com')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','com.user_id')
                    ->select('com.id as id', 'com.id as company_id', 'com.name', 'com.address', 'com.created_at', 'gen.first_name', 'gen.user_type')
                    ->where('com.deleted',2);
                    if (userType()->user_type==2) 
                    {
                      $users = $users->where('com.user_id',userType()->id);
                    }
                    elseif (userType()==4) 
                    {
                      $users = $users->where('com.user_id',userType()->sub_user);
                    }
                    
                   
              $users = $users->orderBy('id','desc')
                    ->get()->toArray();

         //   echo "<pre>";
         // echo print_r($users);
         // echo "</pre>";
         // die();           
        }
         //      echo "<pre>";
         // echo print_r($users);
         // echo "</pre>";
         // die(); 
         

         $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.companyVal');
        
      
   
        return view('admin.company_details_IP',compact("users","jsl","a_vl","user"));   
        }

        


       // dd($users);die();           
         		
	}

function viewtimeline(Request $req , $id)
{
    
    $cmpy_dtl = DB::table('company_dtls')->where(['id'=>$id])->first();
    
    $encorporation_date = $cmpy_dtl->start_date;
   
    $timline_data = DB::table('time_line')->get();
    return view('admin.viewcompany_time' , compact('timline_data','encorporation_date'));
    
}


  function cirpDetails()
  { 
    $user = generalInfoMdl::find(Session::get('admin_id'),['id','first_name','user_type','sub_user']);

     $company = DB::table('form_a_mdls as asn')
    ->leftJoin('company_dtls as com', 'com.id', '=', 'asn.company_id')
    ->where([['asn.status', '=', 1], ['asn.deleted', '=', 2], ['asn.company_id', '!=', '']]);

    if (userType()->user_type == 2) 
    {
    // $company = $company->where([['asn.user_id', '=', Session::get('admin_id')], ['asn.status', '=', 1], ['com.status', '=', 1]]);
      $company = $company->where('asn.user_id', Session::get('admin_id'));
    }
    if (userType()->user_type==4) {
      $company = $company->where('asn.user_id', userType()->sub_user);
    }

    
    $company = $company->distinct('asn.comapny_id')
              ->select('com.id', 'com.name')->get();


    // echo "<pre>";
    // echo $company;
    // echo "</pre>";
    // die();

    //dd($company);die();

      return view('admin.company_details_CIRP',compact("company", "user")); 
  }

 
  function userFormDetails($id)
  {

    $output = getUserFormDetails($id);

    // dd($output);die();   

    return view('admin.userFormsDetails',compact("output")); 

  }



	function addCompany(Request $req)
	{
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.companyVal');
       // dd($users);	
        return view('admin.add_company',compact("jsl","a_vl"));	
	}

	function saveCompany(Request $req)
	{
		$response = array();
        $cat = new companyDtl;

        $cat->user_id = Session::get('admin_id');
        $cat->status = $req->status ?? "";
        $cat->name = $req->name ?? "";
        $cat->cirp_id = $req->cirp_id ?? "";
        $cat->pan_number = $req->pan_number ?? "";
        $cat->ip_type = $req->ip_type ?? "";
        
        $cat->address = $req->address ?? "";
        $cat->email = $req->email ?? "";
        $cat->insolvency_commencement_date = $req->insolvency_commencement_date ?? "";
        $cat->order_receving_date = $req->order_receving_date ?? "";

        $cat->nclt = $req->nclt ?? "";
        $cat->nclt_bench = $req->nclt_bench ?? "";
        $cat->claim_filing_date = $req->claim_filing_date ?? "";
        $cat->start_date = $req->start_date ?? ""; 
        $cat->end_date =  $req->end_date ?? "";
        
        $cat->rem_addr = $req->ip();
      
        $cat->created_at = date('Y-m-d H:i:s');
        $cat->updated_at = "";
        $cat->updated_by = "";
        $cat->deleted = 2;
        $cat->deleted_by = "";
        $cat->deleted_time = "";
        $cat->case_type = "";

      
        if($cat->save())
        {
            $response['error'] = false;	
            $response['message'] = "Company Added Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Company Not Added. Try Again Later.";
          }
        
        echo json_encode($response);
	}

	function editCompany(Request $req, $id)
	{
		    $cat = companyDtl::find($id);
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.companyVal');
       // dd($cat->username);	
        return view('admin.edit_company',compact("jsl","a_vl","cat"));	
	}

	function updateCompany(Request $req, $id)
	{
		    $response = array();
        $cat = companyDtl::find($id);
        
        $cat->status = $req->status ?? "";
        $cat->name = $req->name ?? "";
        
        $cat->pan_number = $req->pan_number ?? "";
        $cat->ip_type = $req->ip_type ?? "";
        
        $cat->address = $req->address ?? "";
        $cat->email = $req->email ?? "";
        $cat->insolvency_commencement_date = $req->insolvency_commencement_date ?? "";
        $cat->order_receving_date = $req->order_receving_date ?? "";
        $cat->nclt = $req->nclt ?? "";
        $cat->nclt_bench = $req->nclt_bench ?? "";
        $cat->claim_filing_date = $req->claim_filing_date ?? "";
        $cat->start_date = $req->start_date ?? ""; 
        $cat->end_date =  $req->end_date ?? "";
        
        $cat->rem_addr = $req->ip();
        
        $cat->updated_at = date('Y-m-d H:i:s');
        $cat->updated_by = Session::get('admin_id');

        if($cat->save())
        {
            $response['error'] = false;	
            $response['message'] = "Company Updated Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Company Not Updated. Try Again Later.";
          }
        
        echo json_encode($response);
	}

	function deleteCompany(Request $req,  $id)
	{
		    $response = array();
        $cat = companyDtl::find($id); 
   
        if ($cat) 
          {

            $cat->rem_addr = $req->ip();
            $cat->updated_at = date('Y-m-d H:i:s');
            $cat->deleted = 1;
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
}
