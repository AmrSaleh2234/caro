<div class="form-group">
    <label>{{ __('Type') }}</label>
    @if($user_active > 0 )
    {!! Form::select('type',userType() ,null, array('class' => 'select2 user-type-role')) !!}
    @else
    {!! Form::select('type',userType() ,null, array('class' => 'select2 user-type-role')) !!}
    @endif
</div>
