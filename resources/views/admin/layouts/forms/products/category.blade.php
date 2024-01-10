<div class="form-group">
    @if(!isset($label_show))
    <label>{{ __('Categories') }}</label>
    @endif
    @if(!isset($not_req))
    {!! Form::select('categories[]', $categories,$product_category, array('class' => 'select2','multiple','required'=>'','style'=>'width: 100%')) !!}
    @else
    {!! Form::select('categories[]', $categories,$product_category, array('class' => 'select2','multiple','style'=>'width: 100%')) !!}
    @endif
</div>
