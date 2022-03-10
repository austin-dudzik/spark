@section('title', 'Inbox')

@extends('layouts.app')

@section('content')

    <div class="container w-75 mx-auto">
        <h1 class="fw-bolder h3">
            <i class="fas fa-inbox me-2"></i> Inbox
        </h1>
        <p>What will you accomplish today?</p>

        @forelse ($tasks as $task)
            <x-task :task="$task"></x-task>
            @empty
            <div class="border-bottom"><p class="fw-600">You're all caught up! Time to relax.</p></div>
        @endforelse

        <a href="#" data-bs-toggle="modal" data-bs-target="#newTask"
           class="btn btn-link text-s_theme text-decoration-none px-0 py-3"><i class="fas fa-plus-circle me-2"></i> Add task</a>

@endsection
