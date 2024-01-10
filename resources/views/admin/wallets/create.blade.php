@extends('admin.layouts.app')
@section('title') {{ __('Create Wallet') }}
@stop
@section('head_content')
@include('admin.wallets.head')
@stop
@section('content')
@include('admin.errors.errors')
@include('admin.layouts.forms.create',['table'=>'wallets'])
@include('admin.wallets.form')
@include('admin.layouts.forms.close')
@stop
