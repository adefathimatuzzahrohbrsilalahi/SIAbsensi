<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../views/login.php");
  exit;
}

require "../config/koneksi.php";

$q = isset($_GET['q']) ? trim($_GET['q']) : '';

if ($q !== '') {
  $sql = "SELECT siswa.nis, siswa.nama_siswa, kelas.nama_kelas
          FROM siswa
          INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas
          WHERE siswa.nis LIKE ? OR siswa.nama_siswa LIKE ?
          ORDER BY siswa.nama_siswa ASC";
  $stmt = $koneksi->prepare($sql);
  $like = '%' . $q . '%';
  $stmt->bind_param('ss', $like, $like);
  $stmt->execute();
  $result = $stmt->get_result();
  $dataSiswa = $result->fetch_all(MYSQLI_ASSOC);
  $stmt->close();
} else {
  $getDataSiswa = mysqli_query($koneksi, "
    SELECT siswa.nis, siswa.nama_siswa, kelas.nama_kelas
    FROM siswa
    INNER JOIN kelas ON kelas.id_kelas = siswa.id_kelas
    ORDER BY siswa.nama_siswa ASC
  ");
  $dataSiswa = mysqli_fetch_all($getDataSiswa, MYSQLI_ASSOC);
}

include "layouts/header.php";
include "layouts/navbar.php";
?>

<style>
  /* ===== BACKGROUND ===== */
  body {
    background: linear-gradient(135deg, #fff0f6, #ffe4ef);
  }

  /* ===== CARD ===== */
  .card-modern {
    border: none;
    border-radius: 24px;
    padding: 28px;
    background: #ffffff;
    box-shadow: 0 15px 35px rgba(255, 105, 180, 0.18);
  }

  /* ===== TITLE ===== */
  h4 {
    color: #d63384;
    letter-spacing: 0.3px;
  }

  /* ===== TABLE ===== */
  .table-modern {
    border-radius: 16px;
    overflow: hidden;
  }

  .table-modern thead th {
    background: linear-gradient(135deg, #ff5fa2, #ff85c1);
    color: #fff;
    border: none;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 0.85rem;
  }

  .table-modern tbody tr {
    vertical-align: middle;
    transition: 0.2s ease;
  }

  .table-modern tbody tr:hover {
    background-color: #fff0f6 !important;
  }

  .table-striped>tbody>tr:nth-of-type(odd) {
    background-color: #fff7fb;
  }

  /* ===== BUTTON ===== */
  .btn-modern {
    border-radius: 14px;
    padding: 8px 18px;
    background: linear-gradient(135deg, #ff5fa2, #ff85c1);
    border: none;
    color: white;
    font-weight: 500;
    box-shadow: 0 6px 14px rgba(255, 95, 162, 0.35);
  }

  .btn-modern:hover {
    background: linear-gradient(135deg, #ff85c1, #ff5fa2);
    color: white;
    transform: translateY(-1px);
  }

  /* ===== FORM ===== */
  .form-control {
    border-radius: 14px;
    border: 1px solid #ffb6d5;
  }

  .form-control:focus {
    border-color: #ff5fa2;
    box-shadow: 0 0 0 0.18rem rgba(255, 95, 162, 0.25);
  }

  .btn-outline-secondary {
    border-radius: 14px;
    border-color: #ff85c1;
    color: #ff5fa2;
  }

  .btn-outline-secondary:hover {
    background-color: #ff5fa2;
    color: #fff;
  }
</style>

<div class="container" style="padding-top: 90px;">
  <div class="py-4">
    <div class="card-modern">

      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Daftar Siswa</h4>
        <a class="btn btn-modern" href="siswa_add.php">
          <i class="bi bi-plus-circle me-1"></i> Tambah Siswa
        </a>
      </div>

      <div class="row mb-3">
        <div class="col-md-4">
          <form method="get" action="">
            <div class="input-group">
              <input type="text" name="q" class="form-control"
                     placeholder="Cari nama atau NIS..."
                     value="<?php echo htmlspecialchars($q); ?>">
              <button class="btn btn-outline-secondary" type="submit">Cari</button>
              <?php if ($q !== ''): ?>
                <a class="btn btn-outline-secondary"
                   href="<?php echo basename($_SERVER['PHP_SELF']); ?>">Reset</a>
              <?php endif; ?>
            </div>
          </form>
        </div>
      </div>

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
            <?php if (count($dataSiswa) === 0): ?>
              <tr>
                <td colspan="3" class="text-center">Tidak ada data.</td>
              </tr>
            <?php else: ?>
              <?php foreach ($dataSiswa as $row): ?>
                <tr>
                  <td><?= htmlspecialchars($row['nis']); ?></td>
                  <td><?= htmlspecialchars($row['nama_siswa']); ?></td>
                  <td><?= htmlspecialchars($row['nama_kelas']); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

<?php include "layouts/scripts.php"; ?>
<?php include "layouts/footer.php"; ?>
