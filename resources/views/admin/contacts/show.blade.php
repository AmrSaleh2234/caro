@extends('admin.layouts.app')
@section('title') @if(isset($title)) {{ $title }} @else  {{ __('Show') }} @endif
@stop
@section('head_content')
@include('admin.contacts.head')
@stop
@section('content')
@include('admin.contacts.form')
@stop
