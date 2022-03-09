<div id="sidebar" class="app-sidebar">
    <div class="app-sidebar-content">
        <div class="menu">
            <div class="menu-header">Navigation</div>
            <div class="menu-item">
                <a href="{{route('index')}}"
                   class="py-2 menu-link @if(Request::route()->getName() == "index")bg-s_theme text-white fw-bold @endif">
                    <span class="menu-icon"><i class="fa fa-inbox"></i></span>
                    <span class="menu-text">Inbox</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="{{route('schedule')}}"
                   class="py-2 menu-link @if(Request::route()->getName() == null)bg-s_theme text-white fw-bold @endif">
                    <span class="menu-icon"><i class="fa fa-calendar-alt"></i></span>
                    <span class="menu-text">Today</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="{{route('schedule')}}"
                   class="py-2 menu-link @if(Request::route()->getName() == null)bg-s_theme text-white fw-bold @endif">
                    <span class="menu-icon"><i class="fas fa-list"></i></span>
                    <span class="menu-text">Schedule</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="{{route('schedule')}}"
                   class="py-2 menu-link @if(Request::route()->getName() == "schedule")bg-s_theme text-white fw-bold @endif">
                    <span class="menu-icon"><i class="fas fa-note"></i></span>
                    <span class="menu-text">Notes</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="{{route('completed')}}"
                   class="py-2 menu-link @if(Request::route()->getName() == "completed")bg-s_theme text-white fw-bold @endif">
                    <span class="menu-icon"><i class="fas fa-check-circle"></i></span>
                    <span class="menu-text">Completed</span>
                </a>
            </div>

            <div class="menu-divider"></div>
            <div class="menu-header">
                Labels <a href="#" data-toggle="modal" data-target="#modalLabel" class="text-muted float-end"><i
                        class="far fa-plus"></i></a>
            </div>


            @foreach($labels as $label)
                <div class="menu-item ">
                    <a href="?l={{$label->id}}" class="menu-link">
                <span class="menu-icon"><i class="fa fa-tag fa-flip-horizontal" style="color:{{$label->color}}"></i>
                                  </span>
                        <span class="menu-text">{{$label->name}}</span>
                    </a>
                </div>
            @endforeach

            <div class="card mt-auto mx-3 p-2">
                <div class="card-body">
                    @php $ratio = (count($tasksToday) / auth()->user()->daily_goal) * 100 @endphp
                    @if($ratio >= 100)
                        <p class="h1 mb-3">🎉</p>
                        <h5>You did it!</h5>
                        <p>You successfully reached your task goal for today. Good job!</p>
                    @elseif($ratio === 0)
                        <div role="progressbar" style="--value:{{$ratio}}" class="mb-3"></div>
                        <h5>Ready. Set. Go!</h5>
                        <p>You didn't reach your task goal for today. Keep trying!</p>
                    @else
                        <div role="progressbar" style="--value:{{$ratio}}" class="mb-3"></div>
                        <h5>Almost there!</h5>
                        <p>Complete <strong>{{$ratio}}</strong> more task today to reach your goal.</p>
                    @endif
                    <a href="#" class="btn bg-s_theme text-white w-100"><i
                            class="fal fa-pencil me-2"></i> Edit goal</a>
                </div>
            </div>

        </div>
    </div>
</div>
