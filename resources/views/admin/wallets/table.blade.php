<thead>
    <tr>
        {{--  <th>{{ __('ID') }}</th>  --}}

        <th>{{ __('Name') }}</th>
        {{--  <th>{{ __('Country') }}</th>  --}}
        <th>{{ __('Wallet') }}</th>
        {{--  <th>{{ __('Setting') }}</th>  --}}
    </tr>
</thead>
@foreach ($data as $key => $wallet)
<tr>
    {{--  <td>{{ $wallet->id }}</td>  --}}
    <td>
        <a href="{{ route('admin.wallets.index',['user_id'=>$wallet->user_id]) }}">
            {{ $wallet->user->name }} - {{ $wallet->user->email }}
        </a>
        </td>
    {{--  <td><a href="{{ route('admin.wallets.index',['country_id'=>$wallet->country_id]) }}">
            {{ $wallet->country->name[$admin_language] }}
    </a>  --}}
    </td>
    <td>{{ $wallet->wallet }}</td>
    {{--  <td>
       <a class="btn btn-primary fa fa-edit" href="{{ route('admin.wallets.edit',$wallet->id) }}"></a>
       <a id="delete" data-id='{{ $wallet->id }}' class="btn btn-danger fa fa-trash"></a>
        {!! Form::open(['method' => 'DELETE','route' => ['admin.wallets.destroy', $wallet->id],'style'=>'display:inline']) !!}
        {!! Form::submit('Delete', ['class' => 'hide btn btn-danger delete-btn-submit','data-delete-id' => $wallet->id]) !!}
        @include('admin.layouts.forms.close')
    </td>  --}}
</tr>
@endforeach

