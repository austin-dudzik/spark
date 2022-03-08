@section('title', 'Settings')

@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body p-5">

            <h1 class="fw-700">Settings</h1>
            <hr class="my-4">


            <div class="row mb-4">
                <div class="col me-4">
                    <h6 class="mb-1"><i class="fas fa-bullseye me-1"></i> Goals</h6>
                    <p class="small mb-2 fw-400 mb-3">Personalize {{ config('app.name', 'Laravel') }} with colors to
                        match your
                        style, mood, and personality.</p>

                    <div class="row mb-4">
                        <div class="col">
                            <label for="dailyGoalCount" class="fw-600">Daily tasks</label>
                            <div class="input-group" id="dailyGoalCount">
                                <span class="input-group-text btn-minus bg-dark text-white" role="button">-</span>
                                <input type="number" class="form-control text-center" value="0">
                                <span class="input-group-text btn-plus bg-dark text-white" role="button">+</span>
                            </div>
                        </div>
                        <div class="col">
                            <label for="weekGoalCount" class="fw-600">Weekly tasks</label>
                            <div class="input-group" id="weekGoalCount">
                                <span class="input-group-text btn-minus bg-dark text-white" role="button">-</span>
                                <input type="number" class="form-control text-center" value="0">
                                <span class="input-group-text btn-plus bg-dark text-white" role="button">+</span>
                            </div>
                        </div>
                    </div>

                    <script>

                        $("#dailyGoalCount").on("click", ".btn-minus", function () {
                            $(this).parent().find("input").val() > 0 ? $(this).parent().find("input").val(parseInt($(this).parent().find("input").val()) - 1) : null;
                        });
                        $("#dailyGoalCount").on("click", ".btn-plus", function () {
                            $(this).parent().find("input").val(parseInt($(this).parent().find("input").val()) + 1);
                        });
                        $("#weekGoalCount").on("click", ".btn-minus", function () {
                            $(this).parent().find("input").val() > 0 ? $(this).parent().find("input").val(parseInt($(this).parent().find("input").val()) - 1) : null;
                        });
                        $("#weekGoalCount").on("click", ".btn-plus", function () {
                            $(this).parent().find("input").val(parseInt($(this).parent().find("input").val()) + 1);
                        });


                    </script>
                </div>

                <div class="col-md-7">
                    <h6 class="mb-1"><i class="fas fa-palette me-1"></i> Theme</h6>
                    <p class="small mb-2 fw-400 mb-3">Personalize {{ config('app.name', 'Laravel') }} with colors to
                        match your
                        style, mood, and personality.</p>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card" data-theme="primary" role="button">
                                <div class="card-body fw-600 px-3 py-2">
                                    <div class="d-flex justify-content-between">
                                <span>
                            <i class="fas fa-circle text-primary me-2"></i> Spark
                                </span>
                                        <i class="fa fa-check my-auto d-none"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card" data-theme="red">
                                <div class="card-body fw-600 px-3 py-2">
                                    <div class="d-flex justify-content-between">
                                <span>
                            <i class="fas fa-circle text-red me-2"></i> Cherry
                                </span>
                                        <i class="fas fa-check my-auto d-none"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card" data-theme="blue-500">
                                <div class="card-body fw-600 px-3 py-2">
                                    <div class="d-flex justify-content-between">
                                <span>
                            <i class="fas fa-circle text-blue-500 me-2"></i> Blueberry
                                </span>
                                        <i class="fas fa-check my-auto d-none"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card" data-theme="yellow-600">
                                <div class="card-body fw-600 px-3 py-2">
                                    <div class="d-flex justify-content-between">
                                <span>
                            <i class="fas fa-circle text-yellow-600 me-2"></i> Sunflower
                                </span>
                                        <i class="fas fa-check my-auto d-none"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card" data-theme="teal">
                                <div class="card-body fw-600 px-3 py-2">
                                    <div class="d-flex justify-content-between">
                                <span>
                            <i class="fas fa-circle text-teal-600 me-2"></i> Mint
                                </span>
                                        <i class="fas fa-check my-auto d-none"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card" data-theme="cyan">
                                <div class="card-body fw-600 px-3 py-2">
                                    <div class="d-flex justify-content-between">
                                <span>
                            <i class="fas fa-circle text-cyan-600 me-2"></i> Sky
                                </span>
                                        <i class="fas fa-check my-auto d-none"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card" data-theme="pink">
                                <div class="card-body fw-600 px-3 py-2">
                                    <div class="d-flex justify-content-between">
                                <span>
                            <i class="fas fa-circle text-pink-600 me-2"></i> Violet
                                </span>
                                        <i class="fas fa-check my-auto d-none"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card" data-theme="gray">
                                <div class="card-body fw-600 px-3 py-2">
                                    <div class="d-flex justify-content-between">
                                <span>
                            <i class="fas fa-circle text-gray-700 me-2"></i> Graphite
                                </span>
                                        <i class="fas fa-check my-auto d-none"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mb-3">
                            <div class="card" data-theme="black">
                                <div class="card-body fw-600 px-3 py-2">
                                    <div class="d-flex justify-content-between">
                                <span>
                            <i class="fas fa-circle text-black me-2"></i> Midnight
                                </span>
                                        <i class="fas fa-check my-auto d-none"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form method="post" action="{{url('settings/update')}}" class="mb-4">
                        @csrf
                        @method('put')
                        <input type="hidden" name="type" value="theme">
                        <input type="hidden" name="theme" id="theme" value="{{ Auth::user()->theme }}">
                        <button type="submit" class="btn bg-{{Auth::user()->theme}} text-white disabled"
                                id="theme-change">Apply Theme
                        </button>
                    </form>
                </div>
            </div>

            @if (session('success'))
                <div class="alert bg-success-400 text-white" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col me-3">
                    <h6 class="mb-1">
                        <i class="fas fa-user-circle me-1"></i> Account</h6>
                    <p class="small mb-2 fw-400">Personalize {{ config('app.name', 'Laravel') }} with colors to
                        match your style, mood, and personality.</p>
                    <form method="post" action="{{url('settings/update')}}" class="mb-4">
                        @csrf
                        @method('put')
                        <div class="form-group mb-2">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                   value="{{Auth::user()->name}}">
                            @error('name', 'form_settings')
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="title">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   value="{{Auth::user()->email}}">
                            @error('email', 'form_settings')
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <input type="hidden" name="type" value="account">
                            <button type="submit" class="btn bg-{{Auth::user()->theme}} text-white">Save changes
                            </button>
                        </div>

                    </form>


                    <h6 class="mb-1"><i class="fas fa-circle-minus me-1"></i> Delete account</h6>
                    <p class="small mb-2 fw-400">No longer interested in using {{ config('app.name', 'Laravel') }}?
                        Delete your account here.</p>
                    <p class="mb-2"><strong>WARNING:</strong> Deleting your {{ config('app.name', 'Laravel') }}
                        account is permanent and irreversible. All of your account data, including tasks will be
                        removed.</p>
                    <form method="post" action="{{url('settings/update')}}">
                        @csrf
                        @method('put')
                        <div class="form-group mb-2">
                            <input type="hidden" name="type" value="delete">
                            <button type="submit" class="btn bg-danger text-white">Delete account</button>
                        </div>

                    </form>


                </div>
                <div class="col me-3">

                    <h6 class="mb-1"><i class="fas fa-key me-1"></i> Password</h6>
                    <p class="small mb-2 fw-400">Personalize {{ config('app.name', 'Laravel') }} with colors to
                        match your style, mood, and personality.</p>
                    <form method="post" action="{{url('settings/update')}}">
                        @csrf
                        @method('put')
                        <div class="form-group mb-2">
                            <label for="current_password">Current Password</label>
                            <input type="password" name="current_password" id="current_password"
                                   class="form-control">
                            @error('current_password', 'form_password')
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="new_password">New Password</label>
                            <input type="password" name="new_password" id="new_password" class="form-control">
                            @error('new_password', 'form_password')
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <label for="new_password_confirmation">Confirm New Password</label>
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                   class="form-control">
                            @error('new_password_confirmation', 'form_password')
                            <p class="small text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-2">
                            <input type="hidden" name="type" value="password">
                            <button type="submit" class="btn bg-{{Auth::user()->theme}} text-white">Set password
                            </button>
                        </div>

                    </form>

                </div>
                <div class="col-md-3">


                    <h6 class="mb-1"><i class="fas fa-palette me-1"></i> Theme</h6>
                    <p class="small mb-2 fw-400">Personalize {{ config('app.name', 'Laravel') }} with colors to
                        match your style, mood, and personality.</p>
                    <div class="list-group mb-2">
                        <div role="button" class="list-group-item list-group-item-action fw-600"
                             data-theme="primary">
                            <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fa fa-circle text-primary me-2"></i> Spark
                        </span>
                                <i class="fa fa-check d-none"></i>
                            </div>
                        </div>
                        <div role="button" class="list-group-item list-group-item-action fw-600" data-theme="red">
                            <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fa fa-circle text-red me-2"></i> Cherry
                        </span>
                                <i class="fa fa-check d-none"></i>
                            </div>
                        </div>
                        <div role="button" class="list-group-item list-group-item-action fw-600"
                             data-theme="blue-500">
                            <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fa fa-circle text-blue-500 me-2"></i> Blueberry
                        </span>
                                <i class="fa fa-check d-none"></i>
                            </div>
                        </div>
                        <div role="button" class="list-group-item list-group-item-action fw-600"
                             data-theme="yellow-600">
                            <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fa fa-circle text-yellow-600 me-2"></i> Sunflower
                        </span>
                                <i class="fa fa-check d-none"></i>
                            </div>
                        </div>
                        <div role="button" class="list-group-item list-group-item-action fw-600"
                             data-theme="teal-600">
                            <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fa fa-circle text-teal-600 me-2"></i> Mint
                        </span>
                                <i class="fa fa-check d-none"></i>
                            </div>
                        </div>
                        <div role="button" class="list-group-item list-group-item-action fw-600"
                             data-theme="cyan-600">
                            <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fa fa-circle text-cyan-600 me-2"></i> Sky
                        </span>
                                <i class="fa fa-check d-none"></i>
                            </div>
                        </div>
                        <div role="button" class="list-group-item list-group-item-action fw-600"
                             data-theme="pink-600">
                            <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fa fa-circle text-pink-600 me-2"></i> Violet
                        </span>
                                <i class="fa fa-check d-none"></i>
                            </div>
                        </div>
                        <div role="button" class="list-group-item list-group-item-action fw-600"
                             data-theme="gray-700">
                            <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fa fa-circle text-gray-700 me-2"></i> Graphite
                        </span>
                                <i class="fa fa-check d-none"></i>
                            </div>
                        </div>
                        <div role="button" class="list-group-item list-group-item-action fw-600" data-theme="black">
                            <div class="d-flex justify-content-between align-items-center">
                        <span>
                            <i class="fa fa-circle text-black me-2"></i> Midnight
                        </span>
                                <i class="fa fa-check d-none"></i>
                            </div>
                        </div>
                    </div>

                    <form method="post" action="{{url('settings/update')}}" class="d-flex justify-content-end">
                        @csrf
                        @method('put')
                        <input type="hidden" name="type" value="theme">
                        <input type="hidden" name="theme" id="theme" value="{{ Auth::user()->theme }}">
                        <button type="submit" class="btn bg-{{Auth::user()->theme}} text-white disabled"
                                id="theme-change">Apply Theme
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script>

        $("button[type='submit']").on("click", function () {
            $(this).addClass("disabled").html('<i class="fa fa-spinner-third mx-4 fa-spin"></i>');
        });

        // Add checkmark to active theme
        $("[data-theme='{{ Auth::user()->theme }}']").find("i.fa-check").removeClass("d-none");
        // On theme change
        $('[data-theme]').on('click', function () {
            // Hide all checkmarks
            $("[data-theme]").find("i.fa-check").addClass("d-none");
            // Add checkmark to selected theme
            $(this).find("i.fa-check").removeClass("d-none");
            // Set theme name in input
            $('#theme').val($(this).data('theme'));
            // Enable theme save btn
            $("#theme-change").removeClass("disabled");
        });
    </script>
@endsection

