<div class="form-group">
    @if(!isset($label_show))
    <label>{{ $show_name ?? __('Show') }}</label>
    @endif
    @if(!isset($not_req))
    {!! Form::select($show_text ?? 'show',$show_function ?? showType() ,$show_value ?? null, array('class' => 'select2','style'=>'width: 100%','required'=>'')) !!}
    @else
    {!! Form::select($show_text ?? 'show',$show_function ?? showType() ,$show_value ?? null, array('class' => 'select2','style'=>'width: 100%')) !!}
    @endif
</div>
