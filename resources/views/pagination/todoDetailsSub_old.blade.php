<div class="table-responsive">
<table class="table table-striped table-bordered no-margin" id="myTable">
<thead>
<tr style="background-color:#337abd2b">
<th data-field="id">#</th>
<th data-field="cname">Corporate debtor Name</th> 
<th data-field="task">Task</th>
<th data-field="assign_to">Assigned To</th>   
<th data-field="status">Status</th>
<th data-field="descptn">Description</th>
<th data-field="start_date">Start Date</th>
<th data-field="end_date">End Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
@forelse($users as $us)    
<tr>
    <td>{{$loop->index+1}}</td>
<td>
    @foreach($companies as $cm)
    @if($cm->id == $us->cirp_name)
        {{$cm->name}}
    @endif
    @endforeach
    @if($us->cirp_name == 'other')
        {{$us->comapny}}
    @endif
</td>    
<td>{{$us->task}}</td>
<td>
{{$us->name}} 
</td>
<td>
    @foreach(Config::get('site.task_status') as $ik=>$iv)
                     @if($us->status == $ik)
                      {{$iv}}
                     @endif
                     @endforeach
</td>
<td>{{$us->message}}</td>
<td>{{$us->start_at ? $us->start_at : $us->start_date}}</td>
<td>{{$us->end_at ? $us->end_at : $us->end_date}}</td>
<td><a href="{{url(admin().'/edit-assign-task/'.$us->id)}}" target="_blank"><i class="fa fa-edit"></i></a>

 <a onclick="deleteData('/delete-assign-task/{{$us->id}}','deleteUserData')" id="deleteUserData" href="javascript:void(0)"><i class="fa fa-trash-o"></i></a></td>
</tr>
@empty
<tr><td>No Details Available</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
@endforelse

</tbody>
</table>
{{$users->links('pagination.paginate')}}

</div>  


<div class="table-responsive">
<table class="table">

  <tr>

  <th>Company name</th>
  <th>Section Regulation</th>
  <th>Activity Step</th>

  <th>Due Date</th>
</tr>

  @foreach($ip_company as $cmpy_list)
@foreach($timeline_dtls as $timeline_list)


<?php 
$timel_day =  $timeline_list->timeline_day;

$cmp_start_Date = $cmpy_list->start_date;

 
// Add days to date and display it
$mydate= date('Y-m-d', strtotime($cmp_start_Date. ' + '.$timel_day.' days'));

// if($mydate==date('Y-m-d'))
// {
//   echo  $cmpy_list->name;
// }



?>
<?php if($mydate==date('Y-m-d')) { ?>
  <tr>


<td>
{{$cmpy_list->name}}
</td>
<td><?php echo $timeline_list->Section_Regulation;?></td>
<td><?php echo $timeline_list->Activity_Steps;?></td>
<td>{{$mydate}}</td>

</tr>
<?php }?>
@endforeach
@endforeach
</table>
</div>

<script>
$(document).ready(function () {

$('#myTable th').click(function () {
var table = $(this).closest('table');
var rows = table.find('tbody > tr').toArray().sort(compareRows($(this).index()));


this.asc = !this.asc;
if (!this.asc) {
rows = rows.reverse();
}


table.find('tbody').empty().append(rows);
});


function compareRows(index) {
return function (a, b) {
var valA = $(a).find('td').eq(index).text();
var valB = $(b).find('td').eq(index).text();
return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB);
};
}
});
</script>



