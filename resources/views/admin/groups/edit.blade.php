@extends('admin.layouts.app')
@section('title') {{ __('Edit Group') }}
@stop
@section('head_content')
@include('admin.groups.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$group,'model_id'=>$group->id,'table'=>$group->getTable()])
@include('admin.groups.form')
@include('admin.layouts.forms.close')
@stop
