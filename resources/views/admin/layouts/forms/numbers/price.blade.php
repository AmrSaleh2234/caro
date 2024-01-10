<div class="form-group">
        <label>{{ $price ?? __('Price') }}</label>
        {!! Form::text('price', $price_value ?? null, array('class' => 'form-control','data-parsley-type'=>"number",'required'=>'')) !!}
    </div>
