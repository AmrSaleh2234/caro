@include('admin.layouts.forms.buttons.collapse-add')
<div class="box-body">
    @include('admin.layouts.forms.search')
    <div class="row">
        @include('admin.layouts.forms.buttons.form-save', ['save' => __('Search')])
        <div class="col-sm-6">
            <div class="box">
                <div class="box-body">
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Client'),
                        'select_name' => 'user_id',
                        'select_value' => request()->input('user_id') ?? null,
                        'select_function' => $clients ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Delivery'),
                        'select_name' => 'delivery_id',
                        'select_value' => request()->input('delivery_id') ?? null,
                        'select_function' => $deliveries ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Branch'),
                        'select_name' => 'branch_id',
                        'select_value' => request()->input('branch_id') ?? null,
                        'select_function' => $branches ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Status'),
                        'select_name' => 'status',
                        'select_value' => request()->input('status') ?? null,
                        'select_function' => orderTypeAll() ?? null,
                    ])
                    @include('admin.layouts.forms.fields.date', [
                        'not_req' => true,
                        'label_name' => __('Date Start'),
                        'date_name' => 'date_start',
                        'date_value' => request()->input('date_start') ?? null,
                    ])
                    @include('admin.layouts.forms.fields.date', [
                        'not_req' => true,
                        'label_name' => __('Date End'),
                        'date_name' => 'date_end',
                        'date_value' => request()->input('date_end') ?? null,
                    ])
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-body">
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Payement'),
                        'select_name' => 'payment_id',
                        'select_value' => request()->input('payment_id') ?? null,
                        'select_function' => $payments ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Region'),
                        'select_name' => 'region_id',
                        'select_value' => request()->input('region_id') ?? null,
                        'select_function' => $regions ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('City'),
                        'select_name' => 'city_id',
                        'select_value' => request()->input('city_id') ?? null,
                        'select_function' => $cities ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Coupon'),
                        'select_name' => 'coupon_id',
                        'select_value' => request()->input('coupon_id') ?? null,
                        'select_function' => $coupons ?? null,
                    ])
                    @include('admin.layouts.forms.fields.number', [
                        'not_req' => true,
                        'label_name' => __('Min Price'),
                        'number_name' => 'price_min',
                        'number_value' => request()->input('price_min') ?? null,
                    ])
                    @include('admin.layouts.forms.fields.number', [
                        'not_req' => true,
                        'label_name' => __('Max Price'),
                        'number_name' => 'price_max',
                        'number_value' => request()->input('price_max') ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Limit'),
                        'select_name' => 'limit',
                        'select_value' => request()->input('limit') ?? null,
                        'select_function' => tableView('yes'),
                    ])
                    {{--  @include('admin.layouts.forms.selects.show',['show_name'=> __('Paid'),'show_value'=> $is_paid,'show_text'=>'is_paid','show_function'=>statusShow("yes")])  --}}
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.forms.close')
</div>
@include('admin.layouts.forms.buttons.collapse-foot')
