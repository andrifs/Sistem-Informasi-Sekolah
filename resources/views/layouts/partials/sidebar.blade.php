<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Toto Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @if (auth()->user()->role_id == '1');
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            DATA
        </div>

         <!-- Nav Item - Tables -->
        <li class="nav-item {{ Request::is('gurus*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('gurus.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Guru</span></a>
        </li>

        <li class="nav-item {{ Request::is('siswas*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('siswas.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Siswa</span></a>
        </li>
        <li class="nav-item {{ Request::is('kelas*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kelas.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Kelas</span></a>
        </li>
        <li class="nav-item {{ Request::is('mapels*') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('mapels.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Mapel</span></a>
        </li>

    @endif

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (auth()->user()->role_id == '1');
         <!-- Heading -->
        <div class="sidebar-heading">
            Settings
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item {{ Route::is('users*') || Route::is('content*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Management Users</span>
            </a>
            <div id="collapseTwo" class="collapse {{ Route::is('users*')|| Route::is('content*') ? 'show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Management User</h6>
                    <a class="collapse-item {{ Route::is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">User</a>
                    <a class="collapse-item {{ Route::is('content*') ? 'active' : '' }}" href="{{ route('content.index') }}">Rubah Content</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

    @endif


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
