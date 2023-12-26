<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use DB;

class formReport implements FromView
{
    
	public $data;
  public $report_type;
  public $form;

    public function __construct($data, $report_type, $form)
    {
        $this->data = $data;
        $this->report_type = $report_type;
        $this->form = $form;
    }

    public function view(): View
    {
       $output = $this->data;
       $type = $this->report_type;
       $fm_type = $this->form;

       $fl_name = $fm_type.'_'.$type;

      if ($fm_type=='form-b' && $type=='basic') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-b' && $type=='claimed') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-b' && $type=='covered') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }

       
       elseif ($fm_type=='form-c' && $type=='basic') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-c' && $type=='claimed') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-c' && $type=='covered') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }


       elseif ($fm_type=='form-d' && $type=='basic') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-d' && $type=='claimed') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-d' && $type=='covered') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }


       elseif ($fm_type=='form-e' && $type=='basic') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-e' && $type=='claimed') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-e' && $type=='covered') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }


       elseif ($fm_type=='form-f' && $type=='basic') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-f' && $type=='claimed') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-f' && $type=='covered') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }



       elseif ($fm_type=='form-ca' && $type=='basic') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-ca' && $type=='claimed') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }
       elseif ($fm_type=='form-ca' && $type=='covered') 
       {
          return view('admin.excel.'.$fl_name, compact("output"));  
       }


    }  


}
