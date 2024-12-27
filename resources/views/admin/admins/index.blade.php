@extends('admin.layout.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span
                class="text-muted fw-light">@lang('admin.home') / </span>@lang('admin.admins')</h4>

        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-success rounded">
                                    <div class="mdi mdi-account-outline mdi-24px"></div>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">{{adminsCount()['admins_count']}}</h5>
                                </div>
                                <small class="text-muted">@lang('admin.alladmins')</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-warning rounded">
                                    <div class="mdi mdi-poll mdi-24px"></div>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">{{adminsCount()['active_admin_count']}}</h5>
                                </div>
                                <small class="text-muted">@lang('admin.actives')</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-info rounded">
                                    <div class="mdi mdi-trending-up mdi-24px"></div>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">{{adminsCount()['inactive_admin_count']}}</h5>
                                </div>
                                <small class="text-muted">@lang('admin.inactives')</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-danger rounded">
                                    <div class="mdi mdi-delete-alert-outline mdi-24px"></div>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">{{adminsCount()['deleted_admins']}}</h5>
                                </div>
                                <small class="text-muted">@lang('admin.deleteds')</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header">
                @if(Auth::guard('admin')->user()->hasPermission('admins-create'))
                    <button style="float: right" data-bs-target="#modal-add" data-bs-toggle="modal"
                            class="btn btn-primary mb-3 text-nowrap">
                        @lang('admin.addadmins')
                    </button>
                @else
                    <button class="dt-button create-new btn btn-primary waves-effect waves-float waves-light disabled"
                            type="button">
                        <span style="font-size: 15px;">@lang('admin.addadmins')</span>
                    </button>
                @endif

            </div>
            <div class="card-datatable text-nowrap" style="margin-top: -25px;">
                {{ $dataTable->table([
                    'class'=> 'datatables-ajax table table-bordered admin-main-table'
                ],true) }}
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalCenterTitle">@lang('admin.addadmins')</h4>
                </div>
                <form action="{{ route('admin.admins.store') }}" method="POST" class="row g-3"  data-parsley-validate="" data-massage = "{{__('admin.added')}}" id="addForm">
                    @csrf
                    @method('post')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-4 mt-2">
                                <div class="form-floating form-floating-outline">
                                    <input id="nameWithTitle" type="text" class="form-control" name="name"
                                           value="{{old('name')}}"
                                           placeholder="@lang('admin.name')" parsley-trigger="change"
                                           data-parsley-maxlength="30"
                                           required/>
                                    <label for="nameWithTitle">@lang('admin.name')</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col mb-2">
                                <div class="form-floating form-floating-outline mb-4">
                                    <input id="emailWithTitle" type="email" name="email" value="{{old('email')}}"
                                           class="form-control"
                                           placeholder="@lang('admin.email')" parsley-trigger="change" required/>
                                    <label for="emailWithTitle">@lang('admin.email')</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-4 form-password-toggle">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input
                                        type="password"
                                        id="basic-password"
                                        class="form-control"
                                        name="password" value="{{ old('password') }}"
                                        placeholder="@lang('admin.password')"
                                        aria-describedby="password" data-parsley-minlength="8" parsley-trigger="change" required/>
                                    <label for="basic-default-password">@lang('admin.password')</label>
                                </div>
                                <span class="input-group-text cursor-pointer" id="basic-default-password3"
                                ><i class="mdi mdi-eye-off-outline"></i
                                    ></span>
                            </div>
                        </div>

                        <div class="mb-4 form-password-toggle">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input
                                        type="password"
                                        id="basic-default-password-c"
                                        class="form-control"
                                        name="password_confirmation" value="{{ old('password') }}"
                                        placeholder="@lang('admin.confirmpassword')"
                                        aria-describedby="password"  data-parsley-minlength="8" parsley-trigger="change" data-parsley-equalto="#basic-password" required/>
                                    <label for="basic-default-password-c">@lang('admin.confirmpassword')</label>
                                </div>
                                <span class="input-group-text cursor-pointer" id="basic-default-password3"
                                ><i class="mdi mdi-eye-off-outline"></i
                                    ></span>
                            </div>
                        </div>

                        <div class="form-floating form-floating-outline mb-4">
                            <select class="form-select" name="role_id" id="basic-default-country" required>
                                <option value="">----</option>
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            <label for="basic-default-country">@lang('admin.role')</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary">{{ __('admin.reset') }}</button>
                        <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    {{ $dataTable->scripts() }}
    <script src="{{ asset('adminStyle/customJs/admins-actions.js')}}"></script>
@endpush
