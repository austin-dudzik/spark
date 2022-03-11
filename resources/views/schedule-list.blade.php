@php
    $start = new DateTime();
    $start->modify('+' . (($page-1) * 14) . ' days');
    $end = new DateTime();
    $end->modify('+' . ($page * 14) . ' days');
@endphp

@for($i = $start ; $i->format('Y-m-d') < $end->format('Y-m-d'); $i->modify('+1 day'))

    @php
        if($i->format('Y-m-d') === date('Y-m-d')){
            $day = "Today";
        } elseif($i->format('Y-m-d') === date('Y-m-d', strtotime('+1 day'))){
            $day = "Tomorrow";
        } else {
            $day = $i->format('l');
        }
    @endphp

    <div class="card mb-3">
        <div
            class="card-header fw-600">{!!$i->format('M j') . ' · ' . $day!!}
            <span class="float-end"><i class="fas fa-star"></i></span>
        </div>
            @if(isset($days[$i->format('Y-m-d')]))
                @foreach ($days[$i->format('Y-m-d')] as $task)
                    <x-task :task="$task" :padding="true"></x-task>
                @endforeach
            @else
                <div class="card border-0 rounded-0 border-bottom">
                    <div class="card-body">
                        <p class="mb-0">No tasks for this day.</p>
                    </div>
                </div>
            @endif
            <div class="p-3">
                <a href="#"
                   class="addSched btn btn-link text-s_theme text-decoration-none fw-600 btn-sm p-0"
                   data-bs-toggle="modal" data-bs-target="#newTaskModal"
                   data-date="@php echo $i->format('Y-m-d\TH:i') @endphp"><i class="fas fa-plus me-1"></i> Add Task</a>
            </div>
        </div>

@endfor
