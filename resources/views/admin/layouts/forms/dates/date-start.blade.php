<div class="form-group">
    <label>{{ __('Date Start') }}</label>
    {!! Form::text('date_start',null, array("class" => $date_class ?? 'form-control datepicker','required'=>'')) !!}
</div>
