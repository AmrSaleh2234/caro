@extends('admin.layouts.app')
@section('title') {{ __('Edit Addition') }}
@stop
@section('head_content')
@include('admin.additions.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$addition,'model_id'=>$addition->id,'table'=>$addition->getTable()])
@include('admin.additions.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@stop
