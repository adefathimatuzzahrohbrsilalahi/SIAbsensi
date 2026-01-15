<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../views/login.php");
  exit;
}
require "../config/koneksi.php";

// Ambil data siswa
$getDataSiswa = mysqli_query($koneksi, "
  SELECT siswa.id_siswa, siswa.nis, siswa.nama_siswa
  FROM siswa
  INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas
  ORDER BY siswa.nama_siswa ASC
");
$dataSiswa = mysqli_fetch_all($getDataSiswa, MYSQLI_ASSOC);

include "layouts/header.php";
include "layouts/navbar.php";
?>

<style>
/* ===== GLOBAL BACKGROUND ===== */
body {
  background: linear-gradient(135deg, #ffd6e8, #ffeaf3);
}

/* ===== CARD ===== */
.card-modern {
  border: none;
  border-radius: 24px;
  padding: 30px;
  background: #ffffff;
  box-shadow: 0 15px 40px rgba(255, 105, 180, 0.35);
  animation: fadeUp 0.6s ease;
}

@keyframes fadeUp {
  from {
    opacity: 0;
    transform: translateY(25px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* ===== TITLE ===== */
h4 {
  color: #c2185b;
}

/* ===== TABLE ===== */
.table-modern {
  border-radius: 16px;
  overflow: hidden;
}

.table-modern thead th {
  background: linear-gradient(135deg, #ff5fa2, #ff85c2);
  color: #fff;
  border: none;
  font-weight: 600;
  text-align: center;
}

.table-modern tbody tr {
  transition: all 0.3s ease;
}

.table-modern tbody tr:hover {
  background: #ffe3f0;
}

.table-modern td {
  vertical-align: middle;
}

/* ===== FORM ===== */
.form-label {
  color: #c2185b;
  font-weight: 600;
}

.form-control,
.form-control-sm,
.form-select,
.form-select-sm {
  border-radius: 12px;
  border: 1px solid #ffb6d5;
}

.form-control:focus,
.form-select:focus {
  border-color: #ff5fa2;
  box-shadow: 0 0 0 0.25rem rgba(255, 95, 162, 0.3);
}

/* ===== BUTTON ===== */
.btn-modern {
  border-radius: 14px;
  padding: 12px 30px;
  font-weight: 600;
  background: linear-gradient(135deg, #ff5fa2, #ff87c2);
  border: none;
  color: #fff;
  transition: all 0.3s ease;
}

.btn-modern:hover {
  background: linear-gradient(135deg, #ff3d91, #ff6fb6);
  transform: translateY(-3px);
  box-shadow: 0 12px 30px rgba(255, 95, 162, 0.55);
}

/* ===== TABLE BORDER ===== */
.table-bordered > :not(caption) > * > * {
  border-color: #ffd1e6;
}
</style>

<div class="container" style="padding-top: 90px;">
  <div class="py-4">

    <div class="card-modern">
      <form action="../controllers/absensi/absensi_take.php" method="POST">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h4 class="fw-bold mb-0">Input Absensi</h4>
          <div class="d-flex align-items-center">
            <label class="form-label mb-0 me-2">Tanggal</label>
            <input type="date"
                   name="tanggal"
                   class="form-control"
                   style="width: 200px;"
                   value="<?= date('Y-m-d'); ?>"
                   required>
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
                <td><?= htmlspecialchars($row['nis']); ?></td>
                <td><?= htmlspecialchars($row['nama_siswa']); ?></td>
                <td>
                  <select class="form-select form-select-sm" name="status[]" required>
                    <option value="Hadir">Hadir</option>
                    <option value="Izin">Izin</option>
                    <option value="Sakit">Sakit</option>
                    <option value="Alfa">Alfa</option>
                  </select>
                </td>
                <td>
                  <input type="text"
                         class="form-control form-control-sm"
                         name="keterangan[]"
                         placeholder="Opsional...">
                  <input type="hidden" name="id_siswa[]" value="<?= $row['id_siswa']; ?>">
                  <input type="hidden" name="nis[]" value="<?= $row['nis']; ?>">
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <button type="submit" class="btn btn-modern mt-3" name="submit">
          <i class="bi bi-check-circle me-1"></i> Simpan Absensi
        </button>

      </form>
    </div>

  </div>
</div>

<?php include "layouts/scripts.php"; ?>
<?php include "layouts/footer.php"; ?>
