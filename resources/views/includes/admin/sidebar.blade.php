        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
                <div class="sidebar-brand-text mx-3">GEREJA ADMIN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <hr class="sidebar-divider">

            <li class="nav-item {{ set_active(['jemaat.index']) }}">
                <a class="nav-link" href="{{ route('jemaat.index') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Jemaat</span></a>
            </li>
            <li class="nav-item {{ set_active(['event.index','event.create','event.edit']) }}">
                <a class="nav-link " href="{{ route('event.index') }}">
                    <i class="fas fa-fw fa-calendar"></i>
                    <span>Event/Ibadah</span></a>
            </li>
            <li class="nav-item {{ set_active(['reg_ibadah.index','reg_ibadah.create','reg_ibadah.edit']) }}">
                <a class="nav-link" href="{{ route('reg_ibadah.index') }}">
                    <i class="fas fa-fw fa-church"></i>
                    <span>Pendaftar Ibadah</span></a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->