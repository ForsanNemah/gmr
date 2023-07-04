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
            success: function (data) {
                $('#urltransactions').fadeOut();
            }
        });
        $(this).toggleClass('btn-primary btn-danger');
        $(this).find('i').toggleClass('fa-check fa-xmark');
    });
    /*****************************************************/
});