<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Currency') }}</label>
    @endif
    {!! Form::select('currency_id', $currencies,$currency_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
