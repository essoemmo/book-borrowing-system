'use strict';

$(document).on('click', '#changePostAdmin', function (e) {
    let url = $(this).data('url');
    // Send AJAX request
    $.ajax({
        type: 'GET',
        url: url,
        success: function (response) {
            if (response.status === 'success') {
                $('body').append(`<div style="border-radius:13px;" class="toast custom-toast toast-placement-ex m-3 fade bottom-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true"><div class="toast-body" style="background-color: #666cff; color: white; border-bottom-left-radius: 12px border-bottom-right-radius: 12px;">${response.massage}</div></div>`)
                $('#animationModal').modal('hide');
                location.reload();
            }
        },
    });
});


$(document).on('click', '#changePostStatus', function (e) {
    e.preventDefault();

    let id = $(this).data('post_id');
    $('#Post_id').val(id);

    let url = $('#edit-posts').data('url').replace(':id', id);
    $('#edit-posts').attr('action', url);
});

$(document).on('submit', '#edit-posts', function (e) {
    e.preventDefault();
    let url = $(this).attr('action');
    $.ajax({
        url: url + "?_method=put",
        method: "post",
        data: new FormData(this),
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response.status === 'success') {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": 'toast-bottom-right',
                    "timeOut": 7000,
                    "extendedTimeOut": 2000,
                    "showDuration": 700,
                    "hideDuration": 2000,
                    "showEasing": 'swing',
                    "hideEasing": 'linear',
                    "showMethod": 'fadeIn',
                    "hideMethod": 'fadeOut',
                }
                toastr['success'](response.massage)
                $('#animationModal').modal('hide');
                $('.admin-main-table').DataTable().ajax.reload();
            }

        }

    });
})
