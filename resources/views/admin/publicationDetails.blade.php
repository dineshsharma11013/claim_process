@extends("admin_layout.main")

@section("container")
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <h1>
        General Form Elements
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">General Elements</li>
      </ol> -->
    </section>
<style>
.pub_title {
 font-weight:600;   
}
</style>
    <!-- Main content -->
    
    
    <section class="content">
    
    
      <div class="box box-default">
    
@if(session('success'))
    <div id="successMessage" class="alert alert-success">
        {{ session('success') }}
    </div>

    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $("#successMessage").fadeOut('slow');
            }, 5000); // 5000 milliseconds = 5 seconds
        });
    </script>
@endif
        <div class="box-header with-border">
          
              <h3 class="box-title">Publications</h3>
          <div class="box-tools pull-right">
            @foreach(getCompanyDetails() as $iv)
          @if($iv->id == $id)
          <a href="{{url(admin().'/dashboard-user/'.$id)}}" style="font-weight: bold;font-size: 16px;text-transform: uppercase;">{{$iv->name}}</a>
           
          @endif
        @endforeach
          </div>
        </div>
        <!-- /.box-header -->
         
        <div style="margin-top: 5px;">
          <span style="margin-left: 12px;font-size: 16px;">FORMATS</span>
          <hr>
        </div>
        

        <!-- /.box-body -->
    <div class="container-fluid" style="
    margin-top: 30px;">
    <div class='row'>
        <div class='col-md-12'>
           
            <div class="panel panel-default" style="
    background: #e3f0fffa;border: 1px solid black;
">
    <div class="panel-body" style="
    background: oldlace;
">
        <div class='col-md-6 col-xs-6'>
        <h4 class='pub_title'>Ipsupport Format</h4>
    </div>

   <!-- @if(userType()->user_type ==1)
        <div class='col-md-6 col-xs-6'>
       <a href="blank_formats" class="btn btn-primary" style="float:right">Add document</a>
    </div>
    @endif
    -->
    
    
    <div class="col-md-12 col-xs-12" style="height: 115px;overflow-y: auto;margin-top:10px;">
    
    @foreach($data2 as $list2)
<div><p>{{$list2->document_name}}&nbsp; &nbsp; <a href="{{asset('public/format_document/'.$list2->document)}}" target="_blank" style="color:blue;float:right;">View</a> </p></div>
 @endforeach

</div>
    
    </div>
  </div> 
           
        </div>
        
 
</div>

<div class="row">
<div style="margin-top: 5px;">
          <span style="margin-left: 12px;font-size: 16px;">DOC UPLOAD</span>  <button type="button" class='btn btn-warning' data-toggle="modal" data-target="#myModal" style="float:right;margin-right:10px;">Add Document</button>
          <hr>
        </div>

<div class="col-md-12">
    
    <table class='table' id="example1">
   <thead>
       <tr>
<th>Sno</th>
<th>Name</th>
<th>List of document</th>
<th>Document</th>
<th>Action</th>
</tr>   
   </thead>     
<tbody>
    @php
    $sno=1;
    
    @endphp
    @foreach($upload_docs as $list2)
<tr>
    <td>{{$sno++}}</td>
     <td>

       
        {{userInfo($list2->created_by)->first_name}}
       
     </td>
     <td>{{$list2->document_name}}</td>
      <td><a href="{{asset('public/format_document/'.$list2->document)}}" class='btn btn-primary' target="_blank">View</a></td>
       <td><a href="#" onClick="get_val('{{$list2->document_name}}','{{asset('public/format_document/'.$list2->document)}}','{{$list2->document_type}}','{{$list2->id}}')" class='btn btn-warning' data-toggle="modal" data-target="#myModal2">Edit</a> <a href="{{url(admin().'/delete_blank_format/'.$list2->id)}}" class='btn btn-danger'>Delete</a></td>
    
</tr>
@endforeach
       
       </tbody> 
    </table>
    
</div>
<!--@foreach ($data as $item)

<div class='col-md-6'>
    
<div class="panel panel-default" style="
    background: #e3f0fffa;border: 1px solid black;
">
<div class="panel-body">
    <div class='col-md-6 col-xs-6'><h4 class='pub_title'>{{$item->category_name }}  
      </h4></div>
      <div class="col-md-6"><a href="{{url(admin().'/create_category_document/'.$id.'/'.$item->id)}}" class="btn btn-primary" style="float:right">Add Document</a></div>

<div class='col-md-6 col-xs-6'></div>
<div class='col-md-12 col-xs-12' style="height: 115px;overflow-y: auto;margin-top:10px;">
    
@php

$res =  DB::table('publication_category_document as pcd')
                    ->leftJoin('publication_category as pc', 'pc.id', '=', 'pcd.category_id');
                    if (userType()->user_type==2 && userType()->sub_user=='')
                    {
          $res =  $res->where('pc.created_by_id',session()->get('admin_id'));
                    }
          $res =  $res->where('pcd.company_id', $id)
                    ->orderBy('pcd.id', 'desc')
                    ->get();

@endphp

@foreach($res as $re)
  @if($item->id==$re->category_id)
  <p>{{$re->document_name}}  <span><a href="./../public/publication_category_document/{{$re->document }}" target="_blank" style="float: right;"> View document</a></span></p>
  @endif
@endforeach

</div>
</div>
</div> 

</div>

@endforeach-->

 </div>
    </div>
      <!-- /.row -->
      
      
      <!----------My modaL START------->
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Document Upload</h4>
        </div>
        <div class="modal-body">
         <form action="{{route('submit_blank_format')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="form-group col-md-6">

  <input type="hidden" value="{{$id}}" name="company_name">
    <label for="name">Document name</label>
    <input type="text" name="format_name" class="form-control" placeholder="Enter document name" id="name" required>
  </div>
  <div class="form-group col-md-6">
    <label for="pwd">Document type:</label>
    <select name="dcmt_type" class="form-control" id="pwd" required>
    
    <option value="">Choose Document </option>
    <option value="Forms">Forms</option>
    <option value="Publication">Publication</option>
    <option value="Other">Other</option>
    </select>
  </div>
    <div class="form-group col-md-12">
    <label for="filell">File:</label>
    <input type="file" class="form-control" id="filell" name="dcmt" required>
  </div>
  <div class="col-md-12">
 
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
      <!---------MY MODAL END--------->
      
      
      
      
      
       <div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update Upload</h4>
        </div>
        <div class="modal-body">
         <form action="{{route('update_blank_format')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="form-group col-md-6">
    <label for="name">Document name</label>
    
    <input type="hidden" name="doc_id" id="dco_id">
    <input type="text" name="format_name" class="form-control" placeholder="Enter document name" id="ename" required>
  </div>
  <div class="form-group col-md-6">
    <label for="pwd">Document type:</label>
    <select name="dcmt_type" class="form-control" id="dcmt_typ" required>
    
    <option value="">Choose Document </option>
    <option value="Forms">Forms</option>
    <option value="Publication">Publication</option>
    <option value="Other">Other</option>
    </select>
  </div>
    <div class="form-group col-md-12">
    <label for="filell">File:</label>
    <input type="file" class="form-control" id="filell" name="dcmt">
    
    <span id="myfile"></span>
  </div>
  <div class="col-md-12">
 
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
      
      
      
      
      
      
    </section>
    <!-- /.content -->
  </div>

<script>
    const get_val = (document_name , documente , document_type , docment_id)=>{
    
     $('#ename').val(document_name);
       $('#dcmt_typ').val(document_type); 
       $('#dco_id').val(docment_id);
       $('#myfile').html('<a href='+documente+'>View Document</a>');
    }
    
</script>

@section('script')


@endsection  
@endsection  
