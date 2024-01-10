<div class="form-group">
    <label>{{ __('Type') }}</label>
    {!! Form::select('type',userType() ,null, array('class' => 'select2 user-type-role','required'=>'')) !!}
</div>
