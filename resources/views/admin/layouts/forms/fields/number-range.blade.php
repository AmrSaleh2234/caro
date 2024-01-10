@php
$add_class = '';
if (isset($number_class)) {
    $add_class = $number_class;
}
$field_name = 'price';
if (isset($number_name)) {
    $field_name = $number_name;
}
@endphp
@include('admin.layouts.forms.fields.form-group-head', ['field_name' => $field_name])
@include('admin.layouts.forms.fields.label',['label_default'=>__("Price")])
@if (!isset($not_req))
    {!! Form::text($number_name ?? 'price', $number_value ?? null, [
        'class' => 'form-control ' . $add_class,
        'id' => $number_id ?? '',
        'data-parsley-range' => $range ?? '[0,100]',
        'data-parsley-trigger' => 'input',
        'disabled' => $disable ?? false,
        'readonly' => $read_only ?? false,
        'data-parsley-type' => $number_type ?? 'number',
        'required' => '',
    ]) !!}
@else
    {!! Form::text($number_name ?? 'price', $number_value ?? null, [
        'class' => 'form-control ' . $add_class,
        'id' => $number_id ?? '',
        'data-parsley-range' => $range ?? '[0,100]',
        'data-parsley-trigger' => 'input',
        'disabled' => $disable ?? false,
        'readonly' => $read_only ?? false,
        'data-parsley-type' => $number_type ?? 'number',
    ]) !!}
@endif
@include('admin.layouts.forms.fields.form-group-foot', ['field_name' => $field_name])
