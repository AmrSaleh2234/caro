@extends('admin.layouts.app')
@section('title') {{ __('Regions') }}
@stop
@section('head_content')
@include('admin.regions.page-head')
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">

                @include('admin.errors.alerts')

                @include('admin.layouts.table-head')

                @include('admin.regions.table')

                @include('admin.layouts.table-foot')

                @include('admin.layouts.paginate-all')
            </div>
        </div>
    </div>
</div>
@stop
@section('after_foot')
@include('admin.layouts.status')
@stop

