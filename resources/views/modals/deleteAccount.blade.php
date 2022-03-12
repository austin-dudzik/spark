<!-- Delete account modal -->
<div class="modal fade" id="deleteAccountModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="far fa-exclamation-triangle me-1 text-danger"></i> Are you sure?
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{url('settings/deleteAccount')}}">
                    @csrf
                    @method('delete')
                    <p>You're about to delete your Spark account and any data associated with it. This is your last and final chance to save your account. If you are certain, please select the button below.</p>

                    <strong>If you continue, you will lose...</strong>

                    <ul class="mt-2">
                        <li>Tasks</li>
                        <li>Labels</li>
                        <li>Notes</li>
                        <li>Personalization</li>
                        <li>Account Settings</li>
                    </ul>
                    <p>To verify, type <em>delete my account</em> below:</p>
                    <input type="text" class="form-control mb-3" id="typeDelete" aria-label="Type DELETE">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Go back</button>
                        <button type="submit" class="btn btn-danger disabled" id="deleteBtn">Yes, delete my account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $("#typeDelete").on("keyup", function() {
        $(this).val() === "delete my account" ? $("#deleteBtn").removeClass("disabled") : $("#deleteBtn").addClass("disabled");
    })
</script>
