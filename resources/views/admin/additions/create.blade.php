@extends('admin.layouts.app')
@section('title') {{ __('Create Addition') }}
@stop
@section('head_content')
{{--  @include('admin.additions.head')  --}}
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'additions'])
@include('admin.additions.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@stop
