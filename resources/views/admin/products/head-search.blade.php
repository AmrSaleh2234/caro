@include('admin.layouts.forms.buttons.collapse-add')
<div class="box-body">
    @include('admin.layouts.forms.search')
    <div class="row">
        @include('admin.layouts.forms.buttons.form-save', ['save' => __('Search')])
        <div class="col-sm-6">
            <div class="box">
                <div class="box-body">
                    @include('admin.layouts.forms.fields.text',['not_req'=>true,'text_value'=>request()->input('name') ?? null])
                    @include('admin.layouts.forms.fields.number',['label_name'=> __('Min Price'),'not_req'=>true,'number_name'=>'price_min','number_value'=>request()->input('price_min') ?? null])
                    @include('admin.layouts.forms.fields.number',['label_name'=> __('Max Price'),'not_req'=>true,'number_name'=>'price_max','number_value'=>request()->input('price_max') ?? null])
                    {{--  @include('admin.layouts.forms.texts.name',['name'=> __('Code'),'not_req'=>true,'name_text'=>'code','name_value'=>request()->input('code') ?? null])  --}}
                    @include('admin.layouts.forms.fields.select',['not_req'=>true,'label_name'=> __('Unit'),'select_value'=> request()->input('unit_id') ?? null,'select_name'=>'unit_id','select_function'=> $units ?? null])
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-body">
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Category'),
                        'select_name' => 'category_id',
                        'select_value' => request()->input('category_id') ?? null,
                        'select_function' => $categories ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Feature'),
                        'select_name' => 'feature',
                        'select_value' => request()->input('feature') ?? null,
                        'select_function' => statusShow("yes") ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Offer'),
                        'select_name' => 'offer',
                        'select_value' => request()->input('offer') ?? null,
                        'select_function' => statusShow("yes") ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Active'),
                        'select_name' => 'active',
                        'select_value' => request()->input('active') ?? null,
                        'select_function' => statusShow("yes") ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Limit'),
                        'select_name' => 'limit',
                        'select_value' => request()->input('limit') ?? null,
                        'select_function' => tableView('yes'),
                    ])
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.forms.close')
</div>
@include('admin.layouts.forms.buttons.collapse-foot')
