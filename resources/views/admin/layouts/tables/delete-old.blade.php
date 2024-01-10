@php
$route_name = getRouteName($route_type ?? NULL);
@endphp
<a id="delete" data-id="{{ $id }}" class="btn-width btn btn-{{ $btn_class ?? 'danger' }} fa fa-{{ $fa_class ?? 'trash' }}"><span>{{ $delete ?? '' }}</span></a>
<a data-delete-id="{{ $id }}" class="{{ $serivce_model ?? '' }}-delete hide d-none btn btn-danger delete-btn-submit"></a>

{{--  {!! Form::open(['method' => 'DELETE','route' => ["$route_name.$table.destroy", $id],'style'=>'display:inline']) !!}
{!! Form::submit('Delete', ['class' => 'hide btn btn-danger delete-btn-submit','data-delete-id' => $id]) !!}
@include('admin.layouts.forms.close')  --}}

