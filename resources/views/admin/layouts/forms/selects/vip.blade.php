<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Vip') }}</label>
    @endif
    {!! Form::select('vip',statusShow() ,null, array('class' => 'select2','required'=>'')) !!}
</div>
