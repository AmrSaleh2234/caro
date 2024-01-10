<div class="form-group">
    <label>{{ $date_label ?? __('Date') }}</label>
    @if(!isset($not_req))
    {!! Form::text($date_text ?? 'date',$date_value ?? null, array("class" => $date_class ?? 'form-control datepicker','required'=>'')) !!}
    @else
    {!! Form::text($date_text ?? 'date',$date_value ?? null, array("class" => $date_class ?? 'form-control datepicker')) !!}
    @endif
</div>
