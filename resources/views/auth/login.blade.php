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
                        <h1>{{__('Welcome Back!')}}</h1>
                        <div class="text-muted mb-4">
                            {{__('Please log in to continue to') . ' ' . config('app.name', 'Laravel') . '...'}}
                        </div>

                        <form method="post" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group py-2">
                                <label for="email">{{__('Email Address')}}</label>
                                <input type="email" id="email"
                                       class="form-control form-control-lg fs-15px @error('email') is-invalid @enderror"
                                       name="email" placeholder="{{__('username@address.com')}}"
                                       value="{{ old('email') }}" required
                                       autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group py-2">
                                <div class="d-flex">
                                    <label for="pass">{{__('Password')}}</label>
                                </div>
                                <input type="password" id="password"
                                       class="form-control form-control-lg fs-15px @error('password') is-invalid @enderror"
                                       name="password" placeholder="{{__('Enter your password')}}" required
                                       autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check my-3">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <button type="submit"
                                    class="btn btn-dark btn-lg w-100 fw-500 mb-3">{{__('Log in')}}</button>
                            <div class="text-center text-muted">
                                {{__('Don\'t have an account yet?')}} <a
                                    href="{{route('register')}}">{{__('Sign up')}}</a>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="text-center text-muted">
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
@endsection
