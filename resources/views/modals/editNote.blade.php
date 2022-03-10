<!-- Edit note modal -->
<div class="modal fade" id="editNoteModal-{{$note->id}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{url('notes', [$note->id])}}">
                    @csrf
                    @method('put')
                    <div class="form-group mb-2">
                        <label for="content" class="mb-2">Note</label>
                        <textarea name="content" id="content" class="form-control">{{$note->content}}</textarea>
                        @error('content', 'edit_note' . $note->id)
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>


                    <label class="mb-2">Note Color</label>

                    <div class="d-flex mb-2">
                        <div class="swatch me-2" data-color="#5eae54"></div>
                        <div class="swatch me-2" data-color="#da7db5"></div>
                        <div class="swatch me-2" data-color="#d7ad04"></div>
                        <div class="swatch me-2" data-color="#a477d1"></div>
                        <div class="swatch me-2" data-color="#53b3d8"></div>
                        <div class="swatch me-2" data-color="#8e8e8e"></div>
                        <div class="swatch me-2" data-color="#505050"></div>
                    </div>

                    <input type="hidden" name="color" id="color" value="{{$note->id}}">

                    <div class="modal-footer">
                        <button type="submit" class="btn bg-s_theme text-white">Save Label</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(() => {

        $('#editNoteModal-{{$note->id}} .swatch[data-color="{{$note->color}}"]').html("<i class=\"fas fa-check\"></i>");

        for(let i = 0; i < $("#editNoteModal-{{$note->id}} .swatch").length; i++) {
            $("#editNoteModal-{{$note->id}} .swatch").eq(i).css("background", $("#editNoteModal-{{$note->id}} .swatch").eq(i).data("color"));
        }
        $("#editNoteModal-{{$note->id}} .swatch").on("click", function () {
            $("#editNoteModal-{{$note->id}} .swatch").empty();
            $(this).html("<i class=\"fas fa-check\"></i>");
            $("#editNoteModal-{{$note->id}} #color").val($(this).data("color"));
        })
    });

    @if($errors->{'edit_note_' . $note->id}->any()) $(document).ready(() => {
        $("#editNoteModal-{{$note->id}}").modal("show")
    }) @endif
</script>
