<div class="form-group">
        <label>{{ $discount ?? __('Discount') }}</label>
        {!! Form::text($discount_text ?? 'discount', $discount_value ?? null, array('class' => 'form-control','data-parsley-type'=>$price_type ?? "number",'required'=>'')) !!}
</div>

