@section('title', 'Inbox')

@extends('layouts.app')

@section('content')

    <div class="container @if($view->task_view === 'table') w-100 @else w-75 mx-auto @endif">
        <div class="d-flex justify-content-between">
            <div>
                <h1 class="fw-bolder h3">
                    <i class="fas fa-inbox me-2"></i> Inbox
                </h1>
                <p>What will you accomplish today?</p>
            </div>
            <div>
                <x-view-selector></x-view-selector>
            </div>
        </div>

        @if($view->task_view == 'list')
            <x-list :tasks="$tasks"></x-list>
        @elseif($view->task_view == 'grid')
            <x-grid :tasks="$tasks"></x-grid>
        @elseif($view->task_view == 'table')
            <x-table :tasks="$tasks"></x-table>
        @endif

        @if($tasks->count() === 0)
            <div class="border-bottom"><p class="fw-600">You're all caught up! Time to relax.</p></div>
        @endif

        <a href="#" data-bs-toggle="modal" data-bs-target="#newTaskModal"
           class="btn btn-link text-s_theme text-decoration-none px-0 py-3"><i class="fas fa-plus-circle me-2"></i> Add
            task</a>
    </div>

@endsection
