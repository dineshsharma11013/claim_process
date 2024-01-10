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
@forelse($new_users_paginated as $us)    
<tr>
    <td>{{$loop->index+1}}</td>
<td>
     @if (is_array($us) && isset($us['cirp_name']))
                {{ $us['cirp_name'] }}hg
            @elseif (is_object($us) && isset($us->cirp_name))
                {{ $us->cirp_name }} sdf
            @endif


@if (is_array($us) && isset($us['timeline_details']))
   <?php
        $total_num = count($us['timeline_details']);
       ?>    
  @endif 

      @if (is_array($us) && isset($us['company']))
                {{ $us['company']->cmpName }} -- {{$total_num}}
            @elseif (is_object($us) && isset($us->cmpName))
                {{ $us->cmpName }} 
            @endif        

</td>    
<td>
   @if (is_array($us) && isset($us['task']))
                {{ $us['task'] }}
            @elseif (is_object($us) && isset($us->task))
                {{ $us->task }}
            @endif


@if (is_array($us) && isset($us['timeline_details']))
              @foreach($us['timeline_details'] as $tm)
                {{$tm['Section_Regulation']}}
              @endforeach
            @endif 


</td>
<td>
    @if (is_array($us) && isset($us['name']))
                {{ $us['name'] }}
            @elseif (is_object($us) && isset($us->name))
                {{ $us->name }}
            @endif
</td>
<td>
 
</td>
<td></td>
<td></td>
<td></td>
<td>
</tr>
@empty
<tr><td>No Details Available</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
@endforelse

</tbody>
</table>
{{$users->links('pagination.paginate')}}

</div>  






