@extends('layouts.layout_auth')
@section('title', 'Login')
@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><img src="{{ asset('fixaset.png') }}" width="200" alt="Logo"
                    class="navbar-brand-image"></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body card-primary login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if (session('success'))
                    <div class="alert alert-primary">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {!! implode('', $errors->all(':message')) !!}
                    </div>
                @endif
                <form method="post" action="{{ url('auth/login') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off"
                            required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            required="required">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-outline-primary btn-block"><i
                                    class="fas fa-sign-in-alt mr-2"></i> Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <hr>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <form action="{{ route('oauth.google') }}" method="GET">
                        <button type="submit">Login dengan Google</button>
                    </form>
                </div>
                <!-- /.social-auth-links -->

                {{-- <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
@endsection
