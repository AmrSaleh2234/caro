<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Type') }}</label>
    @endif
    {!! Form::select('type',walletType() ,null, array('class' => 'select2','required'=>'')) !!}
</div>
