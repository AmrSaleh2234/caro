<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Admin Notifi') }}</label>
    @endif
    {!! Form::select('is_notify',statusShow() ,null, array('class' => 'select2','required'=>'')) !!}
</div>
