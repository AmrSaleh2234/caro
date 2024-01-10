@extends('admin.layouts.app')
@section('title') @if(isset($title)) {{ $title }} @else  {{ __('Show') }} @endif
@stop
@section('head_content')
@include('admin.notifications.head')
@stop
@section('content')
@include('admin.notifications.notification-card')
@stop
