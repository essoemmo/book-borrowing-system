@include('admin.layout.header')

<div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Register Card -->
            <div class="card p-2" style="background-color: #ecebfd;">
                <!-- Logo -->
                <div class="app-brand justify-content-center mt-5">
                    <a href="#" class="app-brand-link gap-2">
                <span class="app-brand-logo demo">
                  <span style="color: var(--bs-primary)">
                    <img src="{{ asset('images/logo.png') }}" alt="">
                  </span>
                </span>
                    </a>
                </div>
                <!-- /Logo -->
                <div class="card-body mt-2">
                    <h4 class="mb-2 fw-semibold" style="text-align: center;">@lang('admin.welcome') 👋</h4>
                    <p class="mb-4" style="text-align: center;">@lang('admin.pleasesign')</p>

                    <form class="mb-3" action="{{ route('admin.login') }}" method="POST" data-parsley-validate="">
                        @csrf
                        @method('post')
                        <div class="form-floating form-floating-outline mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="@lang('admin.email')" parsley-trigger="change" autofocus required/>
                            <label for="email">@lang('admin.email')</label>
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <div class="input-group input-group-merge">
                                <div class="form-floating form-floating-outline">
                                    <input type="password" id="password" class="form-control" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" data-parsley-minlength="8" parsley-trigger="change" required/>
                                    <label for="password">@lang('admin.password')</label>
                                </div>
                                <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="mb-3 d-flex justify-content-between">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        @lang('admin.remember')
                                    </label>
                                </div>
{{--                                <a href="{{ route('admin.password.request') }}" class="float-end mb-1">--}}
{{--                                    <span>@lang('admin.forgetpass')</span>--}}
{{--                                </a>--}}
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary d-grid w-100">@lang('admin.login')</button>
                    </form>

                    <p class="text-center">
                        <span >@lang('admin.thankslogin')
                    </p>

                </div>
            </div>
            <img
                alt="mask"
                src="{{ asset('adminStyle/assets/img/illustrations/auth-basic-register-mask-light.png') }}"
                class="authentication-image d-none d-lg-block"
                data-app-light-img="illustrations/auth-basic-register-mask-light.png"
                data-app-dark-img="illustrations/auth-basic-register-mask-dark.png" />
        </div>
    </div>
</div>

@include('admin.layout.footer')
@include('admin.layout.session')

