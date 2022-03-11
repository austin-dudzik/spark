@section('title', 'Profile')

@extends('layouts.app')

@section('content')
    <div class="card w-75 mx-auto">
        <div class="bg-dark h-200px rounded-top"></div>
        <div class="card-body p-5">
            <div class="d-flex justify-content-center">
                <img src="https://gravatar.com/avatar/{{ md5(auth()->user()->email) }}?s=100" alt=""
                     class="img-fluid rounded mb-3" style="margin-top:-100px">
            </div>
            <h1 class="text-center">{{ auth()->user()->name }}</h1>
            <p class="text-center">{{ auth()->user()->email }}</p>
            <p class="text-center">Member since {{ auth()->user()->created_at->diffForHumans() }}</p>

            <p class="fw-500 h5">At a glance...</p>

            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fas fa-check-circle me-4 fa-3x text-s_theme my-auto"></i>
                                <div>
                                    <p class="mb-1">Completed</p>
                                    <h3>{{$completedTasks}} @if($completedTasks === 1) task @else tasks @endif</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fas fa-exclamation-circle me-4 fa-3x text-s_theme my-auto"></i>
                                <div>
                                    <p class="mb-1">Overdue</p>
                                    <h3>{{$overdueTasks}} @if($overdueTasks === 1) task @else tasks @endif</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fas fa-tasks me-4 fa-3x text-s_theme my-auto"></i>
                                <div>
                                    <p class="mb-1">Total</p>
                                    <h3>{{$totalTasks}} @if($totalTasks === 1) task @else tasks @endif</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fas fa-notes me-4 fa-3x text-s_theme my-auto"></i>
                                <div>
                                    <p class="mb-1">Notes</p>
                                    <h3>{{$totalNotes}} total</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fas fa-tags fa-flip-horizontal me-4 fa-3x text-s_theme my-auto"></i>
                                <div>
                                    <p class="mb-1">Labels</p>
                                    <h3>{{$totalLabels}} total</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fas fa-calendar-day me-4 fa-3x text-s_theme my-auto"></i>
                                <div>
                                    <p class="mb-1">Daily goal</p>
                                    <h3>{{auth()->user()->daily_goal}} @if(auth()->user()->daily_goal === 1) task @else tasks @endif</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <i class="fas fa-calendar-week me-4 fa-3x text-s_theme my-auto"></i>
                                <div>
                                    <p class="mb-1">Weekly goal</p>
                                    <h3>{{auth()->user()->weekly_goal}} @if(auth()->user()->weekly_goal === 1) task @else tasks @endif</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
