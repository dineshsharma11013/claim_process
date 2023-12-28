<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Config;
use App\Models\companyDtl;
use Session;
use App\Traits\MethodsTrait;
use Illuminate\Support\Facades\Storage;

class publishCntrlr extends Controller
{
    use MethodsTrait;
    
    function publications(Request $req)
    {
         $data = DB::table('publication_category');
                  if (userType()->user_type==2 && userType()->sub_user=='') 
                  {
              $data =  $data->where(['created_by_id'=>Session::get('admin_id')]);
                  }
                  
                 $data = $data->get();
         
         foreach($data as $list){
             $res['subCAt'][$list->id] = DB::table('publication_category_document')->where(['category_id'=>$list->id])->get();
            }
         
$data2 = DB::table('blank_document')->orderBy('id', 'desc')->get();
  

  $saved_publication = DB::table('saved_publication');
            if (userType()->user_type==2 && userType()->sub_user=='') 
                  {
                    $saved_publication = $saved_publication->where('created_by',Session::get('admin_id'));
                    $saved_publication = $saved_publication->where('company_id','');  
                  }

      $saved_publication = $saved_publication->orderBy('id', 'desc')->get();

      // echo "<pre>";
      // echo print_r($saved_publication);
      // echo "</pre>";die();



$publication_category = DB::table('publication_category')->where(['created_by_id'=>Session::get('admin_id')])->get();

        return view('admin.publication',compact('data','data2','saved_publication','publication_category'));
    }
    
    
    function create_publication_category()
    {
        
        $data = DB::table('publication_category')->where(['created_by_id'=>Session::get('admin_id')])->get();
        return view('admin.create_publication_category',compact('data'));
    }
    
    
    function subit_publication(Request $request)
    {
$duplicate = DB::table('publication_category')
        ->where('category_name', $request->pblctn_ctgry)
        ->exists();

if(!$duplicate)
{
    
DB::table('publication_category')->insert([
        'category_name' => $request->pblctn_ctgry,
         'created_by_id' =>Session::get('admin_id'),
    ]);
 
    $request->session()->flash('success', 'Data saved successfully');
}  
else
{
    $request->session()->flash('error', 'This category is already exist');
}
    return back();
    }
    
    
    function publicationShow($id)
    {
      $data = DB::table('publication_category');
      if (userType()->user_type==2 && userType()->sub_user=='') 
                  {
              $data =  $data->where(['created_by_id'=>Session::get('admin_id')]);
                  }
                  
                 $data = $data->get();
         
         foreach($data as $list){
             $res['subCAt'][$list->id] = DB::table('publication_category_document')->where(['category_id'=>$list->id])->get();
            }
        
           $data2 = DB::table('blank_document')->where(['ip_id'=>''])->orderBy('id', 'desc')->get();
            
            if(userType()->user_type==2)
            {
           
           $upload_docs = DB::table('blank_document')->where(['ip_id'=>Session::get('admin_id'),'company_id'=>$id])->orderBy('id','desc')->get();
            }
           
            if(userType()->user_type==1)
            {
              $upload_docs = DB::table('blank_document')->where('ip_id', '!=', '')->where(['company_id'=>$id])->orderBy('id', 'desc')->get();


            }
  $saved_publication = DB::table('saved_publication');
            if (userType()->user_type==2 && userType()->sub_user=='') 
                  {
              $saved_publication = $saved_publication->where([['created_by','=',Session::get('admin_id')],['company_id','=','']]);
                  }
            if($id) 
            {
              $saved_publication = $saved_publication->orWhere([['created_by','=',Session::get('admin_id')],['company_id','=',$id]]);
            }      

      $saved_publication = $saved_publication->orderBy('id', 'desc')->get();

      $publication_category = DB::table('publication_category')->where(['created_by_id'=>Session::get('admin_id')])->orderBy('id', 'desc')->get();

        return view('admin.publicationDetails',compact('data','upload_docs','data2','saved_publication','publication_category', 'id'));
     
    }


    function update_publication_category(Request $request)
    {

DB::table('publication_category')->where(['id'=>$request->cty_idd])->update([
        'category_name' => $request->pblctn_ctgry
    ]);
 
  $request->session()->flash('success', 'Data updated successfully');
        
         return back();
        
        
    }
    
    
    function delete_publication_category(Request $request, $id)
    {
        
        
DB::table('publication_category')->where(['id'=>$id])->delete();  
        
     $request->session()->flash('success', 'Data Deleted successfully');
        
         return back();     
    }
    
    
    
    
    function delete_blank_format(Request $request , $id)
    {
  DB::table('blank_document')->where(['id'=>$id])->delete();
     $request->session()->flash('success', 'Data Deleted successfully');

return back();
    }
    
    
    function blank_formats()
    {
     $a_vl =  Config::get('site.sabredgeValidate');
     
     $ips = DB::table('general_info_mdls')->where([['status','=', 1],['deleted_by','=',''], ['flag','=',2], ['user_type', '=', 2], ['sub_user', '=', '']])->orderBy('first_name')->pluck('first_name','id');
      $data = DB::table('blank_document')->where(['create_by_id'=>Session::get('admin_id')])->get();
     $company = companyDtl::where([['status','=', 1],['deleted','=',2]])->orderBy('name')->pluck('name','id');
         return view('admin.blank_formats' , compact('data', 'a_vl', 'ips', 'company'));
        
    }
    
    function submit_blank_format(Request  $request)
    {
    
     // dd($request->all());
    // echo $request->format_name;

        
        
if ($request->hasFile('dcmt')) {
$file = $request->file('dcmt');
//my code start 


$duplicate = DB::table('blank_document')
        ->where('document_name', $request->format_name)
        ->exists();

if(!$duplicate)
{
     $filename = time().'.'.$file->getClientOriginalName();
  $file_path = $file->move(public_path('format_document/'),$filename);
    
$usrtype= DB::table('general_info_mdls')->where(['id'=>Session('admin_id')])->first();
if($usrtype->user_type ==2)
{
  $usr_iid = Session('admin_id');
}
else
{
  $usr_iid ="";
}

DB::table('blank_document')->insert([
        'company_id'=>$request->company_name ?? '',
        'document_name' => $request->format_name,
        'document_type'=>$request->dcmt_type,
          'document' => $filename,
          'ip_id'=>$usr_iid,
          'create_by_id'=>Session::get('admin_id')
    ]);
 
    $request->session()->flash('success', 'Data saved successfully');
}  
else
{
    $request->session()->flash('error', 'This Document name is already exist');
}

//my code end


// Perform file upload and storage here

return redirect()->back()->with('success', 'File uploaded successfully');
} else {
return redirect()->back()->with('error', 'No file uploaded.');
}   
    }
 
function create_category_document($cmid, $ctid)
{
     $data = DB::table('publication_category_document as pcd')
                    ->leftJoin('publication_category as pc', 'pc.id', '=', 'pcd.category_id')
                    ->where('pc.created_by_id',Session::get('admin_id'))
                    ->where('pcd.category_id', $cmid)
                    ->orderBy('pcd.id', 'desc')
                    ->get();
return view('admin.categoryDocument' , compact('data', 'cmid', 'ctid'));
}

function submit_category_document(Request $request)
{
    if ($request->hasFile('dcmt')) {
$file = $request->file('dcmt');

$filename = time().'.'.$file->getClientOriginalName();
$file_path = $file->move(public_path('publication_category_document/'),$filename);
  
    DB::table('publication_category_document')->insert([
        'document_name' => $request->document_name,
          'document' => $filename,
          'category_id'=>$request->ctid,
          'company_id'=>$request->cmid
    ]);
 
    $request->session()->flash('success', 'Data saved successfully');
    return back();
  }
else
{
    session()->flash('error', 'No file selected');
}
}


function saved_publications($id=null)
{
      $jsl =  bPath().'/'.Config::get('site.general');
      $a_vl =  Config::get('site.reportPdf');
      $data = DB::table('saved_publication');
            if (userType()->user_type==2 && userType()->sub_user=='') 
            {
                $data = $data->where('ip_id',session('admin_id'));
                $data = $data->where('company_id','');  
            }
            if ($id)
              {
              $data = $data->where('ip_id',session('admin_id'));
              $data = $data->orWhere('company_id',$id); 
              }
      $data=$data->where('deleted_by', '')->orderBy('id', 'desc')->get();      

    return view('admin.saved_publications' , compact('data', 'jsl', 'a_vl', 'id'));
}

function submit_saved_publication(Request $request, $id=null)
{
   
   $response = array();  
   $company_id = $id;

      if ($request->file('dcmt')) 
        {

        $id=uniqid().time();
        $fileName = $id.".". $request->file('dcmt')->getClientOriginalExtension();   
        $request->file("dcmt")->move("public/access/media/publication/pdf",$fileName);  
        $file = $fileName;
      }
      else
      {
        $file = "";
      }

          
      $data = [
                'pdf_name' =>$request->name,
                'pdf' => $file,
                'company_id'=>$company_id ?? '',
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
        $this->insertData('saved_publication' , $data); 
        $response['error'] = false;
        $response['message'] = "Data saved successfully.";
      
      }
      catch(\Exception $e)     
        {
            $response['error'] = true;
            $response['message'] = $e->getMessage();//"Data not saved.";//$e->getMessage();
        }   
        
        echo json_encode($response);
   
}

function editPublications(Request $req, $id)
{
  $jsl =  bPath().'/'.Config::get('site.general');
        $a_vl =  Config::get('site.reportPdf');
        $cat = DB::table('saved_publication')->where('id', $id)->first();
        return view('admin.editPublication' , compact('cat','id', 'jsl', 'a_vl')); 
}


function update_publication_submit(Request $req)
{
    
    
    
    $file = $req->file('dcmt');

        // Specify the custom path within the public directory
     

if($req->hasFile('dcmt'))
{
       $customPath = 'format_document';

        // Specify the desired filename
        $customFilename = rand(1111111111,999999999999).'.'.$file->getClientOriginalExtension();

        // Store the file in the public/format_document directory with a custom filename
        $path =  $file->move(public_path($customPath), $customFilename);
      $updater = DB::table('blank_document')->where(['id'=>$req->doc_id])->update([
          'document_name'=>$req->format_name,
          'document_type'=>$req->dcmt_type,
          'document'=>$customFilename]);
}
else
{
     $updater = DB::table('blank_document')->where(['id'=>$req->doc_id])->update([
          'document_name'=>$req->format_name,
          'document_type'=>$req->dcmt_type]);
}
    if($updater)
    {
        return redirect()->back()->with(['success' => 'updated successfully', 'status' => 'success']);

    }
    
    
    
}


function updatePublications(Request $request, $id)
  {
      $response = array();  

      $cat = $this->getRow('saved_publication', ['id'=>$id]);


      if ($request->file('dcmt')) 
        {

          if(!empty($cat->pdf))
          {
              if(file_exists(publicP() . '/access/media/publication/pdf/'.$cat->pdf))
              {
                  unlink(publicP() . '/access/media/publication/pdf/'.$cat->pdf);    
              }
          }


        $id=uniqid().time();
        $fileName = $id.".". $request->file('dcmt')->getClientOriginalExtension();   
        $request->file("dcmt")->move("public/access/media/publication/pdf",$fileName);  
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
                'updated_by'  => Session::get('admin_id')
      ];

      try
      {
      
        $this->updateData('saved_publication' , $data, ['id'=>$id]); 
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


function delete_saved_publication(Request $request , $id)
{
      $response = array();
       
      try
      {
        $data = [
            'rem_addr' => $request->ip(),
            'deleted_by' => Session::get('admin_id'),
            'deleted_at' => date('Y-m-d H:i:s')
          ];

        $this->updateData('saved_publication' , $data, ['id'=>$id]); 
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
    
    
}
