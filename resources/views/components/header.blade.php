<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light navbar-shadow"
    style="background-color: #F4CE14">
    <div class="navbar-wrapper">

        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                        href="{{ route('dashboard') }}"><i class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item mx-auto"><a class="navbar-brand" href="{{ route('dashboard') }}"><img
                            class="brand-logo" alt="modern admin logo"
                            src="{{ asset('/assets/images/logo-golkar.svg') }}">
                        <h3 class="brand-text">GOLKAR</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                        data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
            </ul>
        </div>

        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">

                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                            href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i></a></li>
                </ul>

                <ul class="nav navbar-nav float-right">

                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown"><span
                                class="mr-1 user-name text-bold-700">{{ Auth::user()->name }}</span>
                            <span class="avatar avatar-online">
                                <img class="h-100 w-100"
                                    src="{{ Auth::user()->photo ? url(Storage::url(Auth::user()->photo)) : asset('/assets/app-assets/images/portrait/small/avatar-s-19.png') }}"
                                    alt="avatar"><i></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- <a class="dropdown-item" href="{{ route('index') }}"><i class="ft-home"></i> Beranda</a> --}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ft-power"></i> Keluar
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- END: Header-->
