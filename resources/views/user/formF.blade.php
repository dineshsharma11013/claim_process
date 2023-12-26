@extends("user_layout/layout")
@section('user_content')


<main>
<div class="container-fluid">
<!--<h2 class="mt-30 page-title">All Users</h2>-->
<ol class="breadcrumb mb-30 mt-2">
<li class="breadcrumb-item active breadcrumb_heading" style="font-weight:bold;"> Form F</li>
</ol>


@if(count($results1))
<table class='table'>
<thead>   
<tr>
<th>S.No</th>
<th>Company</th>
<th>IP</th>
<th>Name</th>
<th>Address</th>
<th>Email</th>
<th>Date</th>
<th>Action </th>
</tr>
</thead>
   <tbody>     
   @forelse($results1 as $res)

   @php
  $fm = DB::table('other_creditor_form_f_mdls')->select('id', 'fc_name', 'user_id', 'admin_id', 'form_f_selected_id', 'status', 'created_at', 'updated_at')->where([['form_f_selected_id','=', $res->id],['submitted','=',1]])->orderBy('id', 'desc')->first();
@endphp

   <tr>
        <td>{{$loop->index+1}}</td>
        <td>{{ucwords($res->company)}}</td>
        <td>{{ucwords($res->ip)}}</td>
        <td>{{ucwords($res->signing_person_name)}}</td>
        <td>{{$res->signing_address}}</td>
        <td>{{$user->email}}</td>
        <td>{{dateFm2($res->created_at)}}</td>
        <td>
         @php 

         $latest = DB::table('other_creditor_form_f_mdls as fb')
                    ->select('fb.id')
                    ->where([['user_id','=',Session::get('user_id')],['submitted','=',1],['form_f_selected_id','=',$res->id]])
                    ->orderBy('id','desc')
                    ->first();                   

                            $uuid = base64_encode($user->unique_id);
                            $fid = base64_encode($res->id);            

                          @endphp 

     <a href="{{url('/user-form-f-details/'.$fid)}}" class='btn btn-primary btn-sm' target="_blank">Details</a>                      

    <a href="{{url('/').'/form?name='.$user->name.'&email='.$user->email.'&mobile='.$user->mobile.'&type='.$res->form_type.'&ar='.$res->ar.'&view=true'.'&uuid='.$uuid.'&reg='.$fid.'&fm=reg'}}" class='btn btn-info btn-sm' target="_blank"><!--{{$latest->id}}--> View</a> 

    @php

    $cat = DB::table("form_modification_mdls")->select('form_id','approval_status','form_update_status')->where([['user_id','=',Session::get('user_id')],['form_type','=','Form-F Update Request'],['form_id','=',$res->id]])->get();

    @endphp

    @if(count($cat)>1)
      
      @php
    $cat3 = DB::table("form_modification_mdls")->select('id','form_id','approval_status','form_update_status')->where([['user_id','=',Session::get('user_id')],['form_type','=','Form-F Update Request'],['form_id','=',$res->id]])->orderBy('id','desc')->first();
    @endphp

    @if($cat3->approval_status==2)
     
      <button class='btn btn-danger btn-sm'>Approval Pending</button>
       @if(count($cat)>2)
    <!--     <span>details</span> -->
      @endif
      
    @elseif($cat3->approval_status==1 && $cat3->form_update_status==2)
       
       @php 
                            $uuid = base64_encode($user->unique_id);
                              $fid = base64_encode($res->id);
                            @endphp

                            
      <a class="{{Config::get('site.editDataBtn')}}" href="{{url('/').'/form?name='.$user->name.'&email='.$user->email.'&mobile='.$user->mobile.'&type='.$res->form_type.'&ar='.$res->ar.'&edit=true'.'&uuid='.$uuid.'&reg='.$fid.'&fm=reg'}}" target="_blank"><i class="fa fa-edit"></i>  Edit</a> 

      @if(count($cat)>2)
     <!--    <span>details</span> -->
      @endif


    @elseif($cat3->approval_status==1 && $cat3->form_update_status==1)
    
      <button onclick="sendRequestToEditInfo('{{$res->id}}','Form-F Update Request','mailRequestFormF_{{$res->id}}', '/send-form-modification-request', 'Form-F')" id="mailRequestFormF_{{$res->id}}" class='btn btn-warning'> Request to Edit Again</button>
          <!-- <span>details</span> -->

    @endif




    @elseif(count($cat)==1)
    
    @php
    $cat2 = DB::table("form_modification_mdls")->select('form_id','approval_status','form_update_status')->where([['user_id','=',Session::get('user_id')],['form_type','=','Form-F Update Request'],['form_id','=',$res->id]])->first();
    @endphp

    @if($cat2->approval_status==2)
      <button class='btn btn-danger btn-sm'>Approval Pending</button>
      
    @elseif($cat2->approval_status==1 && $cat2->form_update_status==2)
       
       @php 
                            $uuid = base64_encode($user->unique_id);
                              $fid = base64_encode($res->id);
                            @endphp

                            
      <a class="{{Config::get('site.editDataBtn')}}" href="{{url('/').'/form?name='.$user->name.'&email='.$user->email.'&mobile='.$user->mobile.'&type='.$res->form_type.'&ar='.$res->ar.'&edit=true'.'&uuid='.$uuid.'&reg='.$fid.'&fm=reg'}}" target="_blank"><i class="fa fa-edit"></i>  Edit</a> 

    @elseif($cat2->approval_status==1 && $cat2->form_update_status==1)
    
      <button onclick="sendRequestToEditInfo('{{$res->id}}','Form-F Update Request','mailRequestFormF_{{$res->id}}', '/send-form-modification-request', 'Form-F')" id="mailRequestFormF_{{$res->id}}" class='btn btn-warning'> Request to Edit Again</button>
       <!--    <span>details</span> -->

    @endif

    
    @else
    <button onclick="sendRequestToEditInfo('{{$res->id}}','Form-F Update Request','mailRequestFormF_{{$res->id}}', '/send-form-modification-request', 'Form-F')" id="mailRequestFormF_{{$res->id}}" class='btn btn-warning  btn-sm'> Request to Edit</button>
    @endif


    </td>
       </tr>
    @empty
    <tr><td>{{Config::get('site.no_submit')}}</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
    @endforelse  
    </tbody>
        
    </table>

@else

    {{Config::get('site.no_submit')}}

@endif


</div>
</main>

@section('userJS')

<x-js :file="$jsl" />

@endsection

@endsection