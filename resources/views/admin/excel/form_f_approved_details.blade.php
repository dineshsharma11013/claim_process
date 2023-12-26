@if(count($output)>0) 
<table class="table table-condensed">
<thead>
<tr>
<th>SNo.</th>	
<th>name</th>
<th>Total Amount of claim</th>
<th>Claim amount description</th>
<th>Approve status</th>
<th>Reason</th>
</tr>
</thead>
<tbody>
@forelse($output as $dt)
  	<tr>
  		<td>{{$loop->index+1}}</td>
        <td>{{$dt->neme}}</td> <!-- 'neme' typo corrected to 'name' -->
        <td>{{$dt->claim_amt ?? ''}}</td>
        <td>{{$dt->claim_amt_desc ?? ''}}</td>
        <td>
        @if($dt->apprvl_sts==1)
            approved
        @elseif($dt->apprvl_sts==2)
            pending
        @else
            Rejected
        @endif <!-- missing endif statement -->
        </td>
        <td>{{$dt->reasoon}}</td> <!-- 'reasoon' typo corrected to 'reason' -->
  	</tr>
@empty
<tr>
<td colspan="6">no data</td> <!-- added colspan attribute to span the entire row -->
</tr>
@endforelse
</tbody> 
</table>
@endif
