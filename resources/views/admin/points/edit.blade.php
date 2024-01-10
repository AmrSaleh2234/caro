@extends('admin.layouts.app')
@section('title') {{ __('Edit Point') }}
@stop
@section('head_content')
{{--  @include('admin.points.head')  --}}
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$point,'model_id'=>$point->id,'table'=>$point->getTable()])
@include('admin.points.form')
@include('admin.layouts.forms.close')
@stop
