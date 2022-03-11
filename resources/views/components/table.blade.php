<div class="card">
<table class="table table-responsive mb-0">
    <thead>
    <tr>
        <th class="border-end"></th>
        <th class="border-end">Title</th>
        <th class="border-end">Description</th>
        <th class="border-end">Label</th>
        <th class="border-end">Due Date</th>
        <th class="border-end">Updated</th>
        <th class="border-end">Created</th>
        <th class="border-end"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $task)
    <tr class="@if($loop->last) border-bottom-0 @endif">
        <td class="border-end">
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
        </td>
        <td class="border-end">{{$task->title}}</td>
        <td class="w-25 border-end">{{$task->description}}</td>
        <td class="border-end">
        @if($task->label)
            <a href="{{url('/labels/' . $task->label->id)}}" class="badge mb-0 text-decoration-none"
               style="background:{{$task->label->color}}">
                <i class="far fa-tag fa-flip-horizontal me-1"></i> {{$task->label->name}}
            </a>
        @endif
        </td>
        <td class="border-end">
        @if($task->due_date)
            <p data-bs-toggle="tooltip" data-bs-position="top" title="{{$task->due_date->format('F j, Y g:i A')}}" class="me-1 @if($task->due_date->isPast() && is_null($task->completed)) text-danger @elseif($task->due_date->isToday() && is_null($task->completed)) text-success @else text-dark @endif mb-0">
                {{$task->due_date->format('M j g:i A')}}
            </p>
        @endif
        </td>
        <td data-bs-toggle="tooltip" data-bs-position="top" title="{{$task->updated_at->format('F j, Y g:i A')}}" class="border-end">{{$task->updated_at->format('M j g:i A')}}</td>

        <td class="border-end" data-bs-toggle="tooltip" data-bs-position="top" title="{{$task->created_at->format('F j, Y g:i A')}}">{{$task->created_at->format('M j g:i A')}}</td>
        <td>
            <button class="btn btn-link text-muted p-0 px-1" data-bs-toggle="modal"
                    data-bs-target="#editTaskModal-{{$task->id}}">
                    <span data-bs-placement="top" data-bs-toggle="tooltip" title="Edit Task">
                        <i class="far fa-pencil"></i>
                    </span>
            </button>
            <button class="btn btn-link text-danger p-0 px-1" data-bs-toggle="modal"
                    data-bs-target="#deleteTaskModal-{{$task->id}}">
                    <span data-bs-placement="top" data-bs-toggle="tooltip" title="Delete Task">
                        <i class="far fa-trash-alt"></i>
                    </span>
            </button>
        </td>
    </tr>
        @include('modals.editTask')
        @include('modals.deleteTask')
    @endforeach
    </tbody>
</table>
</div>
