@section('title', 'Inbox')

@extends('layouts.app')

@section('content')

    <div class="container w-75 mx-auto">
        <h1 class="mb-3 fw-bolder h3">
            Inbox
        </h1>
        <p>What will you accomplish today?</p>

        @foreach ($tasks as $task)
            <x-task :task="$task"></x-task>
        @endforeach

@endsection
