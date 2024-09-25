@extends('layouts.layout_auth')
@section('title', 'Login')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#">
                <img src="{{ asset('fixaset.png') }}" width="200" alt="Logo" class="navbar-brand-image">
            </a>
        </div>
        
        <div class="card">
            <div class="card-body card-primary login-card-body">
                <h2 class="text-center mb-4">Sign in to your account</h2>
                
                @if (session('success'))
                    <div class="alert alert-primary">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ url('auth/login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group mb-3">
                            <input type="email" id="email" class="form-control" placeholder="Enter your email" name="email" required autocomplete="off">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password" required>
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-sign-in-alt mr-2"></i> Sign In
                        </button>
                    </div>
                </form>

                <hr>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <form action="{{ route('oauth.google') }}" method="GET">
                        <button type="submit" class="btn btn-google btn-block">
                            <i class="fab fa-google mr-2"></i> Login with Google
                        </button>
                    </form>
                </div>

                <div class="text-center">
                    <p class="mb-1">
                        <a href="#" data-toggle="modal" data-target="#forgotPasswordModal">I forgot my password</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Forgot Password -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Reset Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        @csrf
                        <div class="form-group">
                            <label for="resetEmail">Email</label>
                            <input type="email" id="resetEmail" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
