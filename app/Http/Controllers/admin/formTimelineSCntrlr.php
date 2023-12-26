<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Config;
use Session;
use DB;
use PDF;

class formTimelineSCntrlr extends Controller
{
    
    public function Timeline(){
           
             $jsl =  bPath().'/'.Config::get('site.general');
           return view('admin.timeline');
    }
    
    public function formTimeline(){
           $debitor_details = db::table('form2_mdls')->orderby('id','desc')->get();
             $jsl =  bPath().'/'.Config::get('site.general');
           return view('admin.FormTimeline',['debitor_details'=>$debitor_details,'jsl'=>$jsl]);
    }
    
    public function formTimelineEnteyDetails(Request $request,$id){
        $jsl =  bPath().'/'.Config::get('site.general');
        
        $debitor_details = db::table('form2_mdls')->where('id',$id)->first();
        $commencement_date='';
        if(!empty($debitor_details)){
        $commencement_date = db::table('form_a_s')->where('corporate_person_name',$debitor_details->vs_name_of_corporate_debtor)->first();
        }
        
        return view('admin.formTimelineDetails',compact('jsl','debitor_details','commencement_date'));
    }
    
    public function formTimelineprocesschat($id){
          $jsl =  bPath().'/'.Config::get('site.general');
          $debitor_details = db::table('form2_mdls')->where('id',$id)->first();
          $process_static_list = DB::table('time_line')->get();
          $time_table_field= DB::table('time_table_filed')->where('form_id',$id)->first();
        
      //  dd($debitor_details);die();
        return view('admin.formTimelineprocesschat',compact('jsl','debitor_details','process_static_list','time_table_field'));
        
    }
    
    public function generatepdf_timeline($id){
        
    
          $jsl =  bPath().'/'.Config::get('site.general');
          $debitor_details = db::table('form2_mdls')->where('id',$id)->first();
          $process_static_list = DB::table('time_line')->get();
            $time_table_field= DB::table('time_table_filed')->where('form_id',$id)->first();
          
         $pdf = PDF::loadView('admin.timelinepdf_process_chart',compact('jsl','debitor_details','process_static_list','time_table_field'));
         $pdf->setPaper('A2', 'vertical');
          
    
        
        $now = time();
        return $pdf->stream('FormB-'.$now.'.pdf');


    }
    
}