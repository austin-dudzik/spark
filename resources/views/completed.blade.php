@section('title', 'Completed')

@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto">
    <h1 class="h3 fw-bolder"><i class="fas fa-check-circle me-2"></i> Completed</h1>
    @forelse ($tasks as $task)
        <x-task :task="$task"></x-task>
        @empty
            <div class=""><p class="fw-600">You haven't completed any tasks yet. Once you do, they'll show up here!</p></div>
    @endforelse
    </div>

@endsection
