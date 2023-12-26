<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\companyDtl;
use Config;
use DB;

class reportGenerateCntrl extends Controller
{
    function formxsReport()
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
        //dd(userType()->id);die();
        return view('admin.reportgenerate', compact("company", "jsl"));
    }   


    function generateReport(Request $req)
    {
    
        $company = $req->company;
        $form = $req->form;
        $report_type = $req->report_type;

       if ($form=='form-b') 
      {
              if ($report_type=='basic') {
                  $data = DB::table('operational_creditor_mdls as fb')
                             ->select('fb.operational_creditor_email as cl_email', 'fb.claimant_name as cl_name')
                             ->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
                             ->get();
              }
              elseif ($report_type=='claimed') 
              {
                  $data = DB::table('operational_creditor_mdls as fb')
                             ->select('fb.operational_creditor_email as cl_email', 'fb.claimant_name as cl_name', 'fb.principle_amount as base_amt', 'fb.interest as int_amt', 'fb.total_amount as total_amount')
                             ->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
                             ->get();	
              }
              elseif ($report_type=='covered') 
              {
                  $data = DB::table('form_b_approval_mdls as fb')
                              ->join('operational_creditor_mdls as fm', 'fm.form_b_selected_id','=','fb.form_b_id')
                              ->select('fm.claimant_name as name', 'fb.*')
                             ->where([['fb.company','=',$company],['fb.formType','=','latest'],['fm.formType','=','latest']])
                             ->get();	
              }
         
              
      }
      elseif ($form=='form-c') 
      {
            if ($report_type=='basic') {
                  $data = DB::table('finanicial_creditor_form_c_mdls as fb')
                             ->select('fb.fc_email as cl_email', 'fb.signing_person_name as cl_name')
                             ->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
                             ->get();
              }
              elseif ($report_type=='claimed') 
              {
                  $data = DB::table('finanicial_creditor_form_c_mdls as fb')
                             ->select('fb.fc_email as cl_email', 'fb.signing_person_name as cl_name', 'fb.borrower_claim_amount as amt1', 'fb.guarantor_security_interest_amount as amt2', 'fb.financial_claim_amt as amt3')
                             ->where([['fb.company','=',$company],['fb.submitted','=', 1],['fb.deleted','=', 2],['formType','=','latest']])
                             ->get();	
              }
              elseif ($report_type=='covered') 
              {
                  $data = DB::table('form_c_aproval_mdls as fb')
                              ->join('finanicial_creditor_form_c_mdls as fm', 'fm.form_c_selected_id','=','fb.form_c_id')
                              ->select('fm.signing_person_name as name', 'fb.*')
                             ->where([['fb.company','=',$company],['fb.formType','=','latest'],['fm.formType','=','latest']])
                             ->get();	
              }
      }
      elseif ($form=='form-d') 
      {
        
      }
      elseif ($form=='form-e') 
      {
        
      }
      elseif ($form=='form-f') 
      {
        
      }elseif ($form=='form-ca') 
      {
        
      }



  //    dd($data);die();

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
