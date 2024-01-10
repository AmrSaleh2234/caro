<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Type') }}</label>
    @endif
    {!! Form::select('type',additionType() ,null, array('class' => 'select2','required'=>'')) !!}
</div>
