<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../views/login.php");
  exit;
}
require "../config/koneksi.php";
$getDataSiswa = mysqli_query($koneksi, "SELECT siswa.nis, siswa.nama_siswa FROM siswa INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas ORDER BY siswa.nama_siswa ASC");
$dataSiswa = mysqli_fetch_all($getDataSiswa, MYSQLI_ASSOC);
include "layouts/header.php";
include "layouts/navbar.php"; ?>

<style>
  .card-modern {
    border: none;
    border-radius: 18px;
    padding: 24px;
    box-shadow: 0px 6px 18px rgba(0, 0, 0, 0.06);
    background: #fff;
  }

  .table-modern thead th {
    background: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
    font-weight: 600;
  }

  .table-modern tbody tr:hover {
    background: #f3f6ff;
    transition: 0.2s;
  }

  .form-control-sm,
  .form-select-sm {
    border-radius: 8px;
  }

  .btn-modern {
    border-radius: 10px;
    padding: 8px 20px;
    font-weight: 500;
  }
</style>

<div class="container" style="padding-top: 90px;">
  <div class="py-4">

    <div class="card-modern">

      <form action="../controllers/absensi/absensi_take.php" method="POST">


        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="fw-bold mb-0">Input Absensi</h4>

          <div class="d-flex align-items-center">
            <label class="form-label mb-0 me-2 fw-semibold">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" style="width: 200px;" value="<?= date('Y-m-d'); ?>">
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-modern table-bordered align-middle">
            <thead>
              <tr>
                <th style="width:120px;">NIS</th>
                <th>Nama</th>
                <th style="width:150px;">Status</th>
                <th style="width:220px;">Keterangan</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($dataSiswa as $row): ?>
                <tr>
                  <td><?= $row['nis']; ?></td>
                  <td><?= $row['nama_siswa']; ?></td>

                  <td>
                    <select class="form-select form-select-sm"
                      name="status[<?= $row['id_siswa']; ?>]">
                      <option value="Hadir">Hadir</option>
                      <option value="Izin">Izin</option>
                      <option value="Sakit">Sakit</option>
                      <option value="Alfa">Alfa</option>
                    </select>
                  </td>

                  <td>
                    <input class="form-control form-control-sm"
                      name="ket[<?= $row['id_siswa']; ?>]"
                      placeholder="Opsional...">
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <button class="btn btn-primary btn-modern mt-3">
          <i class="bi bi-check-circle me-1"></i> Simpan Absensi
        </button>

      </form>

    </div>

  </div>
</div>

<?php include "layouts/scripts.php"; ?>

<?php include "layouts/footer.php"; ?>