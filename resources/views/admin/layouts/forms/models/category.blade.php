<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Category') }}</label>
    @endif
    {!! Form::select('category_id', $categories,$category_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
