<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Sale') }}</label>
    @endif
    {!! Form::select('sale',statusShow() ,null, array('class' => 'select2','required'=>'')) !!}
</div>
