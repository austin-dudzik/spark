@section('title', $label->name)

@extends('layouts.app')

@section('content')

    <div class="container w-75 mx-auto">
        <h1 class="fw-bolder h3">
            {{$label->name}}
        </h1>
        <p>What will you accomplish today?</p>

        @forelse ($tasks as $task)
            <x-task :task="$task"></x-task>
    @empty
            <div class="border-bottom"><p class="fw-600">No tasks, yet. Create one below!</p></div>
    @endforelse

        <a href="#" data-bs-toggle="modal" data-bs-target="#newTask"
           class="btn btn-link text-s_theme text-decoration-none px-0"><i class="fas fa-plus-circle me-2"></i> New task</a>

    <script>
        $(document).ready(function () {
            $("#label_id option[value='{{$label->id}}']").prop('selected', true);
        });
    </script>

@endsection
