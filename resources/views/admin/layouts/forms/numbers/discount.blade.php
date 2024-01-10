<div class="form-group">
        <label>{{ $discount ?? __('Discount') }}</label>
        {!! Form::text($discount_text ?? 'discount', $discount_value ?? null, array('class' => 'form-control','data-parsley-min'=>'1','data-parsley-max'=>'100','required'=>'')) !!}
</div>

