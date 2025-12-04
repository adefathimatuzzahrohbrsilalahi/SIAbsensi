<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../views/login.php");
  exit;
}
require "../config/koneksi.php";
$getDataSiswa = mysqli_query($koneksi, "SELECT siswa.nis, siswa.nama_siswa, kelas.nama_kelas FROM siswa INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas ORDER BY siswa.nama_siswa ASC");
$dataSiswa = mysqli_fetch_all($getDataSiswa, MYSQLI_ASSOC);
include "layouts/header.php";
include "layouts/navbar.php"; ?>

<style>
  .card-modern {
    border: none;
    border-radius: 18px;
    padding: 22px;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
  }

  .table-modern thead th {
    background: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
    font-weight: 600;
  }

  .table-modern tbody tr {
    vertical-align: middle;
  }

  .table-modern tbody tr:hover {
    background: #f3f6ff !important;
  }

  .btn-modern {
    border-radius: 10px;
    padding: 6px 14px;
  }
</style>

<div class="container" style="padding-top: 90px;">
  <div class="py-4">

    <div class="card-modern">

      <!-- Header Section -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Daftar Siswa</h4>

        <a class="btn btn-success btn-modern" href="siswa_add.php">
          <i class="bi bi-plus-circle me-1"></i> Tambah Siswa
        </a>
      </div>

      <!-- Search Bar -->
      <div class="row mb-3">
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Cari nama atau NIS...">
        </div>
      </div>

      <!-- Table -->
      <div class="table-responsive">
        <table class="table table-modern table-striped align-middle">
          <thead>
            <tr>
              <th style="width:120px;">NIS</th>
              <th>Nama</th>
              <th style="width:140px;">Kelas</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($dataSiswa as $row): ?>
              <tr>
                <td><?= $row['nis']; ?></td>
                <td><?= $row['nama_siswa']; ?></td>
                <td><?= $row['nama_kelas']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>

  </div>
</div>

<?php include "layouts/scripts.php"; ?>

<?php include "layouts/footer.php"; ?>