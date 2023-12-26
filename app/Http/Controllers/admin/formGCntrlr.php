<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\formGMdl;
use Config;
use Session;
use DB;
use PDF;

class formGCntrlr extends Controller
{
    function index()
    {


    	$results = DB::table('form_g_mdls as fg')
    				->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'fg.created_by_id');
    				if (userType()->user_type==4) 
    				{
    					//$mainIP = DB::table('general_info_mdls')->select('sub_user')->where('sub_user', Session::get('admin_id'))->first();
    					// $results = $results->where('fg.created_by_id', $mainIP->sub_user);
                        $results = $results->where('fg.created_by_id', userType()->sub_user);
    				}		
    				else if (userType()->user_type==2)
    				{
    					$results = $results->where('fg.created_by_id', Session::get('admin_id'));
    				}
    				 	$results = $results->select('fg.*')->where('fg.deleted_by','')->orderBy('fg.id', 'desc')->get();	



    	$jsl =  bPath().'/'.Config::get('site.general');
        
       return view('admin.formGDetails',compact("jsl", "results"));
    }


    function formGView($id)
    {
    	$cat = DB::table('form_g_mdls');
    		if (userType()->user_type==2)
    			{
    				$cat =	$cat->where([['created_by_id', '=', Session::get('admin_id')], ['deleted_by', '=', '']])->where('id', $id);
    			}
    		elseif (userType()->user_type==4)
        		{
        			// $mainIP = DB::table('general_info_mdls')->select('sub_user')->where('sub_user', Session::get('admin_id'))->first();
        			// $cat =	$cat->where([['created_by_id', '=', $mainIP->sub_user], ['deleted_by', '=', '']])->where('id', $id);	
                    $cat =  $cat->where([['created_by_id', '=', userType()->sub_user], ['deleted_by', '=', '']])->where('id', $id);
        		}

    	$cat =	$cat->first();

        $pdf = PDF::loadView('user.pdf.formG', compact("cat"));
        
        $now = time();
        return $pdf->stream($now.'.pdf');
    }

    function addData(Request $req)
    {
    	$jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.formGMethod');  
        

        //$pth = publicP()."/access/media/forms/formA/";

       // dd($result);die();

        return view('admin.formG',compact("jsl","a_vl"));
    }

    function saveData(Request $req)
    {
    	$response = array();
        $cat = new formGMdl;
        
        $cat->corporate_debtor_name = $req->corporate_debtor_name ?? "";
        $cat->debtor_pan = $req->debtor_pan ?? "";
        $cat->debtor_cin_llp = $req->debtor_cin_llp ?? "";
        $cat->reg_address = $req->reg_address ?? "";
        $cat->website = $req->website ?? "";
        $cat->place_details = $req->place_details ?? "";
        $cat->quantity = $req->quantity ?? "";
        $cat->value = $req->value ?? "";
        $cat->employee_workmen_number = $req->employee_workmen_number ?? "";
        $cat->further_details = $req->further_details ?? "";
        $cat->eligibility = $req->eligibility ?? "";
        $cat->last_date_recript = $req->last_date_recript ?? "";
        $cat->prov_issue_date = $req->prov_issue_date ?? "";
        $cat->last_date_submission = $req->last_date_submission ?? "";
        $cat->final_issue_date = $req->final_issue_date ?? "";
        $cat->information_issue_date = $req->information_issue_date ?? "";
        $cat->resolution_last_date = $req->resolution_last_date ?? "";

        $cat->process_email = $req->process_email ?? "";
        $cat->rem_addr = $req->ip();
        $cat->status= $req->status ?? "";
        $cat->created_at = date('Y-m-d H:i:s');
        $cat->updated_at = "";
        $cat->deleted_at = "";

        $cat->created_by_id =  Session::get('admin_id');
        $cat->updated_by =  '';
        $cat->deleted_by =  '';
        
      
        if($cat->save())
        {
            $response['error'] = false;	
            $response['message'] = "Form Saved Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Form Not Added. Try Again Later.";
          }
        
        echo json_encode($response);
    }

    function editData(Request $req, $id)
    {
    	$jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.formGMethod');  
        

        $cat = DB::table('form_g_mdls');
        			if (userType()->user_type==2)
    					{
        	$cat =	$cat->where([['created_by_id', '=', Session::get('admin_id')], ['deleted_by', '=', '']]);
        			}
        			elseif (userType()->user_type==4)
        			{
        			//	$mainIP = DB::table('general_info_mdls')->select('sub_user')->where('sub_user', Session::get('admin_id'))->first();
        			$cat =	$cat->where([['created_by_id', '=', userType()->sub_user], ['deleted_by', '=', '']]);	
        			}
        	$cat = $cat->where('id', $id)->first();		

       // dd($cat);die();

        return view('admin.editFormG',compact("jsl","a_vl", "cat"));
    }

    function updateData(Request $req, $id)
    {
    	$response = array();
        $cat = formGMdl::find($id);
        
        $cat->corporate_debtor_name = $req->corporate_debtor_name ?? "";
        $cat->debtor_pan = $req->debtor_pan ?? "";
        $cat->debtor_cin_llp = $req->debtor_cin_llp ?? "";
        $cat->reg_address = $req->reg_address ?? "";
        $cat->website = $req->website ?? "";
        $cat->place_details = $req->place_details ?? "";
        $cat->quantity = $req->quantity ?? "";
        $cat->value = $req->value ?? "";
        $cat->employee_workmen_number = $req->employee_workmen_number ?? "";
        $cat->further_details = $req->further_details ?? "";
        $cat->eligibility = $req->eligibility ?? "";
        $cat->last_date_recript = $req->last_date_recript ?? "";
        $cat->prov_issue_date = $req->prov_issue_date ?? "";
        $cat->last_date_submission = $req->last_date_submission ?? "";
        $cat->final_issue_date = $req->final_issue_date ?? "";
        $cat->information_issue_date = $req->information_issue_date ?? "";
        $cat->resolution_last_date = $req->resolution_last_date ?? "";

        $cat->process_email = $req->process_email ?? "";
        $cat->rem_addr = $req->ip();
        $cat->status= $req->status ?? "";
        $cat->updated_at = date('Y-m-d H:i:s');
       
        $cat->updated_by =  Session::get('admin_id');
       
        if($cat->save())
        {
            $response['error'] = false;	
            $response['message'] = "Form Saved Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Form Not Added. Try Again Later.";
          }
        
        echo json_encode($response);
    }


     function deleteData(Request $req, $id)
    {
        $response = array();
        $cat = formGMdl::find($id); 
        $cat->rem_addr = $req->ip();

        $cat->deleted_at = date('Y-m-d H:i:s');
        $cat->deleted_by =  Session::get('admin_id');

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
            
          
        
        echo json_encode($response);
    }





}
