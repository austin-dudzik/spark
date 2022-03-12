@section('title', $label->name)

@extends('layouts.app')

@section('content')

    <div class="container w-75 mx-auto @if($view->task_view === 'table') w-100 @else w-75 mx-auto @endif">

        <div class="d-flex justify-content-between">
            <div>
                <h1 class="fw-bolder h3">
                    {{$label->name}}
                </h1>
                <p>What will you accomplish today?</p>
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
        @else
            <div class="border-bottom"><p class="fw-600">No tasks, yet. Create one below!</p></div>
        @endif

        <a href="#" data-bs-toggle="modal" data-bs-target="#newTaskModal"
           class="btn btn-link text-s_theme text-decoration-none px-0"><i class="fas fa-plus-circle me-2"></i> New task</a>

        <script>
            $(document).ready(function () {
                $("#label_id option[value='{{$label->id}}']").prop('selected', true);
            });
        </script>

@endsection
