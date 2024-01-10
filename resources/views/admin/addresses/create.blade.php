@extends('admin.layouts.app')
@section('title') {{ __('Create Address') }}
@stop
@section('head_content')
@include('admin.addresses.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'addresses'])
@include('admin.addresses.form')
@include('admin.layouts.forms.close')
@stop
