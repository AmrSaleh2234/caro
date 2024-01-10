<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Unit') }}</label>
    @endif
    {!! Form::select('unit',unitType() ,null, array('class' => 'select2','required'=>'')) !!}
</div>
