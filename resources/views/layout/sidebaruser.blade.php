<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li class="nav-item">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/dashboard/user') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-school" style="font-size: 24px;"></i>
            </div>
            <div class="sidebar-brand-text mx-3">PT. Santoso</div>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::routeIs('dashboard.user.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.user.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Nav Item - Order Ticket Online -->
    <li class="nav-item {{ Request::routeIs('user.tickets.create') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.tickets.create') }}">
            <i class="fas fa-ticket-alt"></i>
            <span>Order Ticket Online</span>
        </a>
    </li>

    <!-- Nav Item - Riwayat Pemesanan -->
    <li class="nav-item {{ Request::routeIs('user.tickets.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('user.tickets.index') }}">
            <i class="fas fa-history"></i>
            <span>Riwayat Pemesanan</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
