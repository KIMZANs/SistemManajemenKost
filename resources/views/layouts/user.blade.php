<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard User')</title>
    <!-- Font & AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
        {{-- Navbar --}}
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <span class="nav-link">
                        👋 Hai, {{ Auth::user()->name }}
                    </span>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('user.logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>

        {{-- Sidebar --}}
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a class="brand-link text-center">
                <span class="brand-text font-weight-light">Penghuni Kost</span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                        <li class="nav-item">
                            <a href="{{ route('user.dashboard') }}"
                                class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.complaints.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-bullhorn"></i>
                                <p>Komplain</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('user.payments.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-wallet"></i>
                                <p>Pembayaran</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        {{-- Main Content --}}
        <div class="content-wrapper">
            <section class="content pt-3">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>

        {{-- Footer --}}
        <footer class="main-footer">
            <strong>&copy; 2025 Kost System</strong>
            <div class="float-right d-none d-sm-inline">Penghuni</div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>
