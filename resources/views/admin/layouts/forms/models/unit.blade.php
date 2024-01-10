<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Unit') }}</label>
    @endif
    {!! Form::select('unit_id', $units, $unit_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
