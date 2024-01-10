<div class="form-group">
    <label>{{ $shipping ?? __('Shipping') }}</label>
    {!! Form::text($shipping_text ?? 'shipping', $shipping_value ?? null, array('class' => 'form-control','data-parsley-type'=>"number")) !!}
</div>
