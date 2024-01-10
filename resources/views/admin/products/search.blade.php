@extends('admin.layouts.app')
@section('title')
@if(isset($title)) {{ $title }} @else {{ __('Products') }} @endif
@stop
@section('after_head')
<style>
    .offer_price,.price,.max_amount{
        width: 75% !important;
    }
</style>
@stop
@section('head_content')
@include('admin.products.page-head')
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @include('admin.layouts.table-head-search')
                @include('admin.products.table')
                @include('admin.layouts.table-foot')
            </div>
        </div>
    </div>
</div>
@stop
@section('after_foot')
@include('admin.layouts.status')
@include('admin.layouts.delete')
@stop

