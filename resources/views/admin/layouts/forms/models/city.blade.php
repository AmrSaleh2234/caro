<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('City') }}</label>
    @endif
    {!! Form::select('city_id', $cities, $city_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
