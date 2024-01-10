@extends('admin.layouts.app')
@section('title') @if(isset($title)) {{ $title }} @else {{ __('Notifications') }} @endif
@stop
@section('head_content')
@include('admin.notifications.page-head')
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @include('admin.layouts.table-head-search')
                @include('admin.notifications.table')
                @include('admin.layouts.table-foot')
            </div>
        </div>
    </div>
</div>
@stop

