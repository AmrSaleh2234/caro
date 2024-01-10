<div class="form-group">
        <label>{{ $price ?? __('Price') }}</label>
        @if(!isset($not_req))
        {!! Form::text($price_text ?? 'price', $price_value ?? null, array('class' => 'form-control','required'=>'','data-parsley-type'=>$price_type ?? "number")) !!}
        @else
        {!! Form::text($price_text ?? 'price', $price_value ?? null, array('class' => 'form-control','data-parsley-type'=>$price_type ?? "number" )) !!}
        @endif
    </div>

