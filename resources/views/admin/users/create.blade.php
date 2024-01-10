@extends('admin.layouts.app')
@section('title') {{ __('Create User') }}
@stop
@section('head_content')
@include('admin.users.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'users'])
@include('admin.users.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@include('admin.users.change-type')
@include('admin.users.repeater')
@stop
