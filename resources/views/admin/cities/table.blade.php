<thead>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Name') }}</th>
        {{--  <th>{{ __('Country') }}</th>  --}}
        <th>{{ __('Shipping') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Setting') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $model)
<tr>
    <td>{{ $model->id }}</td>
    <td>{{ $model->name[$admin_language] }}</td>
    {{--  <td>@if(isset($model->country))
        {{ optional($model->country)->name[$admin_language] }}
        @endif
    </td>  --}}
    <td>{{ number_format($model->shipping, $currency_view, '.', '') }}</td>
    <td>
        @include('admin.layouts.tables.status',['active'=>$model->active,'ajax_class'=>$model->getTable().'-status','id'=>$model->id])
    </td>
    <td>
       @include('admin.layouts.tables.edit-old',['table'=>$model->getTable(),'id'=>$model->id])
    </td>
</tr>
@endforeach

