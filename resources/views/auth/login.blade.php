@extends('auth.core')

@section('title') Login @endsection

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{route('frontend.index')}}"><b>Atrask</b>VR</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                    <input name="email" value="{{ old('email') }}" type="email" class="form-control" placeholder="Email"
                           required autofocus>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif


                </div>


                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif

                </div>


                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
                    <!-- /.col -->

            </form>

            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign
                    in using
                    Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign
                    in using
                    Google+</a>
            </div>
            <!-- /.social-auth-links -->

            <a href="{{ route('password.request') }}">I forgot my password</a><br>
            <a href="{{ route('register') }}" class="text-center">Register</a><br>
            <a href="{{route('frontend.index')}}">Back to home page</a>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->


@endsection