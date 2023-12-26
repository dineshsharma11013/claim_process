@extends("admin_layout.main")

@section("container")


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol> -->
    </section>
    
    


    <!-- Main content -->
    <section class="content">
      <div class="box box-default">
        <div class="box-header with-border">
          
              <h3 class="box-title">Generate Report</h3>
    
        </div>
        <!-- /.box-header -->
        <form>
          @csrf
        <div class="box-body">
          <div class="row">
            
            <div class="col-md-12">
              @php 
                $comp = Config::get('site.comp');
                $sixDiv = Config::get('site.sixDiv');
                $formMethod = 'adminGeneral';
                @endphp
                
                 <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Select Form <span class="required_cls">*</span></label>
                  {!! Form::select('company', Config::get('site.allFormList'), null, ['onchange' =>'getDatafilter(this.value)' ,'id' => 'company','class'=>'form-control', 'placeholder'=>'Select Form', 'autocomplete'=>'off']) !!}
                  <div class="error_cls" id="error_company"></div>
                </div>

                <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Select Budget <span class="required_cls">*</span></label>
                  {!! Form::select('form', Config::get('site.budget'), null, ['onchange' =>'getBudget(this.value)' ,'id' => 'form','class'=>'form-control', 'placeholder'=>'Select Form']) !!}
                  <div class="error_cls" id="error_form"></div>
                </div>
   
                <div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Enter Budget<span class="required_cls">*</span></label>
                  <input class="form-control" id="budget_input_first" type="text" name="filter_value" placeholder="Enter Budget">
                
              
              
                  <div class="error_cls" id="error_report_type"></div>
                </div>
                
                <div id="filetr_value_input"></div>
                

              </div>

          </div>
          <!-- /.row -->
        </div>

        <div class="box-footer">

           

               <button type="button"  onClick="getDatafilter( $('#company').val())"  class="btn btn-primary btn-sm">Search</button> 

                   

                  


              </div>

        </form>
        


        <!-- /.box-body -->
        
      <!-- /.row -->
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
              <!--<a href="{{url(admin().'/form-a')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD Form A</a>-->
              <h3 class="box-title"><u>Form Details</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
                  <th>Form</th>
                  <th>Company</th>
                  <th>IP</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Contact</th>
                  <!-- <th>Status</th> -->
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody id="appendFilterData">
                  
               @php $i=1; @endphp

                 @foreach($usrs as $us)

                   @php

                      $cat = DB::table("form_modification_mdls")->select('id','form_id','approval_status','form_update_status','form_update_time')->where([['form_type','=','Form-B Update Request'],['form_id','=',$us->id]])->orderBy('id','desc')->first();

                      $fm = DB::table('operational_creditor_mdls')->select('id','operational_creditor_name','user_id','admin_id','form_b_selected_id','status','created_at','updated_at')->where([['form_b_selected_id','=', $us->id],['submitted','=',1]])->orderBy('id', 'desc')->first(); 

                      @endphp

                  <tr>
                    <td>{{$i}}</td>
                    <td>Form B</td>
                    <td>{{ucwords($us->company)}}</td>
                    <td>{{ucwords($us->ip)}}</td>
                    <td>
                    {{ucwords($us->name)}}
                    </td>
                    <td>
                    {{$us->email}}
                    </td>
                    <td>
                      {{$us->mobile}}

                    </td>
                   <!--  <td>
                      
                    </td> -->
                    <td>{{$us->created_at}}</td>
                    <td>
                      @if(isset($fm->updated_at))
                      {{$fm->updated_at}}
                      @endif
                    </td>
                    

                    <td>
                      @php 
                          $uuid = base64_encode($us->unique_id);
                            $fid = base64_encode($us->id);
                          @endphp
      

                           <a href="{{url(admin().'/get-form-b-pdf-report/'.$fm->form_b_selected_id.'/'.$fm->id)}}" target="_blank" id="export" class="btn bg-orange btn-sm" ><i class="fa fa-file-pdf-o"></i> View</a>

                       <!-- <a class="{{Config::get('site.viewDataBtn')}}" href="{{url('/').'/form?name='.$us->name.'&email='.$us->email.'&mobile='.$us->mobile.'&type='.$us->form_type.'&ar='.$us->ar.'&view=true'.'&uuid='.$uuid.'&reg='.$fid.'&fm=reg'}}" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i> View</a> -->      

                      <!--<a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-b-registered-details/'.$fid)}}"><i class="fa fa-eye"></i>Details</a>-->

                     
                        @php $i++; @endphp

                      <!--@if(isset($cat->approval_status))-->
                      <!--@if($cat->approval_status==2)-->
                      <!-- <button class="btn bg-maroon btn-sm" id="requestStatus_formb_{{$us->id}}" onclick="formEditApproval('{{$us->id}}','Form-B Update Request','{{$us->user_id}}', '/form-notification-update', 'requestStatus_formb_{{$us->id}}', 'Form-B')">Approve Edition</button> -->
                      <!--@elseif($cat->approval_status==1 && $cat->form_update_status==2)-->
                      <!-- <button class="btn bg-maroon btn-sm">Approved</button> -->
                      <!--@elseif($cat->approval_status==1 && $cat->form_update_status==1)-->
                      <!-- <button class="btn bg-maroon btn-sm">Updated</button>  -->
                      <!--@endif  -->
                      <!--@endif-->
                    </td>
                      
                    
                  </tr>
                 
            
                 @endforeach
                 
                   @foreach($usrs_c as $us)

                  @php

                    $cat = DB::table("form_modification_mdls")->select('id','form_id','approval_status','form_update_status','form_update_time')->where([['form_type','=','Form-C Update Request'],['form_id','=',$us->id]])->orderBy('id','desc')->first();

                    $fm = DB::table('finanicial_creditor_form_c_mdls')->select('id','fc_name','user_id','admin_id','form_c_selected_id','status','created_at','updated_at')->where([['form_c_selected_id','=', $us->id],['submitted','=',1]])->orderBy('id', 'desc')->first(); 
                    
                    $i++;

                    @endphp

                  <tr>
                    <td>{{$i}}</td>
                     <td>Form C</td>
                    <td>{{ucwords($us->company)}}</td>
                    <td>{{ucwords($us->ip)}}</td>
                    <td>
                    {{ucwords($us->signing_person_name)}}
                    </td>
                    <td>
                    {{$us->email}}
                    </td>
                    <td>
                      {{$us->mobile}}

                    </td>
                   <!--  <td>
                      
                    </td> -->
                    <td>{{$us->created_at}}</td>
                    <td>
                      @if(isset($cat->form_update_time))
                      {{$cat->form_update_time}}
                      @endif
                    </td>
                    <td>
                      @php 
                          $uuid = base64_encode($us->unique_id);
                            $fid = base64_encode($us->id);
                          @endphp

                        <a href="{{url(admin().'/get-form-c-pdf-report/'.$fm->form_c_selected_id.'/'.$fm->id)}}" target="_blank" id="export" class="btn bg-orange btn-sm"><i class="fa fa-file-pdf-o"></i> View</a>  

                       <!-- <a class="{{Config::get('site.viewDataBtn')}}" href="{{url('/').'/form?name='.$us->name.'&email='.$us->email.'&mobile='.$us->mobile.'&type='.$us->form_type.'&ar='.$us->ar.'&view=true'.'&uuid='.$uuid.'&reg='.$fid.'&fm=reg'}}" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i> View</a>       -->

                   
                    </td>
                      
                    
                  </tr>
                  
                  @endforeach
                  
                  
                  
                   @foreach($usrs_d as $us)

                @php
                

                    $cat = DB::table("form_modification_mdls")->select('id','form_id','approval_status','form_update_status','form_update_time')->where([['form_type','=','Form-D Update Request'],['form_id','=',$us->id]])->orderBy('id','desc')->first();

                    $fm = DB::table('form_d_mdls')->select('id','name','user_id','admin_id','form_d_selected_id','status','created_at','updated_at')->where([['form_d_selected_id','=', $us->id],['submitted','=',1]])->orderBy('id', 'desc')->first();

                       $i++;
                    @endphp

                  <tr>
                    <td>{{$i}}</td>
                      <td>Form D</td>
                    <td>{{ucwords($us->company)}}</td>
                    <td>{{ucwords($us->ip)}}</td>
                    <td>
                    {{ucwords($fm->name)}}
                    </td>
                    <td>
                     {{$us->email}}
                    </td>
                    <td> {{$us->mobile}}
                    </td>
                  
                    <td>{{$us->created_at}}</td>
                    <td>@if(isset($fm->updated_at))
                      {{$fm->updated_at}}
                      @endif
                    </td>
                      <td>
                        @php $uuid = base64_encode($us->unique_id);
                              $fid = base64_encode($us->id);
                          @endphp

                          <a href="{{url(admin().'/get-form-d-pdf-report/'.$fm->form_d_selected_id.'/'.$fm->id)}}" target="_blank" id="export" class="btn bg-orange btn-sm" style="margin-right: 5px;"><i class="fa fa-file-pdf-o"></i> View</a>
                      
                       <!-- <a class="{{Config::get('site.viewDataBtn')}}" href="{{url('/').'/form?name='.$us->name.'&email='.$us->email.'&mobile='.$us->mobile.'&type='.$us->form_type.'&ar='.$us->ar.'&view=true'.'&uuid='.$uuid.'&reg='.$fid.'&fm=reg'}}" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i> View</a>       -->

                   
                      
                      </td>
                      
                    
                  </tr>
                  
                
               @endforeach
               
                @foreach($usrs_ca as $us)

                  @php

                    $cat = DB::table("form_modification_mdls")->select('id','form_id','approval_status','form_update_status','form_update_time')->where([['form_type','=','Form-CA Update Request'],['form_id','=',$us->id]])->orderBy('id','desc')->first();

                    $fm = DB::table('financial_creditor_form_ca_mdls')->select('id','fc_name','user_id','admin_id','form_ca_selected_id','status','created_at','updated_at')->where([['form_ca_selected_id','=', $us->id],['submitted','=',1]])->orderBy('id','desc')->first();  
                    
                    $i++;

                    @endphp

                  <tr>
                    <td>{{$i}}</td>
                      <td>Form CA</td>
                    <td>{{ucwords($us->company)}}</td>
                    <td>{{ucwords($us->ip)}}</td>
                    <td>
                    {{ucwords($us->signing_person_name)}}
                    </td>
                    <td>
                    {{$us->email}}
                    </td>
                    <td>
                      {{$us->mobile}}

                    </td>
                   <!--  <td>
                      
                    </td> -->
                    <td>{{$us->created_at}}</td>
                    <td>
                      @if(isset($cat->form_update_time))
                      {{$cat->form_update_time}}
                      @endif
                    </td>
                    <td>
                      @php 
                          $uuid = base64_encode($us->unique_id);
                            $fid = base64_encode($us->id);
                          @endphp

            
                          <a href="{{url(admin().'/get-form-ca-pdf-report/'.$fm->form_ca_selected_id.'/'.$fm->id)}}" target="_blank" id="export" class="btn bg-orange btn-sm"><i class="fa fa-file-pdf-o"></i> View</a>

                       <!-- <a class="{{Config::get('site.viewDataBtn')}}" href="{{url('/').'/form?name='.$us->name.'&email='.$us->email.'&mobile='.$us->mobile.'&type='.$us->form_type.'&ar='.$us->ar.'&view=true'.'&uuid='.$uuid.'&reg='.$fid.'&fm=reg'}}" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i> View</a>       -->

                    </td>
                      
                    
                  </tr>
                 
                 @endforeach
                 
                 
                
                 
                 
                 
                   @foreach($usrs_e as $us)

                @php

                    $cat = DB::table("form_modification_mdls")->select('id','form_id','approval_status','form_update_status','form_update_time')->where([['form_type','=','Form-E Update Request'],['form_id','=',$us->id]])->orderBy('id','desc')->first();

                    $fm = DB::table('form_e_file_mdls')->where('form_e_selected_id', $us->id)->where('submitted',1)->orderBy('id','desc')->first();

                    @endphp

                  <tr>
                    <td>{{$loop->index+1}}</td>
                      <td>Form E</td>
                    <td>{{ucwords($us->company)}}</td>
                    <td>{{ucwords($us->ip)}}</td>
                    <td>
                    {{ucwords($us->name)}}
                    </td>
                    <td>
                     {{$us->email}}
                    </td>
                    <td> {{$us->mobile}}
                    </td>
                  
                    <td>{{$us->created_at}}</td>
                    <!-- <td>@if(isset($cat->form_update_time))
                      {{$cat->form_update_time}}
                      @endif
                    </td> -->
                    <td></td>
                      <td>
                        @php $uuid = base64_encode($us->unique_id);
                              $fid = base64_encode($us->id);
                          @endphp
                      
                          <a href="{{url(admin().'/get-form-e-pdf-report/'.$fm->form_e_selected_id.'/'.$fm->id)}}" target="_blank" id="export" class="btn bg-orange btn-sm"><i class="fa fa-file-pdf-o"></i> View</a>

                       <!-- <a class="{{Config::get('site.viewDataBtn')}}" href="{{url('/').'/form?name='.$us->name.'&email='.$us->email.'&mobile='.$us->mobile.'&type='.$us->form_type.'&ar='.$us->ar.'&view=true'.'&uuid='.$uuid.'&reg='.$fid.'&fm=reg'}}" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i> View</a>       -->

                     
                      
                      </td>
                      
                    
                  </tr>
                  
                
                @endforeach
                
                
                
                  @forelse($usrs_f as $us)

                @php

                    $cat = DB::table("form_modification_mdls")->select('id','form_id','approval_status','form_update_status','form_update_time')->where([['form_type','=','Form-F Update Request'],['form_id','=',$us->id]])->orderBy('id','desc')->first();

                    $fm = DB::table('other_creditor_form_f_mdls')->select('id','fc_name','user_id','admin_id','form_f_selected_id','status','created_at','updated_at')->where([['form_f_selected_id','=', $us->id],['submitted','=',1]])->orderBy('id','desc')->first();
                    @endphp 

                  <tr>
                    <td>{{$loop->index+1}}</td>
                      <td>Form F</td>
                    <td>{{ucwords($us->company)}}</td>
                    <td>{{ucwords($us->ip)}}</td>
                    <td>
                    {{ucwords($us->signing_person_name)}}
                    </td>
                    <td>
                     {{$us->email}}
                    </td>
                    <td> {{$us->mobile}}
                    </td>
                  
                    <td>{{$us->created_at}}</td>
                    <!-- <td>@if(isset($cat->form_update_time))
                      {{$cat->form_update_time}}
                      @endif
                    </td> -->
                    <td></td>
                      <td>
                        @php $uuid = base64_encode($us->unique_id);
                              $fid = base64_encode($us->id);
                          @endphp
                      
                        <a href="{{url(admin().'/get-form-f-pdf-report/'.$fm->form_f_selected_id.'/'.$fm->id)}}" target="_blank" id="export" class="btn bg-orange btn-sm"><i class="fa fa-file-pdf-o"></i> View</a>  

                       <!-- <a class="{{Config::get('site.viewDataBtn')}}" href="{{url('/').'/form?name='.$us->name.'&email='.$us->email.'&mobile='.$us->mobile.'&type='.$us->form_type.'&ar='.$us->ar.'&view=true'.'&uuid='.$uuid.'&reg='.$fid.'&fm=reg'}}" target="_blank"><i class="fa fa-fw fa-file-pdf-o"></i> View</a>       -->

                  
                      
                      </td>
                      
                    
                  </tr>
                  
                
              @endforeach
                
          
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<script>
function getDatafilter(val)
{
    console.log(val);
    var budget_select = $('#form').val();
    var budget_input = $('#budget_input_first').val();
    var budget_input_second = $('#budget_input_second').val();
    
   $.ajax({
    url: '{{ url(admin().'/show_all_forms_filter_ajax') }}',
    type: 'get',
    data: { 'company': val, 'budget_select':budget_select,'budget_input':budget_input,'budget_input_second':budget_input_second }, // Removed single quotes around the object
    beforeSend: function() {
        // Code to execute before sending the request
    },
    success: function(data) {
        // Code to execute on successful response
        $('#appendFilterData').html(data.data);
    },
    error:function(err)
    {
        console.log(err);
    }
});

}

function getBudget(value){
    if(value == 'Between'){
        var htmll =`<div class="form-group col-md-3">
                  <label for="exampleInputEmail1">Enter Budget<span class="required_cls">*</span></label>
                  <input class="form-control" id="budget_input_second" type="text" name="filter_value_second" placeholder="Enter Budget">
                  <div class="error_cls" id="error_report_type_send"></div>
                </div>`;
                
                $('#filetr_value_input').html(htmll);
    }else{
          $('#filetr_value_input').html('');
    }
}

// function filter_seach_button(){
//     var com = $('#company').val();
   
    
//     $.ajax({
//         url('')
//     })
// }
</script>
@section('script')

<x-js :file="$jsl" />
@endsection
@endsection