@extends('admin.layouts.app')
@section('title') {{ __('Edit Payment') }}
@stop
@section('head_content')
@include('admin.payments.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$payment,'model_id'=>$payment->id,'table'=>$payment->getTable()])
@include('admin.payments.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@stop
