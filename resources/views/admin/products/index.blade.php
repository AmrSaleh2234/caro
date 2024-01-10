@extends('admin.layouts.app')
@section('title')
@if(isset($title)) {{ $title }} @else {{ __('Products') }} @endif
@stop
@section('after_head')
{{--  <style>
    .product_code_form,.offer_price,.price,.max_amount{
        width: 66% !important;
        display: inline-block;
    }
</style>  --}}
@stop
@section('head_content')
@include('admin.products.page-head')
@if(isset($product_type) && $product_type == "all")
@include('admin.products.head-search')
@endif
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @include('admin.errors.alerts')
                @include('admin.layouts.table-head')
                @include('admin.products.table')
                @include('admin.layouts.table-foot')
                @include('admin.layouts.paginate-all')
            </div>
        </div>
    </div>
</div>
@stop
@section('after_foot')
@include('admin.layouts.status')
@include('admin.layouts.delete')
@stop

