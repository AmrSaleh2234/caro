@extends('admin.layouts.app')
@section('title') {{ __('Create Group') }}
@stop
@section('head_content')
@include('admin.groups.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'groups'])
@include('admin.groups.form')
@include('admin.layouts.forms.close')
@stop
