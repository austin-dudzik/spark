<div class="app-header bg-{{Auth::user()->theme}}">
    <div class="brand">
        <a href="{{ url('/tasks') }}" class="brand-logo ms-4 text-white">
            <img src="{{url('img/spark.png')}}" class="me-3" alt=""> {{ config('app.name', 'Laravel') }}
        </a>
    </div>
    <div class="menu">
        <form class="menu-search" method="get" action="{{url('/search')}}">
            <div class="menu-search-icon"><i class="fa fa-search text-white"></i></div>
            <div class="menu-search-input">
                <input type="text" name="q" class="form-control text-white" placeholder="Search tasks..."
                       value="{{ request('q') }}" aria-label="Search">
            </div>
        </form>

        <div class="menu-item">
            <div class="text-white fw-600" data-bs-toggle="modal" data-bs-target="#addTask" role="button">
                <i class="far fa-plus nav-icon text-white me-2"></i> New
            </div>
        </div>


        <div class="menu-item dropdown">

            <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
                <div class="text-white fw-600">
                    <i class="far fa-circle-three-quarters nav-icon text-white me-2"></i> 0/5
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-right dropdown-notification">
                <h6 class="dropdown-header text-gray-900 mb-1">Friday Mar 4</h6>

                @foreach($tasksToday as $task1)
                    <h5>{{ $task1->title }}</h5>
                @endforeach

                <div class="text-center pt-3">
                    <i class="fas fa-sun fa-3x text-yellow"></i>
                    <p class='text-muted text-center mt-4'>No tasks completed, yet.</p>
                </div>
            </div>
        </div>

        <div class="menu-item dropdown">
            <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
                <div class="menu-img">
                    <img src="https://gravatar.com/avatar/{{md5(Auth::user()->email)}}>" alt=""
                         class="mw-100 mh-100 rounded-circle border border-3">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right me-lg-3">
                <a class="dropdown-item d-flex align-items-center" href="{{route('profile')}}">Profile <i
                        class="fa fa-user-circle fa-fw ms-auto text-dark text-opacity-50"></i></a>
                <a class="dropdown-item d-flex align-items-center" href="{{route('settings')}}">Settings <i
                        class="fa fa-cog fa-fw ms-auto text-dark text-opacity-50"></i></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">Log out <i
                        class="fa fa-key fa-fw ms-auto text-dark text-opacity-50"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>
    </div>
</div>
