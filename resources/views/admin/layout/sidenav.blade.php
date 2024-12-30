<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo" style="background-color: #f0f1ff;">
                <a href="#" class="app-brand-link">
              <span class="app-brand-logo demo">
                 <span style="color: var(--bs-primary)">
{{--                     @if(app()->getLocale() == 'ar')--}}
{{--                         <img src="{{ asset('images/logo_ar.png') }}" alt="" style="width: 50px;">--}}
{{--                     @else--}}
{{--                         <img src="{{ asset('images/logo.png') }}" alt="" style="width: 50px;">--}}
{{--                     @endif--}}
                  </span>
              </span>
                    <span class="app-brand-text demo menu-text fw-bold ms-2">@lang('admin.Wnes')</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z"
                            fill="currentColor"
                            fill-opacity="0.6"/>
                        <path
                            d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z"
                            fill="currentColor"
                            fill-opacity="0.38"/>
                    </svg>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1" style="background-color: #f0f1ff;">

                <li class="menu-item {{ URL::route('admin.home') === URL::current() ? 'active' : '' }}">
                    <a href="{{route('admin.home')}}" class="menu-link">
                        <i class="menu-icon tf-icons mdi mdi-home-floor-1 mdi-36px"></i>
                        <div data-i18n="@lang('admin.home')">@lang('admin.home')</div>
                    </a>
                </li>
                @if(Auth::guard('admin')->user()->hasPermission('roles-read'))
                    <li class="menu-item {{ URL::route('admin.roles.index') === URL::current() ? 'active' : '' }}">
                        <a href="{{route('admin.roles.index')}}" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-sign-direction-plus mdi-36px"></i>
                            <div data-i18n="@lang('admin.roles')">@lang('admin.roles')</div>
                        </a>
                    </li>
                @endif

                @if(Auth::guard('admin')->user()->hasPermission('admins-read'))
                    <li class="menu-item {{ URL::route('admin.admins.index') === URL::current() ? 'active' : '' }}">
                        <a href="{{route('admin.admins.index')}}" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-shield-crown"></i>
                            <div data-i18n="@lang('admin.admins')">@lang('admin.admins')</div>
                        </a>
                    </li>
                @endif

                @if(Auth::guard('admin')->user()->hasPermission('users-read'))
                    <li class="menu-item {{ URL::route('admin.users.index') === URL::current() ? 'active' : '' }}">
                        <a href="{{route('admin.users.index')}}" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi mdi-account-group mdi-36px"></i>
                            <div data-i18n="@lang('admin.users')">@lang('admin.users')</div>
                        </a>
                    </li>
                @endif

                @if(Auth::guard('admin')->user()->hasPermission('books-read'))
                    <li class="menu-item {{ URL::route('admin.books.index') === URL::current() ? 'active' : '' }}">
                        <a href="{{route('admin.books.index')}}" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-book mdi-36px"></i>
                            <div data-i18n="@lang('admin.books')">@lang('admin.books')</div>
                        </a>
                    </li>
                @endif

                @if(Auth::guard('admin')->user()->hasPermission('books-read'))
                    <li class="menu-item {{ URL::route('admin.loans.index') === URL::current() ? 'active' : '' }}">
                        <a href="{{route('admin.books.index')}}" class="menu-link">
                            <i class="menu-icon tf-icons mdi mdi-book-account mdi-36px"></i>
                            <div data-i18n="@lang('admin.loans')">@lang('admin.loans')</div>
                        </a>
                    </li>
                @endif
            </ul>
        </aside>
