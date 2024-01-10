<div class="form-group">
    <label>{{ __('Date End') }}</label>
    {!! Form::text('date_end',null, array("class" => $date_class ?? 'form-control datepicker','required'=>'')) !!}
</div>
