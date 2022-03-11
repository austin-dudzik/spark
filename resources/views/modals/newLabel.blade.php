<!-- New label modal -->
<div class="modal fade" id="newLabelModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Label</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <form method="post" action="{{url('labels')}}">
                    @csrf
                    <div class="form-group mb-2">
                        <label for="name" class="mb-2">Label Name</label>
                        <input type="text" name="name" id="name" class="form-control"
                               value="{{old('name')}}">
                        @error('name', 'new_label')
                        <p class="small text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <label class="mb-2">Label Color</label>

                    <div class="d-flex mb-2">
                        <div class="swatch me-2" data-color="#b8255f"><i class="fas fa-check"></i></div>
                        <div class="swatch me-2" data-color="#db4035"></div>
                        <div class="swatch me-2" data-color="#ff9933"></div>
                        <div class="swatch me-2" data-color="#fad000"></div>
                        <div class="swatch me-2" data-color="#7ecc49"></div>
                        <div class="swatch me-2" data-color="#299438"></div>
                        <div class="swatch me-2" data-color="#6accbc"></div>
                        <div class="swatch me-2" data-color="#158fad"></div>
                        <div class="swatch me-2" data-color="#14aaf5"></div>
                        <div class="swatch me-2" data-color="#96c3eb"></div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="swatch me-2" data-color="#4073ff"></div>
                        <div class="swatch me-2" data-color="#884dff"></div>
                        <div class="swatch me-2" data-color="#af38eb"></div>
                        <div class="swatch me-2" data-color="#eb96eb"></div>
                        <div class="swatch me-2" data-color="#e05194"></div>
                        <div class="swatch me-2" data-color="#ff8d85"></div>
                        <div class="swatch me-2" data-color="#888888"></div>
                        <div class="swatch me-2" data-color="#b8b8b8"></div>
                        <div class="swatch me-2" data-color="#ccac93"></div>
                        <div class="swatch me-2" data-color="#191939"></div>
                    </div>

                    <input type="hidden" name="color" id="color" value="#b8255f">

                    <div class="modal-footer">
                        <button type="submit" class="btn bg-s_theme text-white">Create Label</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>@if($errors->new_label->any()) $(document).ready(()=>{$("#newLabelModal").modal("show")}) @endif</script>
<script>
    $(document).ready(() => {
        for(let i = 0; i < $("#newLabelModal .swatch").length; i++) {
            $("#newLabelModal .swatch").eq(i).css("background", $("#newLabelModal .swatch").eq(i).data("color"));
        }
        $("#newLabelModal .swatch").on("click", function () {
            $("#newLabelModal .swatch").empty();
            $(this).html("<i class=\"fas fa-check\"></i>");
            $("#color").val($(this).data("color"));
        })
    });
</script>
