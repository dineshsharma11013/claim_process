@extends("admin_layout.main")

@section("container")


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       All Forms
       @foreach(getCompanyDetails() as $iv)
          @if($iv->id == $id)
          <a href="{{url(admin().'/dashboard-user/'.$id)}}" style="font-weight: bold;font-size: 16px;text-transform: uppercase;float: right;">{{$iv->name}}</a>
           
          @endif
        @endforeach
      </h1>
    
    </section>

    
<!--    <section class="content">-->
<!--      <div class="box box-default">-->
<!--        <div class="box-header with-border">-->
          
<!--              <h3 class="box-title">Publications</h3>-->
<!--          <div class="box-tools pull-right">-->
<!--            <a href="{{url(admin().'/company-details')}}" class="{{Config::get('site.addDataBtn')}}" style="float: right;"><i class="fa fa-arrow-left"></i> Back</a>-->
<!--          </div>-->
<!--        </div>-->

<!--    <div class="container-fluid">-->
<!--    <div class='row'>-->
<!--s-->
<!-- </div>-->
<!--    </div>-->
      
<!--    </section>-->
   
   
   
  <section class="content">

<div class="row">
<div class="col-md-3 col-sm-6 col-xs-12">
    <a href="{{url(admin().'/formb/'.$id)}}">
<div class="info-box">
<span class="info-box-icon bg-aqua">
    <i class="fa fa-file-text-o" aria-hidden="true"></i>
</span>
<div class="info-box-content">
<h5 class="info-box-text">Form B</h5>

</div>

</div>
</a>
</div>

<div class="col-md-3 col-sm-6 col-xs-12">
    <a href="./../formc/{{$id}}">
<div class="info-box">
<span class="info-box-icon bg-red"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
<div class="info-box-content">
<h5 class="info-box-text">Form C</h5>

</div>

</div>
</a>
</div>


<div class="clearfix visible-sm-block"></div>
<div class="col-md-3 col-sm-6 col-xs-12">
     <a href="./../formd/{{$id}}">
<div class="info-box">
<span class="info-box-icon bg-green">
    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
</span>
<div class="info-box-content">
<h5 class="info-box-text">Form D</h5>

</div>

</div>
</a>
</div>

<div class="col-md-3 col-sm-6 col-xs-12">
      <a href="./../forme/{{$id}}">
<div class="info-box">
<span class="info-box-icon bg-yellow"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
<div class="info-box-content">
<h5 class="info-box-text">Form E</h5>

</div>

</div>
</a>
</div>



<div class="col-md-3 col-sm-6 col-xs-12">
      <a href="./../formf/{{$id}}">
<div class="info-box">
<span class="info-box-icon bg-yellow"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
<div class="info-box-content">
<h5 class="info-box-text">Form F</h5>

</div>

</div>
</a>
</div>




<div class="col-md-3 col-sm-6 col-xs-12">
      <a href="./../formca/{{$id}}">
<div class="info-box">
<span class="info-box-icon bg-aqua"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
<div class="info-box-content">
<h5 class="info-box-text">Form CA</h5>

</div>

</div>
</a>
</div>









</div>






</section>

</div>

@endsection  
