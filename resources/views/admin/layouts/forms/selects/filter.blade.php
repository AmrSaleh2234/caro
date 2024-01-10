<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Filter') }}</label>
    @endif
    {!! Form::select('filter',statusShow() ,null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
