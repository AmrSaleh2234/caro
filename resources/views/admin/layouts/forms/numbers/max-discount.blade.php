<div class="form-group">
        <label>{{ $max_discount ?? __('Max Discount') }}</label>
        {!! Form::text($discount_text ?? 'max_discount', $discount_value ?? null, array('class' => 'form-control','data-parsley-type'=>$price_type ?? "number")) !!}
</div>

