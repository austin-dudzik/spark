<!-- Delete note modal -->
<div class="modal fade" id="deleteNoteModal-{{$note->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="far fa-exclamation-triangle me-1 text-danger"></i> Delete Note
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('notes', [$note->id])}}">
                    @csrf
                    @method('delete')
                    <p>Are you sure you want to delete this note?</p>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
