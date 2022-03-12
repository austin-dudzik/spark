$(document).ready(function () {
    // Enable tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();

    // Add loader to buttons
    $("form").on("submit", function () {
        $(this).find("button[type='submit']").addClass("disabled").html('<i class="fas fa-spinner-third mx-4 fa-spin"></i>');
    });
});
