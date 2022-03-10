<!-- Delete task modal -->
<div class="modal fade" id="deleteTaskModal-{{$task->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="far fa-exclamation-triangle me-1 text-danger"></i> Delete Task
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('tasks', [$task->id])}}">
                    @csrf
                    @method('delete')
                    <p>Are you sure you want to delete <strong>{{$task->title}}</strong>?</p>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
