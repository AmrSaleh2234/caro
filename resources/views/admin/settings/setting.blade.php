@extends('admin.layouts.app')
@section('title') {{ __('Setting') }}
@stop
@section('content')
    @include('admin.errors.alerts')
    {!! Form::open(['route' => 'admin.settings.store', 'method' => 'POST', 'data-parsley-validate' => '']) !!}
    <div class="row">
        <div class="box">
            <div class="box-body">
                @include('admin.layouts.forms.buttons.form-save')
                <div class="col-sm-6">
                    @include('admin.layouts.forms.fields.text', [
                        'text_name' => 'site_title',
                        'text_value' => $setting['site_title'] ?? null,
                        'label_name' => __('Site Title'),
                        'label_req' => true,
                    ])
                    @include('admin.layouts.forms.fields.text', [
                        'text_name' => 'site_phone',
                        'text_value' => $setting['site_phone'] ?? null,
                        'label_name' => __('Site Phone'),
                        'label_req' => true,
                    ])
                    @include('admin.layouts.forms.fields.text', [
                        'text_name' => 'site_email',
                        'text_value' => $setting['site_email'] ?? null,
                        'label_name' => __('Site Email'),
                        'label_req' => true,
                        'text_type' => 'email'
                    ])
                    <div class="form-group">
                        <label>{{ __('Show Result') }}</label>
                        {!! Form::select('table_limit', tableView(), $setting['table_limit'] ?? null, [
                            'class' => 'select2',
                            'required' => '',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Admin Language') }}</label>
                        {!! Form::select('admin_language', languageType(), $setting['admin_language'] ?? null, [
                            'class' => 'select2',
                            'required' => '',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Site Language') }}</label>
                        {!! Form::select('site_language', languageType(), $setting['site_language'] ?? null, [
                            'class' => 'select2',
                            'required' => '',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Min Order') }}</label>
                        {!! Form::text('min_order', $setting['min_order'] ?? 0, [
                            'class' => 'form-control',
                            'required' => '',
                            'data-parsley-type' => 'number',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Max Order') }}</label>
                        {!! Form::text('max_order', $setting['max_order'] ?? 0, [
                            'class' => 'form-control',
                            'required' => '',
                            'data-parsley-type' => 'number',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Min Order For Shipping Free') }}</label>
                        {!! Form::text('shipping', $setting['shipping'] ?? 0, [
                            'class' => 'form-control',
                            'required' => '',
                            'data-parsley-type' => 'number',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Delivery Cost') }}</label>
                        {!! Form::text('delivery_cost', $setting['delivery_cost'] ?? 0, [
                            'class' => 'form-control',
                            'required' => '',
                            'data-parsley-type' => 'number',
                        ]) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Address') }}</label>
                        {!! Form::text('address', $setting['address'] ?? null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group ">
                        <label>{{ __('Site Open') }}</label>
                        {!! Form::select('site_open', showType(), $setting['site_open'] ?? null, [
                            'class' => 'select2',
                            'required' => '',
                        ]) !!}
                    </div>

                </div>
                <div class="col-sm-6">
                    @include('admin.layouts.forms.fields.image', [
                        'width' => '25',
                        'image' => $setting['logo_image'] ?? null,
                        'image_name' => 'logo_image',
                        'image_title' => __('Image Logo'),
                    ])
                    <div class="form-group">
                        <label>{{ __('Facebook') }}</label>
                        {!! Form::text('facebook', $setting['facebook'] ?? null, array('class' => 'form-control','data-parsley-type'=>"url")) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Twitter') }}</label>
                        {!! Form::text('twitter', $setting['twitter'] ?? null, array('class' => 'form-control','data-parsley-type'=>"url")) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Youtube') }}</label>
                        {!! Form::text('youtube', $setting['youtube'] ?? null, array('class' => 'form-control','data-parsley-type'=>"url")) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Instagram') }}</label>
                        {!! Form::text('instagram', $setting['instagram'] ?? null, array('class' => 'form-control','data-parsley-type'=>"url")) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Whatsapp') }}</label>
                        {!! Form::text('whatsapp', $setting['whatsapp'] ?? null, array('class' => 'form-control')) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Tiktok') }}</label>
                        {!! Form::text('tiktok', $setting['tiktok'] ?? null, array('class' => 'form-control','data-parsley-type'=>"url")) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Snapchat') }}</label>
                        {!! Form::text('snapchat', $setting['snapchat'] ?? null, array('class' => 'form-control','data-parsley-type'=>"url")) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Apple') }}</label>
                        {!! Form::text('apple', $setting['apple'] ?? null, array('class' => 'form-control','data-parsley-type'=>"url")) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Android') }}</label>
                        {!! Form::text('android', $setting['android'] ?? null, array('class' => 'form-control','data-parsley-type'=>"url")) !!}
                    </div>
                    <div class="form-group">
                        <label>{{ __('Huawei') }}</label>
                        {!! Form::text('huawei', $setting['huawei'] ?? null, array('class' => 'form-control','data-parsley-type'=>"url")) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.forms.close')
@stop
@section('after_foot')
    @include('admin.layouts.image')
@stop

{{--  @include('admin.layouts.forms.fields.text', [
                    'text_name' => 'site_url',
                    'text_value' => $setting['site_url'] ?? null,
                    'label_name' => __('Site Url'),
                    'label_req' => true,
                    'text_type' => 'url',
                ])
                <div class="form-group">
                        <label>{{ __('Site Multi Language') }}</label>
                        {!! Form::select('site_multi_language', showType(), $setting['site_multi_language'] ?? null, [
                            'class' => 'select2',
                            'required' => '',
                        ]) !!}
                </div>
                <div class="form-group">
                    <label>{{ __('Admin Url') }}</label>
                    {!! Form::text('admin_url', $setting['admin_url'] ?? null, array('class' => 'form-control','required'=>'','data-parsley-type'=>"alphanum")) !!}
                </div>
                <div class="form-group">
                    <label>{{ __('Role') }}</label>
                    {!! Form::select('role_id',$roles ,$role_id, array('class' => 'select2','required'=>'')) !!}
                </div>
                <div class="form-group">
                    <label>{{ __('SSL Certificate') }}</label>
                    {!! Form::select('ssl_certificate',showType() ,$setting['ssl_certificate, array('class' => 'select2','required'=>'')) !!}
                </div>
                <div class="form-group">
                    <label>{{ __('Show Currency') }}</label>
                    {!! Form::select('currency_view',currencyView() ,$setting['currency_view'] ?? null , array('class' => 'select2','required'=>'')) !!}
                </div>
            --}}
