<div class="form-group">
    <label>{{ __('Permissions') }}</label>
    {!! Form::select('permission[]', $permission,$rolePermissions, array('class' => 'select2','multiple')) !!}
</div>
