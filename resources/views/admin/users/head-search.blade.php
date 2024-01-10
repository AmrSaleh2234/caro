@include('admin.layouts.forms.buttons.collapse-add')
<div class="box-body">
    @include('admin.layouts.forms.search')
    <div class="row">
        @include('admin.layouts.forms.buttons.form-save', ['save' => __('Search')])
        <div class="col-sm-6">
            <div class="box">
                <div class="box-body">
                    @include('admin.layouts.forms.fields.text', [
                        'label_name' => __('Name'),
                        'not_req' => true,
                        'text_name' =>'name',
                        'text_value' => request()->input('name') ?? null,
                    ])
                    @include('admin.layouts.forms.fields.phone', [
                        'label_name' => __('Phone'),
                        'not_req' => true,
                        'text_name' =>'phone',
                        'text_value' => request()->input('phone') ?? null,
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
                    @include('admin.layouts.forms.fields.text', [
                        'label_name' => __('Email'),
                        'not_req' => true,
                        'text_name' =>'email',
                        'text_type' =>'email',
                        'text_value' => request()->input('email') ?? null,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('Type'),
                        'select_name' => 'type',
                        'select_value' => request()->input('type') ?? null,
                        'select_function' => userTypeDefault(),
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
