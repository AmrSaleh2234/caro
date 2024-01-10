<thead>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Unit') }}</th>
        <th>{{ __('Amount') }}</th>
        <th>{{ __('Additions') }}</th>
        <th>{{ __('Price') }}</th>
        <th>{{ __('Total') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $item)
<tr>
    <td>{{ $key+1 }}</td>
    <td>{{ optional($item->product)->name[$admin_language] }} @if(isset($item->productChild)) - {{   optional(optional($item->productChild)->size)->name[$admin_language] }} @endif</td>
    <td>{{ optional(optional($item->product)->unit)->name[$admin_language] }}</td>
    <td>{{ $item->amount }}</td>
    <td>@if (!empty($item->orderItemAdditions))
        @foreach ($item->orderItemAdditions as $v)
            <small class="label bg-blue">{{ $v->amount }} - {{ optional($v->addition)->name[$admin_language] }}</small>
        @endforeach
    @endif</td>
    <td>{{ number_format((float)$item->price, $currency_view ?? 2, '.', '') }}</td>
    <td>{{ number_format((float)$item->total, $currency_view ?? 2, '.', '') }}</td>
</tr>
@endforeach

