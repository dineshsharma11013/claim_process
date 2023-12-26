@if(count($output)>0) 
<table class="table table-condensed">
            <thead>
            <tr>
              <th>SNo.</th> 
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Amount</th>
              <th>Reason</th>
              <th>Status</th>
          </tr>
      </thead>
  <tbody>
    @forelse($output as $dt)
    <tr>
      <td>{{$loop->index+1}}</td>
      <td>{{$dt->cl_name}}</td>
      <td>{{$dt->cl_email}}</td>
      <td>{{$dt->cl_contact}}</td>
      <td>{{$dt->total_user_amount ?? ''}}</td>
      <td>{{$dt->reason}}</td>
      <td>
          @foreach(Config::get('site.approval_status') as $si=>$sv)
          @if($si==$dt->status)
          {{$sv}}
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




