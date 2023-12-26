<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Config;
use Session;

class otherCreditorFormFMdl extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getData()
    {
        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

    	$data = DB::table('user_mdls')
    			->join('other_creditor_form_f_mdls as fmB', 'fmB.user_id','=','user_mdls.id')
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
                  

    		$data = $data->select('user_mdls.id','user_mdls.name','fmB.signing_person_name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','fmB.id','fmB.user_id','fmB.form_f_selected_id','fmB.form_type','fmB.ar','fmB.submitted','fmB.fc_name','fmB.fc_email','fmB.created_at','comp.name as company', 'ip.username as ip')
    			->orderByDesc('fmB.id')
    			->get();

    	return $data;				
    }

    public static function getRData()
    {
    	$data = DB::table('user_mdls')
    			->join('other_creditor_form_f_mdls', 'other_creditor_form_f_mdls.user_id','=','user_mdls.id')
    			->where('other_creditor_form_f_mdls.submitted','=',1)
    			->select('user_mdls.id','user_mdls.name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','other_creditor_form_f_mdls.id','other_creditor_form_f_mdls.user_id','other_creditor_form_f_mdls.form_type','other_creditor_form_f_mdls.ar','other_creditor_form_f_mdls.submitted','other_creditor_form_f_mdls.fc_name','other_creditor_form_f_mdls.fc_email','other_creditor_form_f_mdls.date','other_creditor_form_f_mdls.updated_date')
    			->orderByDesc('other_creditor_form_f_mdls.id')
    			->get();

    	return $data;				
    }


    public static function getUserRData($id)
    {
        $fid = base64_decode($id);
        
        $user = DB::table('other_creditor_form_f_mdls')
                    //->leftJoin('form_f_files_mdls', 'form_f_files_mdls.unique_id','=', 'other_creditor_form_f_mdls.unique_id');
                    ->leftJoin('form_f_files_mdls', 'form_f_files_mdls.form_f_id','=', 'other_creditor_form_f_mdls.id');  
        $user = $user->where([['other_creditor_form_f_mdls.id','=',$fid]])->first(); 
      
            
        return $user; 

    }

    public static function fileB($id)
    {
        //return $this->hasMany('App\Models\formFOtherDocumentMdl','unique_id','unique_id');
        $res = DB::table('form_f_other_document_mdls')->where('form_f_id',$id)->get();
        return $res;
    }


}
