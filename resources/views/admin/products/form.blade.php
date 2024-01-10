<div class="row">
    <div class="box">
        <div class="box-body">
            @include('admin.layouts.forms.buttons.form-save')
            <div class="col-sm-8">
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'name_en',
                    'text_value' => $name_en ?? null,
                    'label_name' => __('English Name'),
                    'label_req' => true,
                ])
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'name_ar',
                    'text_value' => $name_ar ?? null,
                    'label_name' => __('Arabic Name'),
                    'label_req' => true,
                ])
                @include('admin.layouts.forms.fields.textarea', [
                    'text_name' => 'content_en',
                    'text_value' => $content_en ?? null,
                    'label_name' => __('English Content'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.textarea', [
                    'text_name' => 'content_ar',
                    'text_value' => $content_ar ?? null,
                    'label_name' => __('Arabic Content'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.number', [
                    'min' => 1,
                    'max' => 127,
                    'number_name' => 'order_id',
                    'number_value' => $order_id ?? null,
                    'label_name' => __('Order No'),
                    'label_req' => true,
                ])
                @include('admin.layouts.forms.fields.number', [
                    'number_name' => 'start',
                    'number_value' => $start ?? null,
                    'label_name' => __('Start'),
                    'label_req' => true,
                ])
                @include('admin.layouts.forms.fields.number', [
                    'number_name' => 'skip',
                    'number_value' => $skip ?? null,
                    'label_name' => __('Skip'),
                    'label_req' => true,
                ])
                @include('admin.layouts.forms.fields.select')
                {{--  @include('admin.layouts.forms.texts.code')
                @include('admin.layouts.forms.selects.max')
                @include('admin.layouts.forms.numbers.order-max')
                @include('admin.layouts.forms.dates.date', [
                    'not_req' => true,
                    'date_label' => __('Date Start'),
                    'date_class' => 'datetimepicker form-control',
                    'date_text' => 'date_start',
                ])
                @include('admin.layouts.forms.dates.date', [
                    'not_req' => true,
                    'date_label' => __('Date Expire'),
                    'date_class' => 'datetimepicker form-control',
                    'date_text' => 'date_expire',
                ])  --}}
            </div>
            <div class="col-sm-4">
                @include('admin.layouts.forms.fields.image')
                @include('admin.layouts.forms.products.addition',['not_req'=>true])
                @include('admin.layouts.forms.products.category')
                @include('admin.layouts.forms.fields.select',['select_function'=>$units ?? null,'select_name'=>'unit_id','label_name' => __('Unit'),'label_req' => true])
                @include('admin.layouts.forms.fields.number', [
                    'number_name' => 'order_limit',
                    'number_value' => $order_limit ?? null,
                    'label_name' => __('Order Limit'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.number')
                @include('admin.layouts.forms.fields.number', [
                    'number_name' => 'offer_price',
                    'label_name' => __('Price Before Offer'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.select', [
                                'select_name' => 'offer',
                                'label_name' => __('Offer'),
                                'select_function' => statusShow(),
                ])
                @include('admin.layouts.forms.fields.select', [
                                'select_name' => 'feature',
                                'label_name' => __('Feature'),
                                'select_function' => statusShow(),
                ])
                {{--
                @include('admin.layouts.forms.numbers.shipping')
                @include('admin.layouts.forms.selects.filter')
                @include('admin.layouts.forms.numbers.max-amount')
                @include('admin.layouts.forms.selects.sale')
                @include('admin.layouts.forms.selects.late')
                @include('admin.layouts.repeater-image', ['image_title' => __('Images'),'label_show' => true])  --}}
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
            <div class="clearfix"></div>
            <div class="col-sm-12">
                @include('admin.products.children')
            </div>
        </div>
    </div>
</div>
