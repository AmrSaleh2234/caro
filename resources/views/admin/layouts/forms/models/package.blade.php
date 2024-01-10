<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Package') }}</label>
    @endif
    {!! Form::select('package_id', $packages, $package_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
