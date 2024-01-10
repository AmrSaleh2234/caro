<div class="form-group">
    <label>{{ __('Password') }}</label>
    @if($new > 0)
    {!! Form::password('password', array('class' => 'form-control','id'=>'password','required'=>'','data-parsley-minlength'=>'8')) !!}
    @else
    {!! Form::password('password', array('class' => 'form-control','id'=>'password','data-parsley-minlength'=>'8')) !!}
    @endif
    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
</div>
<div class="form-group">
<div id="meter_wrapper">
        <div id="meter"></div>
</div>
</div>

