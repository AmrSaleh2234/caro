<thead>
    <tr>
        {{--  <th>{{ __('ID') }}</th>  --}}
        <th>{{ __('Client') }}</th>
        <th>{{ __('City') }}</th>
        <th>{{ __('Region') }}</th>
        <th>{{ __('Location') }}</th>
        <th>{{ __('Address') }}</th>
        <th>{{ __('Setting') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $address)
    <tr>
        {{--  <td>{{ $address->id }}</td>  --}}
        <td>
            <a href="{{ route('admin.addresses.index', ['user_id' => $address->user_id]) }}">
                {{ $address->user->name }} - {{ $address->user->phone_code }}{{ $address->user->phone }}
            </a>
        </td>
        <td>
            @if (isset($address->city))
                <a href="{{ route('admin.addresses.index', ['city_id' => $address->city_id]) }}">
                    {{ $address->city->name[$admin_language] }}
                </a>
            @endif
        </td>
        <td>
            @if (isset($address->region))
                <a href="{{ route('admin.regions.index', ['region_id' => $address->region_id]) }}">
                    {{ $address->region->name[$admin_language] }}
                </a>
            @endif
        </td>
        <td>  <a class="btn btn-danger fa fa-map-marker" target="_blank" href={{ url("https://www.google.com/maps/@{$address->latitude},{$address->longitude},14z") }} >
        </td>
        <td>{{ $address->address }}</td>
        <td>
            @include('admin.layouts.tables.edit-old', ['table' => 'addresses', 'id' => $address->id])
            @include('admin.layouts.tables.delete-form-old', ['table' => 'addresses', 'id' => $address->id])

        </td>
    </tr>
@endforeach
