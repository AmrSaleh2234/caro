<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Payment Type') }}</label>
    @endif
    {!! Form::select('payment_type',paymentType() ,null, array('class' => 'select2')) !!}
</div>
