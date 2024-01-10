<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Branch') }}</label>
    @endif
    {!! Form::select('branch_id', $branches, $branch_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
