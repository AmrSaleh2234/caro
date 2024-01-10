<div class="row">
    <div class="box">
        <div class="box-body">
            @include('admin.layouts.forms.buttons.form-save')
            <div class="col-sm-8">
                @if (isset($type) && $type == 'page')
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
                @else
                    @include('admin.layouts.forms.fields.text', [
                        'text_name' => 'name_en',
                        'text_value' => $name_en ?? null,
                        'label_name' => __('English Name'),
                        'not_req' => true,
                    ])
                    @include('admin.layouts.forms.fields.text', [
                        'text_name' => 'name_ar',
                        'text_value' => $name_ar ?? null,
                        'label_name' => __('Arabic Name'),
                        'not_req' => true,
                    ])
                @endif
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'title_en',
                    'text_value' => $name_en ?? null,
                    'label_name' => __('English Title'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'title_ar',
                    'text_value' => $name_ar ?? null,
                    'label_name' => __('Arabic Title'),
                    'not_req' => true,
                ])
                @if (isset($type) && $type == 'page')
                    @include('admin.layouts.forms.fields.textarea', [
                        'text_name' => 'content_en',
                        'text_value' => $content_en ?? null,
                        'label_name' => __('English Content'),
                        'not_req' => true,
                        'text_id' => 'my-textarea',
                    ])
                    @include('admin.layouts.forms.fields.textarea', [
                        'text_name' => 'content_ar',
                        'text_value' => $content_ar ?? null,
                        'label_name' => __('Arabic Content'),
                        'not_req' => true,
                        'text_id' => 'my-textarea',
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'label_name' => __('Page'),
                        'select_name' => 'page_type',
                        'select_function' => pageType(),
                        'label_req' => true,
                    ])
                @else
                    @include('admin.layouts.forms.fields.hidden', [
                        'hidden' => 'content_en',
                        'hidden_id' => $content_en ?? null,
                    ])
                    @include('admin.layouts.forms.fields.hidden', [
                        'hidden' => 'content_ar',
                        'hidden_id' => $content_ar ?? null,
                    ])
                    @include('admin.layouts.forms.fields.hidden', [
                        'hidden' => 'page_type',
                        'hidden_id' => $type ?? null,
                    ])
                @endif
                @if (isset($type) && $type == 'slider')
                    @include('admin.layouts.forms.fields.select', [
                        'label_name' => __('Product'),
                        'select_name' => 'product_id',
                        'select_function' => $products ?? null,
                        'not_req' => true,
                    ])
                @else
                    @include('admin.layouts.forms.fields.hidden', ['hidden' => 'product_id'])
                @endif
                @include('admin.layouts.forms.fields.select')
            </div>
            <div class="col-sm-4">
                @include('admin.layouts.forms.fields.text', [
                    'not_req' => true,
                    'text_name' => 'link',
                    'label_name' => __('Link'),
                ])
                @include('admin.layouts.forms.fields.number', [
                    'min' => 1,
                    'max' => 127,
                    'number_name' => 'order_id',
                    'number_value' => $order_id ?? null,
                    'label_name' => __('Order No'),
                    'label_req' => true,
                ])
                @include('admin.layouts.forms.fields.text', [
                    'label_name' => __('Video Url'),
                    'not_req' => true,
                    'text_name' => 'video',
                    'data_type' => 'url',
                ])
                @include('admin.layouts.forms.fields.image')
                @include('admin.layouts.forms.fields.image', [
                    'image_name' => 'icon',
                    'image' => $icon ?? null,
                    'image_title' => __('Icon'),
                ])
                @include('admin.layouts.forms.fields.hidden', [
                    'hidden' => 'type',
                    'hidden_id' => $type ?? null,
                ])
            </div>
        </div>
    </div>
</div>
