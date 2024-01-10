<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Region') }}</label>
    @endif
    {!! Form::select('region_id', $regions, $region_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
