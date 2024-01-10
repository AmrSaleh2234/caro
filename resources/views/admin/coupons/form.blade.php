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
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'code',
                    'label_name' => __('Code'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.select', [
                    'select_name' => 'type',
                    'label_name' => __('Type'),
                    'select_function' => couponType(),
                ])
                @include('admin.layouts.forms.fields.number', [
                    'number_name' => 'discount',
                    'label_name' => __('Discount'),
                    'label_req' => true,
                ])
                @include('admin.layouts.forms.fields.date', [
                    'date_name' => 'date_start',
                    'label_name' => __('Date Start'),
                    'label_req' => true,
                    'date_class' => 'datetimepicker',
                ])
                @include('admin.layouts.forms.fields.date', [
                    'date_name' => 'date_expire',
                    'label_name' => __('Date Expire'),
                    'label_req' => true,
                    'date_class' => 'datetimepicker',
                ])
                @include('admin.layouts.forms.fields.select',['label_name'=>__("Finish"),'select_name' => 'finish'])
                @include('admin.layouts.forms.fields.select')
            </div>
            <div class="col-sm-4">
                @include('admin.layouts.forms.numbers.use-count')
                @include('admin.layouts.forms.fields.number', [
                    'number_name' => 'use_limit',
                    'label_name' => __('Use Limit'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.number', [
                    'number_name' => 'user_limit',
                    'label_name' => __('User Limit'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.number', [
                    'number_name' => 'count_used',
                    'label_name' => __('Count Used'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.number', [
                    'number_name' => 'min_order',
                    'label_name' => __('Minimum Order'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.number', [
                    'number_name' => 'max_discount',
                    'label_name' => __('Max Discount'),
                    'not_req' => true,
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
            </div>
        </div>
    </div>
</div>
