<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\companyDtl;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\formReport;
use Config;
use Session;
use DB;

class reportCntrlr extends Controller
{
 	function formsReport()
 	{	
 			
		$company = DB::table('form_a_mdls as fmA')->where([['fmA.status','=',1],['fmA.deleted','=',2]])
 					->leftJoin('company_dtls as com', 'com.id','=', 'fmA.company_id');
 						if (userType()->user_type==2)
 						{
 							$company = $company->where('fmA.user_id',userType()->id);
 						}
 		$company =	$company->groupBy('fmA.company_id', 'com.name')
 					->orderBy('com.id', 'desc')
 					->pluck('com.name', 'fmA.company_id as id');


 	//	dd($company);die();			
 		
 		$jsl =  bPath().'/'.Config::get('site.general');
 	//	dd(userType()->id);die();
 		
 		return view('admin.reportDetailsCompany', compact("company", "jsl"));
 	}   


 	function generateReport(Request $req)
 	{
 		//echo $req->company;

 		$company = $req->company;
 		$form = $req->form;
 		$report_type = $req->report_type;

 		// if (userType()->user_type!=1) 
 		// {
 		// 	$admin = Session::get('admin_id');
 		// }
 			

 	   if ($form=='form-b') 
       {
	       	if ($report_type=='basic') {
	       		$data = DB::table('operational_creditor_mdls as fb')
	          				->select('fb.operational_creditor_email as cl_email', 'fb.claimant_name as cl_name');
	          				if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}
	          	$data	= $data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();
	       	}
	       	elseif ($report_type=='claimed') 
	       	{
	   			$data = DB::table('operational_creditor_mdls as fb')
	          				->select('fb.operational_creditor_email as cl_email', 'fb.claimant_name as cl_name', 'fb.principle_amount as base_amt', '
	          					fb.interest as int_amt', 'fb.total_amount as total_amount');
	          		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}		

	          		$data =	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();	
	       	}
	       	elseif ($report_type=='covered') 
	       	{
	   			$data = DB::table('form_b_approval_mdls as fb')
	   						->join('operational_creditor_mdls as fm', 'fm.form_b_selected_id','=','fb.form_b_id')
	   						->select('fm.claimant_name as name', 'fb.*');
	          		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}		
	          		$data =	$data->where([['fb.company','=',$company],['fb.formType','=','latest'],['fm.formType','=','latest']])
	          				->get();	
	       	}
          
       }
       elseif ($form=='form-c') 
       {
         	if ($report_type=='basic') {
	       		$data = DB::table('finanicial_creditor_form_c_mdls as fb')
	          				->select('fb.fc_email as cl_email', 'fb.fc_name as cl_name');
	          				if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}
	          		$data	= 	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();
	       	}
	       	elseif ($report_type=='claimed') 
	       	{
	   			$data = DB::table('finanicial_creditor_form_c_mdls as fb')
	          				->select('fb.fc_email as cl_email', 'fb.fc_name as cl_name', 'fb.borrower_claim_amount as amt1', 'fb.guarantor_security_interest_amount as amt2', 'fb.financial_claim_amt as amt3');
	          				if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}
	          		$data	=	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();	
	       	}
	       	elseif ($report_type=='covered') 
	       	{
	   			$data = DB::table('form_c_aproval_mdls as fb')
	   						->join('finanicial_creditor_form_c_mdls as fm', 'fm.form_c_selected_id','=','fb.form_c_id')
	   						->select('fm.signing_person_name as name', 'fb.*');
	          				if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}
	          		$data	=	$data->where([['fb.company','=',$company],['fb.formType','=','latest'],['fm.formType','=','latest']])
	          				->get();	
	       	}
       }
       elseif ($form=='form-d') 
       {
         	if ($report_type=='basic') {
	       		$data = DB::table('form_d_mdls as fb')
	          				->select('fb.email as cl_email', 'fb.name as cl_name');
	          				if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}
	          		$data	=	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();
	       	}
	       	elseif ($report_type=='claimed') 
	       	{
	   			$data = DB::table('form_d_mdls as fb')
	          				->select('fb.email as cl_email', 'fb.name as cl_name', 'fb.principle as base_amt', 'fb.intrest as int_amt', 'fb.total_amount as total_amount');
	          				if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}
	          		$data	=	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();	
	       	}
	       	elseif ($report_type=='covered') 
	       	{
	   			$data = DB::table('form_d_aproval_mdls as fb')
	   						->join('form_d_mdls as fm', 'fm.form_d_selected_id','=','fb.form_d_id')
	   						->select('fm.name as name', 'fb.*');
	   						if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}
	          		$data	=	$data->where([['fb.company','=',$company],['fb.formType','=','latest'],['fm.formType','=','latest']])
	          				->get();	
	       	}
       }
       elseif ($form=='form-e') 
       {
        	if ($report_type=='basic') {
	       		$data = DB::table('form_e_file_mdls as fb')
	       					->join('user_mdls as user', 'user.id','=', 'fb.user_id')	
	          				->select('user.email as cl_email', 'user.name as cl_name', 'user.mobile as cl_contact');
	          				if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}
	          		$data	=	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();
	       	}
	       	elseif ($report_type=='claimed') 
	       	{
	   			$data = DB::table('form_e_file_mdls as fb')
	   						->leftJoin('user_mdls as user', 'user.id','=', 'fb.user_id')
	   						->leftJoin('form_e_approval_mdls as apr', 'apr.form_e_id','=','fb.form_e_selected_id')
	          				->select('user.email as cl_email', 'user.name as cl_name', 'user.mobile as cl_contact', 'apr.total_user_amount');
	          				if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}
	          		$data	=	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['fb.formType','=','latest'],['apr.formType','=','latest']])
	          				->get();	
	       	}
	       	elseif ($report_type=='covered') 
	       	{
	   			$data = DB::table('form_e_file_mdls as fb')
	   						->leftJoin('user_mdls as user', 'user.id','=', 'fb.user_id')
	   						->leftJoin('form_e_approval_mdls as apr', 'apr.form_e_id','=','fb.form_e_selected_id')
	          				->select('user.email as cl_email', 'user.name as cl_name', 'user.mobile as cl_contact', 'apr.total_user_amount', 'apr.reason as reason', 'apr.status as status');
	          			if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}	
	          		$data	=	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['fb.formType','=','latest'],['apr.formType','=','latest']])
	          				->get();
	       	} 	
       }
       elseif ($form=='form-f') 
       {
         
       		if ($report_type=='basic') {
	       		$data = DB::table('other_creditor_form_f_mdls as fb')
	          				->select('fb.fc_email as cl_email', 'fb.fc_name as cl_name');
	          		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}		
	          		$data	=	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();
	       	}
	       	elseif ($report_type=='claimed') 
	       	{
	       		//dd("hello");die();
	   			$data = DB::table('other_creditor_form_f_mdls as fb')
	          				->select('fb.fc_email as cl_email', 'fb.fc_name as cl_name', 'fb.claim_amt as base_amt', 'fb.claim_amt_desc as claim_amt_desc');
	          		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}		
	          		$data	=	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();	
	       	}
	       	elseif ($report_type=='covered') 
	       	{
	   			// $data = DB::table('form_f_approval_mdls as fb')
	   			// 			->join('other_creditor_form_f_mdls as fm', 'fm.form_f_selected_id','=','fb.form_f_id')
	   			// 			->select('fm.fc_name as name', 'fb.*')
	      //     				->where([['fb.company','=',$company],['fb.formType','=','latest'],['fm.formType','=','latest']])
	      //     				->get();	
	       	
	       		$data = DB::table('other_creditor_form_f_mdls as fb')
	          				->select('fb.fc_email as cl_email', 'fb.fc_name as cl_name', 'fb.claim_amt as base_amt', 'fb.claim_amt_desc as claim_amt_desc');
	          		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}		
	          		$data	=	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();
	       	} 



       }elseif ($form=='form-ca') 
       {
        	if ($report_type=='basic') {
	       		$data = DB::table('financial_creditor_form_ca_mdls as fb')
	          				->select('fb.fc_email as cl_email', 'fb.fc_name as cl_name');
	          				if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}
	          		$data	=	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();
	       	}
	       	elseif ($report_type=='claimed') 
	       	{
	   			$data = DB::table('financial_creditor_form_ca_mdls as fb')
	          				->select('fb.fc_email as cl_email', 'fb.fc_name as cl_name', 'fb.claim_principle as base_amt', 'fb.claim_interest as int_amt', 'fb.claim_amt as total_amount');
	          			if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}	
	          		$data	=	$data->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
	          				->get();	
	       	}
	       	elseif ($report_type=='covered') 
	       	{
	   			$data = DB::table('form_c_a_aproval_mdls as fb')
	   						->join('financial_creditor_form_ca_mdls as fm', 'fm.form_ca_selected_id','=','fb.form_ca_id')
	   						->select('fm.fc_name as name', 'fb.*');
	   				if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fb.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fb.irp', user_type()->sub_user);
                    		}		
	          		$data	=	$data->where([['fb.company','=',$company],['fb.formType','=','latest'],['fm.formType','=','latest']])
	          				->get();	
	       	} 
       }



     //  dd($data);die();

       if (isset($data) && count($data)>0) 
       {
       		return Excel::download(new formReport($data, $report_type, $form), ucwords($report_type).'-Report.xlsx');
       }
       else
       {
       	return redirect()->back()->with("danger","There is no record.");
       }

 		
 	}

}
