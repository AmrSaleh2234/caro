@extends('admin.layouts.app')
@section('title') {{ __('Create Coupon') }}
@stop
@section('head_content')
@include('admin.coupons.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'coupons'])
@include('admin.coupons.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@stop
