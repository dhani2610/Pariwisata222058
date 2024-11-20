
<style>
    .menu-inner{
      background: #010066;
    }
    .layout-wrapper:not(.layout-horizontal) .bg-menu-theme .menu-inner .menu-item .menu-link {
      color: white
    }
    .active-title{
      color: #010066!important;
    }
    .bg-menu-theme .menu-inner > .menu-item.active > .menu-link {
        color: #010066 ! important;
        background-color: white!important;
    }
</style>
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="#" class="app-brand-link">
      {{-- <span class="app-brand-logo demo">
        
      </span> --}}
      {{-- <img src="{{ asset('assets/img/logos/logo.png') }}" style="max-width: 30%"> --}}

      <span class=" demo fw-bold ms-2">Dashboard Wisata</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>
  @php
    $usr = Auth::guard('admin')->user();
  @endphp

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <!-- Dashboards --> 
    @if ($usr->can('dashboard.view') || $usr->can('monitoring.view'))
    <li class="menu-item mt-3 {{ Request::is('admin') ? 'active' : '' }}">
      <a href="{{ url('/admin') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Dashboards">Dashboard</div>
      </a>
    </li>
    @endif

    <li class="menu-item {{ Request::is('wisata') ? 'active' : '' }}">
      <a href="{{ route('wisata') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Wisata">Wisata</div>
      </a>
    </li>
    <li class="menu-item {{ Request::is('wisata.kelola.pesanan') ? 'active' : '' }}">
      <a href="{{ route('wisata.kelola.pesanan') }}" class="menu-link">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div data-i18n="Wisata">Kelola Pesanan</div>
      </a>
    </li>

    @if ($usr->can('admin.view') ||  $usr->can('role.view'))
    <!-- Layouts -->
    <li class="menu-item {{ Request::is('admin/admins') || Request::is('admin/roles') ? 'open' : '' }}">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-layout"></i>
        <div data-i18n="Layouts">Kelola Pengguna</div>
      </a>

      <ul class="menu-sub">
        <li class="menu-item {{ Request::is('admin/admins') ? 'active' : '' }}">
          <a href="{{ route('admin.admins.index') }}" class="menu-link">
            <div data-i18n="Without menu" style="color : {{ Request::is('admin/admins') ? '#010066' : '' }}">Users</div>
          </a>
        </li>

      </ul>
    </li>
    @endif

  </ul>
</aside>