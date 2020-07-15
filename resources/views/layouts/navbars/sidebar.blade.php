<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ Storage::url('logo-default-dark.png', true) }}" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        {{--<img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/team-1-800x800.jpg">--}}
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('My profile') }}</span>
                    </a>
                    {{--<a href="#" class="dropdown-item">--}}
                        {{--<i class="ni ni-settings-gear-65"></i>--}}
                        {{--<span>{{ __('Settings') }}</span>--}}
                    {{--</a>--}}
                    {{--<a href="#" class="dropdown-item">--}}
                        {{--<i class="ni ni-calendar-grid-58"></i>--}}
                        {{--<span>{{ __('Activity') }}</span>--}}
                    {{--</a>--}}
                    {{--<a href="#" class="dropdown-item">--}}
                        {{--<i class="ni ni-support-16"></i>--}}
                        {{--<span>{{ __('Support') }}</span>--}}
                    {{--</a>--}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('img/logo-kaunter-zakat.png') }}">

                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            {{--<!-- Form -->--}}
            {{--<form class="mt-4 mb-3 d-md-none">--}}
                {{--<div class="input-group input-group-rounded input-group-merge">--}}
                    {{--<input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">--}}
                    {{--<div class="input-group-prepend">--}}
                        {{--<div class="input-group-text">--}}
                            {{--<span class="fa fa-search"></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</form>--}}
            <!-- Navigation -->
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-columns"></i> {{ __('Dashboard') }}
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('station*') ? 'active' : '' }}" href="{{ route('station.index') }}">
                        <i class="fas fa-columns"></i> {{ __('Stations') }}
                    </a>
                </li>


                @if (auth()->user()->isAdmin() OR auth()->user()->isSuperAdmin() OR auth()->user()->isPPZ())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('transaksi/dashboard') ? 'active' : '' }}" href="{{ route('transaksi.dashboard') }}">
                            <i class="fas fa-columns"></i> {{ __('Dashboard') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('transaksi/harian') ? 'active' : '' }}" href="{{ route('transaksi.harian') }}">
                            <i class="fas fa-money-bill-alt"></i> {{ __('Transaksi Harian') }}
                        </a>
                    </li>
                @endif
                @if (auth()->user()->isStaff() OR auth()->user()->isSuperAdmin() OR auth()->user()->isAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('carian/pembayar') ? 'active' : '' }}" href="{{ route('carian.pembayar') }}">
                            <i class="ni ni-money-coins"></i> {{ __('Kaunter Zakat') }}
                        </a>
                    </li>
                @endif
                @if (auth()->user()->isStaff() OR auth()->user()->isSuperAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('batal/resit') ? 'active' : '' }}" href="{{ route('batal.resit') }}">
                            <i class="fas fa-ban"></i> {{ __('Batal Resit') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('batal/mohon') ? 'active' : '' }}" href="{{ route('batal.mohon-batal') }}">
                            <i class="fas fa-info"></i> {{ __('Status Batal') }}
                        </a>
                    </li>
                @endif
                @if (auth()->user()->isPPZ() OR auth()->user()->isSuperAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('batal/senarai-batal') ? 'active' : '' }}" href="{{ route('batal.senarai-batal') }}">
                            <i class="fas fa-search"></i> {{ __('Senarai Permohonan Batal') }}
                        </a>
                    </li>
                @endif
                @if (auth()->user()->isStaff() OR auth()->user()->isSuperAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tutup/harian') ? 'active' : '' }}" href="{{ route('tutup.harian') }}">
                            <i class="ni ni-archive-2"></i> {{ __('Tutup Harian') }}
                        </a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('tutup/carian-tutup-harian') ? 'active' : '' }}" href="{{ route('tutup.carian-tutup-harian') }}">
                                <i class="ni ni-compass-04"></i> {{ __(' Carian Tutup Harian') }}
                            </a>
                        </li>
                @endif
                @if (auth()->user()->isStaff() OR auth()->user()->isSuperAdmin() OR auth()->user()->isPPZ())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tutup/slip') ? 'active' : '' }}" href="{{ route('tutup.slip') }}">
                            <i class="ni ni-cloud-download-95"></i> {{ __('Upload Slip') }}
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('tutup/slip-kredit-kad') ? 'active' : '' }}" href="{{ route('tutup.slip.kredit-card') }}">
                            <i class="ni ni-cloud-download-95"></i> {{ __('Upload Slip (CC)') }}
                        </a>
                    </li>
                @endif
                @if (auth()->user()->isPPZ())
                    {{--<li class="nav-item">--}}
                        {{--<a class="nav-link {{ request()->is('tutup/index-tutup-harian') ? 'active' : '' }}" href="{{ route('tutup.index-tutup-harian') }}">--}}
                            {{--<i class="ni ni-bullet-list-67"></i> {{ __('Senarai Tutup Harian') }}--}}
                        {{--</a>--}}
                    {{--</li>--}}
                @endif

                @if (auth()->user()->isSuperAdmin())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('user*') ? 'active' : '' }}" href="{{ url('user') }}">
                            <i class="ni ni-circle-08"></i> {{ __('User Management') }}
                        </a>
                    </li>
                @endif

            </ul>

        </div>
    </div>
</nav>
