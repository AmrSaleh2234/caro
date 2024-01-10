@extends('admin.layouts.app')
@section('title') {{ __('Order') }}
@stop
@section('head_content')
@include('admin.orders.page-head')
@stop
@section('content')
@include('admin.orders.show-detail')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @include('admin.layouts.table-head')
                @include('admin.orders.table-show')
                @include('admin.layouts.table-foot')
            </div>
        </div>
    </div>
</div>
@stop

