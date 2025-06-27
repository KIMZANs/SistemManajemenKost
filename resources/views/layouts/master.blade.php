<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts + AdminLTE + FontAwesome + Bootstrap -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=fallback">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </nav>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">
                <span class="brand-text font-weight-light">Manajemen Kost</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">
                                <i class="nav-icon fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.tenants.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Penghuni</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.rooms.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-bed"></i>
                                <p>Kamar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.complaints.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-comments"></i>
                                <p>Komplain Baru</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.bills.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-exclamation-circle"></i>
                                <p>Belum Bayar Bulan Ini</p>
                            </a>
                        </li>

                        </li>
                        <!-- Tambah menu lainnya -->
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            @yield('content-header')

            <section class="content">
                @yield('content')
            </section>
        </div>

        <footer class="main-footer text-sm text-center">
            <strong>Copyright &copy; {{ date('Y') }}</strong>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>

</html>
