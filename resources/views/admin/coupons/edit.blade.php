@extends('admin.layouts.app')
@section('title') {{ __('Edit Coupon') }}
@stop
@section('head_content')
@include('admin.coupons.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$coupon,'model_id'=>$coupon->id,'table'=>$coupon->getTable()])
@include('admin.coupons.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@stop
