<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Preparing') }}</label>
    @endif
    {!! Form::select('is_late',statusShow() ,null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
