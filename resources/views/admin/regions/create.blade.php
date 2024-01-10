@extends('admin.layouts.app')
@section('title') {{ __('Create Region') }}
@stop
@section('head_content')
@include('admin.regions.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'regions'])
@include('admin.regions.form')
@include('admin.layouts.forms.close')
@stop
