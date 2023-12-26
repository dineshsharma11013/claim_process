@if(count($output)>0) 
<table class="table table-condensed">
            <thead>
            <tr>
              <th>SNo.</th> 
              <th>Name</th>
              <th>Amount</th>
              <th>details</th>
            
          </tr>
      </thead>
  <tbody>
    @forelse($output as $dt)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td>{{$dt->cl_name}}</td>
      <td>{{$dt->base_amt ?? ''}}</td>
      <td>{{$dt->claim_amt_desc ?? ''}}</td>
  

    </tr>
@empty
<tr>
<td>no data</td><td></td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




