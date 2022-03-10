@section('title', 'Labels')

@extends('layouts.app')

@section('content')

    <div class="container w-75 mx-auto">
        <h1 class="fw-bolder h3">
            Labels
        </h1>
        <p>Stay organized and prepared with labels, allowing you to categorize your tasks with ease.</p>
        @forelse ($labels as $label)
            <div class="card border-0 rounded-0 border-bottom bg-transparent task">
                <div class="card-body">
                    <div class="d-flex">
                        <a href="{{url('/labels/'.$label->id)}}" class="text-dark text-decoration-none">
                            <div class="d-flex">
                        <i class="fas fa-tag fa-flip-horizontal fa-2x me-3" style="color:{{$label->color}}"></i>
                        <span>
                            <h5 class="mb-1">{{$label->name}}</h5>
                            <p class="small text-muted mb-2">{{count($label->tasks)}} uncompleted @if(count($label->tasks) === 1) task @else tasks @endif</p>
                        </span>
                            </div>
                        </a>
                        <div class="ms-auto actions">
                            <button class="btn btn-link text-muted p-0 px-2" data-bs-toggle="modal"
                                    data-bs-target="#editLabelModal-{{$label->id}}">
                            <span data-bs-placement="top" data-bs-toggle="tooltip" title="Edit label">
                            <i class="far fa-pencil"></i>
                                </span>
                            </button>
                            <button class="btn btn-link text-danger p-0 px-2" data-bs-toggle="modal"
                                    data-bs-target="#deleteLabelModal-{{$label->id}}">
                                <span data-bs-placement="top" data-bs-toggle="tooltip" title="Delete label">
                                <i class="far fa-trash-alt"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @include('modals.editLabel')
            @include('modals.deleteLabel')

        @empty
            <div class="border-bottom"><p class="fw-600">No labels, yet. Create one below!</p></div>
        @endforelse

        <a href="#" data-bs-toggle="modal" data-bs-target="#newLabel"
           class="btn btn-link text-s_theme text-decoration-none px-0">
            <i class="fas fa-plus-circle me-2"></i> Add label
        </a>

@endsection
