@extends('admin.layouts.app')
@section('title') {{ __('Pages') }}
@stop
@section('head_content')
@include('admin.pages.page-head')
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @include('admin.layouts.table-head-search')
                @include('admin.pages.table')
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

