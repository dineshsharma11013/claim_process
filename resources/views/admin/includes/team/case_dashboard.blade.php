
@if(count(cirpRight()) == 0)
    <script>window.location.href = "{{ url(admin().'/') }}";</script>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        CIRP DASHBOARD 
        
          <div style="float: right;">
            <span class="text text-info" style="text-transform: uppercase;font-size: 18px;">{{$cmp->name}} </span>
          
          </div>
         
        
      </h1>
    
    </section>


   
   
  <section class="content">

<div class="row">
@if(in_array(Config::get('site.fpl'), cirpRight()))

<div class="col-md-3 col-sm-6 col-xs-12">
   
<a href="{{url(isset($id) ? admin().'/publication/'.$id : admin().'/publication')}}">
<div class="info-box">
<span class="info-box-icon bg-aqua">
    <i class="fa fa-file-text-o" aria-hidden="true"></i>
</span>
<div class="info-box-content">
<h5 class="info-box-text">Forms & Publications</h5>
<!-- <span class="info-box-number">90<small>%</small></span> -->
</div>

</div>
</a>
</div>
@endif

@if(in_array(Config::get('site.cPr'), cirpRight()))

<div class="col-md-3 col-sm-6 col-xs-12">
   <a href="{{url(admin().'/reports/'.$id)}}">
<div class="info-box">
<span class="info-box-icon bg-red"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
<div class="info-box-content">
<h5 class="info-box-text">Claim Process </h5>
<!-- <span class="info-box-number">41,410</span> -->
</div>

</div>
</a>
</div>
@endif


<div class="clearfix visible-sm-block"></div>

@if(in_array(Config::get('site.nclt'), cirpRight()))
<div class="col-md-3 col-sm-6 col-xs-12">
   <a href="{{url(admin().'/nclt/'.$id)}}">
<div class="info-box">
<span class="info-box-icon bg-green">
    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
</span>
<div class="info-box-content">
<h5 class="info-box-text">Nclt</h5>
</div>

</div>
</a>
</div>

@endif
@if(in_array(Config::get('site.cocM'), cirpRight()))
<div class="col-md-3 col-sm-6 col-xs-12">
            <a href="{{url(admin().'/coc-meeting/'.$id)}}">
<div class="info-box">
<span class="info-box-icon bg-yellow"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></span>
<div class="info-box-content">
<h5 class="info-box-text" style="text-transform:none;">CoC MEETING </h5>
<!-- <span class="info-box-number">2,000</span> -->
</div>

</div>
</a>
</div>
@endif

</div>




<div class="row">


@if(in_array(Config::get('site.ath'), cirpRight()))
<div class="col-md-4">


 <a href="{{url(admin().'/authentication')}}">
<div class="info-box bg-green" style="height: 125px; background-color:#8ba8e8 !important">
<span class="info-box-icon" style="
    height: 125px;
"><i class="ion-ios-chatbubble-outline"></i></span>
<div class="info-box-content">
<!-- <span class="info-box-text">Authentication</span> -->
<span class="info-box-number">Authentication</span>
<div class="progress">
<div class="progress-bar" style="width: 40%"></div>
</div>
<!-- <span class="progress-description">
40% Increase in 30 Days
</span> -->
</div>

</div>
</a>
</div>
@endif

@if(in_array(Config::get('site.pemp'), cirpRight()))

<div class="col-md-4">
 <a href="javascript:void(0)">
<div class="info-box bg-yellow" style="
    height: 125px;background-color:#76a668 !important
">
<span class="info-box-icon" style="
    height: 125px;
"><i class="ion-ios-chatbubble-outline"></i></span>
<div class="info-box-content">
<!-- <span class="info-box-text">Professtional Empanelment</span> -->
<span class="info-box-number">Professional Empanelment</span>
<div class="progress">
<div class="progress-bar" style="width: 40%"></div>
</div>
<!-- <span class="progress-description">
40% Increase in 30 Days
</span> -->
</div>

</div>
</a>
</div>
@endif

@if(in_array(Config::get('site.frms'), cirpRight()))

<div class="col-md-4">
<a href="{{url(admin().'/ip_forms/'.$id)}}">
<div class="info-box bg-aqua" style="
    height: 125px;background-color:#a761a0 !important
">
<span class="info-box-icon" style="
    height: 125px;
"><i class="ion-ios-chatbubble-outline"></i></span>
<div class="info-box-content">
<!-- <span class="info-box-text">Forms</span> -->
<span class="info-box-number">Forms</span>
<div class="progress">
<div class="progress-bar" style="width: 40%"></div>
</div>
<!-- <span class="progress-description">
40% Increase in 30 Days
</span> -->
</div>

</div>

</a>
</div>
@endif

@if(in_array(Config::get('site.todoList'), cirpRight()))

<div class="col-md-12">


<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">To-Do  List</h3>

<div class="pull-right">
<a href="{{url(admin().'/assign-task/'.$id)}}" class="btn btn-sm bg-maroon pull-left btn-flat" style="margin-right: 5px;" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Assign Task</a>  
<a href="{{url(admin().'/company-details/'.$id)}}" class="btn btn-sm btn-primary btn-flat pull-right">View All Tasks</a>
</div></div>

<div class="box-body">
<div class="table-responsive">
<table class="table no-margin">
<thead>
<tr>
<!-- <th><a href="javascript:void(0)" onclick="sortBy('name', {{$id}})">Name </a> </th>
<th><a href="javascript:void(0)" onclick="sortBy('task', {{$id}})">Task</a></th>
<th><a href="javascript:void(0)" onclick="sortBy('status', {{$id}})">Status</a></th>
<th><a href="javascript:void(0)" onclick="sortBy('start_date', {{$id}})">Start Date</a></th>
<th><a href="javascript:void(0)" onclick="sortBy('end_date', {{$id}})">End Date</a></th> -->
<th>Name </th>
<th>Task</th>
<th>Status</th>
<th>Start Date</th>
<th>End Date</th>
</tr>
</thead>
<tbody id="companyWiseTodo">
  @forelse($users as $us)
<tr>
<td>{{$us->name}} {{$us->id}}</td>
<td>{{$us->task}}</td>
<td>@foreach(Config::get('site.task_status') as $ik=>$iv)
                     @if($us->status == $ik)
                      {{$iv}}
                     @endif
                     @endforeach</td>
<td>{{$us->start_date}}</td>
<td>
  @php
    $currentDate = date('Y-m-d');
    $bgColor = "";
  @endphp
   <?php
   if($currentDate == $us->end_date)
   {
   $bgColor = "#00C0EF";
   }
   elseif ($currentDate >= $us->end_date) 
   {
    $bgColor = "#E9E9E9"; 
   }
   elseif ($currentDate <= $us->end_date) 
   {
    $bgColor = "#F97474";   
   
   }
    
  ?>

  <span style="background-color: {{$bgColor}};padding:5px;">{{$us->end_date}}</span>
  
  

</td>
</tr>

@empty
<tr>
<td>No Activity</td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
@endforelse
</tbody>
</table>
</div>

</div>

<div class="box-footer clearfix">
<!-- <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
<a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a> -->
</div>

</div>

</div>

@endif



</div>
@if(in_array(Config::get('site.notes'), cirpRight()))
<div class="row">
    
   <div class="col-md-12">


<div class="box box-danger">
<div class="box-header with-border">
<h3 class="box-title">Notes</h3>
<a href="{{url(admin().'/notes/'.$id)}}" class='btn btn-primary' style="float:right">Add</a>
</div>

<div class="box-body">
<div class="table-responsive">
<table class="table no-margin">
<thead>
<tr>
<th>#</th><th>Title</th><th>Date</th>
</tr>
</thead>
<tbody>
    <?php $sno=1;?>
    @foreach($data as $list)
<tr>
<td><?php echo $sno++?></td>
<td>{{$list->title}}</td>
<td>{{$list->date}}</td>
</tr>
@endforeach
</tbody>
</table>
</div>

</div>


</div>

</div>


  

<!--  <div class="col-md-4">


<div class="box box-warning" style="height:224px;">
<div class="box-header with-border">
<h3 class="box-title" style="font-weight:bold">IPS Manager</h3>

</div>

<div class="box-body">
<div class="table-responsive">
<table class="table no-margin">
<thead>
<tr>

</tr>
</thead>
<tbody>

<tr>
<td>Name</td>
<td>{{isset($sbrs->name) ? ucwords($sbrs->name) : ''}}</td>
</tr>
<tr>
<td>Email</td>
<td>{{isset($sbrs->email) ? $sbrs->email : ''}}</td>
</tr>
<tr>
<td>Mobile</td>
<td>{{isset($sbrs->contact) ? $sbrs->contact : ''}}</td>
</tr>
</tbody>
</table>
</div>

</div>



</div> -->

</div>
@endif
    
    </section>

