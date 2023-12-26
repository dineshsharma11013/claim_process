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
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box">
            <div class="box-header">
                <a href="javascript:void(0);" onclick="window.history.go(-1); return false;" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
             <!--  <a href="{{url(admin().'/add-user-type')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-plus"></i> ADD user type</a> -->
              <h3 class="box-title"><u>Form CA Registered Details</u></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S. No.</th>
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
                <tbody>
                @forelse($usrs as $us)

                  @php

                    $cat = DB::table("form_modification_mdls")->select('id','form_id','approval_status','form_update_status','form_update_time')->where([['form_type','=','Form-CA Update Request'],['form_id','=',$us->id]])->orderBy('id','desc')->first();

                    $fm = DB::table('financial_creditor_form_ca_mdls')->select('id','fc_name','user_id','admin_id','form_ca_selected_id','status','created_at','updated_at')->where([['form_ca_selected_id','=', $us->id],['submitted','=',1]])->orderBy('id','desc')->first();  

                    @endphp

                  <tr>
                    <td>{{$loop->index+1}}</td>
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

                      <a class="{{Config::get('site.detailBtn')}}" href="{{url(admin().'/form-ca-registered-details/'.$fid)}}" target="_blank"><i class="fa fa-eye"></i><!--{{$us->id}}--> Details</a>

                      

                      @if(isset($cat->approval_status))
                      @if($cat->approval_status==2)
                       <button class="btn bg-maroon btn-sm" id="requestStatus_formb_{{$us->id}}" onclick="formEditApproval('{{$us->id}}','Form-CA Update Request','{{$us->user_id}}', '/form-notification-update', 'requestStatus_formb_{{$us->id}}', 'Form-CA')">Approve Edition</button> 
                      @elseif($cat->approval_status==1 && $cat->form_update_status==2)
                       <button class="btn bg-maroon btn-sm">Approved</button> 
                      @elseif($cat->approval_status==1 && $cat->form_update_status==1)
                       <button class="btn bg-maroon btn-sm">Updated</button>  
                      @endif  
                      @endif
                    </td>
                      
                    
                  </tr>
                 
                 @empty
                 <tr><td>{{Config::get('site.no_data')}}</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                 @endforelse
          
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

@section('script')

<x-js :file="$jsl" />
@endsection
@endsection