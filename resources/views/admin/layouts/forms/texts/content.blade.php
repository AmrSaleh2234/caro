<div class="form-group">
    <label>{{ $content ?? __('Content') }}</label>
    {!! Form::textarea($content_text ?? 'content', $content_value ?? null, array('class' => 'form-control')) !!}
</div>
