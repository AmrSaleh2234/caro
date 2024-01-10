@extends('admin.layouts.app')
@section('title') {{ __('Edit City') }}
@stop
@section('head_content')
@include('admin.cities.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$city,'model_id'=>$city->id,'table'=>$city->getTable()])
@include('admin.cities.form')
@include('admin.layouts.forms.close')
@stop
