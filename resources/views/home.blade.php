@section('title', 'Inbox')

@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 class="mb-3 fw-bolder">
            Inbox
        </h1>
        <p>What will you accomplish today?</p>

        @foreach ($tasks as $task)
            <x-task :task="$task"></x-task>
        @endforeach

@endsection
