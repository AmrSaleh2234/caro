<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('admin.layouts.meta')
        @include('admin.layouts.head')
        @yield('after_head')
    </head>
    <body class="hold-transition skin-blue-light sidebar-mini" data-url="{{ route('admin.index') }}" data-language="{{ $admin_language }}" data-user="{{ $user_id }}">
        <div class="wrapper">

            @include('admin.layouts.header')
            @include('admin.layouts.sidebar')
            <div class="content-wrapper">
                <section class="content-header">
                  @yield('head_content')
                </section>
                <section class="content">
                @yield('content')
                </section>
            </div>
            @include('admin.layouts.footer')
            @include('admin.layouts.foot')
            @include('admin.layouts.pusher')
            @yield('after_foot')
    </div>
    </body>
</html>
