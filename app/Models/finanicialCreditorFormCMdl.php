<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Config;
use Session;

class finanicialCreditorFormCMdl extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getData()
    {
        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

    	$data = DB::table('user_mdls')
    			->join('finanicial_creditor_form_c_mdls as fmB', 'fmB.user_id','=','user_mdls.id')
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
                  

    			$data = $data->select('user_mdls.id','user_mdls.name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','fmB.id','fmB.user_id','fmB.form_c_selected_id','fmB.form_type','fmB.ar','fmB.submitted','fmB.fc_name','fmB.fc_email','fmB.created_at','comp.name as company', 'ip.username as ip')
    			->orderByDesc('fmB.id')
    			->get();

    	return $data;				
    }

    public static function getRData()
    {
    	$data = DB::table('user_mdls')
    			->join('finanicial_creditor_form_c_mdls', 'finanicial_creditor_form_c_mdls.user_id','=','user_mdls.id')
    			->where('finanicial_creditor_form_c_mdls.submitted','=',1)
    			->select('user_mdls.id','user_mdls.name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','finanicial_creditor_form_c_mdls.id','finanicial_creditor_form_c_mdls.user_id','finanicial_creditor_form_c_mdls.form_type','finanicial_creditor_form_c_mdls.ar','finanicial_creditor_form_c_mdls.submitted','finanicial_creditor_form_c_mdls.fc_name','finanicial_creditor_form_c_mdls.fc_email','finanicial_creditor_form_c_mdls.date','finanicial_creditor_form_c_mdls.updated_date')
    			->orderByDesc('finanicial_creditor_form_c_mdls.id')
    			->get();

    	return $data;				
    }

    public static function getUserRData($id)
    {
        $fid = base64_decode($id);
        
        $user = DB::table('finanicial_creditor_form_c_mdls')
                    //->leftJoin('form_c_files_mdls', 'form_c_files_mdls.unique_id','=', 'finanicial_creditor_form_c_mdls.unique_id');
                ->leftJoin('form_c_files_mdls', 'form_c_files_mdls.form_c_id','=', 'finanicial_creditor_form_c_mdls.id'); 
        $user = $user->where([['finanicial_creditor_form_c_mdls.id','=',$fid]])->first(); 
             
            
        return $user; 

    }

   public static function fileB($id)
    {
       // return $this->hasMany('App\Models\formCOtherDocumentMdl','unique_id','unique_id');
    
        $res = DB::table('form_c_other_document_mdls')->where('form_c_id',$id)->get();
        return $res;
    }
}
