<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li class="nav-item">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/admin') }}">
            <div class="sidebar-brand-icon">
                <i class="fas fa-school" style="font-size: 24px;"></i>
            </div>
            <div class="sidebar-brand-text mx-3">PT. Santoso</div>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::routeIs('dashboard.admin.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard.admin.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>



    <!-- Nav Item - Kasir -->
    <li class="nav-item {{ Request::routeIs('cashier.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('cashier.index') }}">
            <i class="fas fa-cash-register"></i>
            <span>Kasir Offline</span>
        </a>
    </li>

    <!-- Nav Item - Manage Ticket Online -->
    <li class="nav-item {{ Request::routeIs('ticket.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('ticket.index') }}">
            <i class="fas fa-ticket-alt"></i>
            <span>Manage Ticket Online</span>
        </a>
    </li>

    <!-- Nav Item - Manage Ticket -->
    <li class="nav-item {{ Request::routeIs('admin.transactions.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.transactions.index') }}">
            <i class="fas fa-clipboard-list"></i>
            <span>Manage All Ticket</span>
        </a>
    </li>

        <!-- Nav Item - Manage Data User -->
        <li class="nav-item {{ Request::routeIs('admin.users.index') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="fas fa-user-edit"></i>
                <span>Manage Data User</span>
            </a>
        </li>

<!-- Nav Item - Manage Kolam Renang -->
<li class="nav-item {{ Request::routeIs('products.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('products.index') }}">
        <i class="fas fa-swimmer"></i>
        <span>Manage Kolam Renang</span>
    </a>
</li>

<!-- Nav Item - Manage Kontak Pesan -->
<li class="nav-item {{ Request::routeIs('admin.kontakpesan.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('admin.kontakpesan.index') }}">
        <i class="fas fa-envelope"></i>
        <span>Manage Kontak Pesan</span>
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
