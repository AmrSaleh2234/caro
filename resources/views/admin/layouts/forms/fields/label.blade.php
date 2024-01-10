@if (!isset($label_show))
    <label>
        {{ $label_name ?? $label_default }}
        @if (isset($label_req))
            <span class="text-danger"> * </span>
        @endif
    </label>
@endif
