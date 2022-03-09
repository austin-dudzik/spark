<div class="card border-0 rounded-0 border-bottom bg-transparent">
    <div class="card-body">
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
                        <p class="small mb-0 me-3" style="color:{{$task->label->color}}">
                            <i class="far fa-tag fa-flip-horizontal me-1"></i> {{$task->label->name}}
                        </p>
                    @endif
                    @if($task->due_date)
                        <p class="small @if($task->due_date->isPast() && is_null($task->completed)) text-danger @elseif($task->due_date->isToday() && is_null($task->completed)) text-success @else text-muted @endif mb-0">
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
            <div class="ms-auto">
                <button class="btn btn-link text-muted" data-bs-toggle="modal" data-bs-target="#editModal-{{$task->id}}"><i class="far fa-pencil" data-bs-placement="top" data-bs-toggle="tooltip" title="test"></i></button>
                <button class="btn btn-link text-muted"><i class="far fa-copy"></i></button>
                <button class="btn btn-link text-muted"><i class="far fa-alarm-clock"></i></button>
                <button class="btn btn-link text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$task->id}}"><i class="far fa-trash-alt"></i></button>
            </div>
        </div>
    </div>
</div>

<!-- Edit modal -->
<div class="modal fade" id="editModal-{{$task->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">



                <form method="post" action="{{url('tasks', [$task->id])}}">
                    @csrf
                        @method('put')
                    <div class="form-group mb-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$task->title}}">
                        @error('title', 'form_' . $task->id)
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{$task->description}}</textarea>
                        @error('description', 'form_' . $task->id)
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="label_id">Label</label>
                        <select class="form-control" name="label_id" id="label_id">
                            @foreach($labels as $label)
                                <option
                                    value="{{ $label->id }}" {{$task->label_id == $label->id ? 'selected' : '' }}>{{ $label->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="due_date">Due Date</label>
                        <input type="datetime-local" name="due_date" id="due_date" class="form-control" value="{{$task->due_date->format('Y-m-d\TH:i')}}">
                        @error('due_date', 'form_' . $task->id)
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <button type="submit" class="btn btn-dark">Add Task</button>
                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <script>@if($errors->{'form_' . $task->id}->any()) $(document).ready(()=>{$("#editModal-{{$task->id}}").modal("show")}) @endif</script>
</div>

<!-- Delete modal -->
<div class="modal fade" id="deleteModal-{{$task->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('tasks', [$task->id])}}">
                    @csrf
                    @method('delete')
                    <p>Are you sure you want to delete <strong>{{$task->title}}</strong>?</p>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
