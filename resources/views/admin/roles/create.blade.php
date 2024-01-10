@extends('admin.layouts.app')
@section('title') {{ __('Create Role') }}
@stop
@section('head_content')
@include('admin.roles.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'roles'])
@include('admin.roles.form')
@include('admin.layouts.forms.close')
@stop
