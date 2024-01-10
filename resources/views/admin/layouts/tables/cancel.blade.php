<a id="cancel" data-id="{{ $id }}" class="btn-width btn btn-{{ $btn_class ?? 'danger' }} fa fa-{{ $fa_class ?? 'window-close' }}"><span>{{ $cancel ?? '' }}</span></a>
{!! Form::open(['method' => 'POST','route' => ["admin.$table.cancel", $id],'style'=>'display:inline']) !!}
{!! Form::submit('Cancel', ['class' => 'hide btn btn-danger delete-btn-submit','data-cancel-id' => $id]) !!}
@include('admin.layouts.forms.close')

