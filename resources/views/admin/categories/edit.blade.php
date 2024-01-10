@extends('admin.layouts.app')
@section('title') {{ __('Edit Category') }}
@stop
@section('head_content')
@include('admin.categories.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$category,'model_id'=>$category->id,'table'=>$category->getTable()])
@include('admin.categories.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@stop
