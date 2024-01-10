@extends('admin.layouts.app')
@section('title') {{ __('Edit Role') }}
@stop
@section('head_content')
@include('admin.roles.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$role,'model_id'=>$role->id,'table'=>$role->getTable()])
@include('admin.roles.form')
@include('admin.layouts.forms.close')
@stop
