<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class formCAExport implements FromView
{
   
    public $data;
    public $type;

    public function __construct($type, $data)
    {
        $this->type = $type;
        $this->data = $data;
    }

    public function view(): View
    {
        $type = $this->type;
        $data = $this->data;

        if ($type=='Form-CA') {
            return view('admin.excel.exportCAClaimant',compact("data"));
        }
    }
}
