@section('title', 'Completed Tasks')

@extends('layouts.app')

@section('content')
    <h1 class="mb-3 h2">✅ Completed Tasks</h1>
    @foreach ($tasks as $task)
        <x-task :task="$task"></x-task>
    @endforeach

@endsection
