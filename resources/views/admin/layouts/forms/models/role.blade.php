<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Role') }}</label>
    @endif
    {!! Form::select('role_id', $roles, $role_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
