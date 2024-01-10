@extends('admin.layouts.app')
@section('title') {{ __('Create Payment') }}
@stop
@section('head_content')
@include('admin.payments.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'payments'])
@include('admin.payments.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@stop
