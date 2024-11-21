<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <h1 class="sitename">Toraja</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('index') }}" class="active">Beranda</a></li>
                <li><a href="{{ route('wisata-front') }}">Wisata</a></li>
                <li><a href="{{ route('tiket') }}">Tiket</a></li>
                @if (isset(Auth::guard('admin')->user()->name))
                    <li><a href="{{ route('tiket') }}">{{ Auth::guard('admin')->user()->name }}</a></li>
                    <form id="admin-logout-form" action="{{ route('admin.logout.submit') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <li><a href="#"
                            onclick="event.preventDefault();
                          document.getElementById('admin-logout-form').submit();">Logout</a>
                    </li>
                @else
                    <li><a href="{{ url('admin/register') }}">Daftar</a></li>
                @endif
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

    </div>
</header>
