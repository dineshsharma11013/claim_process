<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\MethodsTrait;
use App\Models\form2Mdl;
use Config;
use Session;
use DB;
use PDF;

class formSCntrlr extends Controller
{
    use MethodsTrait;
    
    function index()
    {
        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.form2V');
       return view('admin.add_form2',compact("jsl", "a_vl"));
    }
    
 function form2list()
    {
    $jsl =  bPath().'/'.Config::get('site.general');
    
    $data = DB::table('form2_mdls as f2')
            ->leftjoin('general_info_mdls as gn', 'f2.created_by_id', '=', 'gn.id');
            if (userType()->user_type==2) 
            {
            $data = $data->where([['f2.created_by_id','=',session::get('admin_id')], ['f2.deleted', '=', 2]]);
            }
            elseif (userType()->user_type==4) 
            {
            $data = $data->where([['f2.created_by_id','=',userType()->sub_user], ['f2.deleted', '=', 2]]);
            }
        $data = $data->select('f2.id', 'f2.vs_name_of_corporate_debtor', 'f2.name_of_proposed_resolution', 'f2.name_of_insolvency_professional_agency', 'f2.name_of_creditor','f2.deleted', 'f2.created_by_id as admin_id', 'f2.created_time', 'f2.unique_id', 'gn.first_name', 'gn.last_name')
            ->orderByDesc('id')
            ->get();


     //  dd($data);die();     
       return view('admin.form2-list',compact("jsl" , "data"));
    }    
      

function handleFormSubmit(Request $request)
    {
     $response = array();   
     $unique_id = uniqid().time();

     $pth = '/access/media/form2';
    $dir = publicP().$pth."/".$unique_id;
                 if (!is_dir($dir)) 
                  {
                  mkdir($dir, 0777, TRUE);  
                   }  

  
        // Create a new formSDetailsMdl instance with the form data
$data = [
'name' => $request->name ?? "",
'first_date' => $request->first_date ?? "",
'no_of_irp_assignment' => $request->no_of_irp_assignment ?? "",
'number_of_rp_assgnmt' => $request->no_of_rsdsdsdment ?? "",
'numbr_of_lqdtr_voluntry' => $request->numbr_of_lqdtr_voluntry ?? "",
'form_2_mdl_no_of_ar_assign_corporate_process' => $request->form_2_mdl_no_of_ar_assign_corporate_process ?? "",
'individual_processes_rp_number'=>$request->individual_processes_rp_number ?? "",
'bank_cruptancy_trustee_individual'=>$request->bank_cruptancy_trustee_individual ?? "",
'number_of_any_other_assignment'=>$request->number_of_any_other_assignment ?? "",

'bank_name'=>$request->bank_name ?? "",
'signature_of_ip' => "",
'other_doc' => '',
'ip_ipe' => $request->ip_ipe ?? "",
'address' => $request->address ?? "",
'sction' => $request->sction ?? "",
'name_authorised_signature' => $request->name_authorised_signature ?? "",
'email' => $request->email ?? "",
'conclusion' => $request->conclusion ?? "",
'office_address' => $request->office_address ?? "",
'contact_number' => $request->contact_number ?? "",
'vs_name_of_corporate_debtor' => $request->vs_name_of_corporate_debtor ?? "",
'name_of_proposed_resolution' => $request->name_of_proposed_resolution ?? "",
'name_of_insolvency_professional_agency' => $request->name_of_insolvency_professional_agency ?? "",
'rehgisteration_number' => $request->rehgisteration_number ?? "",
'name_of_creditor' => $request->name_of_creditor ?? "",
'insovency_resolution_corporate_debtor' => $request->insovency_resolution_corporate_debtor ?? "",
'inter_registration_number' => $request->inter_registration_number ?? "",
'signing_person_name' => $request->signing_person_name ?? "",
'optional_certificate' => "",
'date' => date('Y-m-d'),

            'created_time' => date('Y-m-d H:i:s'),
            'created_by_id'  => Session::get('admin_id'),
            'update_time' => "",
            'updated_by' => "",

            'deleted' => 2,
            'deleted_time' =>"",
            'deleted_by' =>"",    
            'rem_addr' => $request->ip(),
            'unique_id' => $unique_id,
            'status' => 1,
            ];

$in_matter_crprt_dbtr = $request->in_matter_crprt_dbtr ?? "";
$other_senc_id = $request->other_senc_id ?? "";

$name_of_corporate_debtor = $request->name_of_corporate_debtor ?? "";
$commencement_date = $request->commencement_date ?? "";
$expected_date_closure_process = $request->expected_date_closure_process ?? "";


$rp_neme_crprt_debtr = $request->rp_neme_crprt_debtr ?? "";
$rp_date_of_cmnsmnt_prcss = $request->rp_date_of_cmnsmnt_prcss ?? "";
$rp_expected_date_clsr_prcss= $request->rp_expected_date_clsr_prcss ?? "";


$lqdtr_coprorate_dbtr_neme = $request->lqdtr_coprorate_dbtr_neme ?? "";
$lqdtr_date_of_cmncmnt = $request->lqdtr_date_of_cmncmnt ?? "";
$lqdtr_expected_clsr_cmncmnt= $request->lqdtr_expected_clsr_cmncmnt ?? "";

$ar_name_of_corporate_debtor = $request->ar_name_of_corporate_debtor ?? "";
$ar_commencement_date = $request->ar_commencement_date ?? "";
$ar_expected_date= $request->ar_expected_date ?? "";


$indvdl_rp_crprt_dbtr = $request->indvdl_rp_crprt_dbtr ?? "";
$indvdl_rp_cmncmt_dete = $request->indvdl_rp_cmncmt_dete ?? "";
$indvdl_rp_clsr_dete= $request->indvdl_rp_clsr_dete ?? "";


$bank_cruptcy_corporate_debtr_neme = $request->bank_cruptcy_corporate_debtr_neme ?? "";
$bank_cruptcy_cmncmnt_dete = $request->bank_cruptcy_cmncmnt_dete ?? "";
$bank_cruptcy_clsr_dete= $request->bank_cruptcy_clsr_dete ?? "";


$any_other_crprt_dbtr = $request->any_other_crprt_dbtr ?? "";
$any_other_cmncment_dete = $request->any_other_cmncment_dete ?? "";
$any_other_clsre_dete= $request->any_other_clsre_dete ?? "";


$dsclsrd=$request->disclsure ?? "";

                     
    try{    
        $this->insertData('form2_mdls',$data);
        $cat = DB::table('form2_mdls')->select('id')->orderByDesc('id')->first();
        
        DB::table('time_table_filed')->insert([
           'form_id'=>$cat->id,
           'consent_for_IRP'=>'done',
           'intimation_to_ibbi'=>'',
           'doc_apt_of_irp'=>'',
           'insert_date'=> $request->first_date,
           'added_on'=>date('y-m-d h:i:s'),
           ]);        
        
        
        if ($request->hasfile('sgnture')) 
        {
          $sgnture = $this->uploadFile($request, $unique_id, 'form2_mdls', ['id'=>$cat->id], '/access/media/form2', 'sgnture', 'sign');
          $this->updateData('form2_mdls',['signature_of_ip'=>$sgnture], ['id'=>$cat->id]);
        }

        if ($request->hasfile('optional_certificate')) 
        {
          $optional_certificate = $this->uploadFile($request, $unique_id, 'form2_mdls', ['id'=>$cat->id], '/access/media/form2', 'optional_certificate', 'optC');
          $this->updateData('form2_mdls',['optional_certificate'=>$optional_certificate], ['id'=>$cat->id]);
        }
        

        if ($request->hasfile('other_doc')) 
        {
            if (!is_dir($dir)) 
            {
            mkdir($dir, 0777, TRUE);    
            }
              foreach($request->file('other_doc') as $image)
              {
                  $id=time().uniqid(rand());
                  $name=$id.'.'.$image->getClientOriginalExtension();
                  $image->move($dir, $name);  
                  $banners_name[] = $name;
              }
             $other_doc = implode(", ",$banners_name);
            $this->updateData('form2_mdls',['other_doc'=>$other_doc], ['id'=>$cat->id]);
        }
        

      $this->singleData($in_matter_crprt_dbtr, $other_senc_id, 'form2_in_matter_corporate_debtors', $cat->id, 'form2_mdls');

      $this->multipleData2($name_of_corporate_debtor, $commencement_date, $expected_date_closure_process, 'form2_mdl_irps', $cat->id);
      
      $this->multipleData2($rp_neme_crprt_debtr, $rp_date_of_cmnsmnt_prcss, $rp_expected_date_clsr_prcss, 'form2_mdl_rps', $cat->id);
      $this->multipleData2($lqdtr_coprorate_dbtr_neme, $lqdtr_date_of_cmncmnt, $lqdtr_expected_clsr_cmncmnt, 'form2_mdl_liquidator_volutaries', $cat->id);

      $this->multipleData2($ar_name_of_corporate_debtor, $ar_commencement_date, $ar_expected_date, 'form2_mdl_ar_details', $cat->id);//, $other_ar_id);

      $this->multipleData2($indvdl_rp_crprt_dbtr, $indvdl_rp_cmncmt_dete, $indvdl_rp_clsr_dete, 'form2_mdl_individiual_rps', $cat->id);
      $this->multipleData2($bank_cruptcy_corporate_debtr_neme, $bank_cruptcy_cmncmnt_dete, $bank_cruptcy_clsr_dete, 'form2_mdl_individiual_bank_cruptancies', $cat->id);
      $this->multipleData2($any_other_crprt_dbtr, $any_other_cmncment_dete, $any_other_clsre_dete, 'form2_mdl_any_other_individiual_processes', $cat->id);



      $this->addMulData($dsclsrd, 'form2_mdl_disclosures', $cat->id, 'form2_mdls', 'form2_id', 'discosures');


        $response['error'] = false;
        $response['message'] = "Data saved successfully.";
    }
    catch(\Exception $e)     
        {
            $response['error'] = true;
            $response['message'] = $e->getMessage(); "Data not saved."; //$e->getMessage();
        }    
    
        echo json_encode($response);
    }
    
function form2validation(Request $req)
{

$id = $req->txt;
if ($id) 
{

$unq_data=DB::table('form2_mdls')->select('vs_name_of_corporate_debtor')->where('vs_name_of_corporate_debtor', $id)->first();

if($unq_data)
{
echo json_encode(['status'=>1]);
}
else
{
    
echo json_encode(['status'=>0]);
}
}
else
{
  echo json_encode(['status'=>2]); 
}
}


function form2_delete(Request $req, $id)
{
    $response = array();

        $cat = DB::table('form2_mdls')->select('id')->where('id', $id)->first();
   
        if ($cat) 
          {
            $data = [
              'rem_addr' => $req->ip(),
            'update_time' => date('Y-m-d H:i:s'),
            'deleted' => 1,
            'deleted_by' => Session::get('admin_id'),
            'deleted_time' => date('Y-m-d H:i:s'),
            ];

            try
            {
            $this->updateData('form2_mdls',$data, ['id'=>$id]);

            
              $response['error'] = false;
              $response['message'] = "Successfully Deleted";
            }
            catch(\Exception $e)
            {
              $response['error'] = true;
              $response['message'] = "Not Deleted. Please refresh the page.";   
            }
            
          }
          else
          {
            $response['error'] = true;
            $response['message'] = "Data not available";
          }
        
        echo json_encode($response);
}
  

function form2_edit($id)
    {
        
       $res['mnT'] = form2Mdl::find($id); 
       
       $res['indProcess'] = form2Mdl::getForm2Data($id, 'form2_id', 'form2_mdl_any_other_individiual_processes');
       $res['corporateDebtor'] = form2Mdl::getForm2Data($id, 'form2_id', 'form2_in_matter_corporate_debtors');
       $res['arDetails'] = form2Mdl::getForm2Data($id, 'form2_id', 'form2_mdl_ar_details');
       $res['mdlDisclosure'] = form2Mdl::getForm2Data($id, 'form2_id', 'form2_mdl_disclosures');
       $res['mdlDocuments'] = form2Mdl::getForm2Data($id, 'form2_id', 'form2_mdl_documents');

       $res['indBankCrpt'] = form2Mdl::getForm2Data($id, 'form2_id', 'form2_mdl_individiual_bank_cruptancies');
       $res['indRps'] = form2Mdl::getForm2Data($id, 'form2_id', 'form2_mdl_individiual_rps');
       $res['indIrps'] = form2Mdl::getForm2Data($id, 'form2_id', 'form2_mdl_irps');
       $res['mdlRps'] = form2Mdl::getForm2Data($id, 'form2_id', 'form2_mdl_rps');
       $res['mdlLiqVol'] = form2Mdl::getForm2Data($id, 'form2_id', 'form2_mdl_liquidator_volutaries');
 
        $res['jsl'] =  bPath().'/'.Config::get('site.general');
        $res['a_vl'] =  Config::get('site.form2V');
       // dd($res['indRps']);die();

        if ($res['mnT']) 
        {
          return view('admin.form2-edit',$res);
        }
        else
        {
          return redirect(admin().'/form-2-details');
        }
        
        
    }


function form2_pdf($id)
{
    $res['mnT']=DB::table('form2_mdls')->where('unique_id',$id)->first();      
    $res['indProcess'] = form2Mdl::getForm2Data($res['mnT']->id, 'form2_id', 'form2_mdl_any_other_individiual_processes');
       $res['corporateDebtor'] = form2Mdl::getForm2Data($res['mnT']->id, 'form2_id', 'form2_in_matter_corporate_debtors');
       $res['arDetails'] = form2Mdl::getForm2Data($res['mnT']->id, 'form2_id', 'form2_mdl_ar_details');
       $res['mdlDisclosure'] = form2Mdl::getForm2Data($res['mnT']->id, 'form2_id', 'form2_mdl_disclosures');
       $res['mdlDocuments'] = form2Mdl::getForm2Data($res['mnT']->id, 'form2_id', 'form2_mdl_documents');

       $res['indBankCrpt'] = form2Mdl::getForm2Data($res['mnT']->id, 'form2_id', 'form2_mdl_individiual_bank_cruptancies');
       $res['indRps'] = form2Mdl::getForm2Data($res['mnT']->id, 'form2_id', 'form2_mdl_individiual_rps');
       $res['indIrps'] = form2Mdl::getForm2Data($res['mnT']->id, 'form2_id', 'form2_mdl_irps');
       $res['mdlRps'] = form2Mdl::getForm2Data($res['mnT']->id, 'form2_id', 'form2_mdl_rps');
       $res['mdlLiqVol'] = form2Mdl::getForm2Data($res['mnT']->id, 'form2_id', 'form2_mdl_liquidator_volutaries');     


       // echo "<pre>";
       // echo print_r($res['corporateDebtor']);
       // echo "</pre>"; die();

        $pdf = PDF::loadView('user.pdf.form2', $res);
        
        $now = time();
        return $pdf->stream($now.'.pdf');
}


    function handleFormupdate(Request $request, $id)
    {
     $response = array();   
     //$unique_id = uniqid().time();

     $cat = DB::table('form2_mdls')->select('id', 'unique_id', 'optional_certificate', 'other_doc', 'signature_of_ip')->where('id', $id)->first();

     $where=[
      'id'=>$id
     ];

     if ($request->hasfile('sgnture')) 
     {
     $sgnture = $this->uploadFile($request, $cat->unique_id, 'form2_mdls', $where, '/access/media/form2', 'sgnture', 'sign');
      }
      else
      {
        $sgnture = $cat->signature_of_ip;
      }

    if ($request->hasfile('optional_certificate')) 
     {
     $optional_certificate = $this->uploadFile($request, $cat->unique_id, 'form2_mdls', $where, '/access/media/form2', 'optional_certificate', 'optC');
      }
      else
      {
        $optional_certificate = $cat->optional_certificate;
      }

      $pth = '/access/media/form2';
      $dir = publicP().$pth."/".$cat->unique_id;
  
      if($request->hasfile('other_doc'))
         {
          if (!is_dir($dir)) 
          {
          mkdir($dir, 0777, TRUE);    
          }
            foreach($request->file('other_doc') as $image)
            {
                $id=time().uniqid(rand());
                $name=$id.'.'.$image->getClientOriginalExtension();
                $image->move($dir, $name);  
                $banners_name[] = $name;
            }
           $other_doc = implode(", ",$banners_name);
          
        }
          else
          {
          $other_doc = $cat->other_doc;   
          }


        // Create a new formSDetailsMdl instance with the form data
$data = [
'name' => $request->name ?? "",
'first_date' => $request->first_date ?? "",
'no_of_irp_assignment' => $request->no_of_irp_assignment ?? "",
'number_of_rp_assgnmt' => $request->no_of_rsdsdsdment ?? "",
'numbr_of_lqdtr_voluntry' => $request->numbr_of_lqdtr_voluntry ?? "",
'form_2_mdl_no_of_ar_assign_corporate_process' => $request->form_2_mdl_no_of_ar_assign_corporate_process ?? "",
'individual_processes_rp_number'=>$request->individual_processes_rp_number ?? "",
'bank_cruptancy_trustee_individual'=>$request->bank_cruptancy_trustee_individual ?? "",
'number_of_any_other_assignment'=>$request->number_of_any_other_assignment ?? "",

'bank_name'=>$request->bank_name ?? "",
'signature_of_ip' => $sgnture,
'other_doc'=>$other_doc,
'ip_ipe' => $request->ip_ipe ?? "",
'address' => $request->address ?? "",
'sction' => $request->sction ?? "",
'name_authorised_signature' => $request->name_authorised_signature ?? "",
'email' => $request->email ?? "",
'conclusion' => $request->conclusion ?? "",
'office_address' => $request->office_address ?? "",
'contact_number' => $request->contact_number ?? "",
'vs_name_of_corporate_debtor' => $request->vs_name_of_corporate_debtor ?? "",
'name_of_proposed_resolution' => $request->name_of_proposed_resolution ?? "",
'name_of_insolvency_professional_agency' => $request->name_of_insolvency_professional_agency ?? "",
'rehgisteration_number' => $request->rehgisteration_number ?? "",
'name_of_creditor' => $request->name_of_creditor ?? "",
'insovency_resolution_corporate_debtor' => $request->insovency_resolution_corporate_debtor ?? "",
'inter_registration_number' => $request->inter_registration_number ?? "",
'signing_person_name' => $request->signing_person_name ?? "",
'optional_certificate' => $optional_certificate,
//'date' => date('Y-m-d'),

            'update_time' => date('Y-m-d H:i:s'),
            'updated_by'  => Session::get('admin_id'),
            'rem_addr' => $request->ip(),
            ];

$in_matter_crprt_dbtr = $request->in_matter_crprt_dbtr ?? "";
$other_senc_id = $request->other_senc_id ?? "";

$name_of_corporate_debtor = $request->name_of_corporate_debtor ?? "";
$commencement_date = $request->commencement_date ?? "";
$expected_date_closure_process = $request->expected_date_closure_process ?? "";
$other_corporate_id = $request->other_corporate_id ?? [];
//echo print_r($other_corporate_id);die();

$rp_neme_crprt_debtr = $request->rp_neme_crprt_debtr ?? "";
$rp_date_of_cmnsmnt_prcss = $request->rp_date_of_cmnsmnt_prcss ?? "";
$rp_expected_date_clsr_prcss= $request->rp_expected_date_clsr_prcss ?? "";
$other_rp_id = $request->other_rp_id ?? [];


$lqdtr_coprorate_dbtr_neme = $request->lqdtr_coprorate_dbtr_neme ?? "";
$lqdtr_date_of_cmncmnt = $request->lqdtr_date_of_cmncmnt ?? "";
$lqdtr_expected_clsr_cmncmnt= $request->lqdtr_expected_clsr_cmncmnt ?? "";
$other_lqdtr_id = $request->other_lqdtr_id ?? [];

$ar_name_of_corporate_debtor = $request->ar_name_of_corporate_debtor ?? "";
$ar_commencement_date = $request->ar_commencement_date ?? "";
$ar_expected_date= $request->ar_expected_date ?? "";
$other_ar_id = $request->other_ar_id ?? [];

$indvdl_rp_crprt_dbtr = $request->indvdl_rp_crprt_dbtr ?? "";
$indvdl_rp_cmncmt_dete = $request->indvdl_rp_cmncmt_dete ?? "";
$indvdl_rp_clsr_dete= $request->indvdl_rp_clsr_dete ?? "";
$other_rsp_id = $request->other_rsp_id ?? [];

$bank_cruptcy_corporate_debtr_neme = $request->bank_cruptcy_corporate_debtr_neme ?? "";
$bank_cruptcy_cmncmnt_dete = $request->bank_cruptcy_cmncmnt_dete ?? "";
$bank_cruptcy_clsr_dete= $request->bank_cruptcy_clsr_dete ?? "";
$other_bank_cruptcy_id = $request->other_bank_cruptcy_id ?? [];

$any_other_crprt_dbtr = $request->any_other_crprt_dbtr ?? "";
$any_other_cmncment_dete = $request->any_other_cmncment_dete ?? "";
$any_other_clsre_dete= $request->any_other_clsre_dete ?? "";
$other_any_other_id = $request->other_any_other_id ?? [];

$dsclsrd=$request->disclsure ?? "";
$other_desc_id = $request->other_desc_id ?? [];

                     
    try{    

        $this->updateData('form2_mdls',$data, $where);
        
        DB::table('time_table_filed')->where('form_id',$cat->id)->update([
           'insert_date'=> $request->first_date,
           ]);
        
       $this->singleData($in_matter_crprt_dbtr, $other_senc_id, 'form2_in_matter_corporate_debtors', $cat->id, 'form2_mdls');

      $this->multipleData2($name_of_corporate_debtor, $commencement_date, $expected_date_closure_process, 'form2_mdl_irps', $cat->id, $other_corporate_id);
      
      $this->multipleData2($rp_neme_crprt_debtr, $rp_date_of_cmnsmnt_prcss, $rp_expected_date_clsr_prcss, 'form2_mdl_rps', $cat->id, $other_rp_id);
      $this->multipleData2($lqdtr_coprorate_dbtr_neme, $lqdtr_date_of_cmncmnt, $lqdtr_expected_clsr_cmncmnt, 'form2_mdl_liquidator_volutaries', $cat->id, $other_lqdtr_id);

      $this->multipleData2($ar_name_of_corporate_debtor, $ar_commencement_date, $ar_expected_date, 'form2_mdl_ar_details', $cat->id, $other_ar_id);//, $other_ar_id);

      $this->multipleData2($indvdl_rp_crprt_dbtr, $indvdl_rp_cmncmt_dete, $indvdl_rp_clsr_dete, 'form2_mdl_individiual_rps', $cat->id, $other_rsp_id);
      $this->multipleData2($bank_cruptcy_corporate_debtr_neme, $bank_cruptcy_cmncmnt_dete, $bank_cruptcy_clsr_dete, 'form2_mdl_individiual_bank_cruptancies', $cat->id, $other_bank_cruptcy_id);
      $this->multipleData2($any_other_crprt_dbtr, $any_other_cmncment_dete, $any_other_clsre_dete, 'form2_mdl_any_other_individiual_processes', $cat->id, $other_any_other_id);


      $this->addMulData($dsclsrd, 'form2_mdl_disclosures', $cat->id, 'form2_mdls', 'form2_id', 'discosures', $other_desc_id);

        $response['error'] = false;
        $response['message'] = "Data updated successfully.";
    }
    catch(\Exception $e)     
        { 
            $response['error'] = true;
            $response['message'] = $e->getMessage();
        }    
    
        echo json_encode($response);
    }


    function removeForm2OtherData(Request $req, $id)
    {
        $table = $req->table;  
        $this->removeSenctData($table, $id);
    }


    function removeForm2Files(Request $req, $id, $fl)
    {
      $response = array();
      $cat = form2Mdl::find($id);

      
      $val =  explode(", ",$cat->other_doc);

      if (($key = array_search($fl, $val)) !== false) {
        unset($val[$key]);
      
        $cat->other_doc = implode(", ", $val);

      if(file_exists(publicP() . '/access/media/form2/'.$cat->unique_id.'/'.$fl))
                {
                    unlink(publicP() . '/access/media/form2/'.$cat->unique_id.'/'.$fl);    
                }
      
      }

      if($cat->save())
            {
                $response['error'] = false;
                $response['message'] = "File Removed Successfully";
              }
              else
              {
                $response['error'] = true;
                $response['message'] = "File Not Removed. Try Again Later.";
              }

      echo json_encode($response);
    }
    

}
