@if(count($output)>0) 
<table class="table table-condensed">
<thead>
<tr>
<th>SNo.</th>	
<th>User name</th>
<th>email</th>
<th>Mobile</th>
</tr>
</thead>
<tbody>
@forelse($output as $dt)
  	<tr>
<td>{{$loop->index+1}}</td>
<td>{{$dt->user_name}}</td>
<td>{{$dt->user_email}}</td>
<td>{{$dt->user_mobile}}</td>



  	</tr>
@empty
<tr>
<td>no data</td><td></td><td></td>
</tr>
@endforelse
  </tbody> 
</table>
@endif




