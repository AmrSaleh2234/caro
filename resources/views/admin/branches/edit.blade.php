@extends('admin.layouts.app')
@section('title') {{ __('Edit Branch') }}
@stop
@section('head_content')
{{--  @include('admin.branches.head')  --}}
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$branch,'model_id'=>$branch->id,'table'=>$branch->getTable()])
@include('admin.branches.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@stop
