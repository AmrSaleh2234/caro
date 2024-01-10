@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
<a class="btn-width btn btn-{{ $btn_class ?? 'success' }} fa fa-{{ $fa_class ?? 'plus' }}"
@if(isset($create_type) && isset($type_id))
href="{{ route("$route_name.$table.create",[$create_type=>$type_id]) }}"><span> {{ $value ?? '' }} </span></a>
@else
href="{{ route("$route_name.$table.create") }}"><span> {{ $value ?? '' }} </span></a>
@endif
