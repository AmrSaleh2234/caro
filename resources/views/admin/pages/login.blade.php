<!DOCTYPE html>
<html>
    <head>
        @include('admin.layouts.meta', ['title' => __('Login')])
        @include('admin.layouts.head')
    </head>
    <body class="hold-transition login-page">

        <div class="login-box">
            <div class="login-logo">
                <a href="{{ route('home') }}">{{ __('Home') }}</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">{{ __('Sign in to start your session') }}</p>
                <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login') }}">
                    {{ csrf_field() }}
                    <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email"  class="form-control" name="email" placeholder="{{ __('user name or email') }}" value="{{ old('email') }}" required autofocus>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif

                    </div>
                    <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>

                            <button type="submit" class="btn btn-{{ $btn_class ?? 'info' }} btn-block btn-flat">{{ __('Sign In') }}</button>

                   </form>


            </div>
            <!-- /.login-box-body -->
        </div>
        @include('admin.layouts.foot')


    </body>
</html>



