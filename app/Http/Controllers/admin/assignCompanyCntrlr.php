<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\assignCompanyMdl;
use App\Models\companyDtl;
use App\Models\generalInfoMdl;
use Config;
use Session;
use DB;

class assignCompanyCntrlr extends Controller
{
    function assignDetails(Request $req)
    {
      $sub_user = DB::table('general_info_mdls')->select('sub_user','user_type')->where('id', Session::get('admin_id'))->first();
      $users = assignCompanyMdl::select('company_id','ip_id','id','appointment_date','designation','status', 'created_time', 'update_time')
              ->where('deleted',2);//->where('update_time','')
               
              if (userType()->user_type==2)
              {  
                $users = $users->where('ip_id',Session::get('admin_id'));
                
               // if (userType()->sub_user=='') 
               //      {
               //      $users = $users->where('ip_id',Session::get('admin_id'));
               //      }
               // if (userType()->sub_user!='') 
               //      {
               //      $users = $users->where('ip_id', $sub_user->sub_user);
               //      }     
                }    

          $users=  $users->orderByDesc('id')->get();

        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
        $comps = companyDtl::all();       
        $ips = generalInfoMdl::all();

       // dd($sub_user);die();
     // dd(userType()->user_type);die();
     //   dd(Session::get('admin_id'));die();

      return view('admin.assiningDetails',compact("users","jsl","a_vl","comps","ips"));
    }

    function getIpDt(Request $req)
    {
      $comp_id = $req->comp_id;
      $dtl = DB::table("company_dtls")->select('insolvency_commencement_date')->where('id', $comp_id)->first();    
      echo $dtl->insolvency_commencement_date;
    }

    function addAssignIp(Request $req)
    {
      $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.assignValidation');
        $comps = companyDtl::where([['status','=',1],['deleted','=', 2]]);
                if (userType()->user_type==2)
                {
              $comps=  $comps->where('user_id',userType()->id);
                }

                $comps=  $comps->pluck('name','id');

        $ips = generalInfoMdl::where([['user_type','=', 2],['flag','=', 2],['status','=',1]]);
                if (userType()->user_type==2) 
                    {
                    $ips = $ips->where('id', Session::get('admin_id'));
                    }
                    else
                    {
                     $ips = $ips->where('sub_user', ''); 
                    }
          $ips =  $ips->orderBy('first_name')->pluck('first_name','id');

       // dd($ips); 
        return view('admin.add_assignIP',compact("jsl","a_vl","comps","ips"));  
    }

    function saveAssignIp(Request $req)
    {
      $response = array();

       $check = DB::table('assign_company_mdls')->where('company_id',$req->company)->where('deleted',2)->orderBy('id','desc')->first();

       if ($check->ip_id == $req->ip) 
       {
          $response['error'] = true; 
          $response['message'] = "Company Already Assigned";         
          echo json_encode($response);
          die();
       }


    //   if ($check) 
    //   {
    //     $data2= [
    //       //'designation' => $req->designation ?? "",
    //       'appointment_date' => $req->appointment_date ?? "",
    //       'termination_date' => $req->status == 1 ? "" : date('Y-m-d H:i'),
    //       'status' => $req->status, 
    //       'update_time' => date('Y-m-d H:i:s'),
    //       'updated_by' => Session::get('admin_id'),
    //       'rem_addr' => $req->ip()
    //     ];

    //  z   $data1 = [
    //       'main_id' => "",
    //       'update_id' => "",
    //       'company_id' => $req->company ?? "",
    //       'ip_id' => $req->ip ?? "",
    //       'designation' => $req->designation ?? "",
    //       'appointment_date' => $req->appointment_date ?? "",
    //       'termination_date' => $req->status == 1 ? "" : date('Y-m-d H:i'), 

    //       'status' => $req->status, 
    //       'rem_addr' => $req->ip(),
          
    //       'created_time' => date('Y-m-d H:i:s'),
    //       'created_by_id'  => Session::get('admin_id'),
    //       'update_time' => date('Y-m-d H:i:s'),
    //       'updated_by' => "",

    //       'deleted' => 2,
    //       'deleted_time' =>"",
    //       'deleted_by' =>""

    //     ];

    //    if ($check->ip_id == $req->ip && $check->designation == $req->designation) 
    //    {
         
    //     DB::table('assign_company_mdls')->where('id',$check->id)->update($data2);
    //     $response['error'] = false; 
    //     $response['message'] = "Data Saved Successfully";
    //   }
    //   else if($check->ip_id == $req->ip && $check->designation != $req->designation) 
    //   {
    //     $data2= [
    //       'termination_date' => date('Y-m-d H:i'),
    //       'status' => 2, 
    //       'update_time' => date('Y-m-d H:i:s'),
    //       'updated_by' => Session::get('admin_id'),
    //       'rem_addr' => $req->ip()
    //     ];  

    //     DB::table('assign_company_mdls')->where('id',$check->id)->update($data2);
    //     $db = DB::table('assign_company_mdls')->insert($data1);

    //     if ($db) 
    //     {
    //       $response['error'] = false; 
    //       $response['message'] = "Data Saved Successfully";

    //     }
    //     else
    //     {
    //       $response['error'] = true;
    //       $response['message'] = "IP Not Assigned. Try Again Later.";
    //     }
    //    } 
    //    else if ($check->ip_id != $req->ip) 
    //    {
    //     $data2= [
    //       'termination_date' => date('Y-m-d H:i'),
    //       'status' => 2, 
    //       'update_time' => date('Y-m-d H:i:s'),
    //       'updated_by' => Session::get('admin_id'),
    //       'rem_addr' => $req->ip()
    //     ];

    //       DB::table('assign_company_mdls')->where('id',$check->id)->update($data2);
    //        DB::table('assign_company_mdls')->insert($data1);
    //        $response['error'] = false; 
    //       $response['message'] = "Data Saved Successfully";
    //    }
    // }
    // else
    // {
      //echo print_r($check); die();

        $cat = new assignCompanyMdl;

        $cat->main_id = "";
        $cat->update_id = "";
        $cat->company_id = $req->company ?? "";
        $cat->ip_id = $req->ip ?? "";
        $cat->designation = $req->designation ?? "";
        $cat->appointment_date = $req->appointment_date ?? "";
        $cat->termination_date = $req->status == 1 ? "" : date('Y-m-d H:i'); 


        $cat->status = $req->status;  
        $cat->rem_addr = $req->ip();
        
        $cat->created_time = date('Y-m-d H:i:s');
        $cat->created_by_id  = Session::get('admin_id');
        $cat->update_time = date('Y-m-d H:i:s');
        $cat->updated_by = "";

        $cat->deleted = 2;
        $cat->deleted_time ="";
        $cat->deleted_by ="";
      

        if($cat->save())
        {

          if ($check) 
          {
            DB::table('assign_company_mdls')->where('id',$check->id)->update(['status'=>2, 'updated_by'=>Session::get('admin_id')]);
          }
          // $cat2 = DB::table('assign_company_mdls')->where([['main_id','=',''],['update_id','=','']])->orderBy('id','desc')->first();
          // DB::table('assign_company_mdls')->where('id',$cat2->id)->update(['main_id'=>$cat2->id, 'update_id'=>$cat2->id]);

            $response['error'] = false; 
            $response['message'] = "Data Saved Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "IP Not Assigned. Try Again Later.";
          }
       // }

        echo json_encode($response);
    }

    function editAssignIp(Request $req, $id)
    {
      

       $cat = assignCompanyMdl::find($id);
      //$cat = assignCompanyMdl::where([['main_id','=',$id],['deleted','=',2]])->orderByDesc('id')->first();

     // dd($cat);
      if ($cat) 
        {
       

        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.assignValidation');
        $comps = companyDtl::where([['status','=',1],['deleted','=', 2]]);
                if (userType()->user_type==2)
                {
              $comps=  $comps->where('user_id',userType()->id);
                }

                $comps=  $comps->pluck('name','id');

        $ips = generalInfoMdl::where([['user_type','=', 2],['flag','=', 2],['status','=',1]]);
                if (userType()->user_type==2) 
                    {
                    $ips = $ips->where('id', Session::get('admin_id'));
                    }
                    else
                    {
                     $ips = $ips->where('sub_user', ''); 
                    }
          $ips =  $ips->orderBy('first_name')->pluck('first_name','id');


       // dd($users); 
        return view('admin.editAssignIp',compact("jsl","a_vl","comps","ips", "cat"));  
      }
      else
      {
        return redirect(admin().'/assigning-details');
      }
    }

    function updateAssignIp(Request $req, $id)
    {
      $response = array();

        $check = assignCompanyMdl::find($id);

      if ($check) 
      {
        $data2= [
          //'designation' => $req->designation ?? "",
          'appointment_date' => $req->appointment_date ?? "",
          'termination_date' => $req->status == 1 ? "" : date('Y-m-d H:i'),
          'status' => $req->status, 
          'update_time' => date('Y-m-d H:i:s'),
          'updated_by' => Session::get('admin_id'),
          'rem_addr' => $req->ip()
        ];

        $data1 = [
          'main_id' => "",
          'update_id' => "",
          'company_id' => $req->company ?? "",
          'ip_id' => $req->ip ?? "",
          'designation' => $req->designation ?? "",
          'appointment_date' => $req->appointment_date ?? "",
          'termination_date' => $req->status == 1 ? "" : date('Y-m-d H:i'), 

          'status' => $req->status, 
          'rem_addr' => $req->ip(),
          
          'created_time' => date('Y-m-d H:i:s'),
          'created_by_id'  => Session::get('admin_id'),
          'update_time' => date('Y-m-d H:i:s'),
          'updated_by' => "",

          'deleted' => 2,
          'deleted_time' =>"",
          'deleted_by' =>""

        ];

       if ($check->company_id == $req->company && $check->ip_id == $req->ip && $check->designation == $req->designation && $req->designation != 'AR') 
       {
         
        DB::table('assign_company_mdls')->where('id',$check->id)->update($data2);
        $response['error'] = false; 
        $response['message'] = "Data Saved Successfully";
      }
      else if($check->company_id == $req->company && $check->ip_id == $req->ip && $check->designation != $req->designation) 
      {
        $data2= [
          'termination_date' => date('Y-m-d H:i'),
          'status' => 2, 
          'update_time' => date('Y-m-d H:i:s'),
          'updated_by' => Session::get('admin_id'),
          'rem_addr' => $req->ip()
        ];  

        DB::table('assign_company_mdls')->where('id',$check->id)->update($data2);
        $db = DB::table('assign_company_mdls')->insert($data1);

        if ($db) 
        {
          $response['error'] = false; 
          $response['message'] = "Data Saved Successfully";

        }
        else
        {
          $response['error'] = true;
          $response['message'] = "IP Not Assigned. Try Again Later.";
        }
       } 
       else if ($check->company_id == $req->company && $check->ip_id != $req->ip) 
       {
        $data2= [
          'termination_date' => date('Y-m-d H:i'),
          'status' => 2, 
          'update_time' => date('Y-m-d H:i:s'),
          'updated_by' => Session::get('admin_id'),
          'rem_addr' => $req->ip()
        ];

          DB::table('assign_company_mdls')->where('id',$check->id)->update($data2);
           DB::table('assign_company_mdls')->insert($data1);
           $response['error'] = false; 
          $response['message'] = "Data Saved Successfully";
       }
       else if ($check->company_id != $req->company) 
       {
        $data2= [
          'termination_date' => date('Y-m-d H:i'),
          'status' => 2, 
          'update_time' => date('Y-m-d H:i:s'),
          'updated_by' => Session::get('admin_id'),
          'rem_addr' => $req->ip()
        ];

          DB::table('assign_company_mdls')->where('id',$check->id)->update($data2);
           DB::table('assign_company_mdls')->insert($data1);
           $response['error'] = false; 
          $response['message'] = "Data Saved Successfully";
       }
    }
    
        echo json_encode($response);
    }


    function deleteAssignIp(Request $req, $id)
    {
      //echo $id;die();
      $response = array();
        $cat = assignCompanyMdl::find($id); 
  
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

        
        echo json_encode($response);
    }

}
