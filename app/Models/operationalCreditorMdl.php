<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Config;
use Session;

class operationalCreditorMdl extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getData()
    {

        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();


    	$data = DB::table('user_mdls')
    			->join('operational_creditor_mdls as fmB', 'fmB.user_id','=','user_mdls.id')
                ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
    			->where('fmB.submitted','=',2);
    			
                if (userType()->user_type==2) 
                    {
                            $data = $data->where('fmB.irp', Session::get('admin_id'));
                    }
                      elseif (userType()->user_type==4) 
                      {
                            $data = $data->where('fmB.irp', userType()->sub_user); 
                      }
                  

            $data = $data->select('user_mdls.id','user_mdls.name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','fmB.id','fmB.user_id', 'fmB.form_b_selected_id','fmB.form_type','fmB.ar','fmB.submitted','fmB.operational_creditor_name','fmB.operational_creditor_email','fmB.created_at','comp.name as company', 'ip.username as ip')
    			->orderByDesc('fmB.id')
    			->get();

    	return $data;				
    }

    public static function getRData()
    {
    	$data = DB::table('user_mdls')
    			->join('operational_creditor_mdls', 'operational_creditor_mdls.user_id','=','user_mdls.id')
    			->where('operational_creditor_mdls.submitted','=',1)
    			->select('user_mdls.id','user_mdls.name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','operational_creditor_mdls.id','operational_creditor_mdls.user_id','operational_creditor_mdls.form_type','operational_creditor_mdls.ar','operational_creditor_mdls.submitted','operational_creditor_mdls.operational_creditor_name','operational_creditor_mdls.operational_creditor_email','operational_creditor_mdls.date','operational_creditor_mdls.updated_date')
    			->orderByDesc('operational_creditor_mdls.id')
    			->get();

    	return $data;				
    }

    public static function getUserRData($id)
    {
        $fid = base64_decode($id);
        
        $user = DB::table('operational_creditor_mdls')
                    //->leftJoin('form_b_files_mdls', 'form_b_files_mdls.unique_id','=', 'operational_creditor_mdls.unique_id');
                      ->leftJoin('form_b_files_mdls', 'form_b_files_mdls.form_b_id','=', 'operational_creditor_mdls.id');  
        $user = $user->where([['operational_creditor_mdls.id','=',$fid]])->first(); 
            
       
        return $user; 

    }

    public static function fileB($id)
    {
        $res = DB::table('form_b_other_documents_mdls')->where('form_b_id',$id)->get();
        return $res;
    }

    

      public static function formBRegisterUsers()
    {
        $data = DB::table('operational_creditor_mdls')
                ->select('operational_creditor_mdls.user_id')
                ->where('submitted',1)
                ->groupBy('operational_creditor_mdls.user_id')
                ->orderByDesc('operational_creditor_mdls.id')
                
                ->get();
        
        return $data;
    }


}


