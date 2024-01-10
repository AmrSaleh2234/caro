<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Shipping') }}</label>
    @endif
    {!! Form::select('shipping',statusShow() ,null, array('class' => 'select2','required'=>'')) !!}
</div>
