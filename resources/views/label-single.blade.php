@section('title', $label->name)

@extends('layouts.app')

@section('content')

    <div class="container w-75 mx-auto">
        <h1 class="fw-bolder h3">
            {{$label->name}}
        </h1>
        <p>What will you accomplish today?</p>

        @foreach ($tasks as $task)
            <x-task :task="$task"></x-task>
    @endforeach

@endsection
