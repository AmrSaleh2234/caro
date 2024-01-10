<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Plan') }}</label>
    @endif
    {!! Form::select('plan_id', $plans, $plan_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
