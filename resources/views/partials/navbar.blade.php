@auth()
    @include('partials.navs.auth')
@endauth

@guest()
    @include('partials.navs.guest')
@endguest

