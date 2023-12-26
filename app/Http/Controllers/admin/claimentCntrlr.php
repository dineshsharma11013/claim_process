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

//
class claimentCntrlr extends Controller
{
            use MethodsTrait;

	function claimentfetch(Request $req)
	{
 $jsl = bPath().'/'.Config::get('site.claimantFilter');

$output = DB::table('user_mdls')->where('admin_id',Session::get('admin_id'))->get();

$admin_type = DB::table('general_info_mdls')->select('id', 'user_type')->where('id', Session::get('admin_id'))->first();

// $company = DB::table('assign_company_mdls')->leftJoin('company_dtls.id','=','assign_company_mdls.company_id')->where('assign_company_mdls.ip_id','=',Session::get('admin_id'))->get();


// $company = DB::table('assign_company_mdls as asn')
//     ->leftJoin('company_dtls as com', 'com.id', '=', 'asn.company_id')
//     ->where([['asn.ip_id', '=', Session::get('admin_id')], ['asn.status', '=', 1], ['com.status', '=', 1]])
    
    
//     ->distinct('com.name')
//     ->pluck('com.name','com.id');

$company = DB::table('form_a_mdls as asn')
    ->leftJoin('company_dtls as com', 'com.id', '=', 'asn.company_id');

    if ($admin_type->user_type == 2) 
    {
    $company = $company->where([['asn.user_id', '=', Session::get('admin_id')], ['asn.status', '=', 1], ['com.status', '=', 1]]);
    }
    else
    {
    $company = $company->where([['asn.status', '=', 1], ['com.status', '=', 1]]);	
    }
    
    $company = $company->distinct('com.name')
    ->pluck('com.name','com.id');
   


//dd($company);

      return view('admin.claiments_details',compact('jsl','output', 'company'));
      
	}
	
	function fliterCompanyDtl(Request $req)
	{
	    //echo $req->comp;
	    $comp = $req->comp;
	    $admin_type = DB::table('general_info_mdls')->select('id', 'user_type')->where('id', Session::get('admin_id'))->first();
	    $form_type = $req->form_type;

	    //echo "sdf";die();

	    $output =[];

	    if (isset($form_type) && $form_type == 'From_b') 
	    {
	    	$formB = DB::table('operational_creditor_mdls as fb')
	            ->leftJoin('user_mdls as user', 'user.id','=','fb.user_id');
	            if ($admin_type->user_type == 2) 
	            {
	            	$formB = $formB->where([['fb.irp','=',Session::get('admin_id')], ['fb.company','=',$comp],['fb.submitted','=',1], ['fb.status','=',1]]);	
	            }
	            elseif ($admin_type->user_type == 1)
	            {
	            	$formB = $formB->where([['fb.company','=',$comp],['fb.submitted','=',1], ['fb.status','=',1]]);
	            }
	            
	            
	        $formB = $formB->select('fb.id', 'fb.claimant_name as name', 'fb.form_type as ft', 'fb.operational_creditor_email as email','fb.created_at', 'user.mobile as mobile')
	            ->get()->toArray();
	  
		    if(count($formB)>0)
		    {
		        $output = $formB;
		    }
		    $result = view('admin.reports.claimant', compact("output","form_type"));
		    echo $result;
		    die();
	    }
	    elseif (!isset($form_type))
	    {
	    	$formB = DB::table('operational_creditor_mdls as fb')
	            ->leftJoin('user_mdls as user', 'user.id','=','fb.user_id');
	            if ($admin_type->user_type == 2) 
	            {
	            	$formB = $formB->where([['fb.irp','=',Session::get('admin_id')], ['fb.company','=',$comp],['fb.submitted','=',1], ['fb.status','=',1]]);	
	            }
	            elseif ($admin_type->user_type == 1)
	            {
	            	$formB = $formB->where([['fb.company','=',$comp],['fb.submitted','=',1], ['fb.status','=',1]]);
	            }
	            
	            
	        $formB = $formB->select('fb.id', 'fb.claimant_name as name', 'fb.form_type as ft', 'fb.operational_creditor_email as email','fb.created_at', 'user.mobile as mobile')
	            ->get()->toArray();
	  
		    if(count($formB)>0)
		    {
		        $output = $formB;
		    }
	    }

	    
	   if (isset($form_type) && $form_type == 'From_c') 
            {
	    
	    $formC = DB::table('finanicial_creditor_form_c_mdls as fc')
	            ->leftJoin('user_mdls as user', 'user.id','=','fc.user_id');

	             if ($admin_type->user_type == 2) 
                    {
                        $formC = $formC->where([['fc.irp','=',Session::get('admin_id')], ['fc.company','=',$comp],['fc.submitted','=',1], ['fc.status','=',1]]);        
                    }
                    elseif ($admin_type->user_type == 1)
                    {
                        $formC = $formC->where([['fc.company','=',$comp],['fc.submitted','=',1], ['fc.status','=',1]]); 
                    }
	        	    
	            
	        $formC = $formC->select('fc.id', 'fc.signing_person_name as name', 'fc.form_type as ft', 'fc.fc_email as email','fc.created_at', 'user.mobile as mobile')
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
	    $result = view('admin.reports.claimant', compact("output","form_type"));
	    echo $result;
	    die();

		}
		elseif (!isset($form_type))
		{
			$formC = DB::table('finanicial_creditor_form_c_mdls as fc')
	            ->leftJoin('user_mdls as user', 'user.id','=','fc.user_id');

	             if ($admin_type->user_type == 2) 
                    {
                        $formC = $formC->where([['fc.irp','=',Session::get('admin_id')], ['fc.company','=',$comp],['fc.submitted','=',1], ['fc.status','=',1]]);        
                    }
                    elseif ($admin_type->user_type == 1)
                    {
                        $formC = $formC->where([['fc.company','=',$comp],['fc.submitted','=',1], ['fc.status','=',1]]); 
                    }
	        	    
	            
	        $formC = $formC->select('fc.id', 'fc.signing_person_name as name', 'fc.form_type as ft', 'fc.fc_email as email','fc.created_at', 'user.mobile as mobile')
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
		}

		if (isset($form_type) && $form_type == 'From_d') 
            {
	    
	    $formD = DB::table('form_d_mdls as fd')
	            ->leftJoin('user_mdls as user', 'user.id','=','fd.user_id');
	            if ($admin_type->user_type == 2) 
	            {
	            	$formD = $formD->where([['fd.irp','=',Session::get('admin_id')], ['fd.company','=',$comp],['fd.submitted','=',1], ['fd.status','=',1]]);	
	            }
	            elseif ($admin_type->user_type == 1)
	            {
	            	$formD = $formD->where([['fd.company','=',$comp],['fd.submitted','=',1], ['fd.status','=',1]]);
	            }
	            
	            $formD = $formD->select('fd.id', 'fd.name_in_block_letter as name', 'fd.form_type as ft', 'fd.email as email','fd.created_at', 'user.mobile as mobile')
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
		    $result = view('admin.reports.claimant', compact("output","form_type"));
	    echo $result;
	    die();

		}
		elseif (!isset($form_type)) 
		{
			$formD = DB::table('form_d_mdls as fd')
	            ->leftJoin('user_mdls as user', 'user.id','=','fd.user_id');
	            if ($admin_type->user_type == 2) 
	            {
	            	$formD = $formD->where([['fd.irp','=',Session::get('admin_id')], ['fd.company','=',$comp],['fd.submitted','=',1], ['fd.status','=',1]]);	
	            }
	            elseif ($admin_type->user_type == 1)
	            {
	            	$formD = $formD->where([['fd.company','=',$comp],['fd.submitted','=',1], ['fd.status','=',1]]);
	            }
	            
	            $formD = $formD->select('fd.id', 'fd.name_in_block_letter as name', 'fd.form_type as ft', 'fd.email as email','fd.created_at', 'user.mobile as mobile')
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
		}

	    if (isset($form_type) && $form_type == 'From_ca')
	    {
	    $formCA = DB::table('financial_creditor_form_ca_mdls as fca')
	            ->leftJoin('user_mdls as user', 'user.id','=','fca.user_id');
	            if ($admin_type->user_type == 2) 
	            {
	            	$formCA =	$formCA->where([['fca.irp','=',Session::get('admin_id')], ['fca.company','=',$comp],['fca.submitted','=',1], ['fca.status','=',1]]);
	            }
	            elseif ($admin_type->user_type == 1)
	            {
	            $formCA =	$formCA->where([['fca.company','=',$comp],['fca.submitted','=',1], ['fca.status','=',1]]);
	            }
	            
	        $formCA = $formCA->select('fca.id', 'fca.signing_person_name as name', 'fca.form_type as ft', 'fca.fc_email as email','fca.created_at', 'user.mobile as mobile')
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
	    $result = view('admin.reports.claimant', compact("output","form_type"));
	    echo $result;
	    die();
	    
	}
	elseif (!isset($form_type)) 
	{
		$formCA = DB::table('financial_creditor_form_ca_mdls as fca')
	            ->leftJoin('user_mdls as user', 'user.id','=','fca.user_id');
	            if ($admin_type->user_type == 2) 
	            {
	            	$formCA =	$formCA->where([['fca.irp','=',Session::get('admin_id')], ['fca.company','=',$comp],['fca.submitted','=',1], ['fca.status','=',1]]);
	            }
	            elseif ($admin_type->user_type == 1)
	            {
	            $formCA =	$formCA->where([['fca.company','=',$comp],['fca.submitted','=',1], ['fca.status','=',1]]);
	            }
	            
	        $formCA = $formCA->select('fca.id', 'fca.signing_person_name as name', 'fca.form_type as ft', 'fca.fc_email as email','fca.created_at', 'user.mobile as mobile')
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
	}


		if (isset($form_type) && $form_type == 'From_e')
		{

	    $formE = DB::table('form_e_file_mdls as fe')
	            ->leftJoin('user_mdls as user', 'user.id','=','fe.user_id');
	            if ($admin_type->user_type == 2) 
                    {
	            $formE = $formE->where([['fe.irp','=',Session::get('admin_id')], ['fe.company','=',$comp],['fe.submitted','=',1], ['fe.status','=',1]]);
	            }
	            elseif ($admin_type->user_type == 1)
	            {
	            	$formE = $formE->where([['fe.company','=',$comp],['fe.submitted','=',1], ['fe.status','=',1]]);
	            }
	          $formE = $formE->select('fe.id', 'user.name as name', 'fe.form_type as ft', 'user.email as email','fe.created_at', 'user.mobile as mobile')
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
	    $result = view('admin.reports.claimant', compact("output","form_type"));
	    echo $result;
	    die();
	}
	elseif (!isset($form_type)) 
	{
		$formE = DB::table('form_e_file_mdls as fe')
	            ->leftJoin('user_mdls as user', 'user.id','=','fe.user_id');
	            if ($admin_type->user_type == 2) 
                    {
	            $formE = $formE->where([['fe.irp','=',Session::get('admin_id')], ['fe.company','=',$comp],['fe.submitted','=',1], ['fe.status','=',1]]);
	            }
	            elseif ($admin_type->user_type == 1)
	            {
	            	$formE = $formE->where([['fe.company','=',$comp],['fe.submitted','=',1], ['fe.status','=',1]]);
	            }
	            $formE = $formE->select('fe.id', 'user.name as name', 'fe.form_type as ft', 'user.email as email','fe.created_at', 'user.mobile as mobile')
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
	}

	if (isset($form_type) && $form_type == 'From_f') 
	{

	    $formF = DB::table('other_creditor_form_f_mdls as ff')
	            ->leftJoin('user_mdls as user', 'user.id','=','ff.user_id');
	            if ($admin_type->user_type == 2)
	            {
	            	$formF = $formF->where([['ff.irp','=',Session::get('admin_id')], ['ff.company','=',$comp],['ff.submitted','=',1], ['ff.status','=',1]]);
	            }
	            elseif ($admin_type->user_type == 1)
	            {
	            	$formF = $formF->where([['ff.company','=',$comp],['ff.submitted','=',1], ['ff.status','=',1]]);
	            }
	            
	            $formF = $formF->select('ff.id', 'ff.signing_person_name as name', 'ff.form_type as ft', 'ff.fc_email as email', 'ff.created_at', 'user.mobile as mobile')
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
	    $result = view('admin.reports.claimant', compact("output","form_type"));
	    echo $result;
	    die();
	}
	elseif (!isset($form_type)) 
	{
		$formF = DB::table('other_creditor_form_f_mdls as ff')
	            ->leftJoin('user_mdls as user', 'user.id','=','ff.user_id');
	            if ($admin_type->user_type == 2)
	            {
	            	$formF = $formF->where([['ff.irp','=',Session::get('admin_id')], ['ff.company','=',$comp],['ff.submitted','=',1], ['ff.status','=',1]]);
	            }
	            elseif ($admin_type->user_type == 1)
	            {
	            	$formF = $formF->where([['ff.company','=',$comp],['ff.submitted','=',1], ['ff.status','=',1]]);
	            }
	            
	            $formF = $formF->select('ff.id', 'ff.signing_person_name as name', 'ff.form_type as ft', 'ff.fc_email as email', 'ff.created_at', 'user.mobile as mobile')
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
	}
	    
	    
	    
	    $result = view('admin.reports.claimant', compact("output"));
	    echo $result;
	    
	}
	
	
	function filter_claiment(Request $req)
	{
$jsl = bPath().'/'.Config::get('site.login');
	
$admin_type = DB::table('general_info_mdls')->select('id', 'user_type')->where('id', Session::get('admin_id'))->first();

//echo print_r($admin_type);die();
	
if($req->txt1 == "From_b")
{
$form_B_fltr = DB::table('operational_creditor_mdls as fb')
                ->leftJoin('user_mdls as user', 'user.id', '=', 'fb.user_id');
                if ($admin_type->user_type==2) 
                {
                	if (isset($req->company)) 
                	{
                		$form_B_fltr = $form_B_fltr->where([['fb.irp', '=', Session::get('admin_id')], ['fb.company', '=', $req->company], ['fb.submitted','=',1], ['fb.status','=',1]]);
                	}
                	else
                	{
                		$form_B_fltr = $form_B_fltr->where([['fb.irp', '=', Session::get('admin_id')], ['fb.submitted','=',1], ['fb.status','=',1]]);
                	}
                	
                }
                elseif ($admin_type->user_type==1) 
                {
                	if (isset($req->company)) 
                	{
                		$form_B_fltr = $form_B_fltr->where([['fb.company', '=', $req->company], ['fb.submitted','=',1], ['fb.status','=',1]]);
                	}
                	else
                	{
                		$form_B_fltr = $form_B_fltr->where([['fb.submitted','=',1], ['fb.status','=',1]]);
                	}
                }
                
        $form_B_fltr = $form_B_fltr->select('fb.claimant_name as name', 'fb.operational_creditor_email as email', 'user.mobile','user.status','fb.created_at')
                ->get();
            //dd($form_B_fltr) ;
           // echo print_r($form_B_fltr);
           
           if (count($form_B_fltr)>0) 
           {
           $sno=0;
           foreach($form_B_fltr as $list)
           {
               $sno++;
               echo "<tr>
               <td>$sno</td>
               <td>$list->name</td>
               <td>$list->email</td>
               <td>$list->mobile</td>
               <td>$list->status</td>
               <td>$list->created_at</td>
               </tr>";
               
           }
       }
       else
       {
       	echo "<tr>
               <td>There is no record.</td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               </tr>";
       }
}
           
if($req->txt1 == "From_c")
{
$form_c_fltr = DB::table('finanicial_creditor_form_c_mdls as fc')
                ->leftJoin('user_mdls as user', 'user.id', '=', 'fc.user_id');


                if ($admin_type->user_type==2) 
                {
                	if (isset($req->company)) 
                	{
                		$form_c_fltr = $form_c_fltr->where([['fc.irp', '=', Session::get('admin_id')], ['fc.company', '=', $req->company], ['fc.submitted','=',1], ['fc.status','=',1]]);
                	}
                	else
                	{
                		$form_c_fltr = $form_c_fltr->where([['fc.irp', '=', Session::get('admin_id')], ['fc.submitted','=',1], ['fc.status','=',1]]);
                	}
                	
                }
                elseif ($admin_type->user_type==1) 
                {
                	if (isset($req->company)) 
                	{
                		$form_c_fltr = $form_c_fltr->where([['fc.company', '=', $req->company], ['fc.submitted','=',1], ['fc.status','=',1]]);
                	}
                	else
                	{
                		$form_c_fltr = $form_c_fltr->where([['fc.submitted','=',1], ['fc.status','=',1]]);
                	}
                }

        $form_c_fltr = $form_c_fltr->select('fc.signing_person_name as name', 'fc.fc_email as email', 'user.mobile','user.status','fc.created_at')
                ->get();
          
           // echo print_r($form_B_fltr);
           
           if (count($form_c_fltr)>0) 
           {
           $sno=0;
           foreach($form_c_fltr as $list)
           {
               $sno++;
               echo "<tr>
               <td>$sno</td>
               <td>$list->name</td>
               <td>$list->email</td>
               <td>$list->mobile</td>
               <td>$list->status</td>
               <td>$list->created_at</td>
               </tr>";
               
           }
       }
       else
       {
       	echo "<tr>
               <td>There is no record.</td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               </tr>";
       }
}          
           
  if($req->txt1 == "From_d")
{
$form_d_fltr = DB::table('form_d_mdls as fd')
                ->leftJoin('user_mdls as user', 'user.id', '=', 'fd.user_id');

                if ($admin_type->user_type==2) 
                {
                	if (isset($req->company)) 
                	{
                		$form_d_fltr = $form_d_fltr->where([['fd.irp', '=', Session::get('admin_id')], ['fd.company', '=', $req->company], ['fd.submitted','=',1], ['fd.status','=',1]]);
                	}
                	else
                	{
                		$form_d_fltr = $form_d_fltr->where([['fd.irp', '=', Session::get('admin_id')], ['fd.submitted','=',1], ['fd.status','=',1]]);
                	}
                	
                }
                elseif ($admin_type->user_type==1) 
                {
                	if (isset($req->company)) 
                	{
                		$form_d_fltr = $form_d_fltr->where([['fd.company', '=', $req->company], ['fd.submitted','=',1], ['fd.status','=',1]]);
                	}
                	else
                	{
                		$form_d_fltr = $form_d_fltr->where([['fd.submitted','=',1], ['fd.status','=',1]]);
                	}
                }
                
            $form_d_fltr = $form_d_fltr->select('fd.name_in_block_letter as name', 'fd.email as email', 'user.mobile','user.status','fd.created_at')
                ->get();
          
           // echo print_r($form_B_fltr);
           
           if (count($form_d_fltr)>0) 
           {
           $sno=0;
           foreach($form_d_fltr as $list)
           {
               $sno++;
               echo "<tr>
               <td>$sno</td>
               <td>$list->name</td>
               <td>$list->email</td>
               <td>$list->mobile</td>
               <td>$list->status</td>
               <td>$list->created_at</td>
               </tr>";
               
           }
       }
       else
       {
       	echo "<tr>
               <td>There is no record.</td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               </tr>";
       }
}             
         
         
         
if($req->txt1 == "From_e")
{
$form_e_fltr = DB::table('form_e_file_mdls as fe')
                ->leftJoin('user_mdls as user', 'user.id', '=', 'fe.user_id');

                if ($admin_type->user_type==2) 
                {
                	if (isset($req->company)) 
                	{
                		$form_e_fltr = $form_e_fltr->where([['fe.irp', '=', Session::get('admin_id')], ['fe.company', '=', $req->company], ['fe.submitted','=',1], ['fe.status','=',1]]);
                	}
                	else
                	{
                		$form_e_fltr = $form_e_fltr->where([['fe.irp', '=', Session::get('admin_id')], ['fe.submitted','=',1], ['fe.status','=',1]]);
                	}
                	
                }
                elseif ($admin_type->user_type==1) 
                {
                	if (isset($req->company)) 
                	{
                		$form_e_fltr = $form_e_fltr->where([['fe.company', '=', $req->company], ['fe.submitted','=',1], ['fe.status','=',1]]);
                	}
                	else
                	{
                		$form_e_fltr = $form_e_fltr->where([['fe.submitted','=',1], ['fe.status','=',1]]);
                	}
                }

            $form_e_fltr = $form_e_fltr->select('user.name as name', 'user.email as email', 'user.mobile','user.status','fe.created_at')
                ->get();
          
           // echo print_r($form_B_fltr);
           
           if (count($form_e_fltr)>0) 
           {
           $sno=0;
           foreach($form_e_fltr as $list)
           {
               $sno++;
               echo "<tr>
               <td>$sno</td>
               <td>$list->name</td>
               <td>$list->email</td>
               <td>$list->mobile</td>
               <td>$list->status</td>
               <td>$list->created_at</td>
               </tr>";
               
           }
       }
       else
       {
       	echo "<tr>
               <td>There is no record.</td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               </tr>";
       }
}             
       
       
       
         if($req->txt1 == "From_f")
{
$form_f_fltr = DB::table('other_creditor_form_f_mdls as ff')
                ->leftJoin('user_mdls as user', 'user.id', '=', 'ff.user_id');

                if ($admin_type->user_type==2) 
                {
                	if (isset($req->company)) 
                	{
                		$form_f_fltr = $form_f_fltr->where([['ff.irp', '=', Session::get('admin_id')], ['ff.company', '=', $req->company], ['ff.submitted','=',1], ['ff.status','=',1]]);
                	}
                	else
                	{
                		$form_f_fltr = $form_f_fltr->where([['ff.irp', '=', Session::get('admin_id')], ['ff.submitted','=',1], ['ff.status','=',1]]);
                	}
                	
                }
                elseif ($admin_type->user_type==1) 
                {
                	if (isset($req->company)) 
                	{
                		$form_f_fltr = $form_f_fltr->where([['ff.company', '=', $req->company], ['ff.submitted','=',1], ['ff.status','=',1]]);
                	}
                	else
                	{
                		$form_f_fltr = $form_f_fltr->where([['ff.submitted','=',1], ['ff.status','=',1]]);
                	}
                }

            $form_f_fltr = $form_f_fltr->select('ff.signing_person_name as name', 'ff.fc_email as email', 'user.mobile','user.status','ff.created_at')
                ->get();
          
           // echo print_r($form_B_fltr);
           
        if (count($form_f_fltr)>0) 
        {
           $sno=0;
        foreach($form_f_fltr as $list)
        {
        $sno++;
        echo "<tr>
        <td>$sno</td>
        <td>$list->name</td>
        <td>$list->email</td>
        <td>$list->mobile</td>
        <td>$list->status</td>
        <td>$list->created_at</td>
        </tr>";
        
        }
    }
    else
    {
    	echo "<tr>
               <td>There is no record.</td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               </tr>";
    }
} 
       
   
     if($req->txt1 == "From_ca")
{
$form_ca_fltr = DB::table('financial_creditor_form_ca_mdls as fca')
                ->leftJoin('user_mdls as user', 'user.id', '=', 'fca.user_id');

                if ($admin_type->user_type==2) 
                {
                	if (isset($req->company)) 
                	{
                		$form_ca_fltr = $form_ca_fltr->where([['fca.irp', '=', Session::get('admin_id')], ['fca.company', '=', $req->company], ['fca.submitted','=',1], ['fca.status','=',1]]);
                	}
                	else
                	{
                		$form_ca_fltr = $form_ca_fltr->where([['fca.irp', '=', Session::get('admin_id')], ['fca.submitted','=',1], ['fca.status','=',1]]);
                	}
                	
                }
                elseif ($admin_type->user_type==1) 
                {
                	if (isset($req->company)) 
                	{
                		$form_ca_fltr = $form_ca_fltr->where([['fca.company', '=', $req->company], ['fca.submitted','=',1], ['fca.status','=',1]]);
                	}
                	else
                	{
                		$form_ca_fltr = $form_ca_fltr->where([['fca.submitted','=',1], ['fca.status','=',1]]);
                	}
                }

            $form_ca_fltr = $form_ca_fltr->select('fca.fc_name as name', 'fca.fc_email as email', 'user.mobile','user.status','fca.created_at')
                ->get();
          
           // echo print_r($form_B_fltr);
           
        if (count($form_ca_fltr)>0) 
        {   
           $sno=0;
        foreach($form_ca_fltr as $list)
        {
        $sno++;
        echo "<tr>
        <td>$sno</td>
        <td>$list->name</td>
        <td>$list->email</td>
        <td>$list->mobile</td>
        <td>$list->status</td>
        <td>$list->created_at</td>
        </tr>";
        
        }
    }
    else
    {
    	echo "<tr>
               <td>There is no record.</td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               <td></td>
               </tr>";
    }
} 
       
   
   
   
   
   
         
           //echo count($form_B_fltr); 
	}
	




}
