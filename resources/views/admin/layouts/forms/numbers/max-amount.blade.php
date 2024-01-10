<div class="form-group">
    <label>{{ $max_amount ?? __('Max Amount') }}</label>
    {!! Form::text('max_amount', $max_amount_value ?? null, array('class' => 'form-control','data-parsley-type'=>"number")) !!}
</div>

