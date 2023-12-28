<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\companyDtl;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\form_my_report;
use App\Exports\form_anexa_my_report;
use Config;
use Session;
use DB;

class reportGenerateCntrlr extends Controller
{	
 	
 	function generateRdcseport(Request $req)
 	{
 		//echo $req->company;

 		$company = $req->company;
 		$form = $req->form;
		$report_type=$req->reprt_typ;
		$Employee_details = [];
//form b start
		 if ($form == 'form-b')
		 {
		  if($report_type=='all') {
			$data = DB::table('operational_creditor_mdls')
				->leftjoin('company_dtls', 'company_dtls.id', '=', 'operational_creditor_mdls.company')
				->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'operational_creditor_mdls.irp')
				->leftjoin('user_mdls', 'user_mdls.id', '=', 'operational_creditor_mdls.user_id')
				//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
				->select('operational_creditor_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name');
				if (userType()->user_type==2) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->sub_user);
                    		}
			$data	= $data->where(['company' => $company, 'operational_creditor_mdls.submitted' => 1, 'formType' => 'latest'])
				->get();
		}	
	elseif($report_type=='basic-details') {
			$data = DB::table('operational_creditor_mdls')
				->leftjoin('company_dtls', 'company_dtls.id', '=', 'operational_creditor_mdls.company')
				->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'operational_creditor_mdls.irp')
				->leftjoin('user_mdls', 'user_mdls.id', '=', 'operational_creditor_mdls.user_id')
				//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
				->select('operational_creditor_mdls.*' , 'user_mdls.mobile', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name');
			if (userType()->user_type==2) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->sub_user);
                    		}	
			$data	= $data->where(['company' => $company, 'operational_creditor_mdls.submitted' => 1, 'formType' => 'latest'])
				->get();
		}

		elseif ($report_type=='claim-details') {
			$data = DB::table('operational_creditor_mdls')
				->leftjoin('company_dtls', 'company_dtls.id', '=', 'operational_creditor_mdls.company')
				->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'operational_creditor_mdls.irp')
				->leftjoin('user_mdls', 'user_mdls.id', '=', 'operational_creditor_mdls.user_id')
				//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
				->select('operational_creditor_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name');
			if (userType()->user_type==2) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->sub_user);
                    		}	
			$data	=$data->where(['company' => $company, 'operational_creditor_mdls.submitted' => 1, 'formType' => 'latest'])
				->get();	
		}

	elseif ($report_type=='approved-details') {
		$data = DB::table('operational_creditor_mdls')
			->leftjoin('company_dtls', 'company_dtls.id', '=', 'operational_creditor_mdls.company')
			->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'operational_creditor_mdls.irp')
			->leftjoin('user_mdls', 'user_mdls.id', '=', 'operational_creditor_mdls.user_id')
			->leftjoin('form_b_approval_mdls', 'form_b_approval_mdls.form_b_id', '=', 'operational_creditor_mdls.form_b_selected_id', 'form_b_approval_mdls.user_id', '=', 'operational_creditor_mdls.user_id')
			//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
			->select('operational_creditor_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_b_approval_mdls.principal_amt as approved_principle_amount','form_b_approval_mdls.interest as approved_interest_amount','form_b_approval_mdls.total as approved_total_amount','form_b_approval_mdls.rejected_principle_amt as rejected_principle_amount','form_b_approval_mdls.rejected_interest_amt as rejected_interest_amount','form_b_approval_mdls.rejected_total_amount as rejected_total_amount');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->sub_user);
                    		}
                    			
		$data	= $data->where(['operational_creditor_mdls.company' => $company, 'operational_creditor_mdls.submitted' => 1, 'operational_creditor_mdls.formType' => 'latest','form_b_approval_mdls.formType'=>'latest'])
			->get();
		}
	if (count($data)>0) {	
	$secntionDt = [];		
		foreach ($data as $row) {
			$secntionDt = DB::table('form_b_senction_mdls')->get();
		}
	$Declaration = [];		
		foreach ($data as $row) {
			$Declaration = DB::table('form_b_declaration_table_mdls')->get();
		}
	}
	
}
//new join end
//form b end

//form c start
if ($form == 'form-c')
	{
	if($report_type=='all') {
	$data = DB::table('finanicial_creditor_form_c_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'finanicial_creditor_form_c_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'finanicial_creditor_form_c_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'finanicial_creditor_form_c_mdls.user_id')
		//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
		->select('finanicial_creditor_form_c_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->sub_user);
                    		}
	$data	= $data->where(['company' => $company, 'finanicial_creditor_form_c_mdls.submitted' => 1, 'formType' => 'latest'])
		->get();
	}

elseif ($report_type=='basic-details') {
	$data = DB::table('finanicial_creditor_form_c_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'finanicial_creditor_form_c_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'finanicial_creditor_form_c_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'finanicial_creditor_form_c_mdls.user_id')
		//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
		->select('finanicial_creditor_form_c_mdls.*', 'user_mdls.mobile', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->sub_user);
                    		}
	$data	=$data->where(['company' => $company, 'finanicial_creditor_form_c_mdls.submitted' => 1, 'formType' => 'latest'])
		->get();
}

elseif ($report_type=='claim-details') {
	$data = DB::table('finanicial_creditor_form_c_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'finanicial_creditor_form_c_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'finanicial_creditor_form_c_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'finanicial_creditor_form_c_mdls.user_id')
		//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
		->select('finanicial_creditor_form_c_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->sub_user);
                    		}
	$data = 	$data->where(['company' => $company, 'finanicial_creditor_form_c_mdls.submitted' => 1, 'formType' => 'latest'])
		->get();
}

elseif ($report_type=='approved-details') {
	$data = DB::table('finanicial_creditor_form_c_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'finanicial_creditor_form_c_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'finanicial_creditor_form_c_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'finanicial_creditor_form_c_mdls.user_id')
		->leftjoin('form_c_aproval_mdls', 'form_c_aproval_mdls.form_c_id', '=', 'finanicial_creditor_form_c_mdls.form_c_selected_id', 'form_c_aproval_mdls.user_id', '=', 'finanicial_creditor_form_c_mdls.user_id')
		
		//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
		->select('finanicial_creditor_form_c_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_c_aproval_mdls.borrower_claim_amount as apprv_borrower_claim_amount','form_c_aproval_mdls.borrower_security_interest_amount as apprv_borrower_security_interest_amount','form_c_aproval_mdls.borrower_guarantee_amt as apprv_borrwer_gurantee_amount','form_c_aproval_mdls.guarantor_claim_amount as apprv_guaranter_claim_amount','form_c_aproval_mdls.guarantor_security_interest_amount as apprv_gurantor_security_interest_amount','form_c_aproval_mdls.guarantor_gaurantee_amt as apprv_guranter_gurantee_amount','form_c_aproval_mdls.guarantor_principal_borrower as apprv_guranter_principle_amunt','form_c_aproval_mdls.financial_claim_amt as financial_claimed_amount');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->sub_user);
                    		}
	$data	=$data->where(['finanicial_creditor_form_c_mdls.company' => $company, 'finanicial_creditor_form_c_mdls.submitted' => 1, 'finanicial_creditor_form_c_mdls.formType' => 'latest','form_c_aproval_mdls.formType'=>'latest'])
		->get();
}

if (count($data)>0) {
	$secntionDt = [];		
	foreach ($data as $row) {
		$secntionDt = DB::table('form_c_senction_mdls')->get();
	}



$Declaration = [];		
	foreach ($data as $row) {
		$Declaration = DB::table('form_c_declaration_table_mdls')->get();
	}	
}

}



//form c end


//form d start
if ($form == 'form-d')
{
	if($report_type=='all') {
	$data = DB::table('form_d_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'form_d_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'form_d_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'form_d_mdls.user_id')
		//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
		->select('form_d_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_d_mdls.name as neme');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('form_d_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('form_d_mdls.irp', user_type()->sub_user);
                    		}

	$data = $data->where(['form_d_mdls.company' => $company, 'form_d_mdls.submitted' => 1, 'form_d_mdls.formType' => 'latest'])
		->get();
	}

elseif($report_type=='basic-details') {
	$data = DB::table('form_d_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'form_d_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'form_d_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'form_d_mdls.user_id')
		//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
		->select('form_d_mdls.*', 'user_mdls.mobile', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_d_mdls.name as neme');
		            if (userType()->user_type==2) 
                    		{
                    $data = $data->where('form_d_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('form_d_mdls.irp', user_type()->sub_user);
                    		}
	$data	= $data->where(['form_d_mdls.company' => $company, 'form_d_mdls.submitted' => 1, 'form_d_mdls.formType' => 'latest'])
		->get();
}

elseif($report_type=='claim-details') {
	$data = DB::table('form_d_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'form_d_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'form_d_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'form_d_mdls.user_id')
		//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
		->select('form_d_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_d_mdls.name as neme');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('form_d_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('form_d_mdls.irp', user_type()->sub_user);
                    		}
	$data	= $data->where(['form_d_mdls.company' => $company, 'form_d_mdls.submitted' => 1, 'form_d_mdls.formType' => 'latest'])
		->get();
}

elseif($report_type=='approved-details') {
	$data = DB::table('form_d_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'form_d_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'form_d_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'form_d_mdls.user_id')
		//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
		->leftjoin('form_d_aproval_mdls', 'form_d_aproval_mdls.form_d_id', '=', 'form_d_mdls.form_d_selected_id', 'form_d_aproval_mdls.user_id', '=', 'form_d_mdls.user_id')
		->select('form_d_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_d_mdls.name as neme','form_d_aproval_mdls.approved_principle_amt','form_d_aproval_mdls.approved_interest_amt as approved_interest_amount','form_d_aproval_mdls.total_approval_amt as approved_total_amount');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('form_d_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('form_d_mdls.irp', user_type()->sub_user);
                    		}
		$data = $data->where(['form_d_mdls.company' => $company, 'form_d_mdls.submitted' => 1, 'form_d_mdls.formType' => 'latest'])
		->get();
}

if (count($data)>0) 
	{
	$secntionDt = [];		
	foreach ($data as $row) {
		$secntionDt = DB::table('form_d_senction_mdls')->get();
	}



$Declaration = [];		
	foreach ($data as $row) {
		$Declaration = DB::table('form_d_declaration_table_mdls')->get();
	}	
}

}
//form d end


//form f start

if($form == 'form-f') 
{
	if($report_type=='all') {
	$data = DB::table('other_creditor_form_f_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'other_creditor_form_f_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'other_creditor_form_f_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'other_creditor_form_f_mdls.user_id')
		->select('other_creditor_form_f_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','other_creditor_form_f_mdls.fc_name as neme');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('other_creditor_form_f_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('other_creditor_form_f_mdls.irp', user_type()->sub_user);
                    		}
	$data	= $data->where(['other_creditor_form_f_mdls.company' => $company, 'other_creditor_form_f_mdls.submitted' => 1, 'other_creditor_form_f_mdls.formType' => 'latest'])
		->get();
}

elseif($report_type=='basic-details') 
{
	$data = DB::table('other_creditor_form_f_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'other_creditor_form_f_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'other_creditor_form_f_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'other_creditor_form_f_mdls.user_id')
		->select('other_creditor_form_f_mdls.*', 'user_mdls.mobile', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','other_creditor_form_f_mdls.fc_name as neme');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('other_creditor_form_f_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('other_creditor_form_f_mdls.irp', user_type()->sub_user);
                    		}
	$data	= $data->where(['other_creditor_form_f_mdls.company' => $company, 'other_creditor_form_f_mdls.submitted' => 1, 'other_creditor_form_f_mdls.formType' => 'latest'])
		->get();
}


elseif($report_type=='claim-details') {
	$data = DB::table('other_creditor_form_f_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'other_creditor_form_f_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'other_creditor_form_f_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'other_creditor_form_f_mdls.user_id')
		->select('other_creditor_form_f_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','other_creditor_form_f_mdls.fc_name as neme');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('other_creditor_form_f_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('other_creditor_form_f_mdls.irp', user_type()->sub_user);
                    		}
	$data	= $data->where(['other_creditor_form_f_mdls.company' => $company, 'other_creditor_form_f_mdls.submitted' => 1, 'other_creditor_form_f_mdls.formType' => 'latest'])
		->get();
}

elseif($report_type=='approved-details') {
	$data = DB::table('other_creditor_form_f_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'other_creditor_form_f_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'other_creditor_form_f_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'other_creditor_form_f_mdls.user_id')
		->leftjoin('form_f_approval_mdls', 'form_f_approval_mdls.form_f_id', '=', 'other_creditor_form_f_mdls.form_f_selected_id')
		->select('other_creditor_form_f_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','other_creditor_form_f_mdls.fc_name as neme','form_f_approval_mdls.reason as reasoon','form_f_approval_mdls.status as apprvl_sts');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('other_creditor_form_f_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('other_creditor_form_f_mdls.irp', user_type()->sub_user);
                    		}
	$data	= $data->where(['other_creditor_form_f_mdls.company' => $company, 'other_creditor_form_f_mdls.submitted' => 1, 'other_creditor_form_f_mdls.formType' => 'latest'])
		->get();

}

if (count($data)>0) 
{
	$secntionDt = [];		
	foreach ($data as $row) {
		$secntionDt = DB::table('form_f_senction_mdls')->get();
	}



$Declaration = [];		
	foreach ($data as $row) {
		$Declaration = DB::table('form_f_declaration_table_mdls')->get();
	}	
}

}
//form f end





//form ca start

if($form == 'form-ca'){
	if($report_type=='all') {
	$data = DB::table('financial_creditor_form_ca_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'financial_creditor_form_ca_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'financial_creditor_form_ca_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'financial_creditor_form_ca_mdls.user_id')
		->select('financial_creditor_form_ca_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','financial_creditor_form_ca_mdls.fc_name as neme');
		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->sub_user);
                    		}
	$data	= $data->where(['financial_creditor_form_ca_mdls.company' => $company, 'financial_creditor_form_ca_mdls.submitted' => 1, 'financial_creditor_form_ca_mdls.formType' => 'latest'])
		->get();
}
elseif($report_type=='basic-details')
{
	$data = DB::table('financial_creditor_form_ca_mdls')
	->leftjoin('company_dtls', 'company_dtls.id', '=', 'financial_creditor_form_ca_mdls.company')
	->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'financial_creditor_form_ca_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'financial_creditor_form_ca_mdls.user_id')
	->select('financial_creditor_form_ca_mdls.*', 'user_mdls.mobile','company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','financial_creditor_form_ca_mdls.fc_name as neme');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->sub_user);
                    		}
	$data = $data->where(['financial_creditor_form_ca_mdls.company' => $company, 'financial_creditor_form_ca_mdls.submitted' => 1, 'financial_creditor_form_ca_mdls.formType' => 'latest'])
	->get();

}
elseif($report_type=='claim-details')
{
	$data = DB::table('financial_creditor_form_ca_mdls')
	->leftjoin('company_dtls', 'company_dtls.id', '=', 'financial_creditor_form_ca_mdls.company')
	->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'financial_creditor_form_ca_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'financial_creditor_form_ca_mdls.user_id')
	->select('financial_creditor_form_ca_mdls.*', 'user_mdls.mobile','company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','financial_creditor_form_ca_mdls.fc_name as neme');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->sub_user);
                    		}
	$data = $data->where(['financial_creditor_form_ca_mdls.company' => $company, 'financial_creditor_form_ca_mdls.submitted' => 1, 'financial_creditor_form_ca_mdls.formType' => 'latest'])
	->get();
}

elseif($report_type=='approved-details')
{
		$data = DB::table('financial_creditor_form_ca_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'financial_creditor_form_ca_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'financial_creditor_form_ca_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'financial_creditor_form_ca_mdls.user_id')


	->leftjoin('form_c_a_aproval_mdls', 'form_c_a_aproval_mdls.form_ca_id', '=', 'financial_creditor_form_ca_mdls.form_ca_selected_id')


	->select('financial_creditor_form_ca_mdls.*', 'user_mdls.mobile','company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','financial_creditor_form_ca_mdls.fc_name as neme','form_c_a_aproval_mdls.approved_principle_amt','form_c_a_aproval_mdls.approved_interest_amt','form_c_a_aproval_mdls.approved_total_amount as total_approval_amt','form_c_a_aproval_mdls.reason as resoon');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->sub_user);
                    		}
	$data = $data->where(['financial_creditor_form_ca_mdls.company' => $company, 'financial_creditor_form_ca_mdls.submitted' => 1, 'financial_creditor_form_ca_mdls.formType' => 'latest'])
	->get();

}

//dd($data);die();

if (count($data)>0) 
{
	$secntionDt = [];		
foreach ($data as $row) {
	$secntionDt = DB::table('form_c_a_senction_mdls')->get();
}



$Declaration = [];		
foreach ($data as $row) {
	$Declaration = DB::table('form_c_a_declaration_table_mdls')->get();
}	
}

}







//form ca end


//form e start
if($form == 'form-e') 
{
	if($report_type=='all')
	{
	$data = DB::table('form_e_file_mdls')
	->leftjoin('company_dtls', 'company_dtls.id', '=', 'form_e_file_mdls.company')
	->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'form_e_file_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'form_e_file_mdls.user_id')
	->select('form_e_file_mdls.*', 'user_mdls.mobile','user_mdls.email as user_email','user_mdls.address as user_address','company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('form_e_file_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('form_e_file_mdls.irp', user_type()->sub_user);
                    		}
	$data = $data->where(['form_e_file_mdls.company' => $company, 'form_e_file_mdls.submitted' => 1, 'form_e_file_mdls.formType' => 'latest'])
	->get();

}
else if($report_type=='basic-details')
{
	$data = DB::table('form_e_file_mdls')
	->leftjoin('company_dtls', 'company_dtls.id', '=', 'form_e_file_mdls.company')
	->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'form_e_file_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'form_e_file_mdls.user_id')
	->select('form_e_file_mdls.*', 'user_mdls.mobile as user_mobile','user_mdls.email as user_email','user_mdls.address as user_address','company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('form_e_file_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('form_e_file_mdls.irp', user_type()->sub_user);
                    		}
	$data = $data->where(['form_e_file_mdls.company' => $company, 'form_e_file_mdls.submitted' => 1, 'form_e_file_mdls.formType' => 'latest'])
	->get();

	//dd($data);die();
}

else if($report_type=='claim-details')
{
	$data = DB::table('form_e_file_mdls')
	->leftjoin('company_dtls', 'company_dtls.id', '=', 'form_e_file_mdls.company')
	->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'form_e_file_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'form_e_file_mdls.user_id')
	->select('form_e_file_mdls.*', 'user_mdls.mobile as user_mobile','user_mdls.email as user_email','user_mdls.address as user_address','company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('form_e_file_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('form_e_file_mdls.irp', user_type()->sub_user);
                    		}
	$data = $data->where(['form_e_file_mdls.company' => $company, 'form_e_file_mdls.submitted' => 1, 'form_e_file_mdls.formType' => 'latest'])
	->get();

}
else if($report_type=='approved-details')
{
	$data = DB::table('form_e_file_mdls')
	->leftjoin('company_dtls', 'company_dtls.id', '=', 'form_e_file_mdls.company')
	->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'form_e_file_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'form_e_file_mdls.user_id')
	->leftjoin('form_e_approval_mdls', 'form_e_approval_mdls.form_e_id', '=', 'form_e_file_mdls.form_e_selected_id')


	->select('form_e_file_mdls.*', 'user_mdls.mobile as user_mobile','user_mdls.email as user_email','user_mdls.address as user_address','company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_e_approval_mdls.status as approval_status');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('form_e_file_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('form_e_file_mdls.irp', user_type()->sub_user);
                    		}
	$data = $data->where(['form_e_file_mdls.company' => $company, 'form_e_file_mdls.submitted' => 1, 'form_e_file_mdls.formType' => 'latest'])
	->get();
}
if (count($data)>0) 
{
	$secntionDt = [];		
foreach ($data as $row) {
	$secntionDt = DB::table('form_e_senction_mdls')->get();
}
$Declaration = [];		
foreach ($data as $row) {
	$Declaration = DB::table('form_e_declaration_table_mdls')->get();
}		
foreach ($data as $row) {
	$Employee_details = DB::table('form_e_employee_detail_mdls')->get();
}	
}

}




//form e end
		
 		// echo "<pre>";
		// print_r($data);
		// echo "</pre>";
		// die();
	//	dd($Employee_details);die();
		
		if (isset($data) && count($data) > 0) {
			return Excel::download(new form_my_report($data, $secntionDt, $Declaration , $form ,$report_type , $Employee_details), '-Report.xlsx');
		} else {
			return redirect()->back()->with("danger", "There is no record.");
		}
		

 		
 	}


	function formxanexureReport()
	{
	

		$company = DB::table('form_a_mdls as fmA')->where([['fmA.status','=',1],['fmA.deleted','=',2]])
          ->leftJoin('company_dtls as com', 'com.id','=', 'fmA.company_id');
            if (userType()->user_type==2)
            {
              $company = $company->where('fmA.user_id',userType()->id);
            }
    	$company =  $company->groupBy('fmA.company_id', 'com.name')
          ->orderBy('com.id', 'desc')
          ->pluck('com.name', 'fmA.company_id as id');

 	
 		$jsl =  bPath().'/'.Config::get('site.general');
		
 		//dd($company);die();

		return view('admin.reportAnexuregenerate', compact("company", "jsl"));
	}

	function generateAnexaformreport(Request $req)
	{
		$company = $req->company;
 		$form = $req->form;	


      $compp = DB::table('form_a_mdls as fmA')
					->leftJoin('company_dtls as cmp', 'cmp.id','=','fmA.company_id')
					->where('cmp.id','=',$company)
					->select('cmp.name as company_name', 'fmA.corporate_debtor_insolvency_date as start_date')
					->first();

if($form=='form-ca-secured')
{
	$data = DB::table('financial_creditor_form_ca_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'financial_creditor_form_ca_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'financial_creditor_form_ca_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'financial_creditor_form_ca_mdls.user_id')
	->leftjoin('form_c_a_aproval_mdls', 'form_c_a_aproval_mdls.form_ca_id', '=', 'financial_creditor_form_ca_mdls.form_ca_selected_id')
	->select('financial_creditor_form_ca_mdls.*', 'user_mdls.mobile','company_dtls.name as comp_name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','financial_creditor_form_ca_mdls.fc_name as neme','form_c_a_aproval_mdls.approved_principle_amt','form_c_a_aproval_mdls.approved_interest_amt','form_c_a_aproval_mdls.approved_total_amount','form_c_a_aproval_mdls.reason as resoon','form_c_a_aproval_mdls.total as claimed_ttl_amount','form_c_a_aproval_mdls.claim_nature','form_c_a_aproval_mdls.security_interest','form_c_a_aproval_mdls.guarantee_amt','form_c_a_aproval_mdls.related_party','form_c_a_aproval_mdls.voting_shares','form_c_a_aproval_mdls.contingent_amt','form_c_a_aproval_mdls.mutual_dues','form_c_a_aproval_mdls.rejected_total_amount','form_c_a_aproval_mdls.pending_total_amount','form_c_a_aproval_mdls.reason');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->sub_user);
                    		}
	$data = $data->where(['financial_creditor_form_ca_mdls.formType' => 'latest','form_c_a_aproval_mdls.claim_nature'=>1,'form_c_a_aproval_mdls.status'=>1,'form_c_a_aproval_mdls.company' => $company, 'financial_creditor_form_ca_mdls.submitted' => 1, 'form_c_a_aproval_mdls.formType'=>'latest'])
	->get();
	
	$secntionDt = [];		
	foreach ($data as $row) {
		$secntionDt = DB::table('form_c_a_senction_mdls')->get();
	}



$Declaration = [];		
	foreach ($data as $row) {
		$Declaration = DB::table('form_c_a_declaration_table_mdls')->get();
	}
	
	

	
	// echo "<pre>";
	// print_r($compp);
	// echo "</pre>";
	// echo die();
     
	if(count($data)>0)
	{
 return Excel::download(new form_anexa_my_report($form, $Declaration, $secntionDt, $data, $compp), '-Report.xlsx');
}
else
{
		return redirect()->back()->with("danger", "There is no record.");
}
}



if($form=='form-ca-unsecured')
{
	$data = DB::table('financial_creditor_form_ca_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'financial_creditor_form_ca_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'financial_creditor_form_ca_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'financial_creditor_form_ca_mdls.user_id')
	->leftjoin('form_c_a_aproval_mdls', 'form_c_a_aproval_mdls.form_ca_id', '=', 'financial_creditor_form_ca_mdls.form_ca_selected_id')
	->select('financial_creditor_form_ca_mdls.*', 'user_mdls.mobile','company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','financial_creditor_form_ca_mdls.fc_name as neme','form_c_a_aproval_mdls.approved_principle_amt','form_c_a_aproval_mdls.approved_interest_amt','form_c_a_aproval_mdls.approved_total_amount','form_c_a_aproval_mdls.reason as resoon','form_c_a_aproval_mdls.total as claimed_ttl_amount','form_c_a_aproval_mdls.claim_nature','form_c_a_aproval_mdls.security_interest','form_c_a_aproval_mdls.guarantee_amt','form_c_a_aproval_mdls.related_party','form_c_a_aproval_mdls.voting_shares','form_c_a_aproval_mdls.contingent_amt','form_c_a_aproval_mdls.mutual_dues','form_c_a_aproval_mdls.rejected_total_amount','form_c_a_aproval_mdls.pending_total_amount','form_c_a_aproval_mdls.reason');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('financial_creditor_form_ca_mdls.irp', user_type()->sub_user);
                    		}
	$data = $data->where(['financial_creditor_form_ca_mdls.formType' => 'latest','form_c_a_aproval_mdls.claim_nature'=>2,'form_c_a_aproval_mdls.status'=>1,'form_c_a_aproval_mdls.company' => $company, 'financial_creditor_form_ca_mdls.submitted' => 1, 'form_c_a_aproval_mdls.formType'=>'latest'])
	->get();
	
	$secntionDt = [];		
	foreach ($data as $row) {
		$secntionDt = DB::table('form_c_a_senction_mdls')->get();
	}



$Declaration = [];		
	foreach ($data as $row) {
		$Declaration = DB::table('form_c_a_declaration_table_mdls')->get();
	}	
	
	// echo "<pre>";
	// print_r($data);
	// echo "</pre>";
	// echo die();
     
	if(count($data)>0)
	{
 return Excel::download(new form_anexa_my_report($form, $Declaration, $secntionDt, $data ,$compp), '-Report.xlsx');
}
else
{
		return redirect()->back()->with("danger", "There is no record.");
}
}

if($form=='form-c-secured')
{
	$data = DB::table('finanicial_creditor_form_c_mdls')
	->leftjoin('company_dtls', 'company_dtls.id', '=', 'finanicial_creditor_form_c_mdls.company')
	->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'finanicial_creditor_form_c_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'finanicial_creditor_form_c_mdls.user_id')
	->leftjoin('form_c_aproval_mdls', 'form_c_aproval_mdls.form_c_id', '=', 'finanicial_creditor_form_c_mdls.form_c_selected_id', 'form_c_aproval_mdls.user_id', '=', 'finanicial_creditor_form_c_mdls.user_id')
	
	//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
	

	->select('finanicial_creditor_form_c_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_c_aproval_mdls.borrower_claim_amount as apprv_borrower_claim_amount','form_c_aproval_mdls.borrower_security_interest_amount as apprv_borrower_security_interest_amount','form_c_aproval_mdls.borrower_guarantee_amt as apprv_borrwer_gurantee_amount','form_c_aproval_mdls.guarantor_claim_amount as apprv_guaranter_claim_amount','form_c_aproval_mdls.guarantor_security_interest_amount as apprv_gurantor_security_interest_amount','form_c_aproval_mdls.guarantor_gaurantee_amt as apprv_guranter_gurantee_amount','form_c_aproval_mdls.guarantor_principal_borrower as apprv_guranter_principle_amunt','form_c_aproval_mdls.financial_claim_amt as financial_claimed_amount','form_c_aproval_mdls.claim_nature','form_c_aproval_mdls.approved_total_amount','form_c_aproval_mdls.rejected_total_amount','form_c_aproval_mdls.pending_total_amount','form_c_aproval_mdls.security_interest','form_c_aproval_mdls.guarantee_amt','form_c_aproval_mdls.related_party','form_c_aproval_mdls.voting_shares','form_c_aproval_mdls.contingent_amt','form_c_aproval_mdls.mutual_dues','form_c_aproval_mdls.reason');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->sub_user);
                    		}

	$data = $data->where(['finanicial_creditor_form_c_mdls.company' => $company, 'finanicial_creditor_form_c_mdls.submitted' => 1, 'finanicial_creditor_form_c_mdls.formType' => 'latest','form_c_aproval_mdls.formType'=>'latest','form_c_aproval_mdls.claim_nature'=>1,'form_c_aproval_mdls.status'=>1])
	->get();

$secntionDt = [];		
foreach ($data as $row) {
	$secntionDt = DB::table('form_c_senction_mdls')->get();
}



$Declaration = [];		
foreach ($data as $row) {
	$Declaration = DB::table('form_c_declaration_table_mdls')->get();
}	


	//echo "<pre>";
	//print_r($data);
	//echo "</pre>";
	//echo die();

if(count($data)>0)
	{
 return Excel::download(new form_anexa_my_report($form, $Declaration, $secntionDt, $data,$compp), '-Report.xlsx');
}
else
{
		return redirect()->back()->with("danger", "There is no record.");
}
}


if($form=='form-c-unsecured')
{
	$data = DB::table('finanicial_creditor_form_c_mdls')
	->leftjoin('company_dtls', 'company_dtls.id', '=', 'finanicial_creditor_form_c_mdls.company')
	->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'finanicial_creditor_form_c_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'finanicial_creditor_form_c_mdls.user_id')
	->leftjoin('form_c_aproval_mdls', 'form_c_aproval_mdls.form_c_id', '=', 'finanicial_creditor_form_c_mdls.form_c_selected_id', 'form_c_aproval_mdls.user_id', '=', 'finanicial_creditor_form_c_mdls.user_id')
	
	//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
	
	->select('finanicial_creditor_form_c_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_c_aproval_mdls.borrower_claim_amount as apprv_borrower_claim_amount','form_c_aproval_mdls.borrower_security_interest_amount as apprv_borrower_security_interest_amount','form_c_aproval_mdls.borrower_guarantee_amt as apprv_borrwer_gurantee_amount','form_c_aproval_mdls.guarantor_claim_amount as apprv_guaranter_claim_amount','form_c_aproval_mdls.guarantor_security_interest_amount as apprv_gurantor_security_interest_amount','form_c_aproval_mdls.guarantor_gaurantee_amt as apprv_guranter_gurantee_amount','form_c_aproval_mdls.guarantor_principal_borrower as apprv_guranter_principle_amunt','form_c_aproval_mdls.financial_claim_amt as financial_claimed_amount','form_c_aproval_mdls.claim_nature','form_c_aproval_mdls.approved_total_amount','form_c_aproval_mdls.rejected_total_amount','form_c_aproval_mdls.pending_total_amount','form_c_aproval_mdls.security_interest','form_c_aproval_mdls.guarantee_amt','form_c_aproval_mdls.related_party','form_c_aproval_mdls.voting_shares','form_c_aproval_mdls.contingent_amt','form_c_aproval_mdls.mutual_dues','form_c_aproval_mdls.reason');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('finanicial_creditor_form_c_mdls.irp', user_type()->sub_user);
                    		}

	$data = $data->where(['finanicial_creditor_form_c_mdls.company' => $company, 'finanicial_creditor_form_c_mdls.submitted' => 1, 'finanicial_creditor_form_c_mdls.formType' => 'latest','form_c_aproval_mdls.formType'=>'latest','form_c_aproval_mdls.claim_nature'=>2,'form_c_aproval_mdls.status'=>1])
	->get();

$secntionDt = [];		
foreach ($data as $row) {
	$secntionDt = DB::table('form_c_senction_mdls')->get();
}



$Declaration = [];		
foreach ($data as $row) {
	$Declaration = DB::table('form_c_declaration_table_mdls')->get();
}	


	//echo "<pre>";
	//print_r($data);
	//echo "</pre>";
	//echo die();

if(count($data)>0)
	{
 return Excel::download(new form_anexa_my_report($form, $Declaration, $secntionDt, $data ,$compp), '-Report.xlsx');
}
else
{
		return redirect()->back()->with("danger", "There is no record.");
}
}



//vishal code start


if($form=='form-b-government-dues')
{
	$data = DB::table('operational_creditor_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'operational_creditor_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'operational_creditor_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'operational_creditor_mdls.user_id')
		->leftjoin('form_b_approval_mdls', 'form_b_approval_mdls.form_b_id', '=', 'operational_creditor_mdls.form_b_selected_id', 'form_b_approval_mdls.user_id', '=', 'operational_creditor_mdls.user_id')
		
		
		->select('operational_creditor_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_b_approval_mdls.total as total_amount','form_b_approval_mdls.approved_total_amount as approved_total_amount','form_b_approval_mdls.rejected_principle_amt as rejected_principle_amount','form_b_approval_mdls.rejected_interest_amt as rejected_interest_amount','form_b_approval_mdls.claim_nature','form_b_approval_mdls.related_party','form_b_approval_mdls.voting_shares','form_b_approval_mdls.contingent_amt','form_b_approval_mdls.mutual_dues','form_b_approval_mdls.pending_total_amount','form_b_approval_mdls.rejected_total_amount','form_b_approval_mdls.reason','form_b_approval_mdls.dept','form_b_approval_mdls.govt');

		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->sub_user);
                    		}
		
	$data =	$data->where(['operational_creditor_mdls.company' => $company, 'operational_creditor_mdls.submitted' => 1, 'operational_creditor_mdls.formType' => 'latest','form_b_approval_mdls.formType'=>'latest','form_b_approval_mdls.claim_nature'=>'govern'])
		->get();

$secntionDt = [];		
	foreach ($data as $row) {
		$secntionDt = DB::table('form_b_senction_mdls')->get();
	}



$Declaration = [];		
	foreach ($data as $row) {
		$Declaration = DB::table('form_b_declaration_table_mdls')->get();
	}
	
	// echo "<pre>";
	// print_r($data);
	// echo "</pre>";
	// die();
if(count($data)>0)
	{
 return Excel::download(new form_anexa_my_report($form, $Declaration, $secntionDt, $data ,$compp), '-Report.xlsx');
}
else
{
		return redirect()->back()->with("danger", "There is no record.");
}

}



if($form=='form-b-other-than-government-dues')
{
	$data = DB::table('operational_creditor_mdls')
		->leftjoin('company_dtls', 'company_dtls.id', '=', 'operational_creditor_mdls.company')
		->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'operational_creditor_mdls.irp')
		->leftjoin('user_mdls', 'user_mdls.id', '=', 'operational_creditor_mdls.user_id')
		->leftjoin('form_b_approval_mdls', 'form_b_approval_mdls.form_b_id', '=', 'operational_creditor_mdls.form_b_selected_id', 'form_b_approval_mdls.user_id', '=', 'operational_creditor_mdls.user_id')
		//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
		
		->select('operational_creditor_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_b_approval_mdls.total as total_amount','form_b_approval_mdls.approved_total_amount as approved_total_amount','form_b_approval_mdls.rejected_principle_amt as rejected_principle_amount','form_b_approval_mdls.rejected_interest_amt as rejected_interest_amount','form_b_approval_mdls.claim_nature','form_b_approval_mdls.related_party','form_b_approval_mdls.voting_shares','form_b_approval_mdls.contingent_amt','form_b_approval_mdls.mutual_dues','form_b_approval_mdls.pending_total_amount','form_b_approval_mdls.rejected_total_amount','form_b_approval_mdls.reason','form_b_approval_mdls.security_interest','form_b_approval_mdls.guarantee_amt');

		if (userType()->user_type==2) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('operational_creditor_mdls.irp', user_type()->sub_user);
                    		}
		
		
		$data = $data->where(['operational_creditor_mdls.company' => $company, 'operational_creditor_mdls.submitted' => 1, 'operational_creditor_mdls.formType' => 'latest','form_b_approval_mdls.formType'=>'latest','form_b_approval_mdls.claim_nature'=>'other'])
		->get();

$secntionDt = [];		
	foreach ($data as $row) {
		$secntionDt = DB::table('form_b_senction_mdls')->get();
	}



$Declaration = [];		
	foreach ($data as $row) {
		$Declaration = DB::table('form_b_declaration_table_mdls')->get();
	}
	
	// echo "<pre>";
	// print_r($data);
	// echo "</pre>";
	// die();
if(count($data)>0)
	{
 return Excel::download(new form_anexa_my_report($form, $Declaration, $secntionDt, $data ,$compp), '-Report.xlsx');
}
else
{
		return redirect()->back()->with("danger", "There is no record.");
}
}
//vishal code end

//FORM F ANEXURE 9 only static start
if($form=='form-f-other-than-financial-creditor')
{

	$data = DB::table('other_creditor_form_f_mdls')
	->leftjoin('company_dtls', 'company_dtls.id', '=', 'other_creditor_form_f_mdls.company')
	->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'other_creditor_form_f_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'other_creditor_form_f_mdls.user_id')
	//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
	->leftjoin('form_f_approval_mdls', 'form_f_approval_mdls.form_f_id', '=', 'other_creditor_form_f_mdls.form_f_selected_id', 'form_f_approval_mdls.user_id', '=', 'other_creditor_form_f_mdls.user_id')
	->select('other_creditor_form_f_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','other_creditor_form_f_mdls.fc_name as neme','form_f_approval_mdls.approved_total_amount','form_f_approval_mdls.claim_nature','form_f_approval_mdls.security_interest','form_f_approval_mdls.guarantee_amt','form_f_approval_mdls.related_party','form_f_approval_mdls.contingent_amt','form_f_approval_mdls.mutual_dues','form_f_approval_mdls.rejected_total_amount','form_f_approval_mdls.pending_total_amount',
	'form_f_approval_mdls.reason');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('other_creditor_form_f_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('other_creditor_form_f_mdls.irp', user_type()->sub_user);
                    		}
	$data = $data->where(['other_creditor_form_f_mdls.company' => $company, 'other_creditor_form_f_mdls.submitted' => 1, 'other_creditor_form_f_mdls.formType' => 'latest','form_f_approval_mdls.formType'=>'latest'])
	->get();

$secntionDt = [];		
foreach ($data as $row) {
	$secntionDt = DB::table('form_f_senction_mdls')->get();
}



$Declaration = [];		
foreach ($data as $row) {
	$Declaration = DB::table('form_f_declaration_table_mdls')->get();
}

// echo "<pre>";
// print_r($compp);
// echo "</pre>";
// die();
//return Excel::download(new form_anexa_my_report($form, $Declaration, $secntionDt, $data ,$compp), '-Report.xlsx');
if(count($data)>0)
{
return Excel::download(new form_anexa_my_report($form, $Declaration, $secntionDt, $data ,$compp), '-Report.xlsx');
}
else
{
	return redirect()->back()->with("danger", "There is no record.");
}	
}

//form f anexre 9 only static end

//form d Anexure 5  only static start

if($form=='form-d-workmen')
{

	
	$data1 = DB::table('form_d_mdls as fm')
	//->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'fm.irp')
	// ->leftjoin('user_mdls', 'user_mdls.id', '=', 'fm.user_id')
	->leftjoin('form_d_aproval_mdls as apr', 'apr.form_d_id', '=', 'fm.form_d_selected_id', 'apr.user_id', '=', 'fm.user_id')
	
	->select('fm.name_in_block_letter as neme', 'apr.total as total_amount', 'apr.approved_total_amount as approved_total_amount','apr.security_interest as security_interest','apr.guarantee_amt as guarantee_amt','apr.related_party as related_party', 'apr.voting_shares as voting_shares','apr.contingent_amt as contingent_amt','apr.mutual_dues as mutual_dues','apr.pending_total_amount as pending_total_amount','apr.rejected_total_amount as rejected_total_amount','apr.reason as reason', 'fm.date as date');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fm.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fm.irp', user_type()->sub_user);
                    		}
	
	$data = $data->where(['fm.company' => $company, 'fm.submitted' => 1, 'fm.formType' => 'latest','apr.formType' => 'latest','apr.claim_nature'=>'workmen'])
	->get();


	$data2 = DB::table('form_e_file_mdls as fm')
			->leftjoin('form_e_employee_detail_mdls as emp', 'emp.form_e_id', '=', 'fm.id')
		//->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'fm.irp')
	 ->leftjoin('user_mdls', 'user_mdls.id', '=', 'fm.user_id')
	->leftjoin('form_e_approval_mdls as apr', 'apr.form_e_id', '=', 'fm.form_e_selected_id', 'apr.user_id', '=', 'fm.user_id')
	
	->select('user_mdls.name as neme', 'apr.claim_amt as total_amount', 'apr.approved_total_amount as approved_total_amount','apr.security_interest as security_interest','apr.guarantee_amt as guarantee_amt','apr.related_party as related_party', 'apr.voting_shares as voting_shares','apr.contingent_amt as contingent_amt','apr.mutual_dues as mutual_dues','apr.pending_total_amount as pending_total_amount','apr.rejected_total_amount as rejected_total_amount','apr.reason as reason', 'fm.date as date');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('fm.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('fm.irp', user_type()->sub_user);
                    		}
	
	$data2  =$data->where(['fm.company' => $company, 'fm.submitted' => 1, 'fm.formType' => 'latest','apr.formType' => 'latest','emp.emp_type'=>'workman'])
	->get();


	if (count($data2)>0) 
	{
		$data = array_merge($data1, $data2);
	}
	else
	{
		$data = $data1;
	}



$secntionDt = [];		
foreach ($data as $row) {
	$secntionDt = DB::table('form_d_senction_mdls')->get();
}



$Declaration = [];		
foreach ($data as $row) {
	$Declaration = DB::table('form_d_declaration_table_mdls')->get();
}


// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();
if(count($data)>0)
{
return Excel::download(new form_anexa_my_report($form, $Declaration, $secntionDt, $data ,$compp), '-Report.xlsx');
}
else
{
	return redirect()->back()->with("danger", "There is no record.");
}	
}


//form d Anexure 5  only static end


//form d Anexure 6  only static start

if($form=='form-d-employee')
{

	
	$data = DB::table('form_d_mdls')
	->leftjoin('company_dtls', 'company_dtls.id', '=', 'form_d_mdls.company')
	->leftjoin('general_info_mdls', 'general_info_mdls.id', '=', 'form_d_mdls.irp')
	->leftjoin('user_mdls', 'user_mdls.id', '=', 'form_d_mdls.user_id')
	//->leftjoin('form_b_declaration_table_mdls', 'form_b_declaration_table_mdls.form_b_id', '=', 'operational_creditor_mdls.id')
	->leftjoin('form_d_aproval_mdls', 'form_d_aproval_mdls.form_d_id', '=', 'form_d_mdls.form_d_selected_id', 'form_d_aproval_mdls.user_id', '=', 'form_d_mdls.user_id')
	->select('form_d_mdls.*', 'company_dtls.name', 'general_info_mdls.first_name', 'user_mdls.name as user_name','form_d_mdls.name as neme','form_d_aproval_mdls.approved_principle_amt','form_d_aproval_mdls.approved_interest_amt as approved_interest_amount','form_d_aproval_mdls.approved_total_amount','form_d_aproval_mdls.claim_nature','form_d_aproval_mdls.security_interest','form_d_aproval_mdls.guarantee_amt','form_d_aproval_mdls.related_party',
	'form_d_aproval_mdls.voting_shares','form_d_aproval_mdls.contingent_amt','form_d_aproval_mdls.mutual_dues','form_d_aproval_mdls.pending_total_amount','form_d_aproval_mdls.rejected_total_amount','form_d_aproval_mdls.reason');
	if (userType()->user_type==2) 
                    		{
                    $data = $data->where('form_d_mdls.irp', user_type()->id);			
                    		}
                    		elseif (userType()->user_type==4) 
                    		{
                    $data = $data->where('form_d_mdls.irp', user_type()->sub_user);
                    		}
	$data = $data->where(['form_d_mdls.company' => $company, 'form_d_mdls.submitted' => 1, 'form_d_mdls.formType' => 'latest','form_d_aproval_mdls.formType' => 'latest','form_d_aproval_mdls.claim_nature'=>'employee'])
	->get();

$secntionDt = [];		
foreach ($data as $row) {
	$secntionDt = DB::table('form_d_senction_mdls')->get();
}



$Declaration = [];		
foreach ($data as $row) {
	$Declaration = DB::table('form_d_declaration_table_mdls')->get();
}


// echo "<pre>";
// print_r($data);
// echo "</pre>";
// die();
if(count($data)>0)
{
return Excel::download(new form_anexa_my_report($form, $Declaration, $secntionDt, $data ,$compp), '-Report.xlsx');
}
else
{
	return redirect()->back()->with("danger", "There is no record.");
}	
}


//form d Anexure 6  only static end




		
		// if (isset($data) && count($data) > 0) {
		// 	return Excel::download(new form_anexa_my_report($form), '-Report.xlsx');
		// } else {
		// 	return redirect()->back()->with("danger", "There is no record.");
		// }	

	}



	public function formAllformfilter(Request $req){
    
            $jsl =  bPath().'/'.Config::get('site.general');
            $a_vl =  Config::get('site.adminGeneral');
        
        

        $usrs = DB::table('operational_creditor_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]); 
                    
                 $usrs = $usrs->where('fmB.irp', Session::get('admin_id'));
                 
              
                  
          $usrs = $usrs->select('fmB.claimant_name','fmB.id','fmB.company as company_id','fmB.irp as ip_id','fmB.ar','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','usr.name','usr.email','usr.mobile','usr.unique_id','comp.name as company', 'ip.first_name as ip')
                    ->orderBy('id','desc')
                    ->get();
                    

            // form C
            
              $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

        $usrs_c = DB::table('finanicial_creditor_form_c_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')

                    ->leftJoin('company_dtls as comp', 'comp.id','=','fmB.company')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'fmB.irp')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]); 
                
            $usrs_c = $usrs_c->where('fmB.irp', Session::get('admin_id'));
            
                  
                    
        $usrs_c = $usrs_c->select('fmB.id','fmB.formA', 'fmB.signing_person_name','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','fmB.fc_name','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'ip.first_name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();
                    
                    
                    
                    //form D
                    
                    
        $usrs_d = DB::table('form_d_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]); 
                  
                        $usrs_d = $usrs_d->where('fmB.irp', Session::get('admin_id'));
                  
                  
             $usrs_d = $usrs_d->select('fmB.id','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','fmB.name','fmB.operational_creditor_signature','usr.email','usr.mobile','usr.unique_id','fmB.ar','comp.name as company', 'ip.first_name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();



// from ca

 $usrs_ca = DB::table('financial_creditor_form_ca_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]);
                   $usrs_ca = $usrs_ca->where('fmB.irp', Session::get('admin_id'));
                  
                  $usrs_ca = $usrs_ca->select('fmB.id','fmB.user_id','fmB.form_type','fmB.created_at','fmB.signing_person_name','fmB.updated_at','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'ip.first_name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();
  
  
  // from e
  
   $usrs_e= DB::table('form_e_file_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','fmB.company')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]);
                 $usrs_e = $usrs_e->where('fmB.irp', Session::get('admin_id'));
                  
          $usrs_e = $usrs_e->select('fmB.id','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'ip.first_name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();
                     
                     
              $usrs_f = DB::table('other_creditor_form_f_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','fmB.company')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]);
                   $usrs_f = $usrs_f->where('fmB.irp', Session::get('admin_id'));
                  
                 $usrs_f = $usrs_f->select('fmB.id','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','fmB.signing_person_name','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'ip.first_name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();

    return view('admin.formAllformfilter',compact("usrs","jsl","a_vl","usrs_c","usrs_d","usrs_ca","usrs_e","usrs_f"));
}




}
