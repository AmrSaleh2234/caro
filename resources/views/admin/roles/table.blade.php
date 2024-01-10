<thead>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Role') }}</th>
        <th>{{ __('Name') }}</th>
        {{--  <th>{{ __('Permissions') }}</th>  --}}
        <th>{{ __('Setting') }}</th>

    </tr>
</thead>

@foreach ($data as $key => $model)

<tr>
    <td>{{ $model->id }}</td>
    <td>{{ userName($model->name) }}</td>
    <td>{{ $model->display_name }}</td>
    {{--  <td>
        @if(!empty($model->permissions))
        @foreach($model->permissions as $v)
        <small class="label bg-red">{{ $v->name }}</small>
        @endforeach
        @endif
    </td>  --}}
      <td>
            @include('admin.layouts.tables.edit-old',['table'=>$model->getTable(),'id'=>$model->id])
    </td>
</tr>

@endforeach

