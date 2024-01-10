@extends('admin.layouts.app')
@section('title') {{ __('Edit Size') }}
@stop
@section('head_content')
@include('admin.sizes.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$size,'model_id'=>$size->id,'table'=>$size->getTable()])
@include('admin.sizes.form')
@include('admin.layouts.forms.close')
@stop
