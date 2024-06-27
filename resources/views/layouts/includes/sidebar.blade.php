<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('dashboard/dist/img/idn.png') }}"  alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">SICEPU</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @if (Auth::check())
                    <li class="nav-item">
                        <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('.*') ? '' : 'collapsed' }} " data-bs-target="#components-transaction" data-bs-toggle="collapse">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cek Pengaduan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.my-transaction.*') ? '' : 'collapsed' }} " data-bs-target="#components-transaction" data-bs-toggle="collapse">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Adukan</p>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.my-transaction.*') ? '' : 'collapsed' }} " data-bs-target="#components-transaction" data-bs-toggle="collapse">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Adukan</p>
                        </a>
                    </li>
                    @endif
                    
                </ul>
            </li>
            
            
            @if (Auth::check())
            <li class="nav-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="dropdown-item nav-link bg-danger" type="submit" >
                        <i class="nav-icon fas fa-th"></i>
                        Logout
                    </button>
                </form>
            </li>
            @endif
            
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>