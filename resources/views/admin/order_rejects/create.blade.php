@extends('admin.layouts.app')
@section('title') {{ __('Create Order Reject') }}
@stop
@section('head_content')
@include('admin.order_rejects.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'order_rejects'])
@include('admin.order_rejects.form')
@include('admin.layouts.forms.close')
@stop
