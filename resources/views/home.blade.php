@section('title', 'Inbox')

@extends('layouts.app')

@section('content')

    <div class="container w-75 mx-auto">
        <h1 class="fw-bolder h3">
            <i class="fas fa-inbox me-2"></i> Inbox
        </h1>
        <p>What will you accomplish today?</p>

        @foreach ($tasks as $task)
            <x-task :task="$task"></x-task>
        @endforeach

        <a href="#" data-bs-toggle="modal" data-bs-target="#addTask"
           class="btn btn-link text-s_theme text-decoration-none px-0 py-3"><i class="fas fa-plus-circle me-2"></i> Add task</a>

@endsection
