<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;

class ExcelImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
      // dd($collection);die();  
     // dd(count($collection));die();
        foreach ($collection as $key => $value) {
            if ($key>0) 
            {
                $str = '0123456789abcdefghijklmnopqrstuvwxyz';
            if($value->filter()->isNotEmpty())
            {   
                $pwd = $value[5] ?? substr(str_shuffle($str), 5,6);
                $check = DB::table('user_mdls')->where('unique_id', $value[4])->get();
                if (count($check)==0) 
                {
                    $data = [
                        'admin_id' => Session::get('admin_id'), 
                        'name' => $value[0] ?? "", 
                        'email' => $value[2] ?? "", 
                        'mobile' => $value[1] ?? "", 
                        'alt_mobile'=>'',

                        'address' => $value[3] ?? "",
                        'city'=>'',
                        'state'=>'',
                        'correspondance_address'=>'',
                        'pincode'=>'',

                        'unique_id' => $value[4] ?? substr(str_shuffle($str), 7,8), 
                        'password' => $pwd,
                        'pwd' => Hash::make($pwd) ?? "",

                        'creditor_type' => "",
                        'img'=>'',
                        'auth_type'=>'',
                        'rem_addr'=>'',
                        'date'=>date('Y-m-d H:i:s'),
                        'status'=> 1,
                        'auth_id'=>'',
                        'auth_check'=>1,
                        'forgot_link'=>'',

                        "created_at" => date('Y-m-d H:i:s'), 
                        "updated_at" => date('Y-m-d H:i:s'), 
                        'deleted' => 2, 
                        'deleted_by' => '', 
                        'deleted_time'=>''

                    ];

                    DB::table("user_mdls")->insert($data);
                }
                
            }}
        }
    }
}
