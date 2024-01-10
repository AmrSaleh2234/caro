@extends('admin.layouts.app')
@section('title') {{ __('Social Media') }}
@stop
@section('content')
@include('admin.errors.alerts')
{!! Form::open(array('route' => 'admin.settings.social.store','method'=>'POST','data-parsley-validate'=>"")) !!}

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">

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
                @include('admin.layouts.forms.buttons.save')
            </div>
        </div>
    </div>

</div>


@include('admin.layouts.forms.close')
@stop
