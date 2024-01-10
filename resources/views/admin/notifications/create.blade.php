@extends('admin.layouts.app')
@section('title') @if(isset($title)) {{ $title }} @else {{ __('Create Notification') }} @endif
@stop
@section('head_content')
@include('admin.notifications.head')
@stop
@section('content')
@include('admin.errors.alerts')
@include('admin.layouts.forms.create',['table'=>'notifications'])
@include('admin.notifications.form')
@include('admin.layouts.forms.close')
@stop
