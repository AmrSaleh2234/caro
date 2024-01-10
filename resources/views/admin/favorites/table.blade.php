<thead>
    <tr>
        <th>{{ __('User') }}</th>
        <th>{{ __('Product') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $favorite)
<tr>
    <td> <a href="{{ route('admin.favorites.index',['user_id'=>$favorite->user_id]) }}">
            {{ $favorite->user->name }} - {{ $favorite->user->phone }}
        </a></td>

    <td><a href="{{ route('admin.favorites.index',['product_id'=>$favorite->product_id]) }}">
        {{ optional($favorite->product)->name[$admin_language] }}
    </a></td>
</tr>
@endforeach

