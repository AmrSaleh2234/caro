@extends('admin.layouts.app')
@section('title') {{ __('Edit Unit') }}
@stop
@section('head_content')
@include('admin.units.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$unit,'model_id'=>$unit->id,'table'=>$unit->getTable()])
@include('admin.units.form')
@include('admin.layouts.forms.close')
@stop
