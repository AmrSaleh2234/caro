<div class="form-group">
    @if(!isset($label_show))
    <label>{{ $label_text ?? __('Additions') }}</label>
    @endif
    @if(!isset($not_req))
    {!! Form::select('additions[]', $additions ?? null,$product_addition ?? null, array('class' => 'select2','multiple','required'=>'','style'=>'width: 100%')) !!}
    @else
    {!! Form::select('additions[]', $additions ?? null,$product_addition ?? null, array('class' => 'select2','multiple','style'=>'width: 100%')) !!}
    @endif
</div>
