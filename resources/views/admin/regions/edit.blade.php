@extends('admin.layouts.app')
@section('title') {{ __('Edit Region') }}
@stop
@section('head_content')
@include('admin.regions.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$region,'model_id'=>$region->id,'table'=>$region->getTable()])
@include('admin.regions.form')
@include('admin.layouts.forms.close')
@stop
