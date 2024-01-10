<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Country') }}</label>
    @endif
    {!! Form::select('country_id', $countries,$country_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
