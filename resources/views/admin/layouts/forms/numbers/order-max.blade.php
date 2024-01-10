<div class="form-group">
    <label>{{ $order_max ?? __('Max Per Order') }}</label>
    {!! Form::text('order_max', $order_max_value ?? null, array('class' => 'form-control','data-parsley-type'=>"number")) !!}
</div>

