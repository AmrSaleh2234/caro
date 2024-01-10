@extends('admin.layouts.app')
@section('title') {{ __('Create Page') }}
@stop
@section('head_content')
@include('admin.pages.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'pages'])
@include('admin.pages.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@include('admin.layouts.tinymce')
@stop
