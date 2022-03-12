@section('title', 'Inbox')

@extends('layouts.app')

@section('content')

    <div class="container @if($view->task_view === 'table') w-100 @else w-75 mx-auto @endif">
        <div class="d-flex justify-content-between">
            <div>
                <h1 class="fw-bolder h3">
                    Search for "{{ $filters['q'] }}"
                </h1>
                <p>We found {{count($tasks)}} tasks that match your search...</p>
            </div>
            <div>
                <x-view-selector></x-view-selector>
            </div>
        </div>

        @if(count($tasks))
            @if($view->task_view == 'list')
                <x-list :tasks="$tasks"></x-list>
            @elseif($view->task_view == 'grid')
                <x-grid :tasks="$tasks"></x-grid>
            @elseif($view->task_view == 'table')
                <x-table :tasks="$tasks"></x-table>
            @endif
        @endif

    </div>

@endsection
