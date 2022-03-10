<!-- New note modal -->
<div class="modal fade" id="newNoteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{url('notes')}}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="content" class="mb-2">Note</label>
                        <textarea name="content" id="content" class="form-control">{{old('name')}}</textarea>
                        @error('content', 'new_note')
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <label class="mb-2">Note Color</label>

                    <div class="d-flex mb-2">
                        <div class="swatch me-2" data-color="#5eae54"><i class="fas fa-check"></i></div>
                        <div class="swatch me-2" data-color="#da7db5"></div>
                        <div class="swatch me-2" data-color="#d7ad04"></div>
                        <div class="swatch me-2" data-color="#a477d1"></div>
                        <div class="swatch me-2" data-color="#53b3d8"></div>
                        <div class="swatch me-2" data-color="#8e8e8e"></div>
                        <div class="swatch me-2" data-color="#505050"></div>
                    </div>

                    <input type="hidden" name="color" id="color" value="#5eae54">

                    <div class="modal-footer">
                        <button type="submit" class="btn bg-s_theme text-white">Create Note</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>@if($errors->new_note->any()) $(document).ready(()=>{$("#newNoteModal").modal("show")}) @endif</script>
<script>
    $(document).ready(() => {
        for(let i = 0; i < $("#newNoteModal .swatch").length; i++) {
            $("#newNoteModal .swatch").eq(i).css("background", $("#newNoteModal .swatch").eq(i).data("color"));
        }
        $("#newNoteModal .swatch").on("click", function () {
            $("#newNoteModal .swatch").empty();
            $(this).html("<i class=\"fas fa-check\"></i>");
            $("#newNoteModal #color").val($(this).data("color"));
        })
    });
</script>
