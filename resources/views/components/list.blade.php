@foreach($tasks as $task)
    <div class="card border-0 rounded-0 border-bottom bg-transparent task">
        <div class="card-body @if(isset($padding) && $padding) px-3 @else px-0 @endif ">
            <div class="d-flex">
                <form method="post" action="{{url('tasks', [$task->id])}}">
                    @csrf
                    @method('put')
                    <input type="hidden" name="sub_status" value="1">
                    <div class="form-check me-2">
                        <input class="form-check-input rounded-circle" type="checkbox" name="status"
                               value="{{$task->completed ? 0 : 1}}" aria-label="Checkbox"
                               onChange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                    </div>
                </form>
                <div>
                    <h5 class="mb-1">{{ $task->title }}</h5>
                    <p class="small text-muted mb-2">{{$task->description}}</p>
                    <div class="d-flex">
                        @if($task->label)
                            <a href="{{url('/labels/' . $task->label->id)}}" class="label small mb-0 me-3"
                               style="color:{{$task->label->color}}">
                                <i class="far fa-tag fa-flip-horizontal me-1"></i> {{$task->label->name}}
                            </a>
                        @endif
                        @if($task->due_date)
                            <p class="me-1 small @if($task->due_date->isPast() && is_null($task->completed)) text-danger @elseif($task->due_date->isToday() && is_null($task->completed)) text-success @else text-muted @endif mb-0">
                                <i class="far fa-calendar me-1"></i> {{$task->due_date->format('M j g:i A')}}
                            </p>
                        @endif
                        @if(!is_null($task->completed))
                            <p class="small text-success mb-0 ms-2">
                                <i class="far fa-check-circle"></i> Completed
                            </p>
                        @endif
                    </div>
                </div>
                <div class="ms-auto actions">
                    <button class="btn btn-link text-muted p-0 px-2" data-bs-toggle="modal"
                            data-bs-target="#editTaskModal-{{$task->id}}">
                    <span data-bs-placement="top" data-bs-toggle="tooltip" title="Edit Task">
                        <i class="far fa-pencil"></i>
                    </span>
                    </button>
                    <button class="btn btn-link text-danger p-0 px-2" data-bs-toggle="modal"
                            data-bs-target="#deleteTaskModal-{{$task->id}}">
                    <span data-bs-placement="top" data-bs-toggle="tooltip" title="Delete Task">
                        <i class="far fa-trash-alt"></i>
                    </span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('modals.editTask')
    @include('modals.deleteTask')
@endforeach
