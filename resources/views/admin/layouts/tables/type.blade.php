<a class="btn-width btn btn-{{ $btn_class ?? 'success' }} fa fa-{{ $fa_class ?? 'print' }}" href="{{ route("admin.$table.$type",$id) }}">
    <span>{{ $value ?? '' }}</span>
</a>
