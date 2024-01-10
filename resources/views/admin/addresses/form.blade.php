<div class="row">
    <div class="box">
        <div class="box-body">
            @include('admin.layouts.forms.buttons.form-save')
            <div class="col-sm-8">
                @include('admin.layouts.forms.fields.select', [
                    'label_name' => __('User'),
                    'select_name' => 'user_id',
                    'select_value' => request()->input('user_id') ?? null,
                    'select_function' => $users ?? null,
                ])
                @include('admin.layouts.forms.fields.select', [
                    'label_name' => __('Type'),
                    'select_name' => 'type',
                    'select_function' => addressType(),
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
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'latitude',
                    'label_name' => __('Latitude'),
                    'label_req' => true,
                ])
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'longitude',
                    'label_name' => __('Longitude'),
                    'label_req' => true,
                ])
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'address',
                    'label_name' => __('Address'),
                    'label_req' => true,
                ])
            </div>
            <div class="col-sm-4">
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'building',
                    'label_name' => __('Building'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'floor',
                    'label_name' => __('Floor'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'apartment',
                    'label_name' => __('Apartment'),
                    'not_req' => true,
                ])
                @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'additional_info',
                    'label_name' => __('Additional Info'),
                    'not_req' => true,
                ])
            </div>
        </div>
    </div>
</div>
