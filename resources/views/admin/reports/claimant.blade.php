@forelse($output as $ot)
<tr>
    <td>{{$loop->index+1}}</td>
    <td>
        {{$ot->name}} 
        @if(!isset($form_type)) -
        @if($ot->ft=='operational-creditor')
            Form-B
        @elseif($ot->ft=='financial-creditor')
        Form-C
        @elseif($ot->ft=='workmen-and-employee')
        Form-D
        @elseif($ot->ft=='financial-creditor-in-a-class')
        Form-CA
        @elseif($ot->ft=='authorised-representative-of-workmen-and-employee')
        Form-E
        @elseif($ot->ft=='other-creditor')
        Form-F
        @endif
        @endif
        </td>
    <td>{{$ot->email}}</td>
    <td>{{$ot->mobile}}</td>
    <td></td>
    <td>{{$ot->created_at}}</td>
</tr>
@empty
<tr>
    <td>There is no record.</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
@endforelse



