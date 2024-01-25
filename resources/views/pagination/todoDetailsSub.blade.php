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
  @if($rect == 2)
                    <?php $i=$users->perPage() * ($users->currentPage() - 1); $i=$i+1; ?>
                    @endif
@forelse($users as $us)    
<tr>
    <td>@if($rect == 2)
                        {{$i++}}
                        @else
                        {{$loop->index+1}}
                        @endif</td>
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
@if($rect == 2)

                {{$users->links('pagination.paginate')}}
                @endif

</div>  


