$(document).ready(function () {
    // Enable tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();

    // Add loader to buttons
    $("form").on("submit", function () {
        $(this).find("button[type='submit']").addClass("disabled").html('<i class="fas fa-spinner-third mx-4 fa-spin"></i>');
    });
});

$(document).on('click', '[data-toggle="sidebar-mobile"]', () => {
    $("#app").removeClass('app-sidebar-mobile-closed').addClass('app-sidebar-mobile-toggled');
});

$(document).on('click', '[data-dismiss="sidebar-mobile"]', () => {
    $("#app").removeClass('app-sidebar-mobile-toggled').addClass('app-sidebar-mobile-closed');
    setTimeout(() => {
        $("#app").removeClass('app-sidebar-mobile-closed');
    }, 250);
});
