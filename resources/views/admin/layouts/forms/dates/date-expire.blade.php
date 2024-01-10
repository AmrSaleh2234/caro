<div class="form-group">
    <label>{{ __('Date Expire') }}</label>
    {!! Form::text('date_expire',null, array("class" => $date_class ?? 'form-control datepicker','required'=>'')) !!}
</div>
