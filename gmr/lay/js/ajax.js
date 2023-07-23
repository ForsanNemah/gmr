$(document).ready(function () {
    /*****************************************************/
    //
    $('a[href="#state"]').click(function () {
        $('#urltransactions').fadeIn();
        $.ajax({
            type: "GET",
            url: "inc/page/urltransactions/state.php",
            data: {
                ID: $(this).data('id'),
            },
            success: function () {
                $('#urltransactions').fadeOut();
            }
        });
        $(this).toggleClass('btn-primary btn-danger');
        $(this).find('i').toggleClass('fa-check fa-xmark');
    });
    //
    $('a[href="#stateEmailNames"]').click(function () {
        $('#spinnerLoading').fadeIn();
        $.ajax({
            type: "GET",
            url: "inc/page/emailnames/state.php",
            data: {
                ID: $(this).data('id'),
            },
            success: function () {
                $('#spinnerLoading').fadeOut();
            }
        });
        $(this).toggleClass('btn-primary btn-danger');
        $(this).find('i').toggleClass('fa-check fa-xmark');
    });
    /*****************************************************/
});