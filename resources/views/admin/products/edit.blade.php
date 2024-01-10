@extends('admin.layouts.app')
@section('title') {{ __('Edit Product') }}
@stop
@section('head_content')
@include('admin.products.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$product,'model_id'=>$product->id,'table'=>$product->getTable()])
@include('admin.products.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@include('admin.layouts.repeater')
@stop
