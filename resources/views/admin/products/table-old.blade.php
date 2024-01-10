<thead>
    <tr>
        <th>{{ __('ID') }}</th>
        <th>{{ __('Name') }}</th>
        {{--  <th>{{ __('Code') }}</th>  --}}
        {{--  <th>{{ __('Offer Price') }}</th>  --}}
        {{--  <th>{{ __('Max Amount') }}</th>  --}}
        {{--  <th>{{ __('Filter') }}</th>  --}}
        {{--  <th>{{ __('Sale') }}</th>  --}}
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
        <td>{{ $product->price }}</td>
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
                'ajax_class' => 'productfeature',
                'id' => $product->id,
                'data_status' => 'feature',
            ])
        </td>
        <td>
            @include('admin.layouts.tables.status', [
                'active' => $product->offer,
                'ajax_class' => 'productoffer',
                'id' => $product->id,
                'data_status' => 'offer',
            ])
        </td>

        <td>
            @include('admin.layouts.tables.status', [
                'active' => $product->active,
                'ajax_class' => 'productstatus',
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
                @include('admin.layouts.tables.edit-old', ['table' => 'products', 'id' => $product->id])
                @if (auth()->user()->isAbleTo(['products.delete']))
                    @include('admin.layouts.tables.delete-form-old', [
                        'table' => 'products',
                        'id' => $product->id,
                    ])
                @endif
            @else
                @if (auth()->user()->isAbleTo(['products.delete']))
                    @include('admin.layouts.tables.restore-old', [
                        'table' => 'products',
                        'id' => $product->id,
                    ])
                @endif
            @endif
        </td>
        @include('admin.layouts.forms.close')
    </tr>
@endforeach
{{--  <td class="product_code_form">
            <span>{{ $product->code }}</span><br>
            {!! Form::text('code', $product->code, ['class' => 'form-control product_code']) !!}
            <a class="productcode fa fa-info btn  btn-info" data-id='{{ $product->id }}'></a>
        </td>
        <td class="product_price">
            <span>{{ number_format((float) $product->price, getCurrencyView(), '.', '') }}</span><br>
            {!! Form::text('price', number_format((float) $product->price, getCurrencyView(), '.', ''), ['class' => 'form-control price', 'data-parsley-type' => 'number']) !!}
        </td>
        <td class="product_offer_price">
            <span>{{ number_format((float) $product->offer_price, getCurrencyView(), '.', '') }}</span><br>
            {!! Form::text('offer_price', number_format((float) $product->offer_price, getCurrencyView(), '.', ''), ['class' => 'form-control offer_price', 'data-parsley-type' => 'number']) !!}
            <a class="productprice fa fa-money btn  btn-success" data-id='{{ $product->id }}'
                data-price="{{ number_format((float) $product->price, getCurrencyView(), '.', '') }}"
                data-offer="{{ number_format((float) $product->offer_price, getCurrencyView(), '.', '') }}"></a>
        </td>
        </td>
        <td class="product_max_amount">
            <span>{{ $product->max_amount }}</span><br>
            {!! Form::text('max_amount', $product->max_amount, ['class' => 'form-control max_amount', 'data-parsley-type' => 'number']) !!}
            <a class="productmax fa fa-flask btn  btn-danger" data-id='{{ $product->id }}'
                data-max='{{ $product->max_amount }}'></a>
        </td>  --}}
{{--  <td>
            @include('admin.layouts.tables.status',['active'=>$product->filter,'ajax_class'=>'productfilter','id'=>$product->id,'data_status'=>'filter'])
        </td>
        <td>
            @include('admin.layouts.tables.status',['active'=>$product->sale,'ajax_class'=>'productsale','id'=>$product->id,'data_status'=>'sale'])
        </td>  --}}
