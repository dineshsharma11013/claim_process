<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\userMdl;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Session;
use DB;

class UserExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
    	$check =  DB::table('general_info_mdls')->where([['id','=',Session::get('admin_id')],['status','=',1]])->select('user_type')->first();

    	if ($check->user_type==1) 
    	{
    		return view('admin.excel.exportUsers',[
            'users' => userMdl::all()
        ]);
    		}
    		else{
    			return view('admin.excel.exportUsers',[
		            'users' => userMdl::all()->where('admin_id', Session::get('admin_id'))
		        ]);
    		}	
        
    }
}
