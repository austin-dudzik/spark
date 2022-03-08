@extends('layouts.app')

@section('content')
        <div class="auth row vh-100 d-flex align-items-center">
            <div class="col"></div>
            <div class="col-6 col-md-8 col-lg-7 col-xl-4">
                <div class="card">
                    <div class="card-header text-center py-3 bg-primary text-white">
                        <p class="fw-bold mb-0">
                            <img src="{{url('img/spark.png')}}" class="me-2" alt=""> Spark
                        </p>
                    </div>
                    <div class="card-body p-5">
                        <h1>{{__('Set new Password')}}</h1>
                        <div class="text-muted mb-4">
                            {{__('Please enter a new password below to use with your') . ' ' . config('app.name', 'Laravel') . ' ' . __('account.')}}
                        </div>

                        <form method="post" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group py-2">
                                <label for="email">{{__('Email')}}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group py-2">
                                <label for="password">{{__('Password')}}</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password" autofocus>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-group py-2">
                                <div class="d-flex">
                                    <label for="password-confirm">{{__('Confirm Password')}}</label>
                                </div>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <button type="submit"
                                    class="btn btn-primary btn-lg w-100 fw-500 mb-3">{{__('Reset Password')}}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
@endsection
