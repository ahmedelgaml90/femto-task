@foreach($rows  as $row)
<tr id="trow_{{ $row->id }}">
    <td class="text-center">{{ $row->id }}</td>
<td><strong>{{  $row->name }}</strong></td>

@if(Auth()->user()->permission == 1)
 <td>
    <a class="btn btn-default btn-rounded btn-sm" href="{{ url('controll/companies/'.$row->id.'/edit') }}" ><span class="fa fa-pencil"></span></a>
<!--        <button class="btn btn-danger btn-rounded btn-sm" onClick="delete_row('trow_{{ $row->id }}');"><span class="fa fa-times"></span></button>-->
    {!! Form::open(['action'=>['CompaniesController@destroy',$row->id],'method'=>'delete' ,'style'=>'display: inline']) !!}
    <button type="submit" class="btn btn-danger red " onclick='return confirm("Are You sure!!")' ><span class="fa fa-times"></span></button>
    {!! Form::close() !!}

</td>
@endif
</tr>
@endforeach