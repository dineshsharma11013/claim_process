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

class llpmaster_DtlCntrlr extends Controller
{
    use MethodsTrait;

	function index(Request $req)
	{
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl = Config::get('site.llpData');
        return view('admin.add_llp',compact("jsl","a_vl"));	
	}
	
	
	
	function fetch_llp_master(Request $req)
	{
	    
	       $jsl =  bPath().'/'.Config::get('site.general');
	       
	       $llp_data = DB::table('llp_master_data');
                        if (userType()->user_type==2)
                        {
                        $llp_data = $llp_data->where('created_by','=',Session::get('admin_id'));    
                        }
                        elseif (userType()->user_type==4) {
                            $llp_data = $llp_data->where('created_by','=',userType()->sub_user);    
                            }    
                                          
                    $llp_data = $llp_data->where('deleted_by','')
                                    ->orderBy('id', 'desc')
                                    ->get();
	       //dd($llp_data);
	       
        return view('admin.view_llp_master_data',compact("jsl","llp_data"));	
	    
	}
	
	
	
	
	
	function edit_llp_form(Request $req ,$id)
	{
	      $jsl =  bPath().'/'.Config::get('site.general');
	      $a_vl = Config::get('site.llpData');
	      $llp_data = DB::table('llp_master_data')->where('id','=',$id)->first();
	      
	    // dd($llp_data);
	     return view('admin.edit_llp_master_data',compact("jsl","llp_data", "a_vl"));	
	}
	
	
	
	
	
	


function postform(Request $req)
{
    $response = array();
  $data=  [
        'company_name' => $req->company_name,
        'roc_code' => $req->roc_code,
        'registeration_number' => $req->registeration_number,
        'company_category' => $req->company_category,
        'company_subcategory' => $req->company_subcategory,  
        'class_of_company' => $req->class_of_company,
        'authorised_capital' => $req->authorised_capital,
        'paid_up_capital' => $req->paid_up_capital,
        'number_of_member' => $req->number_of_member,
        'date_of_incorporation' => $req->date_of_incorporation,
        'registeration_address' => $req->registeration_address,
        'address_other_than_ro' => $req->address_other_than_ro,
        'email_id' => $req->email_id,
        'whether_listed_or_not' => $req->whether_listed_or_not,
        'active_compilance' => $req->active_compilance,
        'suspended_at_stock_exchange' => $req->suspended_at_stock_exchange,
        'date_of_last_agm' => $req->date_of_last_agm,
        'date_of_balancesheet' => $req->date_of_balancesheet,
        'company_status_for_efilling' => $req->company_status_for_efilling,
        'cin' => $req->cin,
        'rem_addr' => $req->ip(),
        'status'=>1,
        'created_at' => date('Y-m-d H:i:s'),
        'created_by' => Session::get('admin_id'),
        'updated_at' => '',
        'updated_by' => '',
        'deleted_by'=>'',
        'deleted_at' =>''   
        ];

 $check = $this->insertData('llp_master_data',$data); 

if($check)
{
            $response['error'] = false;  
            $response['message'] = "Data Added Successfully";
}
 else
 {
    $response['error'] = true;
            $response['message'] = "Data Not Added. Try Again Later.";
 }   

    echo json_encode($response);
    
}


function delete_llp_form(Request $req,$id)
{
    
     $response = array();
      $data = [
            'rem_addr' => $req->ip(),
            'deleted_at'=>date('Y-m-d H:i:s'),
            'deleted_by'=>Session::get('admin_id')
        ];

      $query = $this->updateData('llp_master_data', $data, ['id'=>$id]); 
          
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

function update_llp_form(Request $req, $id)
{

    $response = array();
    $data=  [
        'company_name' => $req->company_name,
        'roc_code' => $req->roc_code,
        'registeration_number' => $req->registeration_number,
        'company_category' => $req->company_category,
        'company_subcategory' => $req->company_subcategory,  
        'class_of_company' => $req->class_of_company,
        'authorised_capital' => $req->authorised_capital,
        'paid_up_capital' => $req->paid_up_capital,
        'number_of_member' => $req->number_of_member,
        'date_of_incorporation' => $req->date_of_incorporation,
        'registeration_address' => $req->registeration_address,
        'address_other_than_ro' => $req->address_other_than_ro,
        'email_id' => $req->email_id,
        'whether_listed_or_not' => $req->whether_listed_or_not,
        'active_compilance' => $req->active_compilance,
        'suspended_at_stock_exchange' => $req->suspended_at_stock_exchange,
        'date_of_last_agm' => $req->date_of_last_agm,
        'date_of_balancesheet' => $req->date_of_balancesheet,
        'company_status_for_efilling' => $req->company_status_for_efilling,
        'cin' => $req->cin,
        'rem_addr' => $req->ip(),
        'updated_at' => date('Y-m-d H:i:s'),
        'updated_by' => Session::get('admin_id'),
        ];

     $check = $this->updateData('llp_master_data', $data, ['id'=>$id]); 

    if($check)
    {
                $response['error'] = false;  
                $response['message'] = "Data Updated Successfully";
    }
     else
     {
                $response['error'] = true;
                $response['message'] = "Data Not Updated. Try Again Later.";
     }   

        echo json_encode($response);   
    
   
}








// 	function saveCompany(Request $req)
// 	{
// 		$response = array();
//         $cat = new companyDtl;

//         $cat->user_id = Session::get('admin_id');
//         $cat->status = $req->status ?? "";
//         $cat->name = $req->name ?? "";
        
//         $cat->address = $req->address ?? "";
//         $cat->insolvency_commencement_date = $req->insolvency_commencement_date ?? "";
//         $cat->nclt = $req->nclt ?? "";
//         $cat->claim_filing_date = $req->claim_filing_date ?? "";
//         $cat->start_date = $req->start_date ?? ""; 
//         $cat->end_date =  $req->end_date ?? "";
        
//         $cat->rem_addr = $req->ip();
      
//         $cat->created_at = date('Y-m-d H:i:s');
//         $cat->updated_at = "";
//         $cat->updated_by = "";
//         $cat->deleted = 2;
//         $cat->deleted_by = "";
//         $cat->deleted_time = "";

      
//         if($cat->save())
//         {
//             $response['error'] = false;	
//             $response['message'] = "Company Added Successfully";
//           }
//           else
//           {
//             $response['error'] = true;
//             $response['message'] = "Company Not Added. Try Again Later.";
//           }
        
//         echo json_encode($response);
// 	}

// 	function editCompany(Request $req, $id)
// 	{
// 		    $cat = companyDtl::find($id);
//         $jsl =  bPath().'/'.Config::get('site.general');
//         $a_vl =  Config::get('site.companyVal');
//       // dd($cat->username);	
//         return view('admin.edit_company',compact("jsl","a_vl","cat"));	
// 	}

// 	function updateCompany(Request $req, $id)
// 	{
// 		    $response = array();
//         $cat = companyDtl::find($id);
        
//         $cat->status = $req->status ?? "";
//         $cat->name = $req->name ?? "";
        
//         $cat->address = $req->address ?? "";
//         $cat->insolvency_commencement_date = $req->insolvency_commencement_date ?? "";
//         $cat->nclt = $req->nclt ?? "";
//         $cat->claim_filing_date = $req->claim_filing_date ?? "";
//         $cat->start_date = $req->start_date ?? ""; 
//         $cat->end_date =  $req->end_date ?? "";
        
//         $cat->rem_addr = $req->ip();
        
//         $cat->updated_at = date('Y-m-d H:i:s');
//         $cat->updated_by = Session::get('admin_id');

//         if($cat->save())
//         {
//             $response['error'] = false;	
//             $response['message'] = "Company Updated Successfully";
//           }
//           else
//           {
//             $response['error'] = true;
//             $response['message'] = "Company Not Updated. Try Again Later.";
//           }
        
//         echo json_encode($response);
// 	}

// 	function deleteCompany(Request $req,  $id)
// 	{
// 		    $response = array();
//         $cat = companyDtl::find($id); 
   
//         if ($cat) 
//           {

//             $cat->rem_addr = $req->ip();
//             $cat->updated_at = date('Y-m-d H:i:s');
//             $cat->deleted = 1;
//             $cat->deleted_by = Session::get('admin_id');
//             $cat->deleted_time = date('Y-m-d H:i:s');

//             if ($cat->save()) 
//             {
//               $response['error'] = false;
//               $response['message'] = "Successfully Deleted";
//             }
//             else
//             {
//               $response['error'] = true;
//               $response['message'] = "Not Deleted. Please refresh the page.";   
//             }
            
//           }
//           else
//           {
//             $response['error'] = true;
//             $response['message'] = "Data not available";
//           }
        
//         echo json_encode($response);
// 	}
}
