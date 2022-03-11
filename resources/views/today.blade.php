@section('title', 'Today')

@extends('layouts.app')

@section('content')

    <div class="container @if($view->task_view === 'table') w-100 @else w-75 mx-auto @endif">
        <div class="d-flex justify-content-between">
            <div>
                <h1 class="fw-bolder h3">
                    <i class="fas fa-calendar-alt me-2"></i> Today
                </h1>
                <p>What will you accomplish today?</p>
            </div>
            <div>
                <x-view-selector></x-view-selector>
            </div>
        </div>

        @if(count($overdue))
            <div class="py-3">
                <h5><i class="fas fa-exclamation-circle text-danger me-1"></i> Overdue</h5>
                @if($view->task_view == 'list')
                    <x-list :tasks="$overdue"></x-list>
                @elseif($view->task_view == 'grid')
                    <x-grid :tasks="$overdue"></x-grid>
                @elseif($view->task_view == 'table')
                    <x-table :tasks="$overdue"></x-table>
                @endif
            </div>
            <h5>Today &centerdot; {{date('M j')}}</h5>
        @endif

        @if($view->task_view == 'list')
            <x-list :tasks="$tasks"></x-list>
        @elseif($view->task_view == 'grid')
            <x-grid :tasks="$tasks"></x-grid>
        @elseif($view->task_view == 'table')
            <x-table :tasks="$tasks"></x-table>
        @endif

        @if($tasks->count() === 0)
            <div class="border-bottom"><p class="fw-600">Hooray! Looks like you're all caught up for today.</p></div>
        @endif

        <a href="#" data-bs-toggle="modal" data-bs-target="#newTaskModal"
           class="btn btn-link text-s_theme text-decoration-none px-0 py-3 addToday"><i class="fas fa-plus-circle me-2"></i> Add
            task</a>
    </div>

        <script>
            $(document).on("click", ".addToday", function() {
                $("#due_date").val('{{\Carbon\Carbon::now()->format('Y-m-d\TH:i')}}');
            });
        </script>

@endsection
