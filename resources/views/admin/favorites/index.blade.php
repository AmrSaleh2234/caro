@extends('admin.layouts.app')
@section('title') {{ __('Favorites') }}
@stop
@section('head_content')
@include('admin.favorites.page-head')
@stop
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="box">
            <div class="box-body">

                @include('admin.errors.alerts')
                @include('admin.layouts.table-head')
                @include('admin.favorites.table')
                @include('admin.layouts.table-foot')
                @include('admin.layouts.paginate-all')
            </div>
        </div>
    </div>
</div>
@stop

