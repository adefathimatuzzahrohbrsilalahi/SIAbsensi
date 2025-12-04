<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../views/login.php");
  exit;
}
require "../config/koneksi.php";
$getDataUser = mysqli_query($koneksi, "SELECT count(id) as totalGuru FROM users WHERE role='guru'");
$dataGuru = mysqli_fetch_all($getDataUser, MYSQLI_ASSOC);
$getDataAbsensi = mysqli_query($koneksi, "SELECT SUM(status = 'Hadir') AS total_hadir, SUM(status = 'Izin') AS total_izin, SUM(status = 'Sakit') AS total_sakit, SUM(status = 'Alfa') AS total_alfa FROM absensi WHERE tanggal = CURDATE();");
$dataAbsensi = mysqli_fetch_all($getDataAbsensi, MYSQLI_ASSOC);
$getDataSiswa = mysqli_query($koneksi, "SELECT count(id_siswa) as totalSiswa FROM siswa INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas ORDER BY siswa.nama_siswa ASC");
$dataSiswa = mysqli_fetch_all($getDataSiswa, MYSQLI_ASSOC);
$hadir = $dataAbsensi[0]['total_hadir'];
$izin  = $dataAbsensi[0]['total_izin'];
$sakit = $dataAbsensi[0]['total_sakit'];
$alfa  = $dataAbsensi[0]['total_alfa'];

$totalHariIni = $hadir + $izin + $sakit + $alfa;

if ($totalHariIni == 0) {
  $ringkasan = "Belum ada absensi yang tercatat hari ini.";
} else {
  $ringkasan = "Hari ini terdapat {$hadir} siswa hadir, {$izin} izin, {$sakit} sakit, dan {$alfa} tidak hadir tanpa keterangan.";
}
include "layouts/header.php";
include "layouts/navbar.php"; ?>

<div class="container" style="padding-top: 90px;">
  <div class="py-4">

    <div class="row g-4">
      <div class="col-md-4">
        <div class="stat-card bg-white p-4 h-100">
          <h6 class="text-muted">Jumlah Siswa</h6>
          <h2 class="fw-bold"><?php echo $dataSiswa[0]['totalSiswa']; ?></h2>
          <i class="bi bi-people-fill text-primary stat-icon"></i>
        </div>
      </div>

      <div class="col-md-4">
        <div class="stat-card bg-white p-4 h-100">
          <h6 class="text-muted">Absensi Hari Ini</h6>
          <h2 class="fw-bold text-success">Hadir: <?php echo $dataAbsensi[0]['total_hadir']; ?></h2>
          <small class="mt-1 d-block text-secondary">
            Izin: <?php echo $dataAbsensi[0]['total_izin']; ?> • Sakit: <?php echo $dataAbsensi[0]['total_sakit']; ?> • Alpha: <?php echo $dataAbsensi[0]['total_alfa']; ?>
          </small>
          <i class="bi bi-calendar-check stat-icon text-primary"></i>
        </div>
      </div>

      <div class="col-md-4">
        <div class="stat-card bg-white p-4 h-100">
          <h6 class="text-muted">Pengguna Aktif</h6>
          <h2 class="fw-bold"><?php echo $dataGuru[0]['totalGuru']; ?> Guru</h2>
          <i class="bi bi-person-badge-fill stat-icon text-primary"></i>
        </div>
      </div>

      <div class="summary-card bg-white p-4 mt-4">
        <h5 class="fw-bold">
          <i class="bi bi-clock-history me-1"></i>Ringkasan Terakhir
        </h5>
        <p class="mt-2 mb-0">
          <?php echo $ringkasan; ?>
          <br>
          Silakan buka menu <strong>Siswa</strong> atau <strong>Input Absensi</strong>.
        </p>
      </div>

    </div>
  </div>

  <?php include "layouts/scripts.php"; ?>

  <?php include "layouts/footer.php"; ?>