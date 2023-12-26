 @forelse($tData as $us)
				
					<tr>
					<td scope="row">{{$loop->index+1}}</td>
					<td>
                     {{$us->company}}
                    </td>
                    <td>
                     {{$us->ip}} 
                    </td>
                    <td>
                    {{$us->designation}}
                    </td>
                    <td>{{$us->corporate_debtor_insolvency_date}}</td>
                    <td>{{$us->insolvency_closing_date}}</td>
					<td><a class="btn btn-sm btn-green" href="{{url('form-a/'.$us->unique_id)}}" target="_blank" role="button" style="padding:4px 15px;">View</a></td>
					</tr>
					@empty
					<p>There is result not.</p>
					@endforelse 