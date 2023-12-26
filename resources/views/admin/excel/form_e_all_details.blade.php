@if(count($output)>0) 
<table class="table table-condensed">
<thead>
<tr>
<th>SNo.</th>	
<th>create Date</th>
<th>Company name</th>
<th>Ip name</th>
<th>User name</th>
<th>Place</th>
<th>Address</th>
<th>email</th>
<th>Signature of  creditor</th>
<th>Sanction amount</th>
<th>Sanction Date</th>
<th>Declaration amount</th>
<th>Declaration date</th>

<th>Employee name</th>
<th>Id Details</th>
<th>Id Number</th>
<th>Total amount</th>
<th>Due amount</th>


</tr>
</thead>
<tbody>
@forelse($output as $dt)
  	<tr>
<td>{{$loop->index+1}}</td>
<td>{{$dt->created_at}}</td>
<td>{{$dt->name}}</td>
<td>{{$dt->first_name}}</td>
<td>{{$dt->user_name}}</td>
<td>{{$dt->place}}</td>
<td>{{$dt->user_address}}</td>
<td>{{$dt->user_email}}</td>
<td>{{$dt->operational_creditor_signature ?? ''}}</td>

<td>
@foreach($sections as $sec)
@if($sec->form_e_selected_id==$dt->form_e_selected_id && $sec->form_e_id==$dt->id)
{{$sec->senction_amt ?? ''}},
@endif
@endforeach  
</td>
<td>   @foreach($sections as $sec)
          @if($sec->form_e_selected_id==$dt->form_e_selected_id && $sec->form_e_id==$dt->id)
          {{$sec->date}},
          @endif
          @endforeach  </td>
        

          <td> @foreach($Dseclaration as $dec)
          @if($dec->form_e_selected_id==$dt->form_e_selected_id && $dec->form_e_id==$dt->id)
          {{$dec->senction_amt ?? ''}},
          @endif
          @endforeach </td>

          <td> @foreach($Dseclaration as $dec)
          @if($dec->form_e_selected_id==$dt->form_e_selected_id && $dec->form_e_id==$dt->id)
          {{$dec->date}},
          @endif
          @endforeach </td>
        
<td> @foreach($employeeDetails as $empp)
          @if($empp->form_e_selected_id==$dt->form_e_selected_id && $empp->form_e_id==$dt->id)
          {{$empp->employee_name ?? ''}} | 
          @endif
          @endforeach </td>

          <td>
          @foreach($employeeDetails as $empp)
          @if($empp->form_e_selected_id==$dt->form_e_selected_id && $empp->form_e_id==$dt->id)
          {{$empp->id_details}} | 
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

  	</tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




