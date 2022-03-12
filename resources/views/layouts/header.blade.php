<div class="app-header bg-s_theme">
    <div class="brand">
        <a href="{{ route('inbox') }}" class="brand-logo ms-4 text-white">
            <img src="{{url('img/spark.png')}}" class="me-3" alt=""> {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <div class="menu">
        <form class="menu-search" method="get" action="{{url('/search')}}">
            <div class="menu-search-icon"><i class="fas fa-search text-white"></i></div>
            <div class="menu-search-input">
                <input type="text" name="q" class="form-control text-white" placeholder="Search tasks..."
                       value="{{ request('q') }}" aria-label="Search">
            </div>
        </form>

        <div class="menu-item dropdown">
            <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
                <div class="text-white fw-600">
                    <i class="far fa-plus nav-icon text-white me-2"></i> New
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right me-lg-3">
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newTaskModal">
                    <i class="fas fa-task fa-flip-horizontal fa-fw ms-auto text-dark text-opacity-50 me-1"></i> Task
                </a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newLabelModal">
                    <i class="fas fa-tag fa-flip-horizontal fa-fw ms-auto text-dark text-opacity-50 me-1"></i> Label
                </a>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#newNoteModal">
                    <i class="fas fa-note fa-flip-horizontal fa-fw ms-auto text-dark text-opacity-50 me-1"></i> Note
                </a>
            </div>

        </div>

        <div class="menu-item dropdown">

            <a href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" class="menu-link">
                <div class="text-white fw-600">
                    <i class="far @if($tasksToday >= auth()->user()->daily_goal) fa-check-circle @else fa-list-check @endif nav-icon text-white me-2"></i> {{$tasksToday}}/{{auth()->user()->daily_goal}}
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-notification">
                <div class="dropdown-header">
                <h6 class="text-gray-900 mb-1">Productivity</h6>
                    <div class="d-flex justify-content-between">
                        <p>{{$totalCompleted}} completed tasks</p>
                        <a href="{{route('completed')}}" class="text-dark text-decoration-none">View all completed tasks</a>
                    </div>
                </div>
                <div class="px-3">
                    @if(auth()->user()->daily_goal !== 0 || auth()->user()->weekly_goal != 0)
                        @if(auth()->user()->daily_goal > 0)
                        <div class="card mt-auto p-2 mb-2">
                            <div class="card-body">
                                <div class="d-flex">
                                    @php
                                        $dayRatio = ceil(($tasksToday / auth()->user()->daily_goal) * 100);
                                        $dayTasksLeft = auth()->user()->daily_goal - $tasksToday;
                                    @endphp
                                    <div class="d-flex justify-content-center">
                                        <div role="progressbar" class="fw-600" style="font-size:12px;height:50px;width:50px;--value: @if($dayRatio >= 100) 100 @else {{$dayRatio}} @endif"></div>
                                    </div>
                                    <div class="ms-3">
                                        <h6>Daily goal</h6>
                                        <p class="small mb-0">{{$tasksToday}}/{{auth()->user()->daily_goal}} tasks completed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                            @if(auth()->user()->weekly_goal > 0)
                            <div class="card mt-auto p-2">
                                <div class="card-body">
                                    <div class="d-flex">
                                        @php
                                            $weekRatio = ceil(($tasksWeek / auth()->user()->weekly_goal) * 100);
                                            $weekTasksLeft = auth()->user()->weekly_goal - $tasksWeek;
                                        @endphp
                                        <div class="d-flex justify-content-center">
                                            <div role="progressbar" class="fw-600" style="font-size:12px;height:50px;width:50px;--value: @if($weekRatio >= 100) 100 @else {{$weekRatio}} @endif"></div>
                                        </div>
                                        <div class="ms-3">
                                            <h6>Weekly goal</h6>
                                            <p class="small mb-0">{{$tasksWeek}}/{{auth()->user()->weekly_goal}} tasks completed</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                    @else
                        <p class="small text-muted text-center">You don't have task goals set up yet.</p>
                    @endif
<div class="d-flex justify-content-center">
                    <a href="{{route('settings')}}" class="btn bg-s_theme text-white mt-3 mb-2"><i class="far fa-pencil me-2"></i> Edit goals</a>
                </div>

                </div>

            </div>
        </div>

        <div class="menu-item">
                <div class="text-white fw-600">
                    <i class="fas fa-question-circle nav-icon text-white me-2"></i>
                </div>
        </div>

        <div class="menu-item dropdown">
            <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
                <div class="menu-img">
                    <img src="https://gravatar.com/avatar/{{md5(auth()->user()->email)}}>" alt=""
                         class="mw-100 mh-100 rounded-circle border border-3">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right me-lg-3">
                <a class="dropdown-item d-flex align-items-center" href="{{route('profile')}}">Profile <i
                        class="fas fa-user-circle fa-fw ms-auto text-dark text-opacity-50"></i></a>
                <a class="dropdown-item d-flex align-items-center" href="{{route('settings')}}">Settings <i
                        class="fas fa-cog fa-fw ms-auto text-dark text-opacity-50"></i></a>
                <div class="dropdown-divider"></div>
                <a href="{{route('logout')}}" class="dropdown-item d-flex align-items-center" onclick="event.preventDefault();$('#logout-form').submit()">Log out
                    <i class="fas fa-key fa-fw ms-auto text-dark text-opacity-50"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                    @csrf
                </form>
            </div>

        </div>
    </div>

</div>
