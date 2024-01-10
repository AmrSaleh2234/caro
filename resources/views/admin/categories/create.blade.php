@extends('admin.layouts.app')
@section('title') {{ __('Create Category') }}
@stop
@section('head_content')
@include('admin.categories.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'categories'])
@include('admin.categories.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@stop
