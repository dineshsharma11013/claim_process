@if(count($output)>0) 
<table class="table table-condensed">
<thead>
<tr>
<th>SNo.</th>	
<th>User name</th>
<th>Employee name</th>
<th>Id Details</th>
<th>Id Number</th>
<th>Total amount</th>
<th>Due amount</th>
<th>Status</th>

</tr>
</thead>
<tbody>
@forelse($output as $dt)
  	<tr>
<td>{{$loop->index+1}}</td>
<td>{{$dt->user_name}}</td>    
<td> @foreach($employeeDetails as $empp)
          @if($empp->form_e_selected_id==$dt->form_e_selected_id && $empp->form_e_id==$dt->id)
          {{$empp->employee_name}} | 
          @endif
          @endforeach </td>

          <td>
          @foreach($employeeDetails as $empp)
          @if($empp->form_e_selected_id==$dt->form_e_selected_id && $empp->form_e_id==$dt->id)
          {{$empp->id_details ?? ''}} | 
          @endif
          @endforeach 

          </td>
          <td>
          @foreach($employeeDetails as $empp)
          @if($empp->form_e_selected_id==$dt->form_e_selected_id && $empp->form_e_id==$dt->id)
          {{$empp->id_number ?? ''}} | 
          @endif
          @endforeach 

          </td>



          <td>
          @foreach($employeeDetails as $empp)
          @if($empp->form_e_selected_id==$dt->form_e_selected_id && $empp->form_e_id==$dt->id)
          {{$empp->total_amt ?? ''}} | 
          @endif
          @endforeach 

          </td><td>
          @foreach($employeeDetails as $empp)
          @if($empp->form_e_selected_id==$dt->form_e_selected_id && $empp->form_e_id==$dt->id)
          {{$empp->due_amt_period ?? ''}} | 
          @endif
          @endforeach 

          </td>
          <td>@if($dt->approval_status==1)
    approved    
@elseif($dt->approval_status==2)
    pending
@else 
    Rejected
@endif


</td>

  	</tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




