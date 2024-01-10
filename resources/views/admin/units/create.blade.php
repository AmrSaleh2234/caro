@extends('admin.layouts.app')
@section('title') {{ __('Create Unit') }}
@stop
@section('head_content')
@include('admin.units.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'units'])
@include('admin.units.form')
@include('admin.layouts.forms.close')
@stop
