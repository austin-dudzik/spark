@section('title', 'Labels')

@extends('layouts.app')

@section('content')

    <div class="container w-75 mx-auto">
        <h1 class="fw-bolder h3">
            {{__('Labels')}}
        </h1>
        <p>Stay organized and prepared with labels, allowing you to categorize your tasks with ease.</p>

        @forelse($labels as $label)
        <div class="card border-0 rounded-0 border-bottom bg-transparent task">
            <div class="card-body">
                <div class="d-flex">
                    <i class="fas fa-tag fa-flip-horizontal fa-2x me-3" style="color:{{$label->color}}"></i>
                    <div>
                        <h5 class="mb-1">{{$label->name}}</h5>
                        <p class="small text-muted mb-2">1 uncompleted task</p>
                    </div>
                    <div class="ms-auto actions">
                        <button class="btn btn-link text-muted p-0 px-2" data-bs-toggle="modal"
                                data-bs-target="#editModal-"><i class="far fa-pencil" data-bs-placement="top"
                                                                data-bs-toggle="tooltip" title="test"></i></button>
                        <button class="btn btn-link text-danger p-0 px-2" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-"><i class="far fa-trash-alt"></i></button>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <div class="border-bottom"><p class="fw-600">No labels, yet. Create one below!</p></div>
        @endforelse

        <a href="#" data-bs-toggle="modal" data-bs-target="#addLabel"
           class="btn btn-link text-s_theme text-decoration-none px-0"><i class="fas fa-plus-circle me-2"></i> Add label</a>




@endsection
