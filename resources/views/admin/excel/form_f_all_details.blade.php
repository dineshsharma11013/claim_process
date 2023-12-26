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
<th>Claim amount description</th>
<th>Document details</th>


<th>any mutual details</th>

<th>Bank name</th>
<th>Account number</th>
<th>IFSC code</th>
<th>Signature of  creditor</th>
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
        <td>{{$dt->fc_address}}</td>
        <td>{{$dt->fc_email}}</td>
        <td>{{$dt->claim_amt ?? ''}}</td>
        <td>{{$dt->claim_amt_desc ?? ''}}</td>
        <td>{{$dt->document_details}}</td>
  
                                            
        <td>{{$dt->other_mutual_details}}</td>
      
        <td>{{$dt->bank_name ?? ''}}</td>
        <td>{{$dt->bank_account_number ?? ''}}</td>
        <td>{{$dt->bank_ifsc_code ?? ''}}</td>
        <td>{{$dt->fc_signature ?? ''}}</td>
        <td>{{$dt->signing_person_name ?? ''}}</td>
        <td>{{$dt->creditor_position ?? ''}}</td>
        <td>{{$dt->signing_address ?? ''}}</td>
        <td>
          @foreach($sections as $sec)
          @if($sec->form_f_selected_id==$dt->form_f_selected_id && $sec->form_f_id==$dt->id)
          {{$sec->senction_amt ?? ''}},
          @endif
          @endforeach  
        
        

        </td>
        <td>   @foreach($sections as $sec)
          @if($sec->form_f_selected_id==$dt->form_f_selected_id && $sec->form_f_id==$dt->id)
          {{$sec->date}},
          @endif
          @endforeach  </td>
        

          <td> @foreach($Dseclaration as $dec)
          @if($dec->form_f_selected_id==$dt->form_f_selected_id && $dec->form_f_id==$dt->id)
          {{$dec->senction_amt ?? ''}},
          @endif
          @endforeach </td>

          <td> @foreach($Dseclaration as $dec)
          @if($dec->form_f_selected_id==$dt->form_f_selected_id && $dec->form_f_id==$dt->id)
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




