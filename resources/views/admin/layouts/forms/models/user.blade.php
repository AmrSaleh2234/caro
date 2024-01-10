<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('User') }}</label>
    @endif
    {!! Form::select('user_id', $users, $user_id ?? null, array('class' => 'select2','required'=>'')) !!}
</div>
