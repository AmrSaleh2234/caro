<div class="row">
    <div class="col-sm-3">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>{{ __('Phone') }}</label><br>
                    <label>{{ $order->orderMeta->phone  }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>{{ __('Name') }}</label><br>
                    <label>{{ $order->orderMeta->name  }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <label>{{ __('Address') }}</label><br>
                        <label>@if(isset($order->region))  {{  $order->region->name[$admin_language] }}@endif
                               @if(isset($order->city))  - {{  $order->city->name[$admin_language] }}@endif
                        </label><br>
                        <label>{{ $order->orderMeta->address }} </label>
                         {{-- {{ $order->orderMeta->geo_address }} --}}
                    </div>
                </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>{{ __('Note') }}</label><br>
                    <label>{!! $order->note !!}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-3">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                        <label>{{ __('Subtotal') }}</label><br>
                        <label>{{ number_format((float)$order->price, getCurrencyView(), '.', '') }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>{{ __('Shipping') }}</label><br>
                    <label>{{ number_format((float)$order->shipping, getCurrencyView(), '.', '') }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>{{ __('Discount') }}</label><br>
                    <label>{{ number_format((float)$order->discount, getCurrencyView(), '.', '') }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>{{ __('Total') }}</label><br>
                    <label>{{ number_format((float)$order->total, getCurrencyView(), '.', '') }}</label>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-sm-6">
        <div class="box">
            <div class="box-body">
                {!! Form::model($order, ['method' => 'PATCH','route' => ['admin.orders.update', $order->id],'data-parsley-validate'=>""]) !!}
                <div class="form-group">
                    <div class="form-group">
                        <label>{{ __('Status') }}</label>
                        {!! Form::select('status',orderTypeShow($order->status) ,null, array('class' => 'select2','required'=>'')) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Branch') }}</label>
                        {!! Form::select('branch_id',$branches ,null, array('class' => 'select2')) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Delivery') }}</label>
                        {!! Form::select('delivery_id',$deliveries ,null, array('class' => 'select2')) !!}
                    </div>
                    <div class="form-group">
                            <label>{{ __('Paid') }}</label>
                            {!! Form::text('paid', null, array('class' => 'form-control','data-parsley-type'=>"number",'required'=>'')) !!}
                    </div>
                    @include('admin.layouts.forms.buttons.save')
                @include('admin.layouts.forms.close')
            </div>
        </div>
    </div>
</div>

