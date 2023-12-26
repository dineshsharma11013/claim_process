  @forelse($users as $us)
<tr>
<td>{{$us->name}}</td>
<td>{{$us->task}}</td>
<td>@foreach(Config::get('site.task_status') as $ik=>$iv)
                     @if($us->status == $ik)
                      {{$iv}}
                     @endif
                     @endforeach</td>
<td>{{$us->start_date}}</td>
                    <td>{{$us->end_date}}</td>
</tr>

@empty
<tr>
<td>No Activity</td>
<td></td>
<td></td>
<td></td>
<td></td>
</tr>
@endforelse