@extends('admin.layout.master')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">@lang('admin.home')</span></h4>
            <div class="row gy-4 mb-4">

                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-md-6 order-2 order-md-1">
                                <div class="card-body">
                                    <h4 class="card-title pb-xl-2">@lang('admin.congratulation') .. <strong>{{ auth()->user()->name }}</strong>🎉</h4>
                                    <p>@lang('admin.checkaccount')</p>
                                    <a href="" class="btn btn-primary">@lang('admin.profile')</a>
                                </div>
                            </div>
                            <div class="col-md-6 text-center text-md-end order-1 order-md-2">
                                <div class="card-body pb-0 px-0 px-md-4 ps-0">
                                    <img
                                        src="{{ asset('adminStyle/assets/img/illustrations/illustration-john-light.png') }}"
                                        height="180"
                                        alt="View Profile"
                                        data-app-light-img="illustrations/illustration-john-light.png"
                                        data-app-dark-img="illustrations/illustration-john-dark.png" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- / Content -->
@endsection

@push('js')

@endpush
