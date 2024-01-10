@extends('admin.layouts.app')
@section('title') {{ __('Edit User') }}
@stop
@section('head_content')
@include('admin.users.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$user,'model_id'=>$user->id,'table'=>$user->getTable()])
@include('admin.users.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@include('admin.users.repeater')
@include('admin.users.change-type')
@stop
