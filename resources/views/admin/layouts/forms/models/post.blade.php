<div class="form-group">
    @if(!isset($label_show))
    <label>{{ $product ?? __('Product') }}</label>
    @endif
    {!! Form::select('post_id', $posts, $post_id ?? null, array('class' => 'select2','required'=>'','style'=>'width: 100%')) !!}
</div>
