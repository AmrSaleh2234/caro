@extends('admin.layouts.app')
@section('title') {{ __('Create City') }}
@stop
@section('head_content')
@include('admin.cities.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'cities'])
@include('admin.cities.form')
@include('admin.layouts.forms.close')
@stop
