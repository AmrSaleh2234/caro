@extends('admin.layouts.app')
@section('title') {{ __('Home') }}
@stop
{{--  @section('after_head')
{!! Charts::assets() !!}
@stop  --}}
@section('head_content')

@stop
@section('content')
@include('admin.pages.statistics-number')
{{--  @include('admin.pages.statistics-content')  --}}
@stop
