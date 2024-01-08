<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\generalInfoMdl;
use App\Models\formModificationMdl;
use App\Models\userMdl;
use App\Models\companyDtl;
use App\Services\UserFormNotification;
use App\Traits\MethodsTrait;
use Config;
use Session;
use DB;
use Illuminate\Support\Facades\Hash;
use Mail;
use App\Mail\formNotification;

//
class generalInfoCntrlr extends Controller
{
    use MethodsTrait;

	function generalInfo(Request $req)
	{

        $users = generalInfoMdl::all()->sortByDesc('id');
        $jsl =  bPath().'/'.Config::get('site.general');
        
        $cat = generalInfoMdl::find(Session::get('admin_id'));
        $count = DB::table('form_a_mdls')->where('user_id', '=', Session::get('admin_id'))->count();
        
        if ($cat) 
        {
          $a_vl =  Config::get('site.ipGeneral');
        	return view('admin.edit_generalInfo',compact("users","jsl","cat","a_vl", "count"));
        }
        else
        {
       // dd($jsl);	
          $a_vl =  Config::get('site.adminGeneral');
        return view('admin.generalInfo',compact("users","jsl","a_vl"));
   		}
	}


  function changePassword(Request $req)
  {

        $users = generalInfoMdl::all()->sortByDesc('id');
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.adminChangePassword');
        $cat = generalInfoMdl::find(Session::get('admin_id'),['username', 'password']);
        if ($cat) 
        {
          return view('admin.edit_changePassword',compact("users","jsl","cat","a_vl"));
        }
        else
        {
      
        return view('admin.changePassword',compact("users","jsl","a_vl"));
      }
  }


	function saveData(Request $req)
    {
        $response = array();
        $cat = new generalInfoMdl;
        $cat->company_name = $req->comp_name ?? "";
        $cat->address = $req->address ?? "";
        $cat->email = $req->email ?? "";
        $cat->mobile = $req->mobile ?? "";

        $cat->username = $req->username ?? ""; 
        $cat->password  = $req->password ?? "";
        $cat->pwd = Hash::make($req->password) ?? "";
        $cat->token ="";
        $cat->gender ="";
        $cat->user_type =1;
        $cat->rem_addr = $req->ip();
        $cat->status= "1";
        $cat->profile_pic = "";
        $cat->availability ="";
        $cat->sub_user = "";
        $cat->rights = "";

        $cat->logo = "";
        $cat->banners = "";
        $cat->link = "";

        $cat->created_at = date('Y-m-d H:i:s');
        $cat->updated_at = "";
        $cat->deleted_by = "";
        $cat->deleted_time = "";


   //      if ($req->file('file')) 
   //      {

   //      $id=uniqid().time();
   //      $fileName = $id.".". $req->file('file')->getClientOriginalExtension();
         
   //      $req->file("file")->move("public/access/media/general",$fileName);  
   //      $cat->logo = $fileName;
   //  	}
   //  	else
   //  	{
   //  		$cat->logo = "";
   //  	}
   //  	$link = time();
 		// $cat->link = $link;
 		
   //  	if($req->hasfile('banners'))
   //       {
   //       	$dir = publicP()."/access/media/general/".$link;
   //        if (!is_dir($dir)) 
   //        {
   //        mkdir($dir, 0777, TRUE);		
         
   //          foreach($req->file('banners') as $image)
   //          {
   //              $id=time().uniqid(rand());
   //              $name=$id.'.'.$image->getClientOriginalExtension();
   //              $image->move($dir, $name);  
   //              $banners_name[] = $name;
   //          }
   //         $cat->banners = json_encode($banners_name);
   //        }
   //    }
   //        else
   //        {
   //      	$cat->banners = "";  	
   //        }


    	
        
        if($cat->save())
        {
            $response['error'] = false;	
            $response['message'] = "Info Added Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Info Not Added. Try Again Later.";
          }
        
        echo json_encode($response);
    }

    function deleteData(Request $req, $id)
    {
        $response = array();
        $cat = generalInfoMdl::find($id); 
        // if(!empty($cat->signature))
        // {
        //     if(file_exists(publicP() . '/access/media/sabredge/'.$cat->signature))
        //     {
        //         unlink(publicP() . '/access/media/sabredge/'.$cat->signature);    
        //     }
        // }  
        if ($cat) 
          {
            $cat->flag = 1;
            $cat->rem_addr = $req->ip();
            $cat->updated_at = date('Y-m-d H:i:s');
            $cat->deleted_by = Session::get('admin_id');
            $cat->deleted_time = date('Y-m-d H:i:s');

            if ($cat->save()) 
            {
              $response['error'] = false;
              $response['message'] = "Successfully Deleted";
            }
            else
            {
              $response['error'] = true;
              $response['message'] = "Not Deleted. Try Again Later.";   
            }
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Data not available.";
          }
        
        echo json_encode($response);
    }

function updateData(Request $req, $id)
    {
        $response = array();
        $cat = generalInfoMdl::find($id);
        $cat->first_name = $req->first_name ?? "";
        
        
        $cat->ibbi_reg_no = $req->ibbi_reg_no ?? "";
        $cat->date = $req->date ?? "";
        
        $cat->member_of_ipa = $req->member_of_ipa ?? "";
        $cat->member_of_ipe = $req->member_of_ipe ?? "";
        $cat->have_valid_afa = $req->have_valid_afa ?? "";
        $cat->afa_certificate_no = $req->afa_certificate_no ?? "";
        $cat->afa_valid_upto = $req->afa_valid_upto ?? "";
        $cat->total_cpe_earned = $req->total_cpe_earned ?? "";
        
    
    
        $cat->address = $req->address ?? "";
        $cat->email = $req->email ?? "";
        $cat->mobile = $req->mobile ?? "";
        
       // $cat->username = $cat->username;//$req->username ?? ""; 
        // $cat->password  = $req->password ?? "";
        // $cat->pwd = Hash::make($req->password) ?? "";
        
        // $cat->user_type = $cat->user_type;
        $cat->rem_addr = $req->ip();
        
        $cat->updated_at = date('Y-m-d H:i:s');
       
        if ($req->file('file')) 
        {

          if(!empty($cat->profile_pic))
          {
              if(file_exists(publicP() . '/access/media/general/'.$cat->profile_pic))
              {
                  unlink(publicP() . '/access/media/general/'.$cat->profile_pic);    
              }
          }

        $id=uniqid().time();
        $fileName = $id.".". $req->file('file')->getClientOriginalExtension();
        //dd($fileName);   
        $req->file("file")->move("public/access/media/general",$fileName);  
        $cat->profile_pic = $fileName;
      }
      else
      {
        $cat->profile_pic = $cat->profile_pic;
      }
       
        
        if($cat->save())
        {
            $response['error'] = false;
            $response['message'] = "Info Updated Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Info Not Updated. Try Again Later.";
          }
        
        echo json_encode($response);
    }


function adminChangePassword(Request $req)
    {
        $response = array();


        $check = generalInfoMdl::where([['id','!=', Session::get('admin_id')], ['username', '=', $req->username]])->get();

        if (count($check)>0) 
        {
            $response['error'] = true;
            $response['message'] = "Username already exists. Please try another.";
            echo json_encode($response);
            die();
        }
        else
        {

        $cat = generalInfoMdl::find(Session::get('admin_id'));
        
        $cat->username = $req->username ?? $cat->username;; 
        $cat->password  = $req->password ?? "";
        $cat->pwd = Hash::make($req->password) ?? "";
        $cat->rem_addr = $req->ip();
        $cat->updated_at = date('Y-m-d H:i:s');
        
        if($cat->save())
        {
            $response['error'] = false;
            $response['message'] = "Info Updated Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Info Not Updated. Try Again Later.";
          }
       }   
        
        echo json_encode($response);
    }


function removeBanner(Request $req, $id, $banner)
{
	$response = array();
	$cat = generalInfoMdl::find($id);

	$val =  json_decode($cat->banners);

	if (($key = array_search($banner, $val)) !== false) {
    unset($val[$key]);
	
    $cat->banners = json_encode($val);

  if(file_exists(publicP() . '/access/media/general/'.$cat->link.'/'.$banner))
            {
                unlink(publicP() . '/access/media/general/'.$cat->link.'/'.$banner);    
            }
  
  }

	if($cat->save())
        {
            $response['error'] = false;
            $response['message'] = "Banner Removed Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Banner Not Removed. Try Again Later.";
          }

	echo json_encode($response);
}


	function login()
	{
      $url = \Request::segment(1);
      // dd($url);die();

	    $jsl = bPath().'/'.Config::get('site.login');
      return view('admin.login',compact('jsl', 'url'));
	}
  
  function signUp()
  {
    $url = \Request::segment(1);
     
     if ($url == 'ip') 
     {
       $jsl = bPath().'/'.Config::get('site.login');
       return view('admin.signUp',compact('jsl', 'url'));
     }
     else
     {
        return redirect('/');
     }    
  }

  function signUpIp(Request $req)
  {
      $response = array();
        
        $check = generalInfoMdl::where('username', $req->username)->first();
        $check2 = generalInfoMdl::where('email', $req->email)->first();

        if (!$req->name) 
        {
            $response['error'] = true; 
            $response['message'] = "Please enter name";
            echo json_encode($response); die();
        }

        if (!$req->email) 
        {
            $response['error'] = true; 
            $response['message'] = "Please enter email";
            echo json_encode($response); die();
            
            if ($check2) 
            {
              $response['error'] = true; 
              $response['message'] = "Email already exists. Please login.";
              echo json_encode($response); die();
            }
        }

        if (!$req->address) 
        {
            $response['error'] = true; 
            $response['message'] = "Please enter address";
            echo json_encode($response); die();
        }

        if (!$req->contact) 
        {
            $response['error'] = true; 
            $response['message'] = "Please enter contact";
            echo json_encode($response); die();
        }

        if ($check) 
        {
            $response['error'] = true; 
            $response['message'] = "Username already exists. Please try another.";
            echo json_encode($response); die();
        }


        $cat = new generalInfoMdl;
        $cat->company_name = "";
        
        $cat->first_name = $req->name ?? "";
        $cat->last_name = "";
        $cat->address = $req->address ?? "";
        $cat->email = $req->email ?? "";
        $cat->mobile = $req->contact ?? "";

        $cat->company_id = "";
        $cat->case_type = "";
        

        $cat->username = $req->username ?? ""; 
        $cat->password  = $req->password ?? "";
        $cat->pwd = Hash::make($req->password) ?? "";
        $cat->ibbi_reg_no = "";
        $cat->token ="";
        $cat->gender ="";
        $cat->url = "ip";
        $cat->user_type = 2;
        $cat->authorised_person = '';
        $cat->rem_addr = $req->ip();

        $cat->status= 2;

        $cat->logo = "";
        $cat->availability ="";
        $cat->banners = "";
        $cat->sub_user = "";
        $cat->rights = "";


        $cat->date = "";
        
        $cat->member_of_ipa = "";
        $cat->member_of_ipe = "";
        $cat->have_valid_afa = "";
        $cat->afa_certificate_no = "";
        $cat->afa_valid_upto = "";
        $cat->total_cpe_earned = "";

        $cat->user_id = "";
        $cat->flag = 2;
       // $cat->date = date("Y-m-d");

        $cat->created_at = date('Y-m-d H:i:s');
        $cat->updated_at = "";
        $cat->deleted_by = "";
        $cat->deleted_time = "";

        $cat->profile_pic = "";
      
        $cat->link = "";
    
        
        if($cat->save())
        {

          $result = DB::table("general_info_mdls")->where([['username',$req->username],['status',2],['flag',2],['url','ip']])->limit(1)->first(); 


                  DB::table('general_info_mdls')->where(['id'=>$result->id])->update(['user_id'=>$result->id]);

          Session::put('admin_id',$result->id);   
          Session::put('user_type',$result->user_type);

            $response['error'] = false; 
            $response['message'] = "You are registered Successfully";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "You are not registered. Try Again Later.";
          }
        
        echo json_encode($response);    
  }


  public function logout(Request $request) {
      Session::forget('admin_id');
      
      //Session::flush(); 
      return redirect(admin().'/login');
    }

function loginUser(Request $request)
{
    $response = array();
      
        $username = $request->username;
        $password = $request->password;
        $url = \Request::segment(1);
      
          $result = DB::table("general_info_mdls")->where([['username',$username],['status',1],['flag',2],['url',$url]])->limit(1)->first();        
          if (!$result) 
              {
                $response['error']=true;
                $response['message']="Username does not exist.";
                echo json_encode($response); die();              
              }
      
       

        if(Hash::check($password, $result->pwd))
              {
                  Session::put('admin_id',$result->id);   
                  Session::put('user_type',$result->user_type);
                        
                  $response['error']=false;
                  $response['message']="You have logged-in successfully.".Session::get('admin_id') ;
                
              }
              else
              {

                  $response['error']=true;
                  $response['message']="Password is incorrect. Please try again.";
               
              }
      

        echo json_encode($response);
}


    function index(Request $req)
    {

      $fd = Config::get('site.admin_type');
      $today = date('Y-m-d');
      $a_vl =  Config::get('site.todoValSub');
      $total_rc = 2;//Config::get('site.total_rc');
      $rect = 2;

      if (userType()->user_type==2)
              {
          $users = DB::table('todo_mdls as td')
              ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');
          // $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['td.task_type', '=', 'latest'],['td.end_date', '>=', $today]]);
          $users = $users->where([['td.created_by_id', '=', userType()->id], ['td.deleted_by', '=', ''], ['td.task_type', '=', 'latest'], ['td.status', '!=', 'completed']]);              
          $users =  $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.comapny', 'td.cirp_name', 'td.message', 'td.status', 'td.start_date', 'td.created_at', 'td.updated_at', 'td.end_date', 'td.start_at', 'td.end_at')->orderBy('td.id', 'desc')->paginate();
    
        $companies = DB::table('company_dtls')->select('id','name')->get();  


        $ip_company = DB::table('company_dtls')->where(['user_id'=>Session('admin_id')])->get();
        //  $encorporation_date = $ip_company->start_date;
$timeline_dtls = DB::table('time_line')->where('timeline_day','!=',NULL)->get();

        // echo "<pre>";
        //   print_r($timeline_dtls);
        //   echo "</pre>";
        //   die();

      return view('admin.dashboard', compact("fd", "timeline_dtls","ip_company", "companies", "users", "rect", "total_rc", "a_vl"));
    }
    elseif (userType()->user_type==4)
              {
        //   $users = DB::table('todo_mdls as td')
        //       ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');
          
        //   $users = $users->where([['td.created_by_id', '=', userType()->id], ['td.deleted_by', '=', '']]);              
        //   $users =  $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.comapny', 'td.cirp_name', 'td.message', 'td.status', 'td.start_date', 'td.created_at', 'td.updated_at', 'td.end_date', 'td.start_at', 'td.end_at')->orderBy('td.id', 'desc')->paginate();
    
        // $companies = DB::table('company_dtls')->select('id','name')->get();  

         $users = DB::table('todo_mdls as td')
              ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');
          // $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['td.task_type', '=', 'latest'],['td.end_date', '>=', $today]]);
          $users = $users->where([['td.created_by_id', '=', ip()], ['td.deleted_by', '=', ''], ['td.task_type', '=', 'latest'], ['td.status', '!=', 'completed']]);              
          $users =  $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.comapny', 'td.cirp_name', 'td.message', 'td.status', 'td.start_date', 'td.created_at', 'td.updated_at', 'td.end_date', 'td.start_at', 'td.end_at')->orderBy('td.id', 'desc')->paginate();
    
        $companies = DB::table('company_dtls')->select('id','name')->get();  


        $ip_company = DB::table('company_dtls')->where(['user_id'=>Session('admin_id')])->get();
        //  $encorporation_date = $ip_company->start_date;
      $timeline_dtls = DB::table('time_line')->where('timeline_day','!=',NULL)->get();       



      return view('admin.dashboard', compact("fd", "timeline_dtls","ip_company", "companies", "users", "rect", "total_rc", "a_vl"));
    }
    else
    {
    	return view('admin.dashboard', compact("fd"));
      }
    }

    function sortTodo(Request $request)
    {
      if($request->ajax())
        {

            //$rect = 2;
           // $total_record = 2;//$request->sort ?? '';
            $sort = $request->sort ?? '';
            $today = date('Y-m-d');
            $date2 = strtotime("+7 day");
            $next7 = date('Y-m-d', $date2);
            $first_day_this_month = date('Y-m-01'); 
            $last_day_this_month  = date('Y-m-t');

            //echo $first_day_this_month;die();
            $companies = DB::table('company_dtls')->select('id','name')->get();  
            $users = DB::table('todo_mdls as td')
                        ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');

                if ($sort == 'daily')
                  {
                    $users = $users->where([['td.task_type', '=', 'latest'],['td.end_date', '=', $today]]);
                  }
               if ($sort == 'weekly')
                  {
                    $users = $users->where([['td.task_type', '=', 'latest']]);
                    $users = $users->whereBetween('td.end_date',[$today, $next7]);
                  }
               if ($sort == 'monthly')
                  {
                    $users = $users->where([['td.task_type', '=', 'latest']]);
                    $users = $users->whereBetween('td.end_date',[$first_day_this_month, $last_day_this_month]);
                  }   



                $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', '']]);   
                $users =  $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.comapny', 'td.cirp_name', 'td.message', 'td.status', 'td.start_date', 'td.created_at', 'td.updated_at', 'td.end_date', 'td.start_at', 'td.end_at')->orderBy('td.id', 'desc')->paginate();
              

                // echo "<pre>";
                // echo print_r($users);
                // echo "</pre>";die();
            $output = view('pagination.todoDetailsSub', compact('users', 'companies'));     

             echo $output;

        }

    }


    function sort_Todo(Request $request)
    {
      if($request->ajax())
        {

            $rect = 2;
            $total_record = $request->sort ?? '';
           $sort = $request->sort ?? '';

            $users = DB::table('todo_mdls as td')
                        ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'td.assigned_to');

                    $users =  $users->select('td.id as id', 'gen.first_name as name', 'td.task', 'td.message', 'td.priority', 'td.status', 'td.start_date', 'td.end_date', 'td.created_at', 'td.updated_at', 'td.cirp_name', 'td.comapny');

                if (!empty($status_type))
                  {
                    $users = $users->where('td.status', $status_type);
                  }
                if (!empty($team))
                  {
                    $users = $users->where('td.assigned_to', $team);
                  }
                  if (!empty($task))
                  {
                    $users = $users->where('td.task', $task);
                  } 
                  if (!empty($from) && empty($to))
                  {
                    $users = $users->where('td.start_date', $from);
                  }
                  if (empty($from) && !empty($to))
                  {
                    $users = $users->where('td.end_date', $to);
                  }
                  if (!empty($from) && !empty($to))
                  {
                    $users = $users->whereBetween('td.start_date',[$from, $to]);
                  }

                if ($cid!='') 
                {
                    $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', ''], ['cirp_name', '=', $cid]])->orderBy('td.id', 'desc')->paginate($total_record);
                }
                else
                {  
                $users = $users->where([['td.created_by_id', '=', Session::get('admin_id')], ['td.deleted_by', '=', '']])->orderBy('td.id', 'desc')->paginate($total_record);
            }
    }

  }

    public function assignDetails()
    {
      $user = generalInfoMdl::find(Session::get('admin_id'),['id','first_name','user_type','sub_user']);

      $users = $this->companyDetails();
        //dd($user);die();   

         $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.companyVal');
        
      
   
        return view('admin.assignmentsDetails',compact("users","jsl","a_vl","user")); 
    }


  public function companyDetails($no=null)
  {
    $user = generalInfoMdl::find(Session::get('admin_id'),['id','first_name','user_type','sub_user']);

        if (userType()->user_type==2) 
        {

        $check = DB::table('assign_company_mdls')->where('ip_id', Session::get('admin_id'))->where('deleted',2)->get();
        $check2 = DB::table('company_dtls')->where('user_id', Session::get('admin_id'))->where('deleted',2)->get();
        $users = [];
      

        if (count($check)>0 && count($check2)>0) 
        {
          $data1 = DB::table('company_dtls as com')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','com.user_id')
                    ->select('com.id as id', 'com.id as company_id', 'com.name', 'com.address', 'com.created_at','com.status', 'gen.first_name', 'gen.user_type')
                    ->where('com.deleted',2)
                    ->where('com.user_id',$user->id);
                    if (isset($no)) 
                    {
            $data1 =$data1->where('com.status', $no);
                    }

              $data1    =  $data1->orderBy('com.id', 'desc')
                    ->get()->toArray();


          $data2 = DB::table('assign_company_mdls as asn')
                    ->leftJoin('company_dtls as com', 'com.id','=','asn.company_id')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','asn.created_by_id')
                    ->select('asn.company_id as id', 'asn.id as asn_id', 'com.name', 'com.address','com.status', 'asn.created_time as created_at', 'gen.first_name', 'gen.user_type')
                    ->where('asn.deleted',2);
                      if (isset($no)) 
                    {
            $data2 =$data2->where('com.status', $no);
                    }
                $data2   = $data2->orderBy('asn.id', 'desc')
                    ->where('asn.ip_id',$user->id)->get()->toArray();

          $users = array_merge($data1, $data2);
   
        }
        elseif (count($check)>0 && !count($check2)>0) 
        {
          $users = DB::table('assign_company_mdls as asn')
                    ->leftJoin('company_dtls as com', 'com.id','=','asn.company_id')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','asn.ip_id')
                    ->select('asn.id as id', 'asn.id as asn_id', 'com.name','com.status', 'com.address', 'asn.created_time as created_at', 'gen.first_name', 'gen.user_type')
                    ->where('asn.deleted',2);
                      if (isset($no)) 
                    {
            $users =$users->where('com.status', $no);
                    }
                $users=    $users->where('asn.ip_id',$user->id)->get()->toArray();
          
        }
        elseif (!count($check)>0 && count($check2)>0) 
        {
          $users = DB::table('company_dtls as com')
                    ->leftJoin('general_info_mdls as gen', 'gen.id','=','com.user_id')
                    ->select('com.id as id', 'com.id as company_id', 'com.name','com.status', 'com.address', 'com.created_at', 'gen.first_name', 'gen.user_type')
                    ->where('com.deleted',2)
                    ->where('com.user_id',$user->id);
                   if (isset($no)) 
                    {
            $users =$users->where('com.status', $no);
                    }
              $users = $users->orderBy('id','desc')
                    ->get()->toArray();

          
        }
      
         return $users;  


      }
      
 
  }



    function getNotifications()
    {
      $res['totalNotification'] = formModificationMdl::all()->where('status',2)->count('id');

      $res['formBTotalNotification'] = DB::table('form_modification_mdls')->select('id','user_id','form_type','form_id','request_sent_time')->where([['form_type','!=',''],['status','=',2]])->orderBy('id','desc')->get();

      $res['users'] = DB::table('user_mdls')->select('id','name','email')->get();

      
      $data = view('admin.notifications.notification', compact("res"));

     // echo print_r($res['users']);die();
      echo $data;

    }

    function updateNotifications(Request $req, UserFormNotification $notify)
    {
      $response = array();
     
      $user = DB::table("user_mdls")->select('id','name','email','unique_id','mobile','password','pwd')->where('id',$req->user_id)->first();
      $fm_nm = $req->fm_nm;
      try
         {

          $data2 = [
            'user_id'=>$req->user_id,
            'form_type'=>$req->fm_type,
            'form_id'=>$req->fm_id,
            'approval_status'=>1,
            'form_update_status'=>2
          ];

          $cat2 = $this->getLatestRow(Config::get('site.formModificationMdls'),$data2);

          if ($cat2) 
          {
            $response['error']=false;
            $response['message']="Already approved";
          }
          else
          {

            if ($req->fm_nm=='Form-B') 
            {
              $subject = ucwords($user->name)." - Form B updation request approval.";
              $txt = "<p>Hi ".ucwords($user->name).", your request to update Form-B is approved. Now you can update your form.</p>";     
            }
            elseif ($req->fm_nm=='Form-C') 
            {
              $subject = ucwords($user->name)." - Form C updation request approval.";
              $txt = "<p>Hi ".ucwords($user->name).", your request to update Form-C is approved. Now you can update your form.</p>";     
            }
            elseif ($req->fm_nm=='Form-CA') 
            {
              $subject = ucwords($user->name)." - Form CA updation request approval.";
              $txt = "<p>Hi ".ucwords($user->name).", your request to update Form-CA is approved. Now you can update your form.</p>";     
            }
            elseif ($req->fm_nm=='Form-D') 
            {
              $subject = ucwords($user->name)." - Form D updation request approval.";
              $txt = "<p>Hi ".ucwords($user->name).", your request to update Form-D is approved. Now you can update your form.</p>";     
            }
            elseif ($req->fm_nm=='Form-E') 
            {
              $subject = ucwords($user->name)." - Form E updation request approval.";
              $txt = "<p>Hi ".ucwords($user->name).", your request to update Form-E is approved. Now you can update your form.</p>";     
            }
            elseif ($req->fm_nm=='Form-F') 
            {
              $subject = ucwords($user->name)." - Form F updation request approval.";
              $txt = "<p>Hi ".ucwords($user->name).", your request to update Form-F is approved. Now you can update your form.</p>";     
            }

            
            
            $dt1 = [
                'user_id'=>$req->user_id,
                'form_type'=>$req->fm_type,
                'form_id'=>$req->fm_id,
                'msg' => $txt,
                'subject'=>$subject,
                'approval_status'=>2,
                'mail_to'=>$user->email,
                'approval_person_id'=>Session::get('admin_id'),
                'action'=>'approve'   
            ];        

            $dt2 = [
                    'subject'=>$subject,
                    'email_from'=>Config::get('site.mail_from'),
                    'formType'=>$fm_nm
                ];
                
                  $notify->send($dt1, $dt2);

                  $response['error']=false;
                  $response['message']="Approved";
                }
              }
              catch(\Exception $e)
              {
                  $response['error']=true;
                  $response['message']=$e->getMessage();//"Not approved. Please try again.";
              }
      

        echo json_encode($response);


    }


}
