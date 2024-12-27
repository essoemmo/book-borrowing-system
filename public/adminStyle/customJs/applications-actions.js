'use strict';

$(document).on('click', '#changeApplicationStatus', function (e) {
    e.preventDefault();

    let id = $(this).data('application_id');
    $('#Application_id').val(id);

    let url = $('#edit-applications').data('url').replace(':id', id);
    $('#edit-applications').attr('action', url);
})

$(document).on('submit', '#edit-applications', function (e) {
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

        },
        error: function (response) {
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
             toastr['error'](response.responseJSON.message)
        }

    });
});
