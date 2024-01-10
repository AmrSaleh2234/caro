<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Max Order Active') }}</label>
    @endif
    {!! Form::select('is_max',statusShow() ,null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
