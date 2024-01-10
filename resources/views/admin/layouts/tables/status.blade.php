@if($active == 0)
<a class="{{ $ajax_class ?? '' }} fa fa-{{ $error_fa   ?? 'remove' }} btn-width btn  btn-{{ $error_class   ?? 'danger' }}"   data-id="{{ $id }}"  data-{{ $data_status ?? 'status' }}="{{ $error_status ?? 1 }}" ></a>
@else
<a class="@if(!isset($model_is_read)) {{ $ajax_class ?? '' }} @endif fa fa-{{ $success_fa ?? 'check'   }} btn-width btn   btn-{{ $success_class ?? 'success' }}"  data-id="{{ $id }}"  data-{{ $data_status ?? 'status' }}="{{ $success_status ?? 0 }}" ></a>
@endif

