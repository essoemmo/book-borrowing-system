@extends('admin.layout.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span
                class="text-muted fw-light">@lang('admin.home') / @lang('admin.admins') / </span>@lang('admin.editadmins')
        </h4>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.admins.update',$admin->id) }}" method="POST"
                          class="row g-3" data-parsley-validate="" data-massage = "{{__('admin.updated')}}" data-url="{{ route('admin.admins.index') }}" id="editForm">
                        @csrf
                        @method('put')
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input id="formValidationName" type="text" class="form-control" name="name"
                                       value="{{$admin->name}}"
                                       placeholder="@lang('admin.name')" parsley-trigger="change"
                                       data-parsley-maxlength="30"
                                       required/>
                                <label for="formValidationName">@lang('admin.name')</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input id="formValidationEmail" type="email" name="email" value="{{$admin->email}}"
                                       class="form-control"
                                       placeholder="@lang('admin.email')" parsley-trigger="change" required/>
                                <label for="formValidationEmail">@lang('admin.email')</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <select class="form-select" name="role_id" id="basic-default-country" required>
                                    <option value="">----</option>
                                    @foreach($roles as $role)
                                        <option
                                            value="{{$role->id}}" {{$role->id == $admin->roles()->first()->id ? 'selected' : '' }}>{{$role->name}}</option>
                                    @endforeach
                                </select>
                                <label for="basic-default-country">@lang('admin.role')</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input
                                            type="password"
                                            id="formValidationPass"
                                            class="form-control"
                                            name="password" value="{{ old('password') }}"
                                            placeholder="@lang('admin.password')"
                                            aria-describedby="password" data-parsley-maxlength="8" data-parsley-minlength="8" parsley-trigger="change"/>
                                        <label for="formValidationPass">@lang('admin.password')</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer" id="multicol-password2"
                                    ><i class="mdi mdi-eye-off-outline"></i
                                        ></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input
                                            type="password"
                                            id="formValidationConfirmPass"
                                            class="form-control"
                                            name="password_confirmation" value="{{ old('password') }}"
                                            placeholder="@lang('admin.confirmpassword')"
                                            aria-describedby="password" data-parsley-maxlength="8" data-parsley-minlength="8" parsley-trigger="change"/>
                                        <label for="formValidationConfirmPass">@lang('admin.confirmpassword')</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer" id="multicol-confirm-password2"
                                    ><i class="mdi mdi-eye-off-outline"></i
                                        ></span>
                                </div>
                            </div>
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
