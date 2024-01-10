<div class="form-group">
    <label>{{ $order_limit ?? __('Order Limit') }}</label>
    {!! Form::text('order_limit', $order_limit_value ?? null, array('class' => 'form-control','data-parsley-type'=>"number")) !!}
</div>

