<!-- Edit task modal -->
<div class="modal fade" id="editTaskModal-{{$task->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{url('tasks', [$task->id])}}">
                    @csrf
                    @method('put')
                    <div class="form-group mb-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{$task->title}}">
                        @error('title', 'edit_task_' . $task->id)
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="description">Description</label>
                        <textarea name="description" id="description"
                                  class="form-control">{{$task->description}}</textarea>
                        @error('description', 'edit_task_' . $task->id)
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="label_id">Label</label>
                        <select class="form-select" name="label_id" id="label_id">
                            <option value="" {{$task->label_id == "" ? 'selected' : '' }}>Uncategorized</option>
                            @foreach($labels as $label)
                                <option
                                    value="{{ $label->id }}" {{$task->label_id == $label->id ? 'selected' : '' }}>{{ $label->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="due_date">Due Date</label>
                        <input type="datetime-local" name="due_date" id="due_date" class="form-control"
                               value="@if($task->due_date){{$task->due_date->format('Y-m-d\TH:i')}}@endif">
                        @error('due_date', 'edit_task_' . $task->id)
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn bg-s_theme text-white">Save Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    @if($errors->{'edit_task_' . $task->id}->any()) $(document).ready(() => {
        $("#editTaskModal-{{$task->id}}").modal("show")
    }) @endif
</script>
