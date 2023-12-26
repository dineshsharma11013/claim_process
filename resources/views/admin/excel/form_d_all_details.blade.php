@if(count($output)>0) 
<table class="table table-condensed">
<thead>
<tr>
<th>SNo.</th>	
<th>create Date</th>
<th>Company name</th>
<th>Ip name</th>
<th>User name</th>
<th>name</th>

<th>Place</th>
<th>Address</th>
<th>email</th>
<th>Total Amount of claim</th>
<th>Principle amount</th>
<th>Interest amount</th>
<th>Document details</th>
<th>Dispute details</th>

<th>any mutual details</th>

<th>Bank name</th>
<th>Account number</th>
<th>IFSC code</th>
<th>Signature of operational creditor</th>
<th>Claiment name</th>
<th>Relation to creditor</th>
<th>signing person Address</th>
<th>Sanction amount</th>
<th>Sanction Date</th>
<th>Declaration amount</th>
<th>Declaration date</th>
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
        <td>{{$dt->neme}}</td>
      
        <td>{{$dt->place}}</td>
        <td>{{$dt->address}}</td>
        <td>{{$dt->email}}</td>
        <td>{{$dt->total_amount ?? ''}}</td>
        <td>{{$dt->principle ?? ''}}</td>
        <td>{{$dt->intrest ?? ''}}</td>
        <td>{{$dt->details_of_documents ?? ''}}</td>
        <td>{{$dt->dispute_details ?? ''}}</td>
                                            
        <td>{{$dt->mutual_credit_details ?? ''}}</td>
      
        <td>{{$dt->bank_name ?? ''}}</td>
        <td>{{$dt->account_no ?? ''}}</td>
        <td>{{$dt->ifsc_code ?? ''}}</td>
        <td>{{$dt->operational_creditor_signature ?? ''}}</td>
        <td>{{$dt->name_in_block_letter ?? ''}}</td>
        <td>{{$dt->relation_to_creditor ?? ''}}</td>
        <td>{{$dt->address_person_signing ?? ''}}</td>
        <td>
          @foreach($sections as $sec)
          @if($sec->form_d_selected_id==$dt->form_d_selected_id && $sec->form_d_id==$dt->id)
          {{$sec->senction_amt ?? ''}},
          @endif
          @endforeach  
        
        

        </td>
        <td>   @foreach($sections as $sec)
          @if($sec->form_d_selected_id==$dt->form_d_selected_id && $sec->form_d_id==$dt->id)
          {{$sec->date}},
          @endif
          @endforeach  </td>
        

          <td> @foreach($Dseclaration as $dec)
          @if($dec->form_d_selected_id==$dt->form_d_selected_id && $dec->form_d_id==$dt->id)
          {{$dec->senction_amt ?? ''}},
          @endif
          @endforeach </td>

          <td> @foreach($Dseclaration as $dec)
          @if($dec->form_d_selected_id==$dt->form_d_selected_id && $dec->form_d_id==$dt->id)
          {{$dec->date}},
          @endif
          @endforeach </td>
        

  	</tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




