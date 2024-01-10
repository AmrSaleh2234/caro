<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Finish') }}</label>
    @endif
    {!! Form::select('finish',statusShow() ,null, array('class' => 'select2','required'=>'')) !!}
</div>
