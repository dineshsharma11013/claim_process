<?php
use Illuminate\Support\Facades\DB;


function publicP()
{
	$path = public_path();
	$str = str_replace("\\", '/', $path);
	return $str;
}

function bPath()
{
	$path = url('/');
	return $path;
}

function admin()
{
	$segment = \Request::segment(1);
	return $segment;
	//return "admin";
}

function company()
{
	$com = DB::table("general_info_mdls")->select('company_name')->where([['user_type','=',1],['sub_user','=',""]])->first();
	return $com->company_name;
}

function rpDtl()
{
	$rp = DB::table("general_info_mdls")->where([['status','=',1],['user_type','=',2]])->pluck('username','id');
	return $rp;
}

function userType()
{
		$user = DB::table('general_info_mdls')->select('user_type', 'sub_user', 'id', 'username','first_name')->where('id', Session::get('admin_id'))->first();
		return $user;	
}

function ipType()
{
	if (userType()->user_type == 2 && userType()->sub_user!='') 
	{
		$ipType = DB::table('assign_company_mdls')->select('ip_id', 'designation', 'company_id')->where('ip_id', userType()->sub_user)->orderBy('id', 'desc')->first();
		return $ipType;		
	}
	elseif (userType()->user_type == 2 && userType()->sub_user=='') 
	{
		$ipType = DB::table('assign_company_mdls')->select('ip_id', 'designation', 'company_id')->where('ip_id', Session::get('admin_id'))->orderBy('id', 'desc')->first();
		return $ipType;		
	}
	
}


function ipRight()
{
	if (userType()->user_type == 2 && userType()->sub_user!='') 
	{
		$ipRight = DB::table('assign_company_mdls')->select('ip_id', 'designation', 'company_id')->where('ip_id', userType()->sub_user)->orderBy('company_id', 'desc')->first();
		return $ipRight;		
	}
	elseif (userType()->user_type == 2 && userType()->sub_user=='') 
	{
		$ipRight = DB::table('assign_company_mdls')->select('ip_id', 'designation', 'company_id')->where('ip_id', Session::get('admin_id'))->orderBy('company_id', 'desc')->first();
		return $ipRight;		
	}
}


function putFile($file, $path)
{
	$allowed = array('gif', 'png', 'jpg', 'jpeg');  
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    if (in_array($ext, $allowed))
    { 
        ?><img src="<?php echo $path.$file; ?>" width="50" height="50"><?php
    }
    else
    {
       ?> <a href="<?php echo $path.$file; ?>" target="_blank"><?php echo $file; ?></a>  <?php
    }                  
}


function dateFm($string)
{
	$obVal = date("d-M-Y", strtotime($string));
	return $obVal;
}

function dateFm3($string)
{
	$obVal = date("d M Y", strtotime($string));
	return $obVal;
}

function dateFm2($string)
{
	$obVal = date("d-M-Y h:ia", strtotime($string));
	return $obVal;
}

function getMonth($string)
{
	$obVal = date("M", strtotime($string));
	return $obVal;	
}

function getDat($string)
{
	$obVal = date("d", strtotime($string));
	return $obVal;	
}

function getYear($string)
{
	$obVal = date("Y", strtotime($string));
	return $obVal;	
}


function getUserFormDetails($id)
    {
        $comp = $id;
        $output =[];

    $formB = DB::table('operational_creditor_mdls as fb')
              ->leftJoin('user_mdls as user', 'user.id','=','fb.user_id')
              ->leftJoin('form_a_mdls as fA', 'fA.id', '=', 'fb.formA')
              ->where([['fb.company','=',$comp],['fb.submitted','=',1], ['fb.status','=',1]]);

              if (userType()->user_type == 2) 
              {
                $formB = $formB->where('fb.irp',Session::get('admin_id'));  
              }
              if (userType()->user_type == 4) 
              {
                $formB = $formB->where('fb.irp',userType()->sub_user);  
              }
              
          $formB = $formB->select('fb.id as form_id', 'fb.form_b_selected_id as selected_id', 'fb.unique_id as uniqueId', 'fb.claimant_name as name', 'fb.form_type as ft', 'fb.operational_creditor_email as email','fb.created_at', 'user.mobile as mobile', 'fA.unique_id as fA_unique_id')
              ->get()->toArray();
    
        if(count($formB)>0)
        {
            $output = $formB;
        }


    $formC = DB::table('finanicial_creditor_form_c_mdls as fc')
              ->leftJoin('user_mdls as user', 'user.id','=','fc.user_id')
              ->leftJoin('form_a_mdls as fA', 'fA.id', '=', 'fc.formA')
              ->where([['fc.company','=',$comp],['fc.submitted','=',1], ['fc.status','=',1]]);
               if (userType()->user_type == 2) 
                    {
                        $formC = $formC->where('fc.irp',Session::get('admin_id'));        
                    }
                    if (userType()->user_type == 4)
                    {
                        $formC = $formC->where('fc.irp',userType()->sub_user); 
                    }
                
              
          $formC = $formC->select('fc.id as form_id', 'fc.form_c_selected_id as selected_id', 'fc.unique_id as uniqueId', 'fc.signing_person_name as name', 'fc.form_type as ft', 'fc.fc_email as email','fc.created_at', 'user.mobile as mobile', 'fA.unique_id as fA_unique_id')
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
              ->leftJoin('form_a_mdls as fA', 'fA.id', '=', 'fd.formA')
              ->where([['fd.company','=',$comp],['fd.submitted','=',1], ['fd.status','=',1]]);

              if (userType()->user_type == 2) 
              {
                $formD = $formD->where('fd.irp',Session::get('admin_id'));  
              }
              if (userType()->user_type == 4)
              {
                $formD = $formD->where('fd.irp', userType()->sub_user);
              }
              
              $formD = $formD->select('fd.id as form_id', 'fd.form_d_selected_id as selected_id', 'fd.unique_id as uniqueId', 'fd.name_in_block_letter as name', 'fd.form_type as ft', 'fd.email as email','fd.created_at', 'user.mobile as mobile', 'fA.unique_id as fA_unique_id')
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
              ->leftJoin('form_a_mdls as fA', 'fA.id', '=', 'fca.formA')
              ->where([['fca.company','=',$comp],['fca.submitted','=',1], ['fca.status','=',1]]);

              if (userType()->user_type == 2) 
              {
                $formCA = $formCA->where('fca.irp',Session::get('admin_id'));
              }
              if (userType()->user_type == 4)
              {
              $formCA = $formCA->where('fca.irp', userType()->sub_user);
              }
              
          $formCA = $formCA->select('fca.id as form_id', 'fca.form_ca_selected_id as selected_id', 'fca.unique_id as uniqueId', 'fca.signing_person_name as name', 'fca.form_type as ft', 'fca.fc_email as email','fca.created_at', 'user.mobile as mobile', 'fA.unique_id as fA_unique_id')
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
              ->leftJoin('form_a_mdls as fA', 'fA.id', '=', 'fe.formA')
              ->where([['fe.company','=',$comp],['fe.submitted','=',1], ['fe.status','=',1]]);

              if (userType()->user_type == 2) 
                    {
              $formE = $formE->where('fe.irp',Session::get('admin_id'));
              }
              if (userType()->user_type == 4)
              {
                $formE = $formE->where('fe.irp', userType()->sub_user);
              }
              $formE = $formE->select('fe.id as form_id', 'fe.form_e_selected_id as selected_id', 'fe.unique_id as uniqueId', 'user.name as name', 'fe.form_type as ft', 'user.email as email','fe.created_at', 'user.mobile as mobile', 'fA.unique_id as fA_unique_id')
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
              ->leftJoin('form_a_mdls as fA', 'fA.id', '=', 'ff.formA')
              ->where([['ff.company','=',$comp],['ff.submitted','=',1], ['ff.status','=',1]]);

              if (userType()->user_type == 2)
              {
                $formF = $formF->where('ff.irp',Session::get('admin_id'));
              }
              if (userType()->user_type == 4)
              {
                $formF = $formF->where('ff.irp',userType()->sub_user);
              }
              
              $formF = $formF->select('ff.id as form_id', 'ff.form_f_selected_id as selected_id', 'ff.unique_id as uniqueId', 'ff.signing_person_name as name', 'ff.form_type as ft', 'ff.fc_email as email', 'ff.created_at', 'user.mobile as mobile', 'fA.unique_id as fA_unique_id')
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



    function getCompanyList()
    {
        $check = DB::table('assign_company_mdls')->where('ip_id', Session::get('admin_id'))->where('status',1)->where('deleted',2)->get();
        $check2 = DB::table('company_dtls')->where('user_id', Session::get('admin_id'))->where('status',1)->where('deleted',2)->get();

        $users=[];

         // echo "<pre>";
         // echo print_r($check2);
         // echo "</pre>";
         // die();  

        if (count($check)>0 && count($check2)>0) 
        {
          $data1 = DB::table('company_dtls as com')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','com.user_id')
                    // ->select('com.id as id', 'com.id as company_id', 'com.name', 'com.address', 'com.created_at', 'gen.first_name', 'gen.user_type')
                    ->select('com.id as id', 'com.name')
                    ->where('com.status',1)
                    ->where('com.deleted',2)
                    ->where('com.user_id', Session::get('admin_id'))
                    ->orderBy('com.id', 'desc')
                    ->get()->toArray();


          $data2 = DB::table('assign_company_mdls as asn')
                    ->leftJoin('company_dtls as com', 'com.id','=','asn.company_id')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','asn.created_by_id')
                    // ->select('asn.company_id as id', 'asn.id as asn_id', 'com.name', 'com.address', 'asn.created_time as created_at', 'gen.first_name', 'gen.user_type')
                    ->select('asn.company_id as id', 'com.name')
                    ->where('asn.status',1)
                    ->where('asn.deleted',2)
                    ->orderBy('asn.id', 'desc')
                    ->where('asn.ip_id',Session::get('admin_id'))->get()->toArray();

          $users = array_merge($data1, $data2);

                      
        
         // echo "<pre>";
         // echo print_r($users);
         // echo "</pre>";
         // die();           
        }
        elseif (count($check)>0 && !count($check2)>0) 
        {
          $users = DB::table('assign_company_mdls as asn')
                    ->leftJoin('company_dtls as com', 'com.id','=','asn.company_id')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','asn.ip_id')
                    ->select('asn.id as id', 'asn.id as asn_id', 'com.name', 'com.address', 'asn.created_time as created_at', 'gen.first_name', 'gen.user_type')
                    ->where('asn.status',1)
                    ->where('asn.deleted',2)
                    ->where('asn.ip_id',Session::get('admin_id'))->get()->toArray();

        // echo "<pre>";
        //  echo print_r($users);
        //  echo "</pre>";
        //  die();             
        }
        elseif (!count($check)>0 && count($check2)>0) 
        {
          $users = DB::table('company_dtls as com')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','com.user_id')
                    ->select('com.id as id', 'com.id as company_id', 'com.name', 'com.address', 'com.created_at', 'gen.first_name', 'gen.user_type')
                    ->where('com.status',1)
                    ->where('com.deleted',2)
                    ->where('com.user_id',Session::get('admin_id'));
                   
              $users = $users->orderBy('id','desc')
                    ->get()->toArray();

         //   echo "<pre>";
         // echo print_r($users);
         // echo "</pre>";
         // die();           
        }
        return $users;
    }


    function getCompanyDetails()
    {
      $companies = getCompanyList();

      $uniqueUsers = [];
    $updated_uniqueUsers = [];
      foreach ((array)$companies as $user) {
          $userId = $user->id;
          if (!isset($uniqueUsers[$userId])) {
              $uniqueUsers[$userId] = $user;
          }
      }

    if (count($uniqueUsers)>0)
    {
      $i=0;
      foreach ($uniqueUsers as $value) {
          $updated_uniqueUsers[$i] = $value;

      $i++;
      }
    }

    return $updated_uniqueUsers; 

    }


  function cirpTeam()
  {
    $check = DB::table('case_assign_mdls as ca')
                ->leftJoin('general_info_mdls as gn', 'gn.id', '=', 'ca.assigned_to')
                ->leftJoin('company_dtls as cm', 'cm.id', '=', 'ca.company_id')
                ->where([['ca.assigned_to', '=', Session::get('admin_id')], ['ca.status', '=', 1], ['ca.deleted_by', '=', '']])
                ->where([['gn.status', '=', 1], ['gn.flag', '=', 2], ['gn.deleted_by', '=', ''], ['cm.status', '=', 1], ['cm.deleted', '=', 2]])
                ->select('ca.id as caId', 'cm.id as cmId', 'cm.name')
                ->get();
  
       // echo "<pre>";
       //   echo print_r($check);
       //   echo "</pre>";
       //   die();               


    return $check;            

  }    

function cirpRight()
{
  $check =   DB::table('case_assign_mdls as ca')
                ->leftJoin('general_info_mdls as gn', 'gn.id', '=', 'ca.assigned_to')
                ->leftJoin('company_dtls as cm', 'cm.id', '=', 'ca.company_id')
                ->where([['ca.assigned_to', '=', Session::get('admin_id')], ['ca.status', '=', 1], ['ca.deleted_by', '=', ''], ['ca.company_id', '=', Session::get('team_right')]])
                ->where([['gn.status', '=', 1], ['gn.flag', '=', 2], ['gn.deleted_by', '=', ''], ['cm.status', '=', 1], ['cm.deleted', '=', 2]])
                ->select('ca.cases')
                ->first();


     if ($check) {
        $user_rights = explode(', ', $check->cases);
    } else {
       $user_rights = [];
       Session::forget('team_right');            

    }        
    return $user_rights;




}





?>