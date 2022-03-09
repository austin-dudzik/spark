<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@hasSection('title') @yield('title') {{'|'}} @endif{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>⚡</text></svg>">

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(() => {
            $('[data-bs-toggle="tooltip"]').tooltip();
        })
    </script>

    <!-- Fonts -->
    <link href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @auth
    <style>
        :root {
            --theme-color: {{\Illuminate\Support\Facades\Auth::user()->theme}};
        }
    </style>
        @endauth

</head>
<body>
<div id="app">

    @auth
        @include('layouts.header')
        @include('layouts.sidebar')
        <!-- Add modal -->
        <div class="modal fade" id="addTask">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="post" action="{{url('tasks')}}">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                                @error('title', 'create')
                                <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
                                @error('description', 'create')
                                <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="label_id">Label</label>
                                <select class="form-select" name="label_id" id="label_id">
                                    <option value="" {{old('label_id') == "" ? 'selected' : '' }}>Uncategorized</option>
                                    @foreach($labels as $label)
                                        <option
                                            value="{{ $label->id }}" {{old('label_id') == $label->id ? 'selected' : '' }}>{{ $label->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label for="due_date">Due Date</label>
                                <input type="datetime-local" name="due_date" id="due_date" class="form-control" value="{{old('due_date')}}">
                                @error('due_date', 'create')
                                <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn bg-s_theme text-white">Add Task</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>@if($errors->create->any()) $(document).ready(()=>{$("#addTask").modal("show")}) @endif</script>

            <!-- Add label modal -->
            <div class="modal fade" id="addLabel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Label</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form method="post" action="{{url('labels')}}">
                                @csrf
                                <div class="form-group mb-2">
                                    <label for="name" class="mb-2">Label Name</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                           value="{{old('name')}}">
                                    @error('name', 'create_label')
                                    <p class="small text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <script>
                                    $(document).ready(() => {
                                        for(let i = 0; i < $(".swatch").length; i++) {
                                            $(".swatch").eq(i).css("background", $(".swatch").eq(i).data("color"));
                                        }
                                        $(".swatch").on("click", function () {
                                            $(".swatch").empty();
                                            $(this).html("<i class=\"fas fa-check\"></i>");
                                            $("#color").val($(this).data("color"));
                                        })
                                    });
                                </script>

                                <label class="mb-2">Label Color</label>

                                <div class="d-flex mb-2">
                                    <div class="swatch me-2" data-color="#b8255f"><i class="fas fa-check"></i></div>
                                    <div class="swatch me-2" data-color="#db4035"></div>
                                    <div class="swatch me-2" data-color="#ff9933"></div>
                                    <div class="swatch me-2" data-color="#fad000"></div>
                                    <div class="swatch me-2" data-color="#fad000"></div>
                                    <div class="swatch me-2" data-color="#7ecc49"></div>
                                    <div class="swatch me-2" data-color="#299438"></div>
                                    <div class="swatch me-2" data-color="#6accbc"></div>
                                    <div class="swatch me-2" data-color="#158fad"></div>
                                    <div class="swatch me-2" data-color="#14aaf5"></div>
                                </div>
                                <div class="d-flex mb-4">
                                    <div class="swatch me-2" data-color="#96c3eb"></div>
                                    <div class="swatch me-2" data-color="#4073ff"></div>
                                    <div class="swatch me-2" data-color="#884dff"></div>
                                    <div class="swatch me-2" data-color="#af38eb"></div>
                                    <div class="swatch me-2" data-color="#eb96eb"></div>
                                    <div class="swatch me-2" data-color="#e05194"></div>
                                    <div class="swatch me-2" data-color="#ff8d85"></div>
                                    <div class="swatch me-2" data-color="#888888"></div>
                                    <div class="swatch me-2" data-color="#b8b8b8"></div>
                                    <div class="swatch me-2" data-color="#ccac93"></div>
                                </div>

                                <input type="hidden" name="color" id="color" value="#b8255f">

                                <div class="modal-footer">
                                    <button type="submit" class="btn bg-s_theme text-white">Add Label</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>@if($errors->create_label->any()) $(document).ready(()=>{$("#addLabel").modal("show")}) @endif</script>
    @endauth

    <main id="content" class="{{Auth::check() ? 'app-content pt-5 mt-5 bg-white' : ''}}">
        @yield('content')
    </main>

</div>

</body>
</html>
