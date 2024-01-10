@extends('admin.layouts.app')
@section('title') {{ __('Create Size') }}
@stop
@section('head_content')
@include('admin.sizes.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'sizes'])
@include('admin.sizes.form')
@include('admin.layouts.forms.close')
@stop
