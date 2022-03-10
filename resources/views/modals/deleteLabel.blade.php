<!-- Delete label modal -->
<div class="modal fade" id="deleteLabelModal-{{$label->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="far fa-exclamation-triangle me-1 text-danger"></i> Delete Label
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('labels', [$label->id])}}">
                    @csrf
                    @method('delete')
                    <p>Are you sure you want to delete <strong>{{$label->name}}</strong>?</p>
                    <p><strong>WARNING:</strong> Deleting this label will also delete all tasks within it.</p>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete Label</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
