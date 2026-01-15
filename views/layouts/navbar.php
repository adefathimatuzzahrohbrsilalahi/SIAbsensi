<style>
    /* Navbar Glass */
    .navbar-glass {
        backdrop-filter: blur(12px);
        background: rgba(253, 13, 105, 0.85) !important;
        /* bootstrap primary */
    }

    .stat-card {
        border: none;
        border-radius: 16px;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
        position: relative;
        overflow: hidden;
        transition: .2s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }

    .stat-icon {
        position: absolute;
        bottom: 10px;
        right: 12px;
        font-size: 40px;
        opacity: .15;
    }

    .summary-card {
        border-radius: 16px;
        border: none;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.07);
    }
</style>

<nav class="navbar navbar-expand-lg navbar-dark navbar-glass fixed-top">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="#">
            <i class="bi bi-check2-square me-1"></i> Absensi MAN 2 Asahan
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto fw-semibold">
                <li class="nav-item"><a class="nav-link" href="dashboard.php"><i class="bi bi-speedometer2 me-1"></i>Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="siswa_list.php"><i class="bi bi-people me-1"></i>Siswa</a></li>
                <li class="nav-item"><a class="nav-link" href="absensi_take.php"><i class="bi bi-pencil-square me-1"></i>Input Absensi</a></li>
                <li class="nav-item"><a class="nav-link text-warning" href="logout.php"><i class="bi bi-box-arrow-right me-1"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</nav>