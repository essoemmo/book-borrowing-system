
    @include('admin.layout.header')

    @include('admin.layout.sidenav')

    @include('admin.layout.mainnav')

    @searcableScripts

            <section>

                @yield('content')

            </section>

    @include('admin.layout.footer')

    @include('admin.layout.session')
