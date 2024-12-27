'use strict';

$(document).on('click', '#changeReviewStatus', function (e) {
    e.preventDefault();

    let id = $(this).data('review_id');
    $('#Review_id').val(id);

    let url = $('#edit-reviews').data('url').replace(':id', id);
    $('#edit-reviews').attr('action', url);
})

$(document).on('submit', '#edit-reviews', function (e) {
    e.preventDefault();
    let url = $(this).attr('action');
    console.log(url);
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

