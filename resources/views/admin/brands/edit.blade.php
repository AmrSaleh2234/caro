@extends('admin.layouts.app')
@section('title') {{ __('Edit Brand') }}
@stop
@section('head_content')
@include('admin.brands.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$brand,'model_id'=>$brand->id,'table'=>$brand->getTable()])
@include('admin.brands.form')
@include('admin.layouts.forms.close')
@stop
