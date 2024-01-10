@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
<a class="btn-width btn btn-{{ $btn_class ?? 'success' }} fa fa-{{ $fa_class ?? 'shopping-cart' }}"
@if(isset($type_array))
href="{{ route("$route_name.$table.index",[$type => $type_value ,$type_array => $type_array_value]) }}"
@else
href="{{ route("$route_name.$table.index",[$type => $type_value]) }}"
@endif
>
    <span> {{ $value ?? '' }} </span>
</a>
