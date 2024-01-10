<div class="form-group">
    <label>{{ $offer_price ?? __('Price Before Offer') }}</label>
    {!! Form::text('offer_price', $offer_price_value ?? null, array('class' => 'form-control','data-parsley-type'=>"number")) !!}
</div>

