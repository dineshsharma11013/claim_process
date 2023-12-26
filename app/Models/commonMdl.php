<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class commonMdl extends Model
{
    use HasFactory;

    public static function insertData($tbl,$data)
    {
    	$db = DB::table($tbl)->insert($data);
    	if($db)
    	{
    		return $db;
    	}
    	else
    	{
    		return false;
    	}
    }

	public static function deleteData($tbl,$id)
    {
    	$db = DB::table($tbl)->where('id', $id)->delete();
    	if($db)
    	{
    		return $db;
    	}
    	else
    	{
    		return false;
    	}
    }    

	public static function editData($tbl,$id)
    {
    	$db = DB::table($tbl)->where('id', $id)->first();
    	if($db)
    	{
    		return $db;
    	}
    	else
    	{
    		return false;
    	}
    }    

    public static function updateData($tbl,$data,$id)
    {
    	$db = DB::table($tbl)->where('id', $id)->update($data);
    	if($db)
    	{
    		return $db;
    	}
    	else
    	{
    		return false;
    	}
    }

    public static function getData($tbl,$nm)
    {
        $db = DB::table($tbl)->orderBy($nm, 'ASC')->get();
        if($db)
        {
            return $db;
        }
        else
        {
            return false;
        }
    }

    public static function getRegisteredUsers()
    {
        $output = [];

        $formB = DB::table('operational_creditor_mdls as fb')
                ->leftJoin('user_mdls as user', 'user.id','=','fb.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','fb.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'fb.company')
                ->where([['fb.submitted','=',1], ['fb.status','=',1]]);

                if (userType()->user_type==2) 
                {
                    $formB = $formB->where('fb.irp', Session::get('admin_id'));
                }
                elseif (userType()->user_type==4) 
                {
                    $formB = $formB->where('fb.irp', userType()->sub_user);
                }

        $formB = $formB->select('fb.id', 'ip.first_name as ip_name', 'comp.name as company' ,'fb.claimant_name as name', 'fb.form_type as ft', 'fb.operational_creditor_email as email','fb.created_at', 'user.mobile as mobile')
                ->get()->toArray();
      
        if(count($formB)>0)
        {
            $output = $formB;
        }

        $formC = DB::table('finanicial_creditor_form_c_mdls as fc')
                ->leftJoin('user_mdls as user', 'user.id','=','fc.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','fc.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'fc.company')
                ->where([['fc.submitted','=',1], ['fc.status','=',1]]);
                 
                if (userType()->user_type==2) 
                {
                    $formC = $formC->where('fc.irp', Session::get('admin_id'));
                }    
                elseif (userType()->user_type==4) 
                {
                    $formC = $formC->where('fc.irp', userType()->sub_user);
                }

        $formC = $formC->select('fc.id', 'ip.first_name as ip_name', 'comp.name as company', 'fc.signing_person_name as name', 'fc.form_type as ft', 'fc.fc_email as email','fc.created_at', 'user.mobile as mobile')
                ->get()->toArray();
        
        if(count($formC)>0)
        {
            if(count($output)>0)
            {
            $output = array_merge($output, $formC);
            }
            else
            {
                $output = $formC;
            }
        }
        
        $formD = DB::table('form_d_mdls as fd')
                ->leftJoin('user_mdls as user', 'user.id','=','fd.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','fd.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'fd.company')
                ->where([['fd.submitted','=',1], ['fd.status','=',1]]);

                if (userType()->user_type==2) 
                {
                    $formD = $formD->where('fd.irp', Session::get('admin_id'));
                }    
                elseif (userType()->user_type==4) 
                {
                    $formD = $formD->where('fd.irp', userType()->sub_user);
                }

        $formD = $formD->select('fd.id', 'ip.first_name as ip_name', 'comp.name as company', 'fd.name_in_block_letter as name', 'fd.form_type as ft', 'fd.email as email','fd.created_at', 'user.mobile as mobile')
                ->get()->toArray();
        
        if(count($formD)>0)
        {
            if(count($output)>0)
            {
            $output = array_merge($output, $formD);
            }
            else
            {
                $output = $formD;
            }
        }
        
        $formCA = DB::table('financial_creditor_form_ca_mdls as fca')
                ->leftJoin('user_mdls as user', 'user.id','=','fca.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','fca.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'fca.company')
                ->where([['fca.submitted','=',1], ['fca.status','=',1]]);

                if (userType()->user_type==2) 
                {
                    $formCA = $formCA->where('fca.irp', Session::get('admin_id'));
                }    
                elseif (userType()->user_type==4) {
                    $formCA = $formCA->where('fca.irp', userType()->sub_user);
                }
        $formCA = $formCA->select('fca.id', 'ip.first_name as ip_name', 'comp.name as company', 'fca.signing_person_name as name', 'fca.form_type as ft', 'fca.fc_email as email','fca.created_at', 'user.mobile as mobile')
                ->get()->toArray();
        
        if(count($formCA)>0)
        {
            if(count($output)>0)
            {
            $output = array_merge($output, $formCA);
            }
            else
            {
                $output = $formCA;
            }
        }
        
        $formE = DB::table('form_e_file_mdls as fe')
                ->leftJoin('user_mdls as user', 'user.id','=','fe.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','fe.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'fe.company')
                ->where([['fe.submitted','=',1], ['fe.status','=',1]]);

                if (userType()->user_type==2) 
                {
                    $formE = $formE->where('fe.irp', Session::get('admin_id'));
                } 
                elseif (userType()->user_type==4) {
                    $formE = $formE->where('fe.irp', userType()->sub_user);
                }

        $formE = $formE->select('fe.id', 'ip.first_name as ip_name', 'comp.name as company', 'user.name as name', 'fe.form_type as ft', 'user.email as email','fe.created_at', 'user.mobile as mobile')
                ->get()->toArray();
        
        if(count($formE)>0)
        {
            if(count($output)>0)
            {
            $output = array_merge($output, $formE);
            }
            else
            {
                $output = $formE;
            }
        }
        
        $formF = DB::table('other_creditor_form_f_mdls as ff')
                ->leftJoin('user_mdls as user', 'user.id','=','ff.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','ff.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'ff.company')
                ->where([['ff.submitted','=',1], ['ff.status','=',1]]);

                if (userType()->user_type==2) 
                {
                    $formF = $formF->where('ff.irp', Session::get('admin_id'));
                } 
                elseif (userType()->user_type==4) {
                    $formF = $formF->where('ff.irp', userType()->sub_user);
                }

        $formF = $formF->select('ff.id', 'ip.first_name as ip_name', 'comp.name as company', 'ff.signing_person_name as name', 'ff.form_type as ft', 'ff.fc_email as email', 'ff.created_at', 'user.mobile as mobile')
                ->get()->toArray();
        
        if(count($formF)>0)
        {
            if(count($output)>0)
            {
            $output = array_merge($output, $formF);
            }
            else
            {
                $output = $formF;
            }
        }

        return $output;
    }

    public static function getUnRegisteredUsers()
    {
        $output = [];

        $formB = DB::table('operational_creditor_mdls as fb')
                ->leftJoin('user_mdls as user', 'user.id','=','fb.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','fb.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'fb.company')
                ->where([['fb.submitted','=',2]])
                ->select('fb.id', 'ip.first_name as ip_name', 'comp.name as company' ,'fb.claimant_name as name', 'fb.form_type as ft', 'fb.operational_creditor_email as email','fb.created_at', 'user.mobile as mobile', 'fb.form_b_selected_id')
                ->get()->toArray();
      
        if(count($formB)>0)
        {
            $output = $formB;
        }

        $formC = DB::table('finanicial_creditor_form_c_mdls as fc')
                ->leftJoin('user_mdls as user', 'user.id','=','fc.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','fc.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'fc.company')
                ->where([['fc.submitted','=',2]])
                ->select('fc.id', 'ip.first_name as ip_name', 'comp.name as company', 'fc.signing_person_name as name', 'fc.form_type as ft', 'fc.fc_email as email','fc.created_at', 'user.mobile as mobile', 'fc.form_c_selected_id')
                ->get()->toArray();
        
        if(count($formC)>0)
        {
            if(count($output)>0)
            {
            $output = array_merge($output, $formC);
            }
            else
            {
                $output = $formC;
            }
        }
        
        $formD = DB::table('form_d_mdls as fd')
                ->leftJoin('user_mdls as user', 'user.id','=','fd.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','fd.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'fd.company')
                ->where([['fd.submitted','=',2]])
                ->select('fd.id', 'ip.first_name as ip_name', 'comp.name as company', 'fd.name_in_block_letter as name', 'fd.form_type as ft', 'fd.email as email','fd.created_at', 'user.mobile as mobile', 'fd.form_d_selected_id')
                ->get()->toArray();
        
        if(count($formD)>0)
        {
            if(count($output)>0)
            {
            $output = array_merge($output, $formD);
            }
            else
            {
                $output = $formD;
            }
        }
        
        $formCA = DB::table('financial_creditor_form_ca_mdls as fca')
                ->leftJoin('user_mdls as user', 'user.id','=','fca.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','fca.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'fca.company')
                ->where([['fca.submitted','=',2]])
                ->select('fca.id', 'ip.first_name as ip_name', 'comp.name as company', 'fca.signing_person_name as name', 'fca.form_type as ft', 'fca.fc_email as email','fca.created_at', 'user.mobile as mobile', 'fca.form_ca_selected_id')
                ->get()->toArray();
        
        if(count($formCA)>0)
        {
            if(count($output)>0)
            {
            $output = array_merge($output, $formCA);
            }
            else
            {
                $output = $formCA;
            }
        }
        
        $formE = DB::table('form_e_file_mdls as fe')
                ->leftJoin('user_mdls as user', 'user.id','=','fe.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','fe.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'fe.company')
                ->where([['fe.submitted','=',2]])
                ->select('fe.id', 'ip.first_name as ip_name', 'comp.name as company', 'user.name as name', 'fe.form_type as ft', 'user.email as email','fe.created_at', 'user.mobile as mobile', 'fe.form_e_selected_id')
                ->get()->toArray();
        
        if(count($formE)>0)
        {
            if(count($output)>0)
            {
            $output = array_merge($output, $formE);
            }
            else
            {
                $output = $formE;
            }
        }
        
        $formF = DB::table('other_creditor_form_f_mdls as ff')
                ->leftJoin('user_mdls as user', 'user.id','=','ff.user_id')
                ->leftJoin('general_info_mdls as ip', 'ip.id', '=','ff.irp')
                ->leftJoin('company_dtls as comp', 'comp.id', '=', 'ff.company')
                ->where([['ff.submitted','=',2]])
                ->select('ff.id', 'ip.first_name as ip_name', 'comp.name as company', 'ff.signing_person_name as name', 'ff.form_type as ft', 'ff.fc_email as email', 'ff.created_at', 'user.mobile as mobile', 'ff.form_f_selected_id')
                ->get()->toArray();
        
        if(count($formF)>0)
        {
            if(count($output)>0)
            {
            $output = array_merge($output, $formF);
            }
            else
            {
                $output = $formF;
            }
        }

        return $output;
    }

    public static function getAllAssignmentDetails()
    {
        $output = DB::table('form_a_mdls as fA')
                      ->leftJoin('assign_company_mdls as asn', 'asn.id','=','fA.assign_company_mdls_id')
                        ->leftJoin('general_info_mdls as gIP', 'gIP.id','=','fA.user_id')
                        ->leftJoin('company_dtls as cmp', 'cmp.id','=','fA.company_id');
                    
                    if (userType()->user_type==2)
                    {  
                        $output = $output->where('fA.user_id',Session::get('admin_id'));
                    }    
                    elseif (userType()->user_type==4) {
                        $output = $output->where('fA.user_id', userType()->sub_user);
                    }
               
            $output =       $output->select('fA.id as fA_id','fA.user_id', 'gIP.first_name as ip', 'cmp.name as company', 'asn.designation', 'fA.corporate_debtor_insolvency_date', 'fA.insolvency_closing_date', 'fA.unique_id')
                    ->orderBy('fA.id', 'desc')
                    ->get();

         return $output;           
    }

    public static function getSelectedAssignmentDetails($value)
    {
        $current_time = date("Y-m-d");                  

        if($value=="Live")
            {
                   $output = DB::table("form_a_mdls as fA")
                                ->leftJoin('assign_company_mdls as asn', 'asn.id','=','fA.assign_company_mdls_id')
                                ->leftJoin('general_info_mdls as gIP', 'gIP.id','=','fA.user_id')
                                ->leftJoin('company_dtls as cmp', 'cmp.id','=','fA.company_id')
                                
                            ->select('fA.id as fA_id', 'gIP.first_name as ip', 'cmp.name as company', 'asn.designation', 'fA.corporate_debtor_insolvency_date', 'fA.insolvency_closing_date', 'fA.unique_id')
                           ->where([['fA.user_id', Session::get('admin_id')],['fA.corporate_debtor_insolvency_date', '<=', $current_time],['fA.insolvency_closing_date', '>=', $current_time]])         
            ->get();

            return $output; 
                }

    }


}
