@section('title', 'Completed')

@extends('layouts.app')

@section('content')
    <div class="@if($view->task_view === 'table') w-100 @else w-75 mx-auto @endif">

        <div class="d-flex justify-content-between">
            <div>
                <h1 class="fw-bolder h3">
                    <i class="fas fa-check-circle me-2"></i> Completed
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
            <p class="fw-600">You haven't completed any tasks yet. Once you do, they'll show up here!</p>
        @endif

    </div>

@endsection
