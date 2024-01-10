@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
<div class="form-group">
<a class="btn-width btn-{{ $btn_class_block ?? 'block' }} btn btn-{{ $btn_class ?? 'success' }} fa fa-{{ $fa_class ?? 'plus' }}"
target=""
href="{{ route("$route_name.$table.create",[$type => $id]) }}"><span>{{ $value ?? '' }}</span></a>
</div>
