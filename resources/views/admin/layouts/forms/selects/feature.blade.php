<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Feature') }}</label>
    @endif
    {!! Form::select('feature',statusShow() ,null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
