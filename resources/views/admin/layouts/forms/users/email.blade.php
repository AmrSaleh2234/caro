<div class="form-group">
    <label>{{ __('Email') }}</label>
    @if(!isset($not_req))
    {!! Form::text('email', null, array('class' => 'form-control','required'=>'','data-parsley-type'=>"email")) !!}
    @else
    {!! Form::text('email', null, array('class' => 'form-control','data-parsley-type'=>"email")) !!}
    @endif
</div>
