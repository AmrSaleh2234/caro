<div class="form-group">
        <label>{{ $min_order ?? __('Minimum order') }}</label>
        {!! Form::text($order_text ?? 'min_order', $order_value ?? null, array('class' => 'form-control','data-parsley-type'=>$price_type ?? "number")) !!}
</div>

