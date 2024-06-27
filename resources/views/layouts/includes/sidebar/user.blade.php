<div class="sidebar" id="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('dashboard/dist/img/idn.png') }}" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">SICEPU</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" id="sidebar-nav" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="#" class="nav-link {{ request()->routeIs( 'user.*') ? '' : 'collapsed' }} " data-bs-target="#components-nav" data-bs-toggle="collapse">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview nav-content collapse {{ request()->routeIs('user.*') ? 'show' : '' }} " data-bs-parent="#sidebar-nav" id="components-nav">
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}"
                            class="nav-link {{ request()->routeIs('user.*')  ? 'active' : '' }} "
                            data-bs-target="#components-transaction" data-bs-toggle="collapse">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Adukan</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
