<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\generalInfoMdl;
use App\Models\formModificationMdl;
use App\Models\userMdl;
use App\Services\UserFormNotification;
use App\Traits\MethodsTrait;
use Config;
use Session;
use DB;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\formNotification;
use App\Models\commonMdl;

//
class assignmentGenerateCntrlr extends Controller
{
            use MethodsTrait;

	function assignmentfetch(Request $req)
	{        
        $output = commonMdl::getAllAssignmentDetails();      
        return view('admin.assignments', compact("output"));
	}
	
	
function assignmentfilter(Request $req)
{
     $current_time = date("Y-m-d");
    $asssgnmt_sts= $req->txt1;
    $jsl = bPath().'/'.Config::get('site.login');
    
    if($asssgnmt_sts=="Live")
    {
     	   $live = DB::table("form_a_mdls as fA")
                        ->leftJoin('assign_company_mdls as asn', 'asn.id','=','fA.assign_company_mdls_id')
                        ->leftJoin('general_info_mdls as gIP', 'gIP.id','=','fA.user_id')
                        ->leftJoin('company_dtls as cmp', 'cmp.id','=','fA.company_id')
                        
                    ->select('fA.id as fA_id', 'gIP.first_name as ip', 'cmp.name as company', 'asn.designation', 'fA.corporate_debtor_insolvency_date', 'fA.insolvency_closing_date', 'fA.unique_id');

            if (userType()->user_type==2) 
            {
                $live = $live->where('fA.user_id', Session::get('admin_id'));
            }
            elseif (userType()->user_type==4) 
            {
                $live = $live->where('fA.user_id', userType()->sub_user);
            }        
                    
            $live = $live->where([['fA.corporate_debtor_insolvency_date', '<=', $current_time],['fA.insolvency_closing_date', '>=', $current_time]])->get();    
                    $sno=0;
        foreach ($live as $list)
        {$sno++;
           $urrl=url('form-a/'.$list->unique_id);
         echo "<tr><td>$sno</td>
                         <td>$list->ip</td>
                        <td>$list->company</td>
                        <td>$list->designation</td>
                        <td>$list->corporate_debtor_insolvency_date</td>
                        <td>$list->insolvency_closing_date</td>
                           <td> <a class='btn btn-sm btn-primary' href='$urrl' target='_blank' role='button' style='padding:4px 15px;'><i class='fa fa-eye'></i> View</a></td>
                        </tr>";    
            
        }
    
    }
if($asssgnmt_sts=="Upcomming")
    {
     	   $live = DB::table("form_a_mdls as fA")
                        ->leftJoin('assign_company_mdls as asn', 'asn.id','=','fA.assign_company_mdls_id')
                        ->leftJoin('general_info_mdls as gIP', 'gIP.id','=','fA.user_id')
                        ->leftJoin('company_dtls as cmp', 'cmp.id','=','fA.company_id')
                        
                    ->select('fA.id as fA_id', 'gIP.first_name as ip', 'cmp.name as company', 'asn.designation', 'fA.corporate_debtor_insolvency_date', 'fA.insolvency_closing_date', 'fA.unique_id');
                if (userType()->user_type==2) 
                {
                    $live = $live->where('fA.user_id', Session::get('admin_id'));
                }
                elseif (userType()->user_type==4) 
                {
                    $live = $live->where('fA.user_id', userType()->sub_user);
                }    
               
                $live =   $live->where([['fA.corporate_debtor_insolvency_date','>=',$current_time]])->get();  
                    
                    $sno=0;
        foreach ($live as $list)
        {$sno++;
        $urrl=url('form-a/'.$list->unique_id);
         echo "<tr><td>$sno</td>
                         <td>$list->ip</td>
                        <td>$list->company</td>
                        <td>$list->designation</td>
                        <td>$list->corporate_debtor_insolvency_date</td>
                        <td>$list->insolvency_closing_date</td>
                        
                          <td> <a class='btn btn-sm btn-primary' href='$urrl' target='_blank' role='button' style='padding:4px 15px;'><i class='fa fa-eye'></i> View</a></td></tr>
                        ";    
            
        }
    
    }
    
    if($asssgnmt_sts=="")
    {
     	   $output = DB::table('form_a_mdls as fA')
     	 ->leftJoin('assign_company_mdls as asn', 'asn.id','=','fA.assign_company_mdls_id')
                        ->leftJoin('general_info_mdls as gIP', 'gIP.id','=','fA.user_id')
                        ->leftJoin('company_dtls as cmp', 'cmp.id','=','fA.company_id')
                    ->select('fA.id as fA_id', 'gIP.first_name as ip', 'cmp.name as company', 'asn.designation', 'fA.corporate_debtor_insolvency_date', 'fA.insolvency_closing_date', 'fA.unique_id');
                if (userType()->user_type==2) 
                {
                    $output = $output->where('fA.user_id', Session::get('admin_id'));
                }
                elseif (userType()->user_type==4) 
                {
                    $output = $output->where('fA.user_id', userType()->sub_user);
                }     
                 
            $output = $output->orderBy('fA.id', 'desc')->get();
                    
                    $sno=0;
        foreach ($output as $list)
        {$sno++;
        $urrl=url('form-a/'.$list->unique_id);
         echo "<tr><td>$sno</td>
                         <td>$list->ip</td>
                        <td>$list->company</td>
                        <td>$list->designation</td>
                        <td>$list->corporate_debtor_insolvency_date</td>
                        <td>$list->insolvency_closing_date</td>
                           <td> <a class='btn btn-sm btn-primary' href='$urrl' target='_blank' role='button' style='padding:4px 15px;'><i class='fa fa-eye'></i> View</a></td>
                        
                        </tr>";    
            
        }
    
    }
                  // dd($output);

    
}



}
