<div class="form-group">
        <label>{{ $skip ?? __('Skip') }}</label>
        {!! Form::text('skip', $skip_value ?? null, array('class' => 'form-control','data-parsley-type'=>"number")) !!}
    </div>
