<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Type') }}</label>
    @endif
    {!! Form::select('type',postType($all ?? 'no',$is_additions ?? true) ,null, array('class' => 'select2','required'=>'')) !!}
</div>
