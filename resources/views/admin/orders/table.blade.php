<thead>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Client') }}</th>
        <th>{{ __('Phone') }}</th>
        <th>{{ __('Location') }}</th>
        <th>{{ __('Address') }}</th>
        {{--  <th>{{ __('Region') }}</th>
        <th>{{ __('Branch') }}</th>  --}}
        <th>{{ __('Subtotal') }}</th>
        <th>{{ __('Discount') }}</th>
        <th>{{ __('Shipping') }}</th>
        <th>{{ __('Total') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Cancel') }}</th>
        <th>{{ __('Date') }}</th>
        {{--  <th>{{ __('Note') }}</th>  --}}
        <th>{{ __('Setting') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $model)
<tr>
     <td>{{ $model->id }}</td>
    <td>{{  optional($model->orderMeta)->name }}</td>
    <td>{{  optional($model->orderMeta)->phone }}</td>
    <td> @if((int) $model->address_id > 0)
        <a class="btn btn-danger fa fa-map-marker" target="_blank"
        href={{ url("https://www.google.com/maps/@{optional($model->orderMeta)->latitude},{optional($model->orderMeta)->longitude},14z") }} >
        </a>
        @endif
    </td>
    <td>@if((int) $model->address_id > 0) {{  optional($model->orderMeta)->address }} - {{  optional($model->orderMeta)->geo_address }}
        @endif
    {{--  <td> @if(isset($model->region))  {{  $model->region->name[$admin_language] }}@endif
         @if(isset($model->city))  - {{  $model->city->name[$admin_language] }}@endif</td>
    <td>@if(isset($model->branch)){{  $model->branch->name[$admin_language] }}@endif</td>  --}}
    </td>
    <td>{{  number_format((float)$model->price, $currency_view, '.', '') }}</td>
    <td>{{  number_format((float)$model->discount, $currency_view, '.', '') }}</td>
    <td>{{  number_format((float)$model->shipping, $currency_view, '.', '') }}</td>
    <td>{{  number_format((float)$model->total, $currency_view, '.', '') }}</td>
    <td>
        @if(in_array($model->status,$order_status_finish_array))
        {!! Form::select('status',orderTypeShow($model->status) ,$model->status, array('class' => 'select2 orders-status','required'=>'','data-id'=>$model->id,'style'=>"width:100%")) !!}
        @else
        {!! Form::select('status',orderTypeShow($model->status) ,$model->status, array('class' => 'select2 orders-status','id'=>'order_'.$model->id,'required'=>'','data-id'=>$model->id,'data-class'=>'order_'.$model->id,'style'=>"width:100%")) !!}
        @endif
    </td>
    <td>
        @if(!in_array($model->status,$order_status_finish_array))
            @include('admin.layouts.tables.cancel',['table'=>$model->getTable(),'id'=>$model->id])
        @endif
    </td>
    <td>{{ $model->created_at }} - {{ $model->created_at->diffForHumans() }}</td>
    {{--  <td>{!! $model->note !!}</td>  --}}
    <td>
        @include('admin.layouts.tables.status',['is_read'=>true,'active'=>$model->is_read,'ajax_class'=>$model->getTable().'-read','id'=>$model->id])
        @include('admin.layouts.tables.show-old',['table'=>$model->getTable(),'id'=>$model->id])
        @include('admin.layouts.tables.type',['table'=>$model->getTable(),'type'=>'print','id'=>$model->id])
    </td>
</tr>
@endforeach

