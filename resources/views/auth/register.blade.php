@extends('auth.core')

@section('title') Register @endsection

@section('content')



<div class="register-box">
    <div class="register-logo">
        <a href="{{route('frontend.index')}}"><b>Atrask</b>VR</a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>

        <form action="{{ route('register') }}" method="post">
            {{csrf_field()}}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} has-feedback">
                <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Full name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>

                @if ($errors->has('name'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif

            </div>


            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif

            </div>


            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}">
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>

            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

            </div>


            <div class="form-group has-feedback">
                <input id="password-confirm" type="password" class="form-control" placeholder="Retype password" name="password_confirmation" required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>


            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> I agree to the <a href="#">terms</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
                Google+</a>
        </div>

        <a href="{{route('login')}}" class="text-center">I already have a membership</a><br>
        <a href="{{route('frontend.index')}}">Back to home page</a>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->

@endsection
