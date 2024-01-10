@extends('admin.layouts.app')
@section('title') {{ __('Contact Us') }}
@stop
@section('content')
@include('admin.errors.alerts')

{!! Form::open(array('route' => 'admin.settings.contact.store','method'=>'POST','data-parsley-validate'=>"")) !!}

<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <label>{{ __('Email') }}</label>
                    {!! Form::text('site_email', $site_email ?? null, array('class' => 'form-control','required'=>'','data-parsley-type'=>"email")) !!}
                </div>
                <div class="form-group">
                    <label>{{ __('Phone') }}</label>
                    {!! Form::text('site_phone', $site_phone ?? null, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label>{{ __('Address') }}</label>
                    {!! Form::text('address', $address ?? null, array('class' => 'form-control')) !!}
                </div>
                @include('admin.layouts.forms.buttons.save')
            </div>
        </div>
    </div>

</div>

@include('admin.layouts.forms.close')
@stop

