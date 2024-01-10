        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- CSRF Token -->
        <meta name="_token" content="{{ csrf_token() }}" />
        <title>
            @if (isset($title))
                {{ $title }}
            @else
                @yield('title')
            @endif
            &#8211;
            {{ __(config('app.name')) }}
        </title>
