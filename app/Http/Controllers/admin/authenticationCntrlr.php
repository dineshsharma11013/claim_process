<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\authenticationMdl;
use App\Models\userMdl;
use App\Models\companyDtl;
use App\Models\userFormSubmissionAuthMdl;
use App\Traits\MethodsTrait;
use Config;
use Session;
use DB;

class authenticationCntrlr extends Controller
{
    use MethodsTrait;

    function index(Request $req)
    {
       
       
        $cat = authenticationMdl::where('user_id', Session::get('admin_id'))->orderBy('id', 'desc')->first();
       // dd($cat);die();
        $users = userMdl::where([['status','=',1],['auth_check','=',1]])->pluck('name','id');
        $companies = companyDtl::where([['status','=',1],['deleted','=',2]]);
                       if (userType()->user_type==2)
                        {
                            $companies = $companies->where('user_id',userType()->id);
                        }
                 $companies = $companies->pluck('name','id');
          
        $details =  DB::table('user_form_submission_auth_mdls as ah') 
                    ->leftJoin('company_dtls as comp', 'comp.id','=','ah.company_id')
                    ->select('ah.*', 'comp.name');
                    if (userType()->user_type==2)
                        {
                          $details = $details->where('comp.user_id',userType()->id);
                        }
                $details =    $details->orderBy('id','desc')
                    ->get();
        $forms = Config::get('site.formNames');            
                    
        $jsl = bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.authenticate');
        $u_vl =  Config::get('site.UserFormSubmission');
       // dd($companies);die();
        return view('admin.authenticate',compact("cat","jsl","a_vl","users","u_vl","companies", "details", "forms"));
    }

    function authDetails()
    {
      $cat = DB::table("authentication_mdls as auth")
                  ->leftJoin('general_info_mdls as gen', 'gen.id', '=', 'auth.user_id')
                  ->select('auth.id', 'auth.type', 'auth.created_at', 'gen.first_name', 'gen.last_name', 'gen.email')
                  ->orderBy('id', 'desc')
                  ->get();
      //dd($cat);die();

      return view('admin.authDetails', compact("cat"));
    }


    function saveData(Request $req, $id=Null)
    {
        $response = array();
        
        $cat = new authenticationMdl;
        
        
        // if (userType()->user_type==1) 
        // {
        //   $type = $req->type ?? "";
        // }
        // else
        // {
          if ($req->type == "") {
            $response['error'] = true;
            $response['message'] = "Please select type";
            echo json_encode($response);
            die();
          }
        //   else
        //   {
        //     $type = $req->type;   
        //   }
        // }

        $cat->user_id = Session::get('admin_id');
        $cat->type = $req->type;
        $cat->status = 'yes';
        $cat->rem_addr = $req->ip();
        $cat->date = date('Y-m-d');
        
        if($cat->save())
        {
            $response['error'] = false;
            $response['message'] = "Data Saved Successfully.";
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Data Not Saved. Try Again Later.";
          }
        
        echo json_encode($response);
    }


    function getSelectedUserFormAuth($id)
    {
        $response = array();
   
        $cat = DB::table("user_form_submission_auth_mdls")->where('company_id',$id)->first();
        if ($cat) 
        {
            if ($cat->forms!='') 
            {
                $formNm = explode(', ', $cat->forms);
        
                $dtl = view('admin.forms.select', compact("formNm"));
                echo $dtl;
            }
            else
            {
                $dtl = view('admin.forms.select_2');
                echo $dtl;       
            }
        }
        else
        {
            $dtl = view('admin.forms.select_2');
            echo $dtl;
        }
     

    }



    function userFormAuth(Request $req)
    {
        $response = array();
         
        $forms = $req->form ? implode(', ', $req->form) : '';

        //    echo print_r($forms);die();

        $cat = DB::table("user_form_submission_auth_mdls")->where('company_id',$req->company)->first();
        
        $data = [
            'company_id' => $req->company ?? '',
            'forms' => $forms,
            'type' => $req->u_type ?? '',
            'status' => '',
            'rem_addr' => $req->ip(),
            'date' => date('Y-m-d'),
            'created_at'=>\Carbon\Carbon::now(),
            'updated_at'=>''
        ];

        $data2 = [
            'forms' => $forms,
            'type' => $req->u_type ?? '',
            'rem_addr' => $req->ip(),
            'updated_at'=>\Carbon\Carbon::now()
        ];

    //    echo print_r($cat);die();

        if (!$cat) 
        {
            $check = $this->insertData('user_form_submission_auth_mdls',$data);

            if($check)
            {
                $response['error'] = false;
                $response['message'] = "Data Saved Successfully.";
              }
              else
              {
                $response['error'] = true;
                $response['message'] = "Data Not Saved. Try Again Later.";
              }    
        }
        else
        {
            $where = [
                'company_id'=>$req->company
            ];

           $check = $this->updateData('user_form_submission_auth_mdls', $data2, $where);  

            if($check)
            {
                $response['error'] = false;
                $response['message'] = "Data Saved Successfully.";
              }
              else
              {
                $response['error'] = true;
                $response['message'] = "Data Not Saved. Try Again Later.";
              }

        }
        
        
        
        echo json_encode($response);
    }

    function deleteSelectedUsersFormAuth($ids)
    {
      $response = array();
      
      $query = DB::table("user_form_submission_auth_mdls")->whereIn('id',explode(",",$ids))->chunkById(10, function($users){
        foreach ($users as $user) 
        {
          DB::table("user_form_submission_auth_mdls")->whereIn('id',explode(",",$user->id))->delete();
        }
      });  
       if ($query) 
      {
          $response['error'] = false;
          $response['message'] = "Successfully Deleted";              
      }
      else
      {
        $response['error'] = true;
        $response['message'] = "Not Deleted. Try Again Later.";
      }
      return json_encode($response);    
    }


    function updateSelectedUserFormAuth(Request $req, $st,$ids)
    {
      $response = array();
      
     // echo $st." ".$ids;

      $query = DB::table("user_form_submission_auth_mdls")->whereIn('id',explode(",",$ids))->update(['type' => $st, 'updated_at' => date('Y-m-d H:i:s'), 'rem_addr' => $req->ip()]);

      if ($query) 
      {
          $response['error'] = false;
          $response['message'] = "Successfully Updated";              
      }
      else
      {
        $response['error'] = true;
        $response['message'] = "Not Updated. Try Again Later.";
      }
      return json_encode($response);    
    }


    function deleteUserFormAuth($id)
    {
        $response = array();
        $cat = userFormSubmissionAuthMdl::find($id); 

        if ($cat) 
          {

            if ($cat->delete()) 
            {
              $response['error'] = false;
              $response['message'] = "Successfully Deleted";
            }
            else
            {
              $response['error'] = true;
              $response['message'] = "Data not deleted. Please refresh page.";
            }
            
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Data not available. Please refresh page.";
          }
        
        echo json_encode($response);
    }


}
