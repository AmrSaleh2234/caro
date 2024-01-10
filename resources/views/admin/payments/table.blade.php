<thead>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Type') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Setting') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $model)
<tr>
    <td>{{ $model->id }}</td>
    <td>{{ $model->name[$admin_language] }}</td>
    <td>{{ filterAllValue($model->type) }}</td>
    <td>
        @include('admin.layouts.tables.status',['active'=>$model->active,'ajax_class'=>$model->getTable().'-status','id'=>$model->id])
    </td>
    <td>
       @include('admin.layouts.tables.models',['table'=>'orders','type'=>'payment_id','type_value'=>$model->id])
        @include('admin.layouts.tables.edit-old',['table'=>$model->getTable(),'id'=>$model->id])
    </td>
</tr>
@endforeach

