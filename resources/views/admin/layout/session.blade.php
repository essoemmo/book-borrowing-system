<div>
    @if (session('success'))
        <script>
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
            toastr['success']("{{ session('success') }}", "@lang('admin.success')")
        </script>
    @endif

    @if (session('error'))
        <script>
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
            toastr['error']("{{ session('error') }}", "@lang('admin.error')")
        </script>
    @endif

        @if ($errors->any())
            <script>
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
                toastr['error']("{{ $errors->first() }}", "@lang('admin.error')")
            </script>
        @endif

</div>



