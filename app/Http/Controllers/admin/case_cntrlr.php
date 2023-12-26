<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\finanicialCreditorFormCMdl;
use App\Models\financialCreditorFormCaMdl;
use App\Models\otherCreditorFormFMdl;
use App\Models\formDMdls;
use App\Models\companyDtl;
use App\Models\formEFileMdl;
use App\Models\operationalCreditorMdl;
use DB;
use App\Traits\MethodsTrait;
use Config;
use Session;


class case_cntrlr extends Controller
{
    use MethodsTrait;

    function case(Request $request , $id)
    {
        Session::put('team_right',$id); 
      $a_vl =  Config::get('site.todoVal');
      $total_rc = Config::get('site.total_rc');
      $monday = date( 'Y-m-d', strtotime( 'monday this week' ) );//date('Y-m-d');
      $sunday = date( 'Y-m-d', strtotime( 'sunday this week' ) );
      $fd = Config::get('site.admin_type');

      if (userType()->user_type==2 || userType()->user_type==1)
              {
      $users = DB::table('todo_mdls as td')
              ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');
          $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['cirp_name', '=', $id], ['td.end_date', '>=', $monday], ['td.end_date', '<=', $sunday]]);

      // $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['cirp_name', '=', $id], ['td.end_date', '>=', $monday], ['td.end_date', '<=', $sunday]]);    

          $users =  $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.priority', 'td.status', 'td.start_date', 'td.end_date', 'td.created_at', 'td.updated_at', 'td.cirp_name', 'td.comapny')->orderBy('td.id', 'desc')->get();
        
        $rect = 2;

       

        $res['status_type'] = DB::table("todo_mdls")->select('status')->distinct()->orderBy('status')->get();
        $res['team'] = DB::table("general_info_mdls as gen")
                      ->leftJoin('todo_mdls as td', 'td.assigned_to', '=', 'gen.id');
            if(userType()->user_type==2 && userType()->sub_user=='')
            {
                $res['team'] = $res['team']->where('gen.sub_user', Session::get('admin_id'))->where('td.cirp_name', $id)->where('td.deleted_at', '');
            }

            $res['team']=    $res['team']->select('gen.first_name', 'gen.id')->where('gen.flag', 2)->distinct()->orderBy('gen.first_name')->get();

        $res['tasks'] =  DB::table("todo_mdls")->select('task');   

            if(userType()->user_type==2 && userType()->sub_user=='')
            {
                $res['tasks'] = $res['tasks']->where('created_by_id', Session::get('admin_id'))->where('cirp_name', $id)->where('deleted_at', '');
            }

            $res['tasks'] = $res['tasks']->distinct()->orderBy('task')->get();

          $data = DB::table('ip_notes')->where(['ip_id'=>Session::get('admin_id'),'company_id'=>$id])->orderBy('id', 'desc')->get();            
          
          $sbrs = DB::table('sabredgerep_mdls as sb')
                      ->leftJoin('general_info_mdls as gn', 'gn.id', '=', 'sb.ip_name')
                      ->leftJoin('company_dtls as cm', 'cm.id', '=', 'sb.company_id')
                      ->leftJoin('employee_details as emp', 'emp.id', '=', 'sb.name');
                  if(userType()->user_type==2 && userType()->sub_user=='')
                  {    
            $sbrs =   $sbrs->where(['sb.ip_name'=>Session::get('admin_id'),'sb.company_id'=>$id]);
                  }
            $sbrs = $sbrs->select('sb.id', 'emp.name', 'emp.email', 'sb.contact')->orderBy('sb.id', 'desc')->first();     


           $emps = DB::table('general_info_mdls');
                  if(userType()->user_type==2 && userType()->sub_user!='')
                  {
              $emps = $emps->where('sub_user',Session::get('admin_id')); 
                  }
                  // ,['company_id','=',$id], ['case_type'=>'irp']])

               if ($id) 
               {
                  $emps = $emps->where('company_id',$id);
                  $emps = $emps->where('case_type','irp');
                  }   

            $emps = $emps->select('id', 'first_name','mobile', 'case_type')->where('flag',2)->orderBy('id', 'desc')->get();      

            $comps = DB::table('company_dtls as com')
                   // ->leftJoin('general_info_mdls as gen', 'gen.id','=','com.user_id')
                    ->select('com.*')
                    ->where('com.deleted',2);
                    
                      $comps = $comps->where('com.user_id',Session::get('admin_id'))->where('com.cirp_id',$id);
                    
              $comps = $comps->orderBy('id','desc')
                    ->get();


        //echo $id;die();    

         // echo "<pre>";
         //  echo print_r($emps);
         //  echo "</pre>";
         //  die();   


        return view('admin.case_dashboard' , compact('id', "users", "a_vl", "data", "sbrs","emps", "comps", "fd"));
    
    }
    
    }


    function cirpAddCompany($id)
    {
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.companyVal');
       // dd($users); 
        return view('admin.add_company',compact("jsl","a_vl","id")); 
    }

    function cirpEditCompany($cid,$id)
    {
        $cat = companyDtl::find($id);
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.companyVal');
       // dd($cat->username); 
        return view('admin.edit_company',compact("jsl","a_vl","cat"));  
    }

    function ipsDetails()
    {
      $sbrs = DB::table('sabredgerep_mdls as sb')
                      ->leftJoin('general_info_mdls as gn', 'gn.id', '=', 'sb.ip_name')
                      ->leftJoin('company_dtls as cm', 'cm.id', '=', 'sb.company_id')
                      ->leftJoin('employee_details as emp', 'emp.id', '=', 'sb.name');
                  if(userType()->user_type==2 && userType()->sub_user=='')
                  {    
            $sbrs =   $sbrs->where(['sb.ip_name'=>Session::get('admin_id')]);
                  }
            $sbrs = $sbrs->select('sb.id', 'emp.name', 'emp.email', 'sb.contact')->orderBy('sb.id', 'desc')->first(); 
            return view('admin.ipsDetails' , compact("sbrs"));
      
    }

    function companyWisefilterTodo(Request $request)
    {
      if($request->ajax())
        {
            $total_record = $request->total_record ?? '';
            $sort_nm = $request->sort_nm ?? '';
            $sort_type = $request->sort_type ?? '';
            $company_id = $request->company_id ?? '';

            $users = DB::table('todo_mdls as td')
              ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');
          $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['cirp_name', '=', $id], ['td.task_type', '=', 'latest'], ['td.status', '!=', 'completed']]);

          $users =  $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.priority', 'td.status', 'td.start_date', 'td.end_date', 'td.created_at', 'td.updated_at', 'td.cirp_name', 'td.comapny')->orderBy('td.id', 'desc')->paginate($total_rc);
        
        $rect = 2;


        $res['status_type'] = DB::table("todo_mdls")->select('status')->distinct()->orderBy('status')->get();
        $res['team'] = DB::table("general_info_mdls as gen")
                      ->leftJoin('todo_mdls as td', 'td.assigned_to', '=', 'gen.id');
            if(userType()->user_type==2 && userType()->sub_user=='')
            {
                $res['team'] = $res['team']->where('gen.sub_user', Session::get('admin_id'))->where('td.cirp_name', $id)->where('td.deleted_at', '');
            }

            $res['team']=    $res['team']->select('gen.first_name', 'gen.id')->where('gen.flag', 2)->distinct()->orderBy('gen.first_name')->get();

        $res['tasks'] =  DB::table("todo_mdls")->select('task');   

            if(userType()->user_type==2 && userType()->sub_user=='')
            {
                $res['tasks'] = $res['tasks']->where('created_by_id', Session::get('admin_id'))->where('cirp_name', $id)->where('deleted_at', '');
            }

            $res['tasks'] = $res['tasks']->distinct()->orderBy('task')->get();


        }
    }


    function companyDetails(Request $request, $id)
    {
      $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.todoVal');
        $companies = DB::table('company_dtls')->select('id','name')->get();

        $total_rc = Config::get('site.total_rc');

      if (userType()->user_type==2)
              {
      $users = DB::table('todo_mdls as td')
              ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');
          $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['td.cirp_name', '=', $id],['td.task_type', '=', 'latest']]);

          $users =  $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.priority', 'td.status', 'td.start_date', 'td.end_date', 'td.created_at', 'td.start_at', 'td.end_at', 'td.updated_at', 'td.cirp_name', 'td.comapny')->orderBy('td.id', 'desc')->paginate($total_rc);
        $rect = 2;


        $res['status_type'] = DB::table("todo_mdls")->select('status')->distinct()->orderBy('status')->get();
        // $res['team'] = DB::table("general_info_mdls")->select('first_name', 'id');

        //     if(userType()->user_type==2 && userType()->sub_user=='')
        //     {
        //         $res['team'] = $res['team']->where('sub_user', Session::get('admin_id'));
        //     }

        //     $res['team']=    $res['team']->where('flag', 2)->distinct()->orderBy('first_name')->get();


        $res['team'] = DB::table("general_info_mdls as gen")
                      ->leftJoin('todo_mdls as td', 'td.assigned_to', '=', 'gen.id');
            if(userType()->user_type==2 && userType()->sub_user=='')
            {
                $res['team'] = $res['team']->where('gen.sub_user', Session::get('admin_id'))->where('td.cirp_name', $id)->where('td.deleted_at', '');
            }

            $res['team']=    $res['team']->select('gen.first_name', 'gen.id')->where('gen.flag', 2)->distinct()->orderBy('gen.first_name')->get();

        $res['tasks'] =  DB::table("todo_mdls")->select('task');   

            if(userType()->user_type==2 && userType()->sub_user=='')
            {
                $res['tasks'] = $res['tasks']->where('created_by_id', Session::get('admin_id'))->where('cirp_name', $id);
            }

            $res['tasks']=    $res['tasks']->distinct()->orderBy('task')->get();



      //echo dd(Session::get('admin_id'));die();
          // echo "<pre>";
          // echo print_r($res['tasks']);
          // echo "</pre>";
          // die();

      return view('admin.todoDetails', compact("jsl", "users", "companies", "a_vl", "res", "rect", "id"));

      }
    }



    function ip_forms(Request $request , $id)
    {
          return view('admin.ip_forms' , compact('id'));
    }
    
    
    function formb_list(Request $request , $id)
    {
        
         $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
        
        DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-B Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
      
        $users = operationalCreditorMdl::where([['submitted','=',1],['status','=',1],['admin_id','=', '']])->orderBy('id','desc')->get();
        
        foreach ($users as $us) 
        {
            DB::table('operational_creditor_mdls')->where([['id','=',$us->id],['form_b_selected_id','=','']])->update(['form_b_selected_id'=>$us->id]);
        }  

        $usrs = DB::table('operational_creditor_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]); 
                    
                    if (userType()->user_type==2) 
                    {
                      if (userType()->sub_user=='') 
                      {
                        $usrs = $usrs->where('fmB.irp', Session::get('admin_id'))->where('company', $id);
                      }
                      elseif (userType()->sub_user!='') 
                      {
                         $usrs = $usrs->where('fmB.irp', userType()->sub_user); 
                      }
                    }
          $usrs = $usrs->select('fmB.claimant_name','fmB.id','fmB.company as company_id','fmB.irp as ip_id','fmB.ar','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','usr.name','usr.email','usr.mobile','usr.unique_id','comp.name as company', 'ip.first_name as ip')
                    ->orderBy('id','desc')
                    ->get();
                  

       return view('admin.formb',compact("usrs","jsl","a_vl"));
       
    }

     function formc_list(Request $request , $id)
    {
        
        //$users = finanicialCreditorFormCMdl::getRData();  
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
        
        DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-C Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);

        $users = finanicialCreditorFormCMdl::where([['submitted','=',1],['status','=',1],['admin_id','=', '']])->orderBy('id','desc')->get();
        
        foreach ($users as $us) 
        {
            DB::table('finanicial_creditor_form_c_mdls')->where([['id','=',$us->id],['form_c_selected_id','=','']])->update(['form_c_selected_id'=>$us->id]);
        }  

        // $userDtls = userMdl::all();
        // $regs = finanicialCreditorFormCMdl::all();

        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

        $usrs = DB::table('finanicial_creditor_form_c_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','formA.company_id')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]); 
                
                if (userType()->user_type==2) 
                    {
                      if (userType()->sub_user=='') 
                      {
                        $usrs = $usrs->where('fmB.irp', Session::get('admin_id'))->where('fmB.company',$id);
                      }
                      elseif (userType()->sub_user!='') 
                      {
                         $usrs = $usrs->where('fmB.irp', userType()->sub_user)->where('company', $id); 
                      }
                    } 
                    
        $usrs = $usrs->select('fmB.id','fmB.formA', 'fmB.signing_person_name','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','fmB.fc_name','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'formA.name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();


       return view('admin.formc',compact("usrs","jsl","a_vl"));
       
    }
    
    
    function formd_list(Request $request , $id)
    {
        
         
        //$users = formDMdls::getRData();  
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
      
        $cat2 = DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-D Update Request']])->first();
        if ($cat2) 
        {
          DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-D Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
        }

        $users = formDMdls::where([['submitted','=',1],['status','=',1],['form_d_selected_id','=','']])->get();
        
        if (count($users)>0) 
        {
        foreach ($users as $us) 
        {
            DB::table('form_d_mdls')->where([['id','=',$us->id],['form_d_selected_id','=','']])->update(['form_d_selected_id'=>$us->id]);
        }
        }  

        // $userDtls = userMdl::all();
        // $regs = formDMdls::all();

        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

        $usrs = DB::table('form_d_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','fmB.company')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'fmB.irp')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]); 
                    if (userType()->user_type==2) 
                    {
                      if (userType()->sub_user=='') 
                      {
                        $usrs = $usrs->where('fmB.irp', Session::get('admin_id'))->where('fmB.company',$id);
                      }
                      elseif (userType()->sub_user!='') 
                      {
                         $usrs = $usrs->where('fmB.irp', userType()->sub_user); 
                      }
                    } 
             $usrs = $usrs->select('fmB.id','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','fmB.name','fmB.operational_creditor_signature','usr.email','usr.mobile','usr.unique_id','fmB.ar','comp.name as company', 'ip.first_name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();

       return view('admin.formd',compact("usrs","jsl","a_vl"));
       
        
    }
    
    
    
    function forme_list(Request $request , $id)
    
    {
        
        //$users = formEFileMdl::getRData();  
         $jsl =  bPath().'/'.Config::get('site.general');
         $a_vl =  Config::get('site.adminGeneral');
      
        $cat2 = DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-E Update Request']])->first();
        if ($cat2) 
        {
          DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-E Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
        }

        $users = formEFileMdl::where([['submitted','=',1],['status','=',1]])->orderBy('id','desc')->get();
        
        foreach ($users as $us) 
        {
            DB::table('form_e_file_mdls')->where([['id','=',$us->id],['form_e_selected_id','=','']])->update(['form_e_selected_id'=>$us->id]);
        }  

        // $userDtls = userMdl::all();
        // $regs = formEFileMdl::all();

        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

        $usrs = DB::table('form_e_file_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','fmB.company')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]);
                     if (userType()->user_type==2) 
                    {
                      if (userType()->sub_user=='') 
                      {
                        $usrs = $usrs->where('fmB.irp', Session::get('admin_id'))->where('fmB.company',$id);
                      }
                      elseif (userType()->sub_user!='') 
                      {
                         $usrs = $usrs->where('fmB.irp', userType()->sub_user); 
                      }
                    }
          $usrs = $usrs->select('fmB.id','fmB.user_id','fmB.form_type','fmB.created_at','fmB.updated_at','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'formA.name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();

       return view('admin.forme',compact("usrs","jsl","a_vl"));
       
        
    
    }
    
    function formf_list(Request $request , $id)
    {
        
             $jsl =  bPath().'/'.Config::get('site.general');
         $a_vl =  Config::get('site.adminGeneral');
         
        
        $cat2 = DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-F Update Request']])->first();
        if ($cat2) 
        {
          DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-F Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
        }

        $users = otherCreditorFormFMdl::where([['submitted','=',1],['status','=',1]])->get();        
        if (count($users)>0) 
        {
        foreach ($users as $us) 
        {
            DB::table('other_creditor_form_f_mdls')->where([['id','=',$us->id],['form_f_selected_id','=','']])->update(['form_f_selected_id'=>$us->id]);
        }
        }  

        // $userDtls = userMdl::all();
        // $regs = otherCreditorFormFMdl::all();
        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

        $usrs = DB::table('other_creditor_form_f_mdls as fmB')
                    ->leftJoin('user_mdls As usr', 'usr.id','=','fmB.user_id')
                    ->leftJoin('form_a_mdls As formA', 'formA.id','=','fmB.formA')
                    ->leftJoin('company_dtls as comp', 'comp.id','=','fmB.company')
                    ->leftJoin('general_info_mdls as ip','ip.id','=', 'formA.user_id')
                    ->where([['fmB.submitted','=',1],['fmB.status','=',1]]);
                    if (userType()->user_type==2) 
                    {
                      if (userType()->sub_user=='') 
                      {
                        $usrs = $usrs->where('fmB.irp', Session::get('admin_id'))->where('fmB.company',$id);
                      }
                      elseif (userType()->sub_user!='') 
                      {
                         $usrs = $usrs->where('fmB.irp', userType()->sub_user); 
                      }
                    }  
                 $usrs = $usrs->select('fmB.id','fmB.user_id', 'fmB.form_f_selected_id', 'fmB.status' ,'fmB.form_type','fmB.created_at','fmB.updated_at','fmB.signing_person_name','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'formA.name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();
                    
                      return view('admin.formf',compact("usrs","jsl","a_vl"));
        
    }
    
    
    
    
    function formca(Request $request , $id)
    {
           //$users = financialCreditorFormCaMdl::getRData();  
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminGeneral');
       
        $cat2 = DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-CA Update Request']])->first();
        if ($cat2) 
        {
          DB::table('form_modification_mdls')->where([['status','=',2],['form_type','=','Form-CA Update Request']])->update(['status'=>1, 'request_seen_time'=>\Carbon\Carbon::now()]);
        }
        

       $users = financialCreditorFormCaMdl::where([['submitted','=',1],['status','=',1],['admin_id','=', '']])->get();
        
        if (count($users)>0) 
        {       
        foreach ($users as $us) 
        {
            DB::table('financial_creditor_form_ca_mdls')->where([['id','=',$us->id],['form_ca_selected_id','=','']])->update(['form_ca_selected_id'=>$us->id]);
        }
        }  

        //$userDtls = userMdl::all();
        //$regs = financialCreditorFormCaMdl::all();

        $gen = DB::table('general_info_mdls')->select('user_type')->where('id', Session::get('admin_id'))->first();

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
                        $usrs = $usrs->where('fmB.irp', Session::get('admin_id'))->where('fmB.company',$id);
                      }
                      elseif (userType()->sub_user!='') 
                      {
                         $usrs = $usrs->where('fmB.irp', userType()->sub_user); 
                      }
                    }  
                  $usrs = $usrs->select('fmB.id','fmB.user_id','fmB.form_type','fmB.created_at','fmB.signing_person_name','fmB.updated_at','usr.name','usr.email','usr.mobile','usr.unique_id','fmB.ar', 'comp.name as company', 'ip.first_name as ip')
                    ->orderBy('fmB.id','desc')
                    ->get();
                    
                    return view('admin.formca',compact("usrs","jsl","a_vl"));
        
    }


    function reportPdf($id) 
    {
      return view('admin.resports' , compact('id'));
    }
    
    function formReport($id)
    {
      $company = DB::table('form_a_mdls as fmA')->where([['fmA.status','=',1],['fmA.deleted','=',2]])
          ->leftJoin('company_dtls as com', 'com.id','=', 'fmA.company_id');
            if (userType()->user_type==2)
            {
              $company = $company->where('fmA.user_id',userType()->id)->where('fmA.company_id',$id);
            }
    $company =  $company->groupBy('fmA.company_id', 'com.name')
          ->orderBy('com.id', 'desc')
          ->pluck('com.name', 'fmA.company_id as id');


  //  dd($company);die();     
    
    $jsl =  bPath().'/'.Config::get('site.general');
  //  dd(userType()->id);die();
    
    return view('admin.reportDetails', compact("company", "jsl"));
    }

    function formGenerateReport($id)
    {
      $company = DB::table('form_a_mdls as fmA')->where([['fmA.status','=',1],['fmA.deleted','=',2]])
          ->leftJoin('company_dtls as com', 'com.id','=', 'fmA.company_id');
            if (userType()->user_type==2)
            {
              $company = $company->where('fmA.user_id',userType()->id)->where('fmA.company_id',$id);
            }
    $company =  $company->groupBy('fmA.company_id', 'com.name')
          ->orderBy('com.id', 'desc')
          ->pluck('com.name', 'fmA.company_id as id');

    
        $jsl =  bPath().'/'.Config::get('site.general');
        //dd(userType()->id);die();
        return view('admin.formreportgenerate', compact("company", "jsl"));
    }


    function formAnnexureReport($id)
    {
      $company = DB::table('form_a_mdls as fmA')->where([['fmA.status','=',1],['fmA.deleted','=',2]])
          ->leftJoin('company_dtls as com', 'com.id','=', 'fmA.company_id');
            if (userType()->user_type==2)
            {
              $company = $company->where('fmA.user_id',userType()->id)->where('fmA.company_id',$id);
            }
      $company =  $company->groupBy('fmA.company_id', 'com.name')
          ->orderBy('com.id', 'desc')
          ->pluck('com.name', 'fmA.company_id as id');

  
    $jsl =  bPath().'/'.Config::get('site.general');
    
    //dd($company);die();

    return view('admin.formAnnexureReport', compact("company", "jsl"));
    }

    
    function coc_meeting_pdf(Request $request , $id)
    {
      $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.reportPdf');
        $data = DB::table('coc_meeting_pdf')->where(['ip_id'=>session('admin_id'),'company_id'=>$id, 'deleted_by'=>''])->get();
        //dd($data);die();

        return view('admin.coc_meeting_pdf' , compact('data','id', 'jsl', 'a_vl')); 
    }
    
    function submitCoc(Request $request)
    {

      $response = array();  

      if ($request->file('dcmt')) 
        {

        $id=uniqid().time();
        $fileName = $id.".". $request->file('dcmt')->getClientOriginalExtension();   
        $request->file("dcmt")->move("public/access/media/company/coc",$fileName);  
        $file = $fileName;
      }
      else
      {
        $file = "";
      }

          
      $data = [
                'pdf_name' =>$request->name,
                
                
                'type'=>$request->type,
                'coc_meeting_number'=>$request->coc_meeting_nmbr,
                'coc_meeting_date'=>$request->date_of_coc,
                'pdf' => $file,
                'company_id'=>$request->comp_id,
                'ip_id'=>session('admin_id'),
                'rem_addr'=> $request->ip(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => "",
                'deleted_at' =>"",
                'created_by'  => Session::get('admin_id'),
                'updated_by' => "",
                'deleted_by' =>""
                

      ];

      try
      {
        $this->insertData('coc_meeting_pdf' , $data); 
        $response['error'] = false;
        $response['message'] = "Data saved successfully.";
      
      }
      catch(\Exception $e)     
        {
            $response['error'] = true;
            $response['message'] = "Data not saved.";//$e->getMessage();
        }   
        
        echo json_encode($response);


  }
    
  function editCoc(Request $req, $id)
  {
      $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.reportPdf');
        $cat = DB::table('coc_meeting_pdf')->where('id', $id)->first();
        return view('admin.editCoc' , compact('cat','id', 'jsl', 'a_vl')); 
  }  
    

  function updateCoc(Request $request, $id)
  {
      $response = array();  

      $cat = $this->getRow('coc_meeting_pdf', ['id'=>$id]);


      if ($request->file('dcmt')) 
        {

          if(!empty($cat->pdf))
          {
              if(file_exists(publicP() . '/access/media/company/coc/'.$cat->pdf))
              {
                  unlink(publicP() . '/access/media/company/coc/'.$cat->pdf);    
              }
          }


        $id1=uniqid().time();
        $fileName = $id1.".". $request->file('dcmt')->getClientOriginalExtension();   
        $request->file("dcmt")->move("public/access/media/company/coc",$fileName);  
        $file = $fileName;
      }
      else
      {
        $file = $cat->pdf;
      }
          
      $data = [
                'pdf_name' =>$request->name,
                'type'=>$request->type,
                'coc_meeting_number'=>$request->coc_meeting_nmbr,
                'coc_meeting_date'=>$request->date_of_coc,
                'pdf' => $file,
                'rem_addr'=> $request->ip(),
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by'  => Session::get('admin_id')
      ];

      try
      {
      
        $this->updateData('coc_meeting_pdf' , $data, ['id'=>$id]); 
        $response['error'] = false;
        $response['message'] = "Data Updated successfully.";
      
      }
      catch(\Exception $e)     
        {
            $response['error'] = true;
            $response['message'] = $e->getMessage();//$e->getMessage();
        }   
        
        echo json_encode($response);
  }  

  function deleteCoc(Request $request , $id)
    {

      $response = array();
       
      try
      {
        $data = [
            'rem_addr' => $request->ip(),
            'deleted_by' => Session::get('admin_id'),
            'deleted_at' => date('Y-m-d H:i:s')
          ];

        $this->updateData('coc_meeting_pdf' , $data, ['id'=>$id]); 
        $response['error'] = false;
        $response['message'] = "Successfully Deleted";
      
      }
      catch(\Exception $e)     
        {
            $response['error'] = true;
            $response['message'] = $e->getMessage();//"Not Deleted. Try Again Later.";
        }   
        
        echo json_encode($response);    
    }
    
    
    function ncltf(Request $request , $id=null)
    {
          
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.reportPdf');
        // $data = DB::table('nclt_pdf_by_ip')->where(['ip_id'=>session('admin_id'),'company_id'=>$id, 'deleted_by'=>''])->get();
        $data = DB::table('nclt_pdf_by_ip')->where(['deleted_by'=>''])->get();
        return view('admin.report_pdf' , compact('data','id', 'jsl', 'a_vl'));  
    }
    
    function submit_nclt(Request $request)
    {

      $response = array();  


      if ($request->file('dcmt')) 
        {

        $id=uniqid().time();
        $fileName = $id.".". $request->file('dcmt')->getClientOriginalExtension();   
        $request->file("dcmt")->move("public/nclt_pdf",$fileName);  
        $file = $fileName;
      }
      else
      {
        $file = "";
      }

          
      $data = [
                'pdf_name' =>$request->name,
                'pdf' => $file,
                'company_id'=>$request->comp_id ?? '',
                'ip_id'=>session('admin_id'),
                'rem_addr'=> $request->ip(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => "",
                'deleted_at' =>"",
                'created_by'  => Session::get('admin_id'),
                'updated_by' => "",
                'deleted_by' =>""
                

      ];

      try
      {
        $this->insertData('nclt_pdf_by_ip' , $data); 
        $response['error'] = false;
        $response['message'] = "Data saved successfully.";
      
      }
      catch(\Exception $e)     
        {
            $response['error'] = true;
            $response['message'] = "Data not saved.";//$e->getMessage();
        }   
        
        echo json_encode($response);


  }
    
  function editNcltf(Request $req, $id)
  {
      $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.reportPdf');
        $cat = DB::table('nclt_pdf_by_ip')->where('id', $id)->first();
 
        return view('admin.editNclt' , compact('cat','id', 'jsl', 'a_vl')); 
  }  
    

  function updateNclt(Request $request, $id)
  {
      $response = array();  

      $cat = $this->getRow('nclt_pdf_by_ip', ['id'=>$id]);


      if ($request->file('dcmt')) 
        {

          if(!empty($cat->pdf))
          {
              if(file_exists(publicP() . '/nclt_pdf/'.$cat->pdf))
              {
                  unlink(publicP() . '/nclt_pdf/'.$cat->pdf);    
              }
          }


         $id1=uniqid().time();
        $fileName = $id1.".". $request->file('dcmt')->getClientOriginalExtension();   
        $request->file("dcmt")->move("public/nclt_pdf",$fileName);  
        $file = $fileName;
      }
      else
      {
        $file = $cat->pdf;
      }
          
      $data = [
                'pdf_name' =>$request->name,
                'pdf' => $file,
                'rem_addr'=> $request->ip(),
                'updated_at' => date('Y-m-d H:i:s'),
                'for_against'=>$request->for_against,
                'type'=>$request->type,
                'updated_by'  => Session::get('admin_id')
      ];

      try
      {
      
        $this->updateData('nclt_pdf_by_ip' , $data, ['id'=>$id]); 
        $response['error'] = false;
        $response['message'] = "Data Updated successfully.";
      
      }
      catch(\Exception $e)     
        {
            $response['error'] = true;
            $response['message'] = "Data not updated.";//$e->getMessage();
        }   
        
        echo json_encode($response);
  }  

  function delete_report_pdf(Request $request , $id)
    {

      $response = array();
       
      try
      {
        $data = [
            'rem_addr' => $request->ip(),
            'deleted_by' => Session::get('admin_id'),
            'deleted_at' => date('Y-m-d H:i:s')
          ];

        $this->updateData('nclt_pdf_by_ip' , $data, ['id'=>$id]); 
        $response['error'] = false;
        $response['message'] = "Successfully Deleted";
      
      }
      catch(\Exception $e)     
        {
            $response['error'] = true;
            $response['message'] ="Not Deleted. Try Again Later.";
        }   
        
        echo json_encode($response);    
    }

    
    function notes(Request $request , $id)
    {
        
        
          $data = DB::table('ip_notes')->where(['ip_id'=>Session::get('admin_id'),'company_id'=>$id])->get();
        
        
        return view('admin.ip_notes' , compact('data','id'));
    }
    
     function edit_notes(Request $request , $id)
    {

        $data = DB::table('ip_notes')->where(['id'=>$id])->first();
      
        return view('admin.edit_notes' , compact('data','id'));
    }
    
    
    
    function delete_notes(Request $request , $id)
    {
       // echo $id;
      DB::table('ip_notes')->where(['id'=>$id])->delete();  
       $request->session()->flash('success', 'Data Deleted successfully');
         return back();     
      
      
    }
    
    

    
    
    
    
    
        function delete_coc_pdf(Request $request , $id)
    {
       // echo $id;
      DB::table('coc_meeting_pdf')->where(['id'=>$id])->delete();  
       $request->session()->flash('success', 'Data Deleted successfully');
         return back();     
      
      
    }
    
    
        
    function delete_nclt_pdf(Request $request , $id)
    {
       // echo $id;
      DB::table('nclt_pdf_by_ip')->where(['id'=>$id])->delete();  
       $request->session()->flash('success', 'Data Deleted successfully');
         return back();     
      
      
    }
    
    



function submit_notes(Request $request)
{
    echo $request->title;
    echo $request->dscptn;
    echo $request->comp_id;
    
    DB::table('ip_notes')->insert([
        'title' =>$request->title,
          'description' => $request->dscptn,
          'ip_id'=>session('admin_id'),
          'company_id'=>$request->comp_id,
          'date'=>date('Y-m-d')
    ]);
$request->session()->flash('success', 'Data saved successfully');
       
return redirect()->back();
    
    
}

function submit_edit_notes(Request $request)
{
 
    DB::table('ip_notes')->where(['id'=>$request->nots_id])->update([
        'title' =>$request->title,
          'description' => $request->dscptn,
          'ip_id'=>session('admin_id'),
         
    ]);
$request->session()->flash('success', 'Data Updated successfully');
       
return redirect()->back();
    
    
}




 function submit_coc_pdf(Request $request)
    {
if ($request->hasFile('dcmt')) {
$file = $request->file('dcmt');
        
$filename = time().'.'.$file->getClientOriginalName();
$file_path = $file->move(public_path('coc_pdf/'),$filename);
    
DB::table('coc_meeting_pdf')->insert([
        'pdf_name' =>$request->pdf_neme,
          'pdf' => $filename,
          'ip_id'=>session('admin_id'),
          'company_id'=>$request->comp_id,
          'date'=>date('Y-m-d')
    ]);
$request->session()->flash('success', 'Data saved successfully');
       
return redirect()->back();
}
else
{
            
}
}



function add_nclt(Request  $req , $id)
{
    return view('admin.nclt_pdf',compact('id'));
}


 function submit_nclt_pdf(Request $request)
    {
if ($request->hasFile('dcmt')) {
$file = $request->file('dcmt');
        
$filename = time().'.'.$file->getClientOriginalName();
$file_path = $file->move(public_path('nclt_pdf/'),$filename);
    
DB::table('nclt_pdf_by_ip')->insert([
    
        'for_against' =>$request->for_against,
        'type' =>$request->type,
        'pdf_name' =>$request->pdf_neme,
          'pdf' => $filename,
          'ip_id'=>session('admin_id'),
          'company_id'=>$request->comp_id,
          'rem_addr'=>$request->ip(),
          'created_at'=>date('Y-m-d h:i:s'),
          'updated_at'=>date('Y-m-d h:i:s'),
          'deleted_at'=>'',
          'created_by'=>session('admin_id'),
          'updated_by'=>'',
          'deleted_by'=>''
    ]);
$request->session()->flash('success', 'Data saved successfully');
       
return redirect()->back();
}
else
{
            
}
}
    
}