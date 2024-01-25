<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\arMdl;
use Config;
use Session;

class arCntrlr extends Controller
{
    function arDetails(Request $req)
  {

        $users = arMdl::select('id','name','status')
              ->orderByDesc('id')
              ->get();
              
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
        
      
       // dd($users); 
        return view('admin.arDetails',compact("users","jsl","a_vl"));
      
  }

  function addAr(Request $req)
  {
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.arValidation');
       // dd($users); 
        return view('admin.add_ar',compact("jsl","a_vl"));  
  }

  function saveAr(Request $req)
  {
    $response = array();
        $cat = new arMdl;
        $cat->name = $req->username ?? "";
        
        $cat->user_id = Session::get('admin_id');
        $cat->reg_no = $req->reg_no ?? "";
        $cat->rem_addr = $req->ip();
        $cat->date = date('Y-m-d');
        $cat->status= $req->status ?? "";
      
        if($cat->save())
        {
            $response['error'] = false; 
            $response['message'] = "AR Added Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "AR Not Added. Try Again Later.";
          }
        
        echo json_encode($response);
  }

  function editAr(Request $req, $id)
  {
    $cat = arMdl::find($id,['id','name','status','reg_no']);
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.arValidation');
       // dd($cat->username); 
        return view('admin.editAr',compact("jsl","a_vl","cat"));  
  }

  function updateAr(Request $req, $id)
  {
    $response = array();
        $cat = arMdl::find($id);
        
        $cat->name = $req->username ?? "";
        $cat->reg_no = $req->reg_no ?? "";
        $cat->rem_addr = $req->ip();
        $cat->status= $req->status ?? "";
        
        if($cat->save())
        {
            $response['error'] = false; 
            $response['message'] = "AR Updated Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "AR Not Updated. Try Again Later.";
          }
        
        echo json_encode($response);
  }

  function deleteAr($id)
  {
    $response = array();
        $cat = arMdl::find($id); 
   
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
