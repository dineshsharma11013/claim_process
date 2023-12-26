<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class form_my_report implements FromView
{
	public $data;
    public $secntionDt;
    public $Declaration;
    public $form;
    public $report_type;
   public $Employee_details;

    public function __construct($data, $secntionDt, $Declaration, $form,$report_type,$Employee_details)
    {
        $this->data = $data;
        $this->secntionDt = $secntionDt;
        $this->Declaration = $Declaration;

        $this->form = $form;
        $this->report_type = $report_type;
        $this->Employee_details = $Employee_details;
        }

    public function view(): View
    {
       $output = $this->data;
      $sections = $this->secntionDt;
      $Dseclaration = $this->Declaration;
      $employeeDetails = $this->Employee_details;

      $form = $this->form;
      $report_type = $this->report_type;

      if($form=="form-b" && $report_type=="all")
     {
          return view('admin.excel.form-b_my',compact("output","sections","Dseclaration"));  
     } 
     else if($form=="form-b" && $report_type=="basic-details")
     {
        return view('admin.excel.form_b_claiment_details',compact("output","sections","Dseclaration"));  
     }
     else if($form=="form-b" && $report_type=="claim-details")
     {
        return view('admin.excel.form_b_claim_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-b" && $report_type=="approved-details")
     {
        return view('admin.excel.form_b_claim_approved_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-c" && $report_type=="all")
     {
        return view('admin.excel.form_c_claim_all_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-c" && $report_type=="basic-details")
     {
        return view('admin.excel.form_c_basic_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-c" && $report_type=="claim-details")
     {
        return view('admin.excel.form_c_claim_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-c" && $report_type=="approved-details")
     {
        return view('admin.excel.form_c_approved_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-d" && $report_type=="all")
     {
        return view('admin.excel.form_d_all_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-d" && $report_type=="basic-details")
     {
        return view('admin.excel.form_d_basic_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-d" && $report_type=="claim-details")
     {
        return view('admin.excel.form_d_claim_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-d" && $report_type=="approved-details")
     {
        return view('admin.excel.form_d_approved_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-f" && $report_type=="all")
     {
        return view('admin.excel.form_f_all_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-f" && $report_type=="basic-details")
     {
        return view('admin.excel.form_f_basic_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-f" && $report_type=="claim-details")
     {
        return view('admin.excel.form_f_claim_details',compact("output","sections","Dseclaration"));
     }
     else if($form=="form-f" && $report_type=="approved-details")
     {
        return view('admin.excel.form_f_approved_details',compact("output","sections","Dseclaration"));
     }
      else if($form == 'form-ca' and $report_type=='all')
      {
         return view('admin.excel.form_ca_all_details',compact("output","sections","Dseclaration"));

     }
     else if($form == 'form-ca' and $report_type=='basic-details')
      {
         return view('admin.excel.form_ca_basic_details',compact("output","sections","Dseclaration"));
      }
      else if($form == 'form-ca' and $report_type=='claim-details')
      {
         return view('admin.excel.form_ca_claim_details',compact("output","sections","Dseclaration"));
      }
      else if($form == 'form-ca' and $report_type=='approved-details')
      {
         return view('admin.excel.form_ca_apprved_details',compact("output","sections","Dseclaration"));
      }
      else if($form == 'form-e' and $report_type=='all')
      {
         return view('admin.excel.form_e_all_details',compact("output","sections","Dseclaration","employeeDetails"));
      }
      else if($form == 'form-e' and $report_type=='basic-details')
      {
         return view('admin.excel.form_e_basic_details',compact("output","sections","Dseclaration","employeeDetails"));
      }

      else if($form == 'form-e' and $report_type=='claim-details')
      {
      return view('admin.excel.form_e_claim_details',compact("output","sections","Dseclaration","employeeDetails"));
      }
      else if($form == 'form-e' and $report_type=='approved-details')
      {
      return view('admin.excel.form_e_apprved_details',compact("output","sections","Dseclaration","employeeDetails"));
      }


    }  

}
