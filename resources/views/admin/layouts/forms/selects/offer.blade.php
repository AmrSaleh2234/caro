<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Offer') }}</label>
    @endif
    {!! Form::select('offer',statusShow() ,null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
