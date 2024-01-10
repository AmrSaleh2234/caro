@extends('admin.layouts.app')
@section('title') {{ __('Edit Wallet') }}
@stop
@section('head_content')
@include('admin.wallets.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.edit',['model'=>$wallet,'model_id'=>$wallet->id,'table'=>$wallet->getTable()])
@include('admin.wallets.form')
@include('admin.layouts.forms.close')
@stop
