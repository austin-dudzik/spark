<!-- New task modal -->
<div class="modal fade" id="newTaskModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{url('tasks')}}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                        @error('title', 'new_task')
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" class="form-control">{{old('description')}}</textarea>
                        @error('description', 'new_task')
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="label_id">Label</label>
                        <select class="form-select" name="label_id" id="label_id">
                            <option value="" {{old('label_id') == "" ? 'selected' : '' }}>Uncategorized</option>
                            @foreach($labels as $label)
                                <option
                                    value="{{ $label->id }}" {{old('label_id') == $label->id ? 'selected' : '' }}>{{ $label->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-2">
                        <label for="due_date">Due Date</label>
                        <input type="datetime-local" name="due_date" id="due_date" class="form-control" value="{{old('due_date')}}">
                        @error('due_date', 'new_task')
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn bg-s_theme text-white">Create Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>@if($errors->new_task->any()) $(document).ready(()=>{$("#newTaskModal").modal("show")}) @endif</script>
