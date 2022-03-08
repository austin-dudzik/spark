@section('title', 'Inbox')

@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-3 fw-bolder">
            Search for "{{ $filters['q'] }}"
        </h1>
        <p>We found {{count($tasks)}} tasks that match your search...</p>

        @foreach ($tasks as $task)
            <x-task :task="$task"></x-task>
    @endforeach

@endsection
