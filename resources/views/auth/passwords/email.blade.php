@extends('layouts.app')

@section('content')
        <div class="auth row vh-100 d-flex align-items-center">
            <div class="col"></div>
            <div class="col-6 col-md-8 col-lg-7 col-xl-4">
                <div class="card">
                    <div class="card-header text-center py-3 bg-dark text-white">
                        <p class="fw-bold mb-0">
                            <img src="{{url('img/spark.png')}}" class="me-2" alt=""> Spark
                        </p>
                    </div>
                    <div class="card-body p-5">
                        <h1>{{__('Reset Password')}}</h1>
                        <div class="text-muted mb-4">
                            {{__('Don\'t remember your password? Enter your email address below and we\'ll send you a password reset link.')}}
                        </div>

                        <form method="post" action="{{ route('password.email') }}">
                            @csrf

                            @if (session('status'))
                                <div class="alert bg-success text-white" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group py-2">
                                <label for="email">{{__('Email Address')}}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit"
                                    class="btn btn-dark btn-lg w-100 fw-500 mb-3">{{__('Send Password Reset Link')}}</button>
                            <div class="text-center text-muted">
                                <a class="text-decoration-none text-dark" href="{{route('login')}}">{{__('Return to login')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
@endsection
