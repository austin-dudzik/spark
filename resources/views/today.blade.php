@section('title', 'Today')

@extends('layouts.app')

@section('content')

    <div class="container w-75 mx-auto">
        <h1 class="fw-bolder h3">
            <i class="fas fa-calendar-alt me-2"></i> Today
        </h1>
        <p>What will you accomplish today?</p>

        @if(count($overdue))
        <div class="py-3">
            <h5><i class="fas fa-exclamation-circle text-danger me-1"></i> Overdue</h5>
            @foreach($overdue as $overdue_task)
                <x-task :task="$overdue_task"></x-task>
            @endforeach
        </div>
            <h5>Today &centerdot; {{date('M j')}}</h5>
        @endif

        @forelse ($tasks as $task)
            <x-task :task="$task"></x-task>
        @empty
            <div class="border-bottom"><p class="fw-600">Hooray! Looks like you're all caught up for today.</p></div>
        @endforelse

        <a href="#" data-bs-toggle="modal" data-bs-target="#newTask"
           class="btn btn-link text-s_theme text-decoration-none px-0 py-3 addToday"><i class="fas fa-plus me-2"></i> Add task</a>

        <script>
            $(document).on("click", ".addToday", function() {
                $("#due_date").val('{{\Carbon\Carbon::now()->format('Y-m-d\TH:i')}}');
            });
        </script>

@endsection
