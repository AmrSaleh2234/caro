<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Status') }}</label>
    @endif
    {!! Form::select('active',statusType() ,null, array('class' => 'select2','required'=>'')) !!}
</div>
