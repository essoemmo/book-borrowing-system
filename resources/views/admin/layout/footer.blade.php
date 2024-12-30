<!-- BEGIN: Vendor JS-->
<script src="{{ asset('adminStyle/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('adminStyle/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('adminStyle/assets/vendor/js/bootstrap.js') }}"></script>

<script src="{{ asset('adminStyle/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('adminStyle/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

<script src="{{ asset('adminStyle/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('adminStyle/assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('adminStyle/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

<script src="{{ asset('adminStyle/assets/vendor/js/menu.js') }}"></script>
<script src="{{ asset('adminStyle/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>

<script src="{{ asset('adminStyle/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
<script src="{{ asset('adminStyle/assets/vendor/libs/moment/moment.js') }}"></script>
<script src="{{ asset('adminStyle/assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>

<script src="{{ asset('adminStyle/assets/js/main.js') }}"></script>
<script src="{{ asset('adminStyle/assets/js/tables-datatables-basic.js') }}"></script>
<script src="{{ asset('adminStyle/assets/js/forms-pickers.js') }}"></script>
<script src="{{ asset('adminStyle/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
<script src="{{ asset('adminStyle/assets/vendor/libs/swiper/swiper.js') }}"></script>

<script src="{{ asset('adminStyle/assets/js/pages-auth.js') }}"></script>
<script src="{{ asset('adminStyle/assets/js/dashboards-ecommerce.js') }}"></script>
<script src="{{ asset('adminStyle/assets/vendor/libs/toastr/toastr.js') }}"></script>
<script src="{{ asset('adminStyle/assets/js/ui-toasts.js') }}"></script>

<script>
    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            url: '{{ asset('adminStyle/assets/tables/' . app()->getLocale() . '.json') }}'
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@if (app()->getlocale() == 'ar')
    <script src="{{asset('parsley/parsley.min.js')}}"></script>
    <script src="{{asset('i18n/ar.js')}}"></script>
@else
    <script src="{{asset('parsley/parsley.min.js')}}"></script>
@endif


@stack('js')

{{-- settings--}}
<script>
    $("#flatpickr-date").flatpickr({
        dateFormat: "Y-m-d", //change format also
        // enableTime: true,
        // weekNumbers: true,
        // altInput: true,
        // altFormat: "F j, Y - h:i",
        // time_24hr: true
    });

    window.Parsley.addValidator('arabic', {
        validateString: function (value) {
            var arabicRegex = /^[\u0600-\u06FF\s]+$/;
            return arabicRegex.test(value);
        },
        messages: {
            en: 'Please enter Arabic text.',
        },
    });

    // image preview

    // $(".image").change(function() {
    //
    //     if (this.files && this.files[0]) {
    //         var reader = new FileReader();
    //
    //         reader.onload = function(e) {
    //             $('.image-show').attr('src', e.target.result);
    //         }
    //
    //         reader.readAsDataURL(this.files[0]);
    //     }
    // });

    // $(".item-image").change(function() {
    //
    //     if (this.files && this.files[0]) {
    //         var reader = new FileReader();
    //
    //         reader.onload = function(e) {
    //             $('.item-image-show').attr('src', e.target.result);
    //         }
    //
    //         reader.readAsDataURL(this.files[0]);
    //     }
    // });
    //
    // $(".cover").change(function() {
    //
    //     if (this.files && this.files[0]) {
    //         var reader = new FileReader();
    //
    //         reader.onload = function(e) {
    //             $('.cover-show').attr('src', e.target.result);
    //         }
    //
    //         reader.readAsDataURL(this.files[0]);
    //     }
    // });

    // $('body').on('click', '.create-new', function(e) {
    //     $('.image-show').attr('src', '');
    //     $('.cover-show').attr('src', '');
    //     $('.custom-file-label').html('');
    // });
</script>

{{--delete submit--}}
<script>
    $(document).on('submit', '#delform', function (e) {
        e.preventDefault();
        let url = $(this).attr('action');
        $.ajax({
            url: url,
            method: "delete",
            data: {
                _token: $('#token').val(),
            },
            success: function (response) {
                $('.admin-main-table').DataTable().ajax.reload();
            }
        });
    })
</script>

{{-- add form ajax request--}}
<script>
    $(document).on('submit', '#addForm', function (e) {
        e.preventDefault();
        let form = e.target;
        let action = form.getAttribute('action');
        let success = form.getAttribute('data-massage');

        $.ajax({
            url: action,
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
                    toastr['success'](success, "@lang('admin.success')")
                }

                $('.admin-main-table').DataTable().ajax.reload();
                let modal = document.getElementById('modal-add');
                modal.querySelector('form').reset();
                $('#modal-add').modal('hide');
            },

            error: function (response) {
                var errors = response.responseJSON.errors;
                $.each(errors, function (index, value) {
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
                    toastr['error'](value, "@lang('admin.error')")
                });
            }

        });
    });
</script>

{{-- edit form ajax request--}}
<script>
    $(document).on('submit', '#editForm', function (e) {
        e.preventDefault();
        let form = e.target;
        let action = form.getAttribute('action');
        let success = form.getAttribute('data-massage');
        let url = form.getAttribute('data-url');

        $.ajax({
            url: action,
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
                    toastr['success'](success, "@lang('admin.success')")
                }

                window.location.href = url;
            },

            error: function (response) {
                var errors = response.responseJSON.errors;
                $.each(errors, function (index, value) {
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
                    toastr['error'](value, "@lang('admin.error')")
                });
            }

        });
    });
</script>

{{-- ajax check for ative--}}
<script>
    $('body').on('click', '#check', function () {
        let active = $(this).prop('checked') === true ? 1 : 0;
        let id = $(this).data('id');
        let url = $(this).data('url').replace(':id', id);
        let success = $(this).data('massage');
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                'active': active,
            },
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
                    toastr['success'](success)
                }
            }
        });
    });
</script>

{{--sweet alert for delete--}}
<script>
    //delete
    $('body').on('click', '.delete', function (e) {
        var that = $(this)
        e.preventDefault();
        Swal.fire({
            title: "@lang('admin.deleteconfirm')",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "@lang('admin.yes')",
            customClass: {
                confirmButton: 'btn btn-primary',
                cancelButton: 'btn btn-outline-danger ml-1'
            },
            buttonsStyling: false
        }).then(function (result) {
            if (result.isConfirmed) {
                that.closest('form').submit();
                Swal.fire({
                    icon: 'success',
                    title: "@lang('admin.deleted')!",
                    customClass: {
                        confirmButton: 'btn btn-success'
                    }
                });
            }
        });

    }); //end of delete

    const urlFor = (route, bind) => {

        Object.keys(bind).forEach(param => {
            route = route.replace(":" + param, bind[param])
        });

        return route;
    }
</script>

</body>

</html>
