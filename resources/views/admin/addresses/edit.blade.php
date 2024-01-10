@extends('admin.layouts.app')
@section('title') {{ __('Edit Address') }}
@stop
@section('head_content')
@include('admin.addresses.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$model,'model_id'=>$model->id,'table'=>$model->getTable()])
@include('admin.addresses.form')
@include('admin.layouts.forms.close')
@stop
