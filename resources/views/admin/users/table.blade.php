<thead>
    <tr>

        {{--  <th>{{ __('ID') }}</th>  --}}
        <th>{{ __('Name') }}</th>
        <th>{{ __('Email') }}</th>
        <th>{{ __('Phone') }}</th>
        <th>{{ __('Type') }}</th>
        @if($type =="client")
        <th>{{ __('Address') }}</th>
        <th>{{ __('Date') }}</th>
        @endif
        <th>{{ __('Status') }}</th>
        <th>{{ __('Setting') }}</th>
    </tr>
</thead>

@foreach ($data as $key => $model)

<tr>

    {{--  <td>{{ $model->id }}</td>  --}}
    <td>{{ $model->name }}</td>
    <td>{{ $model->email }}</td>
    <td>{{ $model->phone }}</td>
    <td>{{ userName($model->type) }}</td>
    @if($type =="client")
    <td>
        @if(isset($model->address))
        {{ $model->address->address }} - {{ $model->address->geo_address }}
        @endif

    </td>
<td>{{ $model->created_at }}</td>
@endif
<td>
    @include('admin.layouts.tables.status',['active'=>$model->active,'ajax_class'=>$model->getTable().'-status','id'=>$model->id])
</td>
    <td>
        @if($model->deleted_at == NULL)
        {{-- @if($model->type=="client" ) --}}
        {{--  @include('admin.layouts.tables.models',['btn_class'=>'info','fa_class'=>'credit-card-alt','table'=>'wallets','type'=>'user_id','type_value'=>$model->id])  --}}
        {{--  @include('admin.layouts.tables.models',['btn_class'=>'primary','fa_class'=>'money','table'=>'orders','type'=>'user_id','type_value'=>$model->id])  --}}
        @include('admin.layouts.tables.models',['btn_class'=>'success','fa_class'=>'shopping-cart','table'=>'orders','type'=>'user_id','type_value'=>$model->id])
        @include('admin.layouts.tables.models',['btn_class'=>'warning','fa_class'=>'star','table'=>'favorites','type'=>'user_id','type_value'=>$model->id])
        @include('admin.layouts.tables.models',['btn_class'=>'danger','fa_class'=>'heart','table'=>'reviews','type'=>'user_id','type_value'=>$model->id])
        @include('admin.layouts.tables.models',['btn_class'=>'info','fa_class'=>'map-marker','table'=>'addresses','type'=>'user_id','type_value'=>$model->id])
        @include('admin.layouts.tables.create-old',['table'=>'notifications','id'=>$model->id,'type'=>'user_id','fa_class'=>'bell'])
        {{-- @endif --}}
        @include('admin.layouts.tables.edit-old',['table'=>'users','id'=>$model->id])
        @include('admin.layouts.tables.delete-form-old',['table'=>'users','id'=>$model->id])
        @else
        @if( isset($model_delete) && $model_delete > 0)
        @include('admin.layouts.tables.restore-old',['table'=>'users','id'=>$model->id])
        @endif
        @endif

    </td>
</tr>
@endforeach

