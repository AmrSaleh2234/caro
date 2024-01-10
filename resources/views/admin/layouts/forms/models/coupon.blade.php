<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Coupon') }}</label>
    @endif
    {!! Form::select('coupon_id', $coupons, $coupon_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
