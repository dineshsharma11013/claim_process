<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\formAMdl;
use App\Models\companyDtl;
use App\Models\generalInfoMdl;
use App\Models\arMdl;
use App\Models\arCreditorClassMdl;
use App\Traits\MethodsTrait;
use Config;
use Session;
use DB;

class formACntrlr extends Controller
{
   use MethodsTrait;

    function index()
    {

        $results = DB::table('form_a_mdls as fA')
                        ->leftJoin('company_dtls as com', 'com.id', '=', 'fA.company_id');
                        if (userType()->user_type==2) 
                        {
                        $results = $results->where('fA.user_id', Session::get('admin_id'));
                        }
            $results = $results->select('fA.id','com.name as cName', 'fA.name', 'fA.designation', 'fA.user_id', 'fA.corporate_debtor_insolvency_date', 'fA.insolvency_closing_date', 'fA.created_time', 'fA.update_time', 'fA.unique_id')
                    ->orderBy('fA.id', 'desc')
                    ->get();

        $jsl =  bPath().'/'.Config::get('site.general');
        //dd($results);   die();
       return view('admin.formADetails',compact("results","jsl"));
        // return view('admin.formADetails',compact("results","jsl","company"));
    }

    function getCompanyData(Request $req, $id)
    {   
        $response = array();
        //echo $id;die();

        $data = DB::table('assign_company_mdls as asn')
                ->join('company_dtls as comp', 'asn.company_id','=','comp.id')    
                ->join('general_info_mdls as ip', 'ip.id','=','asn.ip_id')
                ->where('asn.company_id',$id)
                ->where([['asn.status','=',1],['asn.deleted','=',2],['asn.designation','!=','AR']])
                ->where([['ip.status','=',1],['ip.flag','=',2]])    
                ->orderBy('asn.id', 'desc')
                ->select('comp.id','comp.name', 'comp.address', 'comp.insolvency_commencement_date', 'comp.nclt', 'comp.start_date', 'comp.end_date', 'comp.claim_filing_date', 'ip.first_name', 'ip.email', 'ip.address as ipAddress', 'ip.ibbi_reg_no', 'ip.profile_pic', 'asn.designation','asn.ip_id', 'asn.id as asnId')
                ->first();     


       // echo print_r($data); die();       
        
        try
        {
           // $data = companyDtl::where('id',$id)->first();
            if ($data) 
            {
                $response['error'] = false;
                $response['message'] = $data;   
            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'Data not available.';
            }
        }
        catch (\Exception $e) 
        {
            $response['error'] = true;
            $response['message'] = $e->getMessage();;
        }
        echo json_encode($response);
    }


    function addData(Request $req)
    {
        // $company = companyDtl::where([['status','=',1],['deleted','=',2]]);
        //         if (userType()->user_type==2)
        //         {
        //             $company = $company->where('user_id',userType()->id);
        //         }

        //     $company = $company->pluck('name','id');
        
       $company = DB::table('assign_company_mdls as asn')
                    ->leftJoin('company_dtls as com', 'com.id','=','asn.company_id');
                
                if (userType()->user_type==2)
                {
                    $company = $company->where('asn.ip_id',userType()->id);
                }

            $company = $company->where([['asn.status','=',1],['asn.deleted','=',2],['asn.designation', '!=', 'AR']])
                        ->orderBy('asn.id', 'desc')
                        ->pluck('com.name','com.id');
            
            $result = array();           
            foreach ($company as $key => $value) 
                {
                        if(!in_array($value, $result))
                            {
                            $result[$key]=$value;
                            }
                     }         
        

        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.formAMethod');  
        $classes = arMdl::where('status',1)->orderBy('name')->pluck('name','id');
        $ips = generalInfoMdl::select('first_name')->where('id', Session::get('admin_id'))->first();
        
        //$ips_nms = generalInfoMdl::where([['user_type','=',2],['sub_user','=',''],['status','=',1],['flag','=',2]])->pluck('username','id');

        $ips_nms = arMdl::where('status',1)->orderBy('name')->pluck('name','id');

        //$pth = publicP()."/access/media/forms/formA/";

       // dd($result);die();

        return view('admin.formA',compact("jsl","a_vl","result","ips","classes","ips_nms", "company"));
    }

    function getFormARow(Request $req)
    {
        $ips_nms = generalInfoMdl::where([['user_type','=',2],['sub_user','=',''],['status','=',1],['flag','=',2]])->pluck('username','id');
        
        $length = $req->length + 1;

        //echo $length + 1;die();

        $data = view('admin.formA.classRow', compact("ips_nms","length"));

        echo $data;
    }



    function saveData(Request $req)
    {
         $response = array();
        
        $unique_id = uniqid().time();    
        if ($req->file('file')) 
            {


            $pth = publicP()."/access/media/forms/formA/".$unique_id;    
            $dir = $pth;
             if (!is_dir($dir)) 
              {
              mkdir($dir, 0777, TRUE);  
               }     

            $id=uniqid().time();
            $fileName = $id.".". $req->file('file')->getClientOriginalExtension();
            //dd($fileName);   
            $req->file("file")->move($dir, $fileName);  
            $interim_resolution_signature = $fileName;
            }
            else
            {
                $interim_resolution_signature = "";
            }

            $ip = DB::table('assign_company_mdls as asn')
                            ->leftJoin('general_info_mdls as gen', 'gen.id','=', 'asn.ip_id')
                            ->select('gen.first_name as name', 'asn.designation as desg')
                            ->where([['asn.ip_id','=',$req->ip_id], ['asn.designation','!=','AR'],['asn.status','=',1],['asn.deleted','=',2]])
                            ->orderBy('asn.id', 'desc')
                            ->first();

            // $comp = DB::table('assign_company_mdls as asn')
            //         ->select('asn.company_id')
            //         ->where('asn.id', '=', $req->corporate_debtor)
            //         ->first();                


            $data = [

            'user_id' => $req->ip_id,
            'company_id' => $req->corporate_debtor ?? "",
            'name'=>$req->ip_name ?? '', //$ip->name ?? '',
            'designation'=>$req->ip_designation ?? '',//$ip->desg ?? '',
            
            'assign_company_mdls_id' => $req->assign_company_mdls_id ?? "",

            'incorporation_date' => $req->incorporation_date ?? "",
            'corporate_debtor_authority' => $req->corporate_debtor_authority ?? "",
            'corporate_debtor_identity_number' => $req->corporate_debtor_identity_number ?? "",
            'corporate_debtor_address' => $req->corporate_debtor_address ?? "",
            'corporate_debtor_insolvency_date' => $req->corporate_debtor_insolvency_date ?? "",
            'insolvency_closing_date' => $req->insolvency_closing_date ?? "",
            'insolvency_professional_name' => $req->insolvency_professional_name ?? "",
            'insolvency_professional_registration_number' => $req->insolvency_professional_registration_number ?? "",
            'resolution_professional_address' => $req->resolution_professional_address ?? "",
            'resolution_professional_email' => $req->resolution_professional_email ?? "",
            'correspondence_resolution_professional_address' => $req->correspondence_resolution_professional_address ?? "",
            'correspondence_resolution_professional_email' => $req->correspondence_resolution_professional_email ?? "",
            'claim_last_date' => $req->claim_last_date ?? "",
            'authorized_forms' => $req->authorized_forms ?? "",
            'authorized_details' => $req->authorized_details ?? "",
            'creditor_classess' => "",
            'insolvency_name' => "",
            'interim_resolution_name' => $req->ip_name ?? "", 
            'interim_resolution_signature'=>$interim_resolution_signature,
            'date' => $req->date ?? "",
            'place' => $req->place ?? "",

            'order_receving_date' => $req->order_receving_date ?? '',
            'conclusion' => $req->conclusion ?? '',

            'created_time' => date('Y-m-d H:i:s'),
            'created_by_id'  => Session::get('admin_id'),
            'update_time' => "",
            'updated_by' => "",

            'deleted' => 2,
            'deleted_time' =>"",
            'deleted_by' =>"",    
            'rem_addr' => $req->ip(),
            'status' => 1,
            'unique_id' => $unique_id,//uniqid().time();
        ];

            $creditor_classess = $req->creditor_classess ?? "";
            $ar1 = $req->ar1 ?? "";
            $ar2 = $req->ar2 ?? "";
            $ar3 = $req->ar3 ?? "";

        try 
        {   
            //echo count($creditor_classess); die();

            // echo "<pre>";
            // echo print_r($ar1);
            // echo "</pre>";die();

            $this->insertData('form_a_mdls',$data);
                
            $db = DB::table('form_a_mdls')->where('status',1)->orderBy('id','desc')->first();

          //  echo print_r($db);die();

            if (count($ar1)>0) 
                            {
                                   
                            for ($i=0; $i < count($ar1); $i++) 
                                {
                                if ($ar1[$i]!="") 
                                {    

                            $data3 = [
                                'ar_id' => $db->id ?? '',
                                'creditor_classess' => $creditor_classess[$i] ?? '',
                                'ar1' => $ar1[$i] ?? '',
                                'ar2' => $ar2[$i] ?? '',
                                'ar3' =>$ar3[$i] ?? "",
                                'created_time' => date('Y-m-d H:i:s'),
                                'created_by_id' => Session::get('admin_id'),
                                'update_time' => "",
                                'updated_by' => "",
                                'deleted' => 2,
                                'deleted_time' => "",
                                'deleted_by' => "",
                                'status' => 1,
                                'rem_addr' => $req->ip() 
                                ];
                            $this->insertData('ar_creditor_class_mdls',$data3); 
                        } 
                        }
                    }


            $response['error'] = false;
            $response['message'] = "Data saved successfully.";
        }
        catch (\Exception $e) 
        {
            $response['error'] = true;
            $response['message'] = $e->getMessage();//"Data not saved. Try again later";
        }
        echo json_encode($response);
    }


    function editData(Request $req, $id)
    {
        $cat = formAMdl::find($id);
        if ($cat) 
        {
            $company = DB::table('assign_company_mdls as asn')
                    ->leftJoin('company_dtls as com', 'com.id','=','asn.company_id');
                
                if (userType()->user_type==2)
                {
                    $company = $company->where('asn.ip_id',userType()->id);
                }

            $company = $company->where([['asn.status','=',1],['asn.deleted','=',2],['asn.designation', '!=', 'AR']])
                        ->orderBy('asn.id', 'desc')
                        //->pluck('com.name','asn.id');
                        ->pluck('com.name','com.id');
            
            $result = array();           
            foreach ($company as $key => $value) 
                {
                        if(!in_array($value, $result))
                            {
                            $result[$key]=$value;
                            }
                     }


           //dd($company);die();          

            $jsl =  bPath().'/'.Config::get('site.general');
            $a_vl =  Config::get('site.formAMethod');   

            $classes = arMdl::where('status',1)->orderBy('name')->pluck('name','id');
           
            $comP = DB::table('assign_company_mdls')->select('company_id', 'ip_id')->where('id', $cat->assign_company_mdls_id)->first();
            $assign_company = DB::table('assign_company_mdls')->select('id')->where([['company_id','=', $comP->company_id],['ip_id','=',$comP->ip_id]])->orderBy('id','desc')->first();
            
            $clss = arCreditorClassMdl::where([['ar_id','=', $cat->id],['status','=',1],['deleted','=',2]])->get();    

            $com_name = companyDtl::select('name','user_id')->where('id',$cat->company_id)->first();

            $ips = generalInfoMdl::select('first_name','id')->where('id', $cat->user_id)->first();

           // $ips_nms = generalInfoMdl::where([['user_type','=',2],['sub_user','=',''],['status','=',1],['flag','=',2]])->pluck('username','id');

            $ips_nms = arMdl::where('status',1)->orderBy('name')->pluck('name','id');

            //$pth = publicP()."/access/media/forms/formA/".$cat->unique_id;
          //  dd($assign_company->id);die();
            //echo print_r($clss); die();
            return view('admin.edit_formA',compact("jsl","a_vl","cat","result","classes","ips","ips_nms","com_name","clss", "assign_company", "company"));
        }
        else
        {
            return redirect(admin().'/form-a-details');
        }
    }

    function updateClassRow(Request $req)
    {
        $response = array();
        $cid = $req->cid;
        $nm = $req->nm;
        $vl = $req->vl;

        $cat = arCreditorClassMdl::find($cid);
        if ($cat) 
        {
            try 
            {
                                
                                $cat->$nm = $vl ?? "";
                                $cat->update_time = date('Y-m-d H:i:s');
                                $cat->updated_by = Session::get('admin_id');
                                $cat->rem_addr = $req->ip(); 


                $cat->save();
                $response['error'] = false;
                $response['message'] = "Data updated successfully.";
            }
            catch (\Exception $e) 
            {
                $response['error'] = true;
                $response['message'] = "Data not updated. Please refresh page.";
            }     
        }
        else
        {
            $response['error'] = true;
            $response['message'] = "Data not found.";
        }

        echo json_encode($response);    
    }


    function removeClassRow(Request $req, $id)
    {
        $response = array();
        $cat = arCreditorClassMdl::find($id);
        if ($cat) 
        {
            try 
            {

                
                                $cat->deleted = 1;
                                $cat->deleted_time = date('Y-m-d H:i:s');
                                $cat->deleted_by = Session::get('admin_id');
                                $cat->status = 2;
                                $cat->rem_addr = $req->ip(); 

                $cat->save();
                $response['error'] = false;
                $response['message'] = "Data deleted successfully.";
            }
            catch (\Exception $e) 
            {
                $response['error'] = true;
                $response['message'] = "Data not deleted. Please refresh page.";
            }     
        }
        else
        {
            $response['error'] = true;
            $response['message'] = "Data not found.";
        }


        echo json_encode($response);    
    }


    function updateData(Request $req, $id)
    {
        $response = array();
        $cat = formAMdl::find($id);
       
        
            if ($req->file('file')) 
            {


            $pth = publicP()."/access/media/forms/formA/".$cat->unique_id;    
            $dir = $pth;
             if (!is_dir($dir)) 
              {
              mkdir($dir, 0777, TRUE);  
               }     

            $id=uniqid().time();
            $fileName = $id.".". $req->file('file')->getClientOriginalExtension();
            //dd($fileName);   
            $req->file("file")->move($dir, $fileName);  
            $cat->interim_resolution_signature = $fileName;
            }
            else
            {
                $cat->interim_resolution_signature = $cat->interim_resolution_signature;
            }

            // $ip = DB::table('assign_company_mdls as asn')
            //                 ->leftJoin('general_info_mdls as gen', 'gen.id','=', 'asn.ip_id')
            //                 ->select('gen.first_name as name', 'asn.designation as desg')
            //                 ->where([['asn.ip_id','=',$req->ip_id], ['asn.designation','!=','AR'],['asn.status','=',1],['asn.deleted','=',2]])
            //                 ->orderBy('asn.id', 'desc')
            //                 ->first();

            // $comp = DB::table('assign_company_mdls as asn')
            //         ->select('asn.company_id')
            //         ->where('asn.id', '=', $req->corporate_debtor)
            //         ->first();                


            $cat->user_id = $req->ip_id;
            $cat->company_id = $req->corporate_debtor ?? ""; //$comp->company_id ?? "";
            $cat->name = $req->ip_name ?? "";
            $cat->designation = $req->ip_designation ?? '';//$ip->desg ?? '';
            $cat->assign_company_mdls_id = $req->assign_company_mdls_id ?? "";
            
            $cat->incorporation_date = $req->incorporation_date ?? "";
            $cat->corporate_debtor_authority = $req->corporate_debtor_authority ?? "";
            $cat->corporate_debtor_identity_number = $req->corporate_debtor_identity_number ?? "";
            $cat->corporate_debtor_address = $req->corporate_debtor_address ?? "";
            $cat->corporate_debtor_insolvency_date = $req->corporate_debtor_insolvency_date ?? "";
            $cat->insolvency_closing_date = $req->insolvency_closing_date ?? "";
            $cat->insolvency_professional_name = $req->insolvency_professional_name ?? "";
            $cat->insolvency_professional_registration_number = $req->insolvency_professional_registration_number ?? "";
            $cat->resolution_professional_address = $req->resolution_professional_address ?? "";
            $cat->resolution_professional_email = $req->resolution_professional_email ?? "";
            $cat->correspondence_resolution_professional_address = $req->correspondence_resolution_professional_address ?? "";
            $cat->correspondence_resolution_professional_email = $req->correspondence_resolution_professional_email ?? "";
            $cat->claim_last_date = $req->claim_last_date ?? "";
            $cat->authorized_forms = $req->authorized_forms ?? "";
            $cat->authorized_details = $req->authorized_details ?? "";
            $cat->creditor_classess = $req->creditor_classess ?? "";
            $cat->insolvency_name = $req->insolvency_name ?? "";
            $cat->interim_resolution_name = $req->ip_name ?? "";

            $cat->update_time = date('Y-m-d H:i:s');
            $cat->updated_by  = Session::get('admin_id');
           
            $cat->order_receving_date = $req->order_receving_date ?? '';
            $cat->conclusion = $req->conclusion ?? '';
            
            

            $cat->date = $req->date ?? "";
            $cat->place = $req->place ?? "";
            $cat->rem_addr = $req->ip();
            $cat->status = 1;

        try 
        {   
            $cat->save();
            $response['error'] = false;
            $response['message'] = "Data updated successfully.";
        }
        catch (\Exception $e) 
        {
            $response['error'] = true;
            $response['message'] = $e->getMessage();// "Data not updated. Try again later";
        }
        echo json_encode($response);
    }
    

    
    function deleteData(Request $req, $id)
    {
        $response = array();

        $cat = formAMdl::find($id);
        if(!empty($cat->interim_resolution_signature))
        {
            if(file_exists(publicP() . '/access/media/forms/formA/'.$cat->interim_resolution_signature))
            {
                unlink(publicP() . '/access/media/forms/formA/'.$cat->interim_resolution_signature);    
            }
        }  
        if ($cat->delete()) 
        {
            $response['error'] = false;
            $response['message'] = "Data deleted successfully.";
        }
        else
        {
            $response['error'] = true;
            $response['message'] = "Data not deleted. Try again later";
        }
        echo json_encode($response);
    }

}
