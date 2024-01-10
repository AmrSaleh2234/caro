<thead>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Type') }}</th>
        <th>{{ __('Price') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Setting') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $model)
<tr>
    <td>{{ $model->id }}</td>
    <td>{{ $model->name[$admin_language] }}</td>
    <td>{{ filterAllvalue($model->type) }}</td>
    <td>{{ $model->price }}</td>
    <td>
        @include('admin.layouts.tables.status',['active'=>$model->active,'ajax_class'=>$model->getTable().'-status','id'=>$model->id])
    </td>
    <td>
        @if($model->deleted_at == NULL)
            @include('admin.layouts.tables.edit-old',['table'=>$model->getTable(),'id'=>$model->id])
            {{--  @include('admin.layouts.tables.delete-form-old',['table'=>$model->getTable(),'id'=>$model->id])  --}}
       @else
            {{--  @include('admin.layouts.tables.restore-old',['table'=>$model->getTable(),'id'=>$model->id])  --}}
        @endif
    </td>
</tr>
@endforeach

