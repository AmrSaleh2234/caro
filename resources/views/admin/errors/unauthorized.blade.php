@extends('admin.layouts.app')
@section('title')  {{ __('Unauthorized Exeption') }}
@stop
@section('head_content')
<h1> {{ __('Unauthorized Page') }}</h1>
@stop
@section('content')
<div class="error-page">
    <div class="error-content">
        <h2 class="text-red">{{ __('No Way!') }}</h2>
        <h3><i class="fa fa-warning text-red"></i> {{ __('Oops! You are not authorized to do this.') }}</h3>
        <p>
            {{ __('Meanwhile, you may') }} <a href="/{{ $admin_url }}">{{ __('return to home') }}</a>.
        </p>
    </div>
    <!-- /.error-content -->
</div>
<!-- /.error-page -->
@stop