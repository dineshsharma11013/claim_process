<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class formEFileMdl extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getData()
    {
        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

    	$data = DB::table('user_mdls')
    			->join('form_e_file_mdls as fmB', 'fmB.user_id','=','user_mdls.id')
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
                  

    		$data = $data->select('user_mdls.id','user_mdls.name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','fmB.id', 'fmB.form_e_selected_id','fmB.user_id','fmB.form_type','fmB.ar','fmB.submitted','fmB.created_at','comp.name as company', 'ip.username as ip')
    			->orderByDesc('fmB.id')
    			->get();

    	return $data;				
    }

    public static function getRData()
    {
    	$data = DB::table('user_mdls')
    			->join('form_e_file_mdls', 'form_e_file_mdls.user_id','=','user_mdls.id')
    			->where('form_e_file_mdls.submitted','=',1)
    			->select('user_mdls.id','user_mdls.name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','form_e_file_mdls.id','form_e_file_mdls.user_id','form_e_file_mdls.form_type','form_e_file_mdls.ar','form_e_file_mdls.submitted','form_e_file_mdls.date','form_e_file_mdls.updated_date')
    			->orderByDesc('form_e_file_mdls.id')
    			->get();

    	return $data;				
    }

    public static function getUser($id)
    {
        $fid = base64_decode($id);
        
        $user = DB::table('form_e_file_mdls')
                    ->join('user_mdls', 'user_mdls.id','=', 'form_e_file_mdls.user_id')
                    ->select('user_mdls.name','user_mdls.email','user_mdls.address','user_mdls.mobile','form_e_file_mdls.*');
        $user = $user->where([['form_e_file_mdls.id','=',$fid]])->first(); 
        
        
        return $user; 

    }


    function getUserRData()
    {   
        //return $this->hasMany('App\Models\formEEmployeeDetailMdl','unique_id','unique_id');
        return $this->hasMany('App\Models\formEEmployeeDetailMdl','unique_id','unique_id');
    }   

    public static function empDetail($id)
    {
        $res = DB::table('form_e_employee_detail_mdls')->where('form_e_id',$id)->get();
        return $res;
    }

    public static function fileB($id)
    {
        //return $this->hasMany('App\Models\formEOtherDocumentMdl','unique_id','unique_id');
        $res = DB::table('form_e_other_document_mdls')->where('form_e_id',$id)->get();
        return $res;
    }

}
