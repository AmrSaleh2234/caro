@extends('admin.layouts.app')
@section('title') {{ __('Edit Order Reject') }}
@stop
@section('head_content')
@include('admin.order_rejects.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$order_reject,'model_id'=>$order_reject->id,'table'=>$order_reject->getTable()])
@include('admin.order_rejects.form')
@include('admin.layouts.forms.close')
@stop
