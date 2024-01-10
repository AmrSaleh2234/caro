<thead>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Name') }}</th>
        <th>{{ __('Price') }}</th>
        <th>{{ __('Unit') }}</th>
        <th>{{ __('Categories') }}</th>
        <th>{{ __('Feature') }}</th>
        <th>{{ __('Offer') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Setting') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name[$admin_language] }}</td>
        <td>{{ number_format($product->price, $currency_view, '.', '') }} </td>
        <td>
            @if (isset($product->unit))
                {{ optional($product->unit)->name[$admin_language] }}
            @endif
        </td>
        <td>
            @if (!empty($product->categories))
                @foreach ($product->categories as $v)
                    <small class="label bg-blue">{{ $v->name[$admin_language] }}</small>
                @endforeach
            @endif
        </td>
        <td>
            @include('admin.layouts.tables.status', [
                'active' => $product->feature,
                'ajax_class' => $model->getTable().'-feature',
                'id' => $product->id,
                'data_status' => 'feature',
            ])
        </td>
        <td>
            @include('admin.layouts.tables.status', [
                'active' => $product->offer,
                'ajax_class' => $model->getTable().'-offer',
                'id' => $product->id,
                'data_status' => 'offer',
            ])
        </td>

        <td>
            @include('admin.layouts.tables.status', [
                'active' => $product->active,
                'ajax_class' => $model->getTable().'-status',
                'id' => $product->id,
            ])
        </td>
        <td>
            @if ($product->deleted_at == null)
                @include('admin.layouts.tables.models', [
                    'btn_class' => 'warning',
                    'fa_class' => 'star',
                    'table' => 'reviews',
                    'type' => 'product_id',
                    'type_value' => $product->id,
                ])
                @include('admin.layouts.tables.models', [
                    'btn_class' => 'success',
                    'fa_class' => 'heart',
                    'table' => 'favorites',
                    'type' => 'product_id',
                    'type_value' => $product->id,
                ])
                @include('admin.layouts.tables.edit-old', ['table' => $model->getTable(), 'id' => $product->id])
                @if (auth()->user()->isAbleTo(['products.delete']))
                    @include('admin.layouts.tables.delete-form-old', [
                        'table' => $model->getTable(),
                        'id' => $product->id,
                    ])
                @endif
            @else
                @if (auth()->user()->isAbleTo(['products.delete']))
                    @include('admin.layouts.tables.restore-old', [
                        'table' => $model->getTable(),
                        'id' => $product->id,
                    ])
                @endif
            @endif
        </td>
        @include('admin.layouts.forms.close')
    </tr>
@endforeach
