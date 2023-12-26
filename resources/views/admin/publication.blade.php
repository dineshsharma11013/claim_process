@extends("admin_layout.main")

@section("container")


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
        <div class="box-header with-border">
          
              <h3 class="box-title">Publications</h3>
          <div class="box-tools pull-right">
            <a href="{{url(admin().'/company-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>
          </div>
        </div>
        <!-- /.box-header -->
        

        <!-- /.box-body -->
    <div class="container-fluid" style="
    margin-top: 30px;">
    <div class='row'>
        <div class='col-md-4'>
           
            <div class="panel panel-default" style="
    background: #e3f0fffa;border: 1px solid black;
">
    <div class="panel-body" style="
    background: oldlace;
">
        <div class='col-md-6 col-xs-6'>
        <h4 class='pub_title'>Ipsupport Format</h4>
    </div>

    @if(userType()->user_type ==1)
        <div class='col-md-6 col-xs-6'>
       <a href="blank_formats" class="btn btn-primary" style="float:right">Add document</a>
    </div>
    @endif
    
    
    
    <div class="col-md-12 col-xs-12" style="height: 115px;overflow-y: auto;margin-top:10px;">
    
    @foreach($data2 as $list2)
<div><p>{{$list2->document_name}}&nbsp; &nbsp; <a href="{{asset('public/format_document/'.$list2->document)}}" target="_blank" style="color:blue;float:right;">View</a></p></div>
 @endforeach

</div>
    
    </div>
  </div> 
           
        </div>
        
        <div class='col-md-4'>
            
            <div class="panel panel-default" style="
    background: #e3f0fffa;border: 1px solid black;
">
    <div class="panel-body" style="
    background: oldlace;
">
         <div class='col-md-6 col-xs-6'>
        <h4 class='pub_title'>My Forms and Publications</h4>
        </div>
         <div class='col-md-6 col-xs-6'>
       <a href="saved_publications" class="btn btn-primary" style="float:right">Add document</a>
    </div>
       <div class="col-md-12 col-xs-12" style="height: 115px;overflow-y: auto;margin-top:10px;">
    
    
  @foreach($saved_publication as $list3)
<div><p>{{$list3->pdf_name}}&nbsp; &nbsp; <a href="{{asset('public/saved_publication/'.$list3->pdf)}}" target="_blank" style="color:blue;float:right;">View</a></p></div>
 @endforeach

</div>
    
    
    </div>
  </div> 
      
        </div>
        
<div class='col-md-4'>
<a href="create_publication_category">
<div class="panel panel-default" style="
    background: #e3f0fffa;border: 1px solid black;
">
<div class="panel-body" style="
    background: oldlace;
">
     <div class='col-md-6 col-xs-6'>
    <h4 class='pub_title'>Create category</h4>
</div>
 <div class='col-md-6 col-xs-6'>
       <a href="create_publication_category" class="btn btn-primary" style="float:right">Add Category</a>
    </div>

   <div class="col-md-12 col-xs-12" style="height: 115px;overflow-y: auto;margin-top:10px;">
    
    
  @foreach($publication_category as $list4)
<div><p>{{$list4->category_name}}&nbsp; &nbsp; </p></div>
 @endforeach
 

</div>

</div>
</div> 
</a>
</div>




@foreach ($data as $item)

<div class='col-md-6'>
    
<div class="panel panel-default" style="
    background: #e3f0fffa;border: 1px solid black;
">
<div class="panel-body">
    <div class='col-md-6 col-xs-6'><h4 class='pub_title'>{{$item->category_name }} 
      </h4></div>
     <!--  <div class="col-md-6"><a href="create_category_document/{{$item->id}}" class="btn btn-primary" style="float:right">Add Document</a></div> -->

<div class='col-md-6 col-xs-6'></div>
<div class='col-md-12 col-xs-12' style="height: 115px;overflow-y: auto;margin-top:10px;">
    
<!-- @php

$res =  DB::table('publication_category_document as pcd')
                    ->leftJoin('publication_category as pc', 'pc.id', '=', 'pcd.category_id')
                    ->where('pc.created_by_id',session()->get('admin_id'))
                    ->where('pcd.category_id', $item->id)
                    ->orderBy('pcd.id', 'desc')
                    ->get();

@endphp

@foreach($res as $re)
  <p>{{$re->document_name}} <span><a href="./../public/publication_category_document/{{$re->document }}" target="_blank" style="float: right;"> View document</a></span></p>

@endforeach -->

</div>
</div>
</div> 

</div>

@endforeach

 </div>
    </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>


@section('script')


@endsection  
@endsection  
