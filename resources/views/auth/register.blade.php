@extends('layouts.app')

@section('content')
        <div class="auth row vh-100 d-flex align-items-center">
            <div class="col"></div>
            <div class="col-7 col-md-9 col-lg-8 col-xl-5">
                <div class="card">
                    <div class="card-header text-center py-3 bg-primary text-white">
                        <p class="fw-bold mb-0">
                            <img src="{{url('img/spark.png')}}" class="me-2" alt=""> Spark
                        </p>
                    </div>
                    <div class="card-body p-5">
                        <h1>{{__('Create an account')}}</h1>
                        <div class="text-muted mb-4">
                            {{__('Welcome to') . ' ' . config('app.name', 'Laravel') . '! Please fill the form below to create an account.'}}
                        </div>

                        <form method="post" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group py-2">
                                <label for="name">{{__('Name')}}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                       name="name" value="{{ old('name') }}" required autocomplete="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group py-2">
                                <label for="email">{{__('Email')}}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group py-2">
                                        <label for="password">{{__('Password')}}</label>
                                        <input type="password" id="password"
                                               class="form-control form-control-lg fs-15px @error('password') is-invalid @enderror"
                                               name="password" required
                                               autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group py-2">
                                        <div class="d-flex">
                                            <label for="password-confirm">{{__('Confirm Password')}}</label>
                                        </div>
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>

                            <button type="submit"
                                    class="btn btn-primary btn-lg w-100 fw-500 mb-3">{{__('Sign up')}}</button>
                            <div class="text-center text-muted">
                                {{__('Already have an account?')}} <a href="{{route('login')}}">{{__('Log in')}}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
@endsection
