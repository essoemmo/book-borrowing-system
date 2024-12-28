@extends('admin.layout.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span
                class="text-muted fw-light">@lang('admin.home') / @lang('admin.roles') / </span>@lang('admin.editroles')
        </h4>

        <div class="card">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body p-md-0">
                    <div class="text-center mb-4">
                        <h3 class="role-title mb-2 pb-0">@lang('admin.editroles')</h3>
                    </div>
                    <!-- Add role form -->
                    <form  action="{{ route('admin.roles.update',$role->id)}}" method="POST"
                          class="row g-3" data-parsley-validate="" data-massage = "{{__('admin.updated')}}" data-url="{{ route('admin.roles.index') }}" id="editForm">
                        @csrf
                        @method('put')

                        <div class="col-12 mb-4">
                            <div class="form-floating form-floating-outline">
                                <input type="text" name="name" value="{{$role->name}}" class="form-control"
                                       placeholder="@lang('admi.namerole')"
                                       tabindex="-1" parsley-trigger="change" data-parsley-maxlength="30"
                                       required/>
                                <label>@lang('admin.namerole')</label>
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
                                                <?php
                                                $actions = ['read', 'update']; ?>
                                        @endif
                                        @if($model == 'contactus')
                                                <?php
                                                $actions = ['read', 'delete']; ?>
                                        @endif
                                        <tr>
                                            <td class="text-nowrap fw-semibold"
                                                style="width:5%">@lang('admin.'.$model)</td>
                                            <td class="d-flex">
                                                @foreach($actions as $index => $action)
                                                    <div class="form-check me-3 me-lg-5">
                                                        <input class="form-check-input" name="permissions[]"
                                                               type="checkbox" value="{{$model.'-'.$action}}"
                                                               {{$role->hasPermission($model.'-'.$action) ? 'checked':''}}
                                                               id="userManagementRead"/>
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
                            <button type="reset" class="btn btn-outline-secondary">{{ __('admin.reset') }}</button>
                            <button type="submit" class="btn btn-primary">@lang('admin.save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
