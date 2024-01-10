<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Attribute') }}</label>
    @endif
    {!! Form::select('attribute_id', $attributes,$attribute_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
