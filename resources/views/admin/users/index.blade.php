@extends('admin.layouts.app')
@section('title')
@if(isset($title)) {{ $title }} @else {{ __('Users') }} @endif
@stop
@section('head_content')
@include('admin.users.page-head')
@if(isset($user_type) && $user_type == "all")
@include('admin.users.head-search')
@endif
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">
                @include('admin.errors.alerts')
                @include('admin.layouts.table-head')
                @include('admin.users.table')
                @include('admin.layouts.table-foot')
                @include('admin.layouts.paginate-all')
            </div>
        </div>
    </div>
</div>

@stop

@section('after_foot')
@include('admin.layouts.delete')
@include('admin.layouts.status')
@stop


