<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Config;
use Session;

class financialCreditorFormCaMdl extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getData()
    {
        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

    	$data = DB::table('user_mdls')
    			->join('financial_creditor_form_ca_mdls as fmB', 'fmB.user_id','=','user_mdls.id')
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
                    
    			
                $data = $data->select('user_mdls.id','user_mdls.name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','fmB.id','fmB.user_id', 'fmB.form_ca_selected_id','fmB.form_type','fmB.ar','fmB.submitted','fmB.fc_name','fmB.fc_email','fmB.created_at','comp.name as company', 'ip.username as ip')
    			->orderByDesc('fmB.id')
    			->get();

    	return $data;				
    }

    public static function getRData()
    {
    	$data = DB::table('user_mdls')
    			->join('financial_creditor_form_ca_mdls', 'financial_creditor_form_ca_mdls.user_id','=','user_mdls.id')
    			->where('financial_creditor_form_ca_mdls.submitted','=',1)
    			->select('user_mdls.id','user_mdls.name','user_mdls.email','user_mdls.unique_id','user_mdls.mobile','financial_creditor_form_ca_mdls.id','financial_creditor_form_ca_mdls.user_id','financial_creditor_form_ca_mdls.form_type','financial_creditor_form_ca_mdls.ar','financial_creditor_form_ca_mdls.submitted','financial_creditor_form_ca_mdls.fc_name','financial_creditor_form_ca_mdls.fc_email','financial_creditor_form_ca_mdls.date','financial_creditor_form_ca_mdls.updated_date')
    			->orderByDesc('financial_creditor_form_ca_mdls.id')
    			->get();

    	return $data;				
    }


    public static function getUserRData($id)
    {
        $fid = base64_decode($id);
        
        $user = DB::table(Config::get('site.formCaMdl'))
                    //->leftJoin('form_ca_files_mdls', 'form_ca_files_mdls.unique_id','=', 'financial_creditor_form_ca_mdls.unique_id');
                    ->leftJoin('form_ca_files_mdls', 'form_ca_files_mdls.form_ca_id','=', 'financial_creditor_form_ca_mdls.id'); 
        $user = $user->where([['financial_creditor_form_ca_mdls.id','=',$fid]])->first(); 
        
        return $user; 

    }

    public static function fileB($id)
    {
        //return $this->hasMany('App\Models\formCaOtherDocumentMdl','unique_id','unique_id');
        $res = DB::table('form_ca_other_document_mdls')->where('form_ca_id',$id)->get();
        return $res;
    }

    public static function exportClaimants()
    {
        $usrs = DB::table('financial_creditor_form_ca_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]);
                    if (userType()->user_type==2) 
                    {
                      if (userType()->sub_user=='') 
                      {
                        $usrs = $usrs->where('fmB.irp', Session::get('admin_id'));
                      }
                      elseif (userType()->sub_user!='') 
                      {
                         $usrs = $usrs->where('fmB.irp', userType()->sub_user); 
                      }
                    }  
                  $usrs = $usrs->select('fmB.id','fmB.fc_name as fc_name','ip.first_name as ip_name', 'ip.address as ip_address', 'fmB.fc_identification_number', 'fmB.fc_address', 'fmB.fc_email', 'fmB.claim_amt', 'fmB.claim_principle', 'fmB.claim_interest', 'fmB.document_details', 'fmB.debt_incurred_details', 'fmB.other_mutual_details', 'fmB.security_held', 'fmB.bank_account_number', 'fmB.bank_name', 'fmB.bank_ifsc_code', 'fmB.insolvency_professional_name')
                    ->orderBy('fmB.id','desc')
                    ->get();
        return $usrs;            
    }


}
