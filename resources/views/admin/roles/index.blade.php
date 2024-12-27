@extends('admin.layout.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">@lang('admin.home') / </span>@lang('admin.roles')</h4>

        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-4">
            </div>

            <div class="col-sm-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="avatar">
                                <div class="avatar-initial bg-label-primary rounded">
                                    <div class="mdi mdi-sign-direction mdi-24px"></div>
                                </div>
                            </div>
                            <div class="ms-3">
                                <div class="d-flex align-items-center">
                                    <h5 class="mb-0">{{rolesCount()['roles_count']}}</h5>

                                </div>
                                <small class="text-muted">@lang('admin.numbroles')</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-4">
            </div>

        </div>
        <!-- Users List Table -->
        <div class="card">
            <div class="card-header">
                @if(Auth::guard('admin')->user()->hasPermission('roles-create'))
                    <button style="float: right" data-bs-target="#modal-add" data-bs-toggle="modal"
                            class="btn btn-primary mb-3 text-nowrap add-new-role">
                        @lang('admin.addroles')
                    </button>
                @else
                    <button class="dt-button create-new btn btn-primary waves-effect waves-float waves-light disabled"
                            type="button">
                        <span style="font-size: 15px;"> @lang('admin.addroles')</span>
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

    <!-- Add Role Modal -->
    <div class="modal fade" id="modal-add" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
            <div class="modal-content p-3 p-md-5">
                <button
                    type="button"
                    class="btn-close btn-pinned"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="modal-body p-md-0">
                    <div class="text-center mb-4">
                        <h3 class="role-title mb-2 pb-0">@lang('admin.addroles')</h3>
                    </div>
                    <!-- Add role form -->
                    <form action="{{ route('admin.roles.store') }}" method="POST" class="row g-3" data-parsley-validate="" data-massage = "{{__('admin.added')}}" data-url="{{ route('admin.roles.index') }}"  id="addForm">
                        @csrf
                        @method('post')

                        <div class="col-12 mb-4">
                            <div class="form-floating form-floating-outline">
                                <input type="text" name="name"
                                    class="form-control" placeholder="@lang('admin.namerole')" tabindex="-1" parsley-trigger="change"
                                    data-parsley-maxlength="30"
                                    required/>
                                <label for="modalRoleName">@lang('admin.namerole')</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- Permission table -->
                            <div class="table-responsive">
                                <table class="table table-flush-spacing">
                                    <tbody>
                                    <tr>
                                        <th>@lang('admin.model')</th>
                                        <th>@lang('admin.permissions')</th>
                                    </tr>
                                    @foreach($models as $index=>$model)
                                        @if($model == 'settings')
                                                <?php $actions = ['read', 'update']; ?>
                                        @endif
                                        @if($model == 'contactus')
                                                <?php $actions = ['read', 'delete']; ?>
                                        @endif
                                        <tr>
                                            <td class="text-nowrap fw-semibold"
                                                style="width:5%">@lang('admin.'.$model)</td>
                                            <td class="d-flex">
                                                @foreach($actions as $index => $action)
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" name="permissions[]"
                                                               type="checkbox" value="{{$model.'-'.$action}}" data-parsley-mincheck='1' />
                                                        <label class="form-check-label"
                                                               for="userManagementRead">@lang('admin.'.$action)</label>
                                                    </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Permission table -->
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-2">{{ __('admin.save') }}</button>
                            <button type="reset" class="btn btn-outline-secondary">{{ __('admin.reset') }}</button>
                        </div>
                    </form>
                    <!--/ Add role form -->
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    {{ $dataTable->scripts() }}
    <script src="{{ asset('adminStyle/customJs/roles-actions.js')}}"></script>

@endpush
