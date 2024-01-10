<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Payment') }}</label>
    @endif
    {!! Form::select('payment_id', $payments, $payment_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
