<?php include "layouts/header.php"; ?>

<?php include "layouts/navbar.php"; ?>

<div class="container" style="padding-top: 90px;">
  <div class="py-4">

    <div class="row g-4">
      <div class="col-md-4">
        <div class="stat-card bg-white p-4 h-100">
          <h6 class="text-muted">Jumlah Siswa</h6>
          <h2 class="fw-bold">120</h2>
          <i class="bi bi-people-fill text-primary stat-icon"></i>
        </div>
      </div>

      <div class="col-md-4">
        <div class="stat-card bg-white p-4 h-100">
          <h6 class="text-muted">Absensi Hari Ini</h6>
          <h2 class="fw-bold text-success">Hadir: 110</h2>
          <small class="mt-1 d-block text-secondary">
            Izin: 5 • Sakit: 3 • Alpha: 2
          </small>
          <i class="bi bi-calendar-check stat-icon text-primary"></i>
        </div>
      </div>

      <div class="col-md-4">
        <div class="stat-card bg-white p-4 h-100">
          <h6 class="text-muted">Pengguna Aktif</h6>
          <h2 class="fw-bold">2 Guru</h2>
          <i class="bi bi-person-badge-fill stat-icon text-primary"></i>
        </div>
      </div>

      <div class="summary-card bg-white p-4 mt-4">
        <h5 class="fw-bold"><i class="bi bi-clock-history me-1"></i>Ringkasan Terakhir</h5>
        <p class="mt-2 mb-0">
          Hari ini, <strong>2025-12-04</strong>, tidak ada kejadian khusus.
          Silakan buka menu <strong>Siswa</strong> atau <strong>Input Absensi</strong>.
        </p>
      </div>

    </div>
  </div>

  <?php include "layouts/scripts.php"; ?>

  <?php include "layouts/footer.php"; ?>