<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ route('home') }}">{{ __('') }}</a>
        <!-- Form -->
        {{--<form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">--}}
            {{--<div class="form-group mb-0">--}}
                {{--<div class="input-group input-group-alternative">--}}
                    {{--<div class="input-group-prepend">--}}
                        {{--<span class="input-group-text"><i class="fas fa-search"></i></span>--}}
                    {{--</div>--}}
                    {{--<input class="form-control" placeholder="Search" type="text">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item">
                <a href="{{ route('profile.edit') }}" class="nav-link">
                    <i class="ni ni-single-02"></i>
                    <span>{{ auth()->user()->name }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="ni ni-user-run"></i>
                    <span>{{ __('Logout') }}</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
