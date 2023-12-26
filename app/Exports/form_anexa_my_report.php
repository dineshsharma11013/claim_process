<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class form_anexa_my_report implements FromView
{
    public $form;
    public $section;
    public $declaration;
    public $data;
    public $compp;

    public function __construct($form, $decl, $sec, $data, $compp)
    {
        $this->form = $form;
        $this->declaration = $decl;
        $this->section = $sec;
        $this->data = $data;
        $this->compp = $compp;
    }

    public function view(): View
    {

      $forM = $this->form;
      $sect = $this->section;
      $dec = $this->declaration;
      $output = $this->data;
      $comp = $this->compp;

      if($forM=='form-ca-secured')
      {
      return view('admin.excel.form_ca_anexa_my',compact("output","forM","sect","dec", "comp"));  
      } 
      if($forM=='form-ca-unsecured')
      {
      return view('admin.excel.form_ca_anexa_unsecured_my',compact("output","forM","sect","dec","comp"));  
      }
    if($forM=='form-c-secured')
      {
      return view('admin.excel.form_c_anexa_secured_my',compact("output","forM","sect","dec","comp"));  
      }
      if($forM=='form-c-unsecured')
      {
      return view('admin.excel.form_c_anexa_unsecured_my',compact("output","forM","sect","dec" ,"comp"));  
      }
     
      if($forM=='form-b-government-dues')
      {
      return view('admin.excel.form_b_anexa_government_dues_my',compact("output","forM","sect","dec" ,"comp"));  
      }
     if($forM=='form-b-other-than-government-dues')
      {
      return view('admin.excel.form_b_anexa_other_government_dues_my',compact("output","forM","sect","dec" ,"comp"));  
      }
      if($forM=='form-f-other-than-financial-creditor')
      {

        return view('admin.excel.form_f_anexa_my',compact("output","forM","sect","dec" ,"comp"));  

      }

      if($forM=='form-d-workmen')
      {
      return view('admin.excel.form_d_anexa_workmen_my',compact("output","forM","sect","dec" ,"comp"));  
      }

      if($forM=='form-d-employee')
      {
      return view('admin.excel.form_d_anexa_employee_my',compact("output","forM","sect","dec" ,"comp"));  
      }

    }  

}
