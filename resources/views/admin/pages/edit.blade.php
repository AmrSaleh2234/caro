@extends('admin.layouts.app')
@section('title') {{ __('Edit Page') }}
@stop
@section('head_content')
@include('admin.pages.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$page,'model_id'=>$page->id,'table'=>$page->getTable()])
@include('admin.pages.form')
@include('admin.layouts.forms.close')
@stop
@section('after_foot')
@include('admin.layouts.image')
@include('admin.layouts.tinymce')
@stop
