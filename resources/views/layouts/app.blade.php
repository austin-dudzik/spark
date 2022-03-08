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
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

    <!-- Fonts -->
    <link href="https://pro.fontawesome.com/releases/v6.0.0-beta3/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                                @error('create', 'title')
                                <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
                                @error('create', 'description')
                                <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <label for="label_id">Label</label>
                                <select class="form-control" name="label_id" id="label_id">
                                    @foreach($labels as $label)
                                        <option
                                            value="{{ $label->id }}" {{old('label_id') == $label->id ? 'selected' : '' }}>{{ $label->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group mb-2">
                                <label for="due_date">Due Date</label>
                                <input type="datetime-local" name="due_date" id="due_date" class="form-control" value="{{old('due_date')}}">
                                @error('create', 'due_date')
                                <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-2">
                                <button type="submit" class="btn btn-dark">Add Task</button>
                            </div>

                        </form>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Task</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>@if($errors->create->any()) $(document).ready(()=>{$("#addTask").modal("show")}) @endif</script>
    @endauth

    <main id="content" class="{{Auth::check() ? 'app-content pt-5 mt-5 bg-white' : ''}}">
        @yield('content')
    </main>

</div>

</body>
</html>
