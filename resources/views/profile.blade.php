@section('title', 'Profile')

@extends('layouts.app')

@section('content')
    <div class="card w-75 mx-auto">
        <div class="bg-dark h-200px rounded-top"></div>
    <div class="card-body p-5">
        <img src="https://gravatar.com/avatar/{{ md5(Auth::user()->email) }}?s=100" alt="" class="img-fluid rounded mb-3" style="margin-top:-100px">
        <h1>{{ Auth::user()->name }}</h1>
        <p>{{ Auth::user()->email }}</p>
        <p>{{ Auth::user()->created_at->diffForHumans() }}</p>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h4>Completed Tasks</h4>
                        {{$completedTasks}}
                    </div>
                    <form method="post" action="{{url('profile/update')}}">
                        @csrf
                        @method('put')
                        <div class="form-group mb-2">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                   value="">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
