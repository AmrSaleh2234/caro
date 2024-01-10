@extends('admin.layouts.app')
@section('title') {{ __('Create Brand') }}
@stop
@section('head_content')
@include('admin.brands.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'brands'])
@include('admin.brands.form')
@include('admin.layouts.forms.close')
@stop
