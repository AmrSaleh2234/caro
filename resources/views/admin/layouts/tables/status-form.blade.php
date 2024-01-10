@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
{!! Form::open(['method' => 'POST','route' => ["$route_name.$table.status", $id],'style'=>'display:inline']) !!}
<button type="submit" class="fa fa-{{ $success_fa ?? 'check' }} btn-width btn btn-{{ $btn_class ?? 'success' }}"></button>
@include('admin.layouts.forms.close')

