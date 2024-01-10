@extends('admin.layouts.app')
@section('title') {{ __('Create Point') }}
@stop
@section('head_content')
@include('admin.points.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'points'])
@include('admin.points.form')
@include('admin.layouts.forms.close')
@stop
