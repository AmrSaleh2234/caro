@extends('admin.layouts.app')
@section('title') {{ __('Units') }}
@stop
@section('head_content')
@include('admin.units.page-head')
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @include('admin.layouts.table-head-search')
                @include('admin.units.table')
                @include('admin.layouts.table-foot')
            </div>
        </div>
    </div>
</div>
@stop
@section('after_foot')
@include('admin.layouts.status')
@stop

