@extends('admin.layouts.app')
@section('title') @if(isset($title)) {{ $title }} @else {{ __('Notifications') }} @endif
@stop
@section('head_content')
@include('admin.notifications.page-head')
@include('admin.notifications.head-search')
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @include('admin.errors.alerts')
                @include('admin.layouts.table-head')
                @include('admin.notifications.table')
                @include('admin.layouts.table-foot')
                @include('admin.layouts.paginate-all')
            </div>
        </div>
    </div>
</div>
@stop


