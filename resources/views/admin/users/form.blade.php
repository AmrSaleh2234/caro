<div class="row">
    <div class="box">
        <div class="box-body">
            @include('admin.layouts.forms.buttons.form-save')
            <div class="col-sm-8">
                @include('admin.layouts.forms.fields.text', [
                    'label_req' => true,
                    'label_name' => __('Name First'),
                    'text_name' => 'name_first',
                ])
                @include('admin.layouts.forms.fields.text', [
                    'label_req' => true,
                    'label_name' => __('Name Last'),
                    'text_name' => 'name_last',
                ])
                @include('admin.layouts.forms.fields.text', [
                    'not_req' => true,
                    'label_name' => __('Email'),
                    'text_name' => 'email',
                    'text_type' => 'email',
                ])
                @include('admin.layouts.forms.fields.phone')
                {{--  @include('admin.layouts.forms.texts.address')  --}}
                @include('admin.layouts.forms.users.password')
                @include('admin.layouts.forms.users.password-confirm')
                @include('admin.layouts.forms.fields.select')
            </div>
            <div class="col-sm-4">
                @include('admin.layouts.forms.fields.image')
                {{--  @include('admin.layouts.forms.models.city')  --}}
                {{--  @include('admin.layouts.forms.models.country')  --}}
                @include('admin.layouts.forms.selects.locale')
                @if ($new > 0)
                    @if (isset($type) && $type == 'admin')
                        <div class="form-group">
                            <label>{{ __('Type') }}</label>
                            {!! Form::select('type', userType("yes","no", "no"), null, ['class' => 'select2 user-type-role', 'required' => '']) !!}
                        </div>
                        <div class="user-all-role">
                            @include('admin.layouts.forms.users.role')
                        </div>
                        @include('admin.layouts.forms.fields.select', [
                            'select_name' => 'vip',
                            'label_name' => __('Vip'),
                            'select_function' => statusShow(),
                        ])
                        @include('admin.layouts.forms.fields.select', [
                            'select_name' => 'is_notify',
                            'label_name' => __('Admin Notifi'),
                            'select_function' => statusShow(),
                        ])
                        @else
                        <div class="form-group">
                            {!! Form::hidden('type', $type ?? 'client') !!}
                        </div>
                        @endif
                @else
                    @if (isset($user_type) && in_array($user_type, $user_admins))
                        @if (in_array($type, ['client', 'delivery']))
                            <div class="form-group">
                                {!! Form::hidden('type', $type ?? 'client') !!}
                            </div>
                        @else
                            <div class="form-group">
                                <label>{{ __('Type') }}</label>
                                {!! Form::select('type', userType("yes","no", "no"), null, ['class' => 'select2 user-type-role', 'required' => '']) !!}
                            </div>
                            <div class="user-all-role">
                                @include('admin.layouts.forms.users.role')
                            </div>
                            @include('admin.layouts.forms.fields.select', [
                                'select_name' => 'vip',
                                'label_name' => __('Vip'),
                                'select_function' => statusShow(),
                            ])
                            @include('admin.layouts.forms.fields.select', [
                                'select_name' => 'is_notify',
                                'label_name' => __('Admin Notifi'),
                                'select_function' => statusShow(),
                            ])
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
