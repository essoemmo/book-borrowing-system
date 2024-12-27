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
                                    <a href="{{ route('admin.profile.setting') }}" class="btn btn-primary">@lang('admin.profile')</a>
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

                <div class="col-md-3 col-lg-3">
                    <div class="card">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="card-info mb-3 pb-2">
                                        <div class="badge bg-label-primary rounded-pill lh-xs">@lang('admin.year') {{\Carbon\Carbon::now()->year}}</div>
                                    </div>
                                    <div class="d-flex align-items-end">
                                        <h4 class="mb-0 me-2">{{ citiesCount()['cities_count'] }}</h4>
                                        <small class="text-danger">@lang('admin.cities')</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-end d-flex align-items-end">
                                <div class="card-body pb-0 pt-3">
                                    <img src="{{ asset('images/city.png') }}" alt="Ratings" class="img-fluid" width="129" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="card">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="card-info mb-3 pb-2">
                                        <div class="badge bg-label-primary rounded-pill lh-xs">@lang('admin.year') {{\Carbon\Carbon::now()->year}}</div>
                                    </div>
                                    <div class="d-flex align-items-end">
                                        <h4 class="mb-0 me-2">{{ statesCount()['states_count'] }}</h4>
                                        <small class="text-danger">@lang('admin.states')</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-end d-flex align-items-end">
                                <div class="card-body pb-0 pt-3">
                                    <img src="{{ asset('images/town.png') }}" alt="Ratings" class="img-fluid" width="129" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="card-info mb-3 pb-2">
                                        <div class="badge bg-label-primary rounded-pill lh-xs">@lang('admin.year') {{\Carbon\Carbon::now()->year}}</div>
                                    </div>
                                    <div class="d-flex align-items-end">
                                        <h4 class="mb-0 me-2">{{ adminsCount(\Carbon\Carbon::now()->format('Y-m-d'))['admins_year_count'] }}</h4>
                                        <small class="text-danger">@lang('admin.admins')</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-end d-flex align-items-end">
                                <div class="card-body pb-0 pt-3">
                                    <img src="{{ asset('images/admins2.png') }}" alt="Ratings" class="img-fluid" width="95" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="card-info mb-3 pb-2">
                                        <div class="badge bg-label-primary rounded-pill lh-xs">@lang('admin.year') {{\Carbon\Carbon::now()->year}}</div>
                                    </div>
                                    <div class="d-flex align-items-end">
                                        <h4 class="mb-0 me-2">{{ daycaresCount()['daycares_year_count'] }}</h4>
                                        <small class="text-danger">@lang('admin.daycares')</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-end d-flex align-items-end">
                                <div class="card-body pb-0 pt-3">
                                    <img src="{{ asset('images/daycares2.png') }}" alt="" class="img-fluid" width="95" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="card-info mb-3 pb-2">
                                        <div class="badge bg-label-primary rounded-pill lh-xs">@lang('admin.year') {{\Carbon\Carbon::now()->year}}</div>
                                    </div>
                                    <div class="d-flex align-items-end">
                                        <h4 class="mb-0 me-2">{{ usersCount()['users_year_count'] }}</h4>
                                        <small class="text-danger">@lang('admin.users')</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-end d-flex align-items-end">
                                <div class="card-body pb-0 pt-3">
                                    <img src="{{ asset('images/users.png') }}" alt="" class="img-fluid" width="95" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="card-info mb-3 pb-2">
                                        <div class="badge bg-label-primary rounded-pill lh-xs">@lang('admin.year') {{\Carbon\Carbon::now()->year}}</div>
                                    </div>
                                    <div class="d-flex align-items-end">
                                        <h4 class="mb-0 me-2">{{ teachersCount()['teachers_year_count'] }}</h4>
                                        <small class="text-danger">@lang('admin.teachers')</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-end d-flex align-items-end">
                                <div class="card-body pb-0 pt-3">
                                    <img src="{{ asset('images/teachers2.png') }}" alt="" class="img-fluid" width="95" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-6">
                                <div class="card-body">
                                    <div class="card-info mb-3 pb-2">
                                        <div class="badge bg-label-primary rounded-pill lh-xs">@lang('admin.year') {{\Carbon\Carbon::now()->year}}</div>
                                    </div>
                                    <div class="d-flex align-items-end">
                                        <h4 class="mb-0 me-2">{{ stagesCount()['stages_count'] }}</h4>
                                        <small class="text-danger">@lang('admin.stages')</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-end d-flex align-items-end">
                                <div class="card-body pb-0 pt-3">
                                    <img src="{{ asset('images/stages.png') }}" alt="" class="img-fluid" width="95" />
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
