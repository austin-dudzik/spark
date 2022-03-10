@section('title', 'Completed')

@extends('layouts.app')

@section('content')
    <div class="w-75 mx-auto">
    <h1 class="h3 fw-bolder"><i class="fas fa-check-circle me-2"></i> Completed</h1>
    @foreach ($tasks as $task)
        <x-task :task="$task"></x-task>
    @endforeach
    </div>

@endsection
