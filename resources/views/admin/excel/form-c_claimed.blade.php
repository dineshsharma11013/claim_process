@if(count($output)>0) 
<table class="table table-condensed">
            <thead>
            <tr>
            	<th>SNo.</th>	
              <th>Name</th>
           <!--    <th>Principle Amount</th>
              <th>Interest</th> -->
              <th>Total</th>
          </tr>
      </thead>
  <tbody>
  	@forelse($output as $dt)

@php

$amt1 = is_numeric($dt->amt1) ? $dt->amt1 : 0;
$amt2 = is_numeric($dt->amt2) ? $dt->amt2 : 0;
$amt3 = is_numeric($dt->amt3) ? $dt->amt3 : 0;

$total = $amt1 + $amt2 + $amt3; 

@endphp

  	<tr>
  		<td>{{$loop->index+1}}</td>
  		<td>{{$dt->cl_name}}</td>
  		<!-- <td></td>
      <td></td> -->
      <td>{{$total}}</td>

  	</tr>
@empty
<tr>
<td>no data</td><td></td><td></td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




