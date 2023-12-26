<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Models\formSDetailsMdl;
use App\Traits\MethodsTrait;
use Config;
use Session;
use DB;
use PDF;

class formAACntrlr extends Controller
{
   use MethodsTrait;
   
  function index()
    {
        

        $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.formAA');
       return view('admin.formAAdetails',compact("jsl", "a_vl"));
    
    }
    
    
    
    function formaalist()
    {
        
         $jsl =  bPath().'/'.Config::get('site.general');
    
         $data = DB::table('form_aa_mdls as faa')
            ->leftjoin('general_info_mdls as gn', 'faa.created_by_id', '=', 'gn.id');
            if (userType()->user_type==2) 
            {
        $data = $data->where([['faa.created_by_id','=',session::get('admin_id')], ['faa.deleted', '=', 2]]);
            }
        $data = $data->select('faa.id', 'faa.name_of_corporate_debtor', 'faa.insolvency_agency_name', 'faa.commeetee_name', 'faa.process_of_name_of_corporate_debtor','faa.deleted', 'faa.created_by_id as admin_id', 'faa.unique_id', 'faa.created_time', 'gn.first_name', 'gn.last_name')
            ->orderByDesc('id')
            ->get();


    //$data=DB::table('form_aa_mdls')->where('created_by_id',Session::get('admin_id'))->get();
       
// dd($data);
       
       return view('admin.formAAlist',compact("jsl","data")); 
        
    }
    
    function form_aa_delete(Request $req, $id)
    {
        
          $response = array();
          $cat = DB::table('form_aa_mdls')->select('id')->where('id', $id)->first();
   
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
            $this->updateData('form_aa_mdls',$data, ['id'=>$id]);

            
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
    
    
    
    function form_aa_edit($id)
    {
         $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.formAA');
        
     $data=DB::table('form_aa_mdls')->where('id',$id)->first();

     $any_other_data=DB::table('form_aa_mdl_any_others')->where('form_aa_id',$id)->get();
          return view('admin.formAAedit',compact("jsl","data","any_other_data", "a_vl")); 
    }
    
    
    function formAAView($id)
    {
        $data=DB::table('form_aa_mdls')->where('unique_id',$id)->first();      
        $any_other_data=DB::table('form_aa_mdl_any_others')->where('form_aa_id',$data->id)->get();
        $pdf = PDF::loadView('user.pdf.formAA', compact("data","any_other_data"));
        
        $now = time();
        return $pdf->stream($now.'.pdf');
    }
    
  function post_form_AA(Request $request)
  {
    $response = array();   
     $unique_id = uniqid().time();

     $pth = '/access/media/formAA';
    $dir = publicP().$pth."/".$unique_id;
                 if (!is_dir($dir)) 
                  {
                  mkdir($dir, 0777, TRUE);  
                   }

$data = [
   
'first_date'=>$request->first_date ?? "",

'from_name'=> $request->from_name ?? '',
'registeration_number_insolvency_professional'=> $request->registeration_number_insolvency_professional ?? '',
'address_of_insolvency_professional'=> $request->address_of_insolvency_professional ?? '',
'address'=> $request->address ?? '',
'email_id'=> $request->email_id ?? '',
'name_of_corporate_debtor'=> $request->name_of_corporate_debtor ?? '',
'insolvency_professional_name'=> $request->insolvency_professional_name ?? '',
'insolvency_agency_name'=> $request->insolvency_agency_name ?? '',
'commeetee_name'=> $request->commeetee_name ?? '',
'section'=> $request->section ?? '',
'process_of_name_of_corporate_debtor'=> $request->process_of_name_of_corporate_debtor ?? '',
'no_of_interim_resolution_professional'=> $request->no_of_interim_resolution_professional ?? '',
'rp_of_corporate_debtor'=> $request->rp_of_corporate_debtor ?? '',
'rp_of_individuals'=> $request->rp_of_individuals ?? '',
'liquidator_of_liquidation_process'=> $request->liquidator_of_liquidation_process ?? '',
'voluntary_liquiadation_process'=> $request->voluntary_liquiadation_process ?? '',

'bank_cruptancy_trustee'=> $request->bank_cruptancy_trustee ?? '',
'signature_of_ip'=>'',

'authorise_represantatvie'=>$request->authorise_represantatvie ?? '',
'date'=> $request->date ?? "",
'place'=> $request->place ?? '',
'registeration_number'=> $request->registeration_number ?? '',

'authorisation_assignment_valid_till'=> $request->authorisation_assignment_valid_till ?? "",
'regd_address'=> $request->regd_address ?? '',
'down_date'=> $request->down_date ?? "",
'down_place'=> $request->down_place ?? '',
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

  $nbr_prcc = $request->no_of_process_date_consent ?? "";


try
{
        $this->insertData('form_aa_mdls' , $data); 
        $cat = DB::table('form_aa_mdls')->select('id')->orderByDesc('id')->first();
     
        if ($request->hasfile('signature_of_ip')) 
        {
          $signature_of_ip = $this->uploadFile($request, $unique_id, 'form_aa_mdls', ['id'=>$cat->id], '/access/media/formAA', 'signature_of_ip', 'sign');
          $this->updateData('form_aa_mdls',['signature_of_ip'=>$signature_of_ip], ['id'=>$cat->id]);
        }

        $this->addMulData($nbr_prcc, 'form_aa_mdl_any_others', $cat->id, 'form_aa_mdls', 'form_aa_id', 'no_of_process_date_consent');


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


  function update_form_AA(Request $request, $id)
  {
    $response = array();   
     
    $cat = DB::table('form_aa_mdls')->select('id', 'unique_id', 'signature_of_ip')->where('id', $id)->first();

     $where=[
      'id'=>$id
     ];

     if ($request->hasfile('signature_of_ip')) 
     {
     $sgnture = $this->uploadFile($request, $cat->unique_id, 'form_aa_mdls', ['id'=>$cat->id], '/access/media/formAA', 'signature_of_ip', 'sign');
      }
      else
      {
        $sgnture = $cat->signature_of_ip;
      }


$data = [
   
'first_date'=>$request->first_date ?? "",

'from_name'=> $request->from_name ?? '',
'registeration_number_insolvency_professional'=> $request->registeration_number_insolvency_professional ?? '',
'address_of_insolvency_professional'=> $request->address_of_insolvency_professional ?? '',
'address'=> $request->address ?? '',
'email_id'=> $request->email_id ?? '',
'name_of_corporate_debtor'=> $request->name_of_corporate_debtor ?? '',
'insolvency_professional_name'=> $request->insolvency_professional_name ?? '',
'insolvency_agency_name'=> $request->insolvency_agency_name ?? '',
'commeetee_name'=> $request->commeetee_name ?? '',
'section'=> $request->section ?? '',
'process_of_name_of_corporate_debtor'=> $request->process_of_name_of_corporate_debtor ?? '',
'no_of_interim_resolution_professional'=> $request->no_of_interim_resolution_professional ?? '',
'rp_of_corporate_debtor'=> $request->rp_of_corporate_debtor ?? '',
'rp_of_individuals'=> $request->rp_of_individuals ?? '',
'liquidator_of_liquidation_process'=> $request->liquidator_of_liquidation_process ?? '',
'voluntary_liquiadation_process'=> $request->voluntary_liquiadation_process ?? '',

'bank_cruptancy_trustee'=> $request->bank_cruptancy_trustee ?? '',
'signature_of_ip'=>$sgnture,

'authorise_represantatvie'=>$request->authorise_represantatvie ?? '',
'date'=> $request->date ?? "",
'place'=> $request->place ?? '',
'registeration_number'=> $request->registeration_number ?? '',

'authorisation_assignment_valid_till'=> $request->authorisation_assignment_valid_till ?? "",
'regd_address'=> $request->regd_address ?? '',
'down_date'=> $request->down_date ?? "",
'down_place'=> $request->down_place ?? '',
 'update_time' => date('Y-m-d H:i:s'),
            'updated_by'  => Session::get('admin_id'),
            'rem_addr' => $request->ip(),
];

  $nbr_prcc = $request->no_of_process_date_consent ?? "";
  $other_any_other_id = $request->other_any_other_id ?? [];


try
{
      $this->updateData('form_aa_mdls',$data, $where);

        
 
     
    
        $this->addMulData($nbr_prcc, 'form_aa_mdl_any_others', $cat->id, 'form_aa_mdls', 'form_aa_id', 'no_of_process_date_consent', $other_any_other_id);


        $response['error'] = false;
        $response['message'] = "Data updated successfully.";
        
 }       
        
  catch(\Exception $e)     
        {
            $response['error'] = true;
            $response['message'] = "Data not saved.";//$e->getMessage();
        }    
    
        echo json_encode($response);     
  }

    
}

?>