<thead>
    <tr>
        {{--  <th>{{ __('ID') }}</th>  --}}

        <th>{{ __('Name') }}</th>
        {{--  <th>{{ __('Country') }}</th>  --}}
        <th>{{ __('Point') }}</th>
        {{--  <th>{{ __('Setting') }}</th>  --}}
    </tr>
</thead>
@foreach ($data as $key => $point)
<tr>
    {{--  <td>{{ $point->id }}</td>  --}}
    <td>
        <a href="{{ route('admin.points.index',['user_id'=>$point->user_id]) }}">
            {{ $point->user->name }} - {{ $point->user->email }}
        </a>
        </td>
    {{--  <td><a href="{{ route('admin.points.index',['country_id'=>$point->country_id]) }}">
            {{ $point->country->name[$admin_language] }}
    </a>  --}}
    </td>
    <td>{{ $point->point }}</td>
    {{--  <td>
       <a class="btn btn-primary fa fa-edit" href="{{ route('admin.points.edit',$point->id) }}"></a>
       <a id="delete" data-id='{{ $point->id }}' class="btn btn-danger fa fa-trash"></a>
        {!! Form::open(['method' => 'DELETE','route' => ['admin.points.destroy', $point->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Delete', ['class' => 'hide btn btn-danger delete-btn-submit','data-delete-id' => $point->id]) !!}
        @include('admin.layouts.forms.close')
    </td>  --}}
</tr>
@endforeach

