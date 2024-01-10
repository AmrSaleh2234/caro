<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Page') }}</label>
    @endif
    {!! Form::select('page_type',pageType($all ?? 'no') ,null, array('class' => 'select2','required'=>'')) !!}
</div>
