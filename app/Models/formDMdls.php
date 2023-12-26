<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Config;
use Session;

class formDMdls extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getData()
    {
        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();
        
    	$data = DB::table('user_mdls')
    			->join('form_d_mdls as fmB', 'fmB.user_id','=','user_mdls.id')
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
                  

    		 $data = $data->select('user_mdls.id','user_mdls.name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','fmB.id','fmB.user_id','fmB.form_type','fmB.ar','fmB.submitted','fmB.name','fmB.email','fmB.form_d_selected_id','fmB.created_at','comp.name as company', 'ip.username as ip')
    			->orderByDesc('fmB.id')
    			->get();

    	return $data;				
    }

    public static function getRData()
    {
    	$data = DB::table('user_mdls')
    			->join('form_d_mdls', 'form_d_mdls.user_id','=','user_mdls.id')
    			->where('form_d_mdls.submitted','=',1)
    			->select('user_mdls.id','user_mdls.name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','form_d_mdls.id','form_d_mdls.user_id','form_d_mdls.form_type','form_d_mdls.ar','form_d_mdls.submitted','form_d_mdls.name','form_d_mdls.email','form_d_mdls.date','form_d_mdls.updated_date')
    			->orderByDesc('form_d_mdls.id')
    			->get();

    	return $data;				
    }

    public static function getUserRData($id)
    {
        $fid = base64_decode($id);
        
        $user = DB::table('form_d_mdls')
                    //->leftJoin('form_b_files_mdls', 'form_b_files_mdls.unique_id','=', 'operational_creditor_mdls.unique_id');
                      ->leftJoin('form_d_files_mdls', 'form_d_files_mdls.form_d_id','=', 'form_d_mdls.id');  
        $user = $user->where([['form_d_mdls.id','=',$fid]])->first(); 
            
       
        return $user; 

    }

    public static function fileB($id)
    {
        //return $this->hasMany('App\Models\formDOtherDocumentMdl','unique_id','unique_id');
        $res = DB::table('form_d_other_document_mdls')->where('form_d_id',$id)->get();
        return $res;
    }
}
