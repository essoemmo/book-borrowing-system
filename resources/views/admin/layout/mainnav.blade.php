<!-- Layout container -->
<div class="layout-page">
    <!-- Navbar -->
    <nav
        class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
        id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="mdi mdi-menu mdi-24px"></i>
            </a>
        </div>
        <div class="container-xxl">

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <!-- Notification -->
                    <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-4 me-xl-3">
                        <a
                            class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
                            href="javascript:void(0);"
                            data-bs-toggle="dropdown"
                            data-bs-auto-close="outside"
                            aria-expanded="false">
                            <i class="mdi mdi-bell-outline mdi-36px" style="color: #666cff;"></i>
                            <span
                                class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end py-0">
                            <li class="dropdown-menu-header border-bottom">
                                <div class="dropdown-header d-flex align-items-center py-3">
                                    <h6 class="mb-0 me-auto">@lang('admin.notification')</h6>
                                    <span class="badge rounded-pill bg-label-primary">8 New</span>
                                </div>
                            </li>
                            <li class="dropdown-notifications-list scrollable-container">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                        <div class="d-flex gap-2">
                                            <div class="flex-shrink-0">
                                                <div class="avatar me-1">
                                                    <img src="../../assets/img/avatars/2.png" alt
                                                         class="w-px-40 h-auto rounded-circle"/>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                                                <h6 class="mb-1 text-truncate">New Message ✉️</h6>
                                                <small class="text-truncate text-body">You have new message from
                                                    Natalie</small>
                                            </div>
                                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                                <small class="text-muted">1h ago</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                        <div class="d-flex gap-2">
                                            <div class="flex-shrink-0">
                                                <div class="avatar me-1">
                                <span class="avatar-initial rounded-circle bg-label-success"
                                ><i class="mdi mdi-cart-outline"></i
                                    ></span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                                                <h6 class="mb-1 text-truncate">Whoo! You have new order 🛒</h6>
                                                <small class="text-truncate text-body">ACME Inc. made new order
                                                    $1,154</small>
                                            </div>
                                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                                <small class="text-muted">1 day ago</small>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!--/ Notification -->
                    <!-- Language -->
                    <ul class="nav navbar-nav bookmark-icons me-4 me-xl-3">
{{--                        @if(app()->isLocale('ar'))--}}
{{--                            <a href="{{route('admin.lang','en')}}" class="nav-link" title="English"><span--}}
{{--                                    class="mdi mdi-web mdi-36px" style="color: #666cff;"></span></a>--}}

{{--                        @else--}}
{{--                            <a href="{{route('admin.lang','ar')}}" class="nav-link" title="Arabic"><span--}}
{{--                                    class="mdi mdi-web mdi-36px" style="color: #666cff;"></span></a>--}}
{{--                        @endif--}}
                    </ul>
                    <!-- User -->
                    <ul class="nav navbar-nav bookmark-icons me-5 me-xl-4">
                        <a class="nav-link dropdown-toggle hide-arrow" title="Profile" href="">
                            <div class="avatar avatar-online">
                                <img src="{{ asset('images/admins.png') }}" alt class="w-px-40 h-auto rounded-circle"/>
                            </div>
                        </a>
                    </ul>

                    <ul class="nav navbar-nav bookmark-icons">
                        <a class="dropdown-item" title="Logout" href="{{ route('admin.logout') }}">
                            <span class="align-middle"><span class="mdi mdi-logout-variant mdi-30px" style="color: #666cff;"></span></span>
                        </a>
                    </ul>

                </ul>
            </div>

    </nav>
