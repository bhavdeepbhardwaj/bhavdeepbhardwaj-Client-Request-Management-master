<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.reports') }}">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Reports</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#admin-client" aria-expanded="false"
                aria-controls="admin-client">
                <i class="menu-icon mdi mdi-account-multiple-plus"></i>
                <span class="menu-title">ADMIN / CLIENT</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="admin-client">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('admin.show_account') }}">Show</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('admin.create_ADMIN_account') }}">Agency</a></li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ route('admin.create_CLIENT_account') }}">Client</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ticket" aria-expanded="false"
                aria-controls="ticket">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Ticket Show</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ticket">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.ticket') }}">Show
                            Ticket</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.help') }}">
                <i class="menu-icon mdi mdi-help-circle-outline"></i>
                <span class="menu-title">Help Desk</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.role') }}">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Roles</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.brand')}}">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.category') }}">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.country') }}">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Country</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.helpCategory') }}">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Help Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.priorities') }}">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Priorities</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.statuses') }}">
                <i class="menu-icon mdi mdi-card-text-outline"></i>
                <span class="menu-title">Statuses</span>
            </a>
        </li>
    </ul>
</nav>
