<thead>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('User') }}</th>
        <th>{{ __('Order') }}</th>
        <th>{{ __('Product') }} </th>
        <th>{{ __('Rating') }}</th>
        <th>{{ __('Comment') }}</th>
        <th>{{ __('Active') }}</th>
        {{--  <th>{{ __('Setting') }}</th>  --}}
    </tr>
</thead>
@foreach ($data as $key => $model)
    <tr>
        <td>{{ $model->id }}</td>
        <td>
            <a href="{{ route('admin.reviews.index', ['user_id' => $model->user_id]) }}">
                {{ $model->user->name }} - {{ $model->user->phone }}
            </a>
        </td>
        <a href="{{ route('admin.reviews.index', ['order_id' => $model->order_id]) }}">
            {{ $model->order_id }}
        </a>
        </td>
        <td><a href="{{ route('admin.reviews.index', ['product_id' => $model->product_id]) }}">
                {{ $model->product->name[$admin_language] }}
            </a>
        </td>
        <td>
            <a href="{{ route('admin.reviews.index', ['user_id' => $user_id, 'product_id' => $product_id, 'rating' => $rating]) }}">
                {{ $model->rate }}
            </a>
        </td>
        <td>{!! $model->comment !!}</td>
        <td>
            @include('admin.layouts.tables.status', [
                'active' => $model->active,
                'ajax_class' => $model->getTable() . '-status',
                'id' => $model->id,
            ])
        </td>
        {{--  <td>
            @include('admin.layouts.tables.edit-old', ['table' => $model->getTable(), 'id' => $model->id])
        </td>  --}}
    </tr>
@endforeach
