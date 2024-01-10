<thead>
    <tr>
        {{--  <th>{{ __('ID') }}</th>  --}}
        <th>{{ __('Name') }}</th>
        <th>{{ __('Code') }}</th>
        <th>{{ __('Type') }}</th>
        <th>{{ __('Discount') }}</th>
        <th>{{ __('Max Discount') }}</th>
        <th>{{ __('Minimum order') }}</th>
        <th>{{ __('Date') }}</th>
        <th>{{ __('Finish') }}</th>
        <th>{{ __('Status') }}</th>
        <th>{{ __('Setting') }}</th>
    </tr>
</thead>
@foreach ($data as $key => $coupon)
<tr>
    {{--  <td>{{ $coupon->id }}</td>  --}}
    <td>{{ $coupon->name[$admin_language] }}</td>
    <td>{{ $coupon->code }}</td>
    <td>{{ couponName($coupon->type) }}</td>
    <td>{{ $coupon->discount }} @if($coupon->type == "percentage") % @endif</td>
    <td>@if($coupon->max_discount > 0){{ $coupon->max_discount }} @endif</td>
    <td>@if($coupon->min_order > 0){{ $coupon->min_order }} @endif</td>
    <td>{{ $coupon->date_start }} {{ __('to') }} {{ $coupon->date_expire }}</td>
    <td>
        @include('admin.layouts.tables.status',['active'=>$coupon->finish,'ajax_class'=>'couponfinish','data_status'=>'finish','id'=>$coupon->id])
    </td>
    <td>
        @include('admin.layouts.tables.status',['active'=>$coupon->active,'ajax_class'=>'couponstatus','id'=>$coupon->id])
    </td>
    <td>
       <a class="btn btn-success fa fa-shopping-cart" href="{{ route('admin.orders.index',['coupon_id' => $coupon->id]) }}"></a>
       @include('admin.layouts.tables.edit-old',['table'=>'coupons','id'=>$coupon->id])
    </td>
</tr>
@endforeach

