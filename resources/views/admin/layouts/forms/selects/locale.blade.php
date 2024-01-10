<div class="form-group">
    @if(!isset($label_show))
    <label>{{ $locale_name ?? __('Locale') }}</label>
    @endif
    {!! Form::select($locale_text ?? 'locale',languageType() ,$locale_value ?? null, array('class' => 'select2','required'=>'')) !!}
</div>
