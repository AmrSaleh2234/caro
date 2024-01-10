@include('admin.layouts.forms.buttons.collapse-add')
<div class="box-body">

    <div class="row">
        <div class="col-sm-6">
            @include('admin.layouts.forms.search')
            @include('admin.layouts.forms.buttons.form-save', ['save' => __('Search'),'col'=>6])
            <div class="box">
                <div class="box-body">
                    @include('admin.layouts.forms.fields.hidden', [
                        'hidden' => 'is_delete',
                        'hidden_id' => 0,
                    ])
                    @include('admin.layouts.forms.fields.select', [
                        'not_req' => true,
                        'label_name' => __('User'),
                        'select_name' => 'user_id',
                        'select_value' => request()->input('user_id') ?? null,
                        'select_function' => $users ?? null,
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
            @include('admin.layouts.forms.close')
        </div>
        @if (isset($route_delete) && $route_delete > 0)
            <div class="col-sm-6">
                @include('admin.layouts.forms.create', ['table' => 'notifications','form_status' => 'delete','form_method' => 'GET'])
                @include('admin.layouts.forms.buttons.form-save', ['save' => __('Delete'),'btn_class'=>'danger','col'=>6])
                <div class="box">
                    <div class="box-body">
                            @include('admin.layouts.forms.fields.hidden', [
                                'hidden' => 'is_delete',
                                'hidden_id' => 1,
                            ])
                            @include('admin.layouts.forms.fields.select', [
                                'not_req' => true,
                                'label_name' => __('User'),
                                'select_name' => 'user_id',
                                'select_value' => request()->input('user_id') ?? null,
                                'select_function' => $users ?? null,
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
                @include('admin.layouts.forms.close')
            </div>
        @endif
    </div>
</div>
@include('admin.layouts.forms.buttons.collapse-foot')
