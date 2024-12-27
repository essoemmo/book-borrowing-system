@extends('admin.layout.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">@lang('admin.home') / @lang('admin.users') / </span>@lang('admin.editusers')</h4>

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                        <form action="{{ route('admin.users.update',$user->id) }}" method="POST"
                              class="row g-3" data-parsley-validate="" data-massage = "{{__('admin.updated')}}" data-url="{{ route('admin.users.index') }}" id="editForm">


                            @csrf
                            @method('put')
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input id="formValidationName" type="text" class="form-control" name="name" value="{{$user->name}}"
                                       placeholder="@lang('admin.name')" required/>
                                <label for="formValidationName">@lang('admin.name')</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating form-floating-outline">
                                <input id="formValidationEmail" type="email" name="email" value="{{$user->email}}" class="form-control"
                                       placeholder="@lang('admin.email')" required/>
                                <label for="formValidationEmail">@lang('admin.email')</label>
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-floating form-floating-outline">
                                    <input id="formValidationPhone" type="text" name="phone" value="{{$user->getRawOriginal('phone')}}" class="form-control"
                                           placeholder="@lang('admin.phone')" required/>
                                    <label for="formValidationPhone">@lang('admin.phone')</label>
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
                                            aria-describedby="basic-default-password3"/>
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
                                            aria-describedby="basic-default-password3"/>
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
