@section('title', 'Notes')

@extends('layouts.app')

@section('content')

    <div class="container w-75 mx-auto">
        <h1 class="fw-bolder h3">
            <i class="fas fa-notes me-2"></i> Notes
        </h1>
        <p>Keep note of what's important and have it handy at all times.</p>

        <div class="row grid">
            @forelse ($notes as $note)
                <div class="col-md-4 mb-3 note">
                    <div class="card" style="background:{{$note->color}}20;border-top:7px solid {{$note->color}}">
                        <div class="card-body">
                            <p>{{$note->content}}</p>
                            <div class="d-flex justify-content-end hideUntilHover">
                                <a href="#" class="text-dark text-decoration-none me-3" data-bs-toggle="modal"
                                   data-bs-target="#editNoteModal-{{$note->id}}">
                                    <span data-bs-toggle="tooltip" data-bs-position="top" title="Edit Note">
                                        <i class="far fa-pencil me-1"></i>
                                    </span>
                                </a>
                                <a href="#" class="text-danger text-decoration-none" data-bs-toggle="modal"
                                   data-bs-target="#deleteNoteModal-{{$note->id}}">
                                    <span data-bs-toggle="tooltip" data-bs-position="top" title="Delete Note">
                                        <i class="far fa-trash-alt me-1"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @include('modals.editNote')
                @include('modals.deleteNote')

            @empty
                <div class="border-bottom"><p class="fw-600">No notes here! Why not create one?</p></div>
            @endforelse
        </div>

        <a href="#" data-bs-toggle="modal" data-bs-target="#newNoteModal"
           class="btn btn-link text-s_theme text-decoration-none px-0 py-3"><i class="fas fa-plus-circle me-2"></i> Add
            note</a>

        @if(count($notes))
            <script>
                $('.grid').masonry({
                    percentPosition: true,
                    itemSelector: '.col-md-4'
                });
            </script>
    @endif

@endsection
