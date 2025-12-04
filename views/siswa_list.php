<?php include "layouts/header.php"; ?>

<?php include "layouts/navbar.php"; ?>

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
              <th style="width:160px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>102345</td>
              <td>Ahmad Fajar</td>
              <td>XII IPA 1</td>
              <td>
                <a class="btn btn-primary btn-sm btn-modern me-1">
                  <i class="bi bi-pencil-square"></i>
                </a>
                <a class="btn btn-danger btn-sm btn-modern">
                  <i class="bi bi-trash"></i>
                </a>
              </td>
            </tr>

            <tr>
              <td>102346</td>
              <td>Siti Rahma</td>
              <td>XII IPA 1</td>
              <td>
                <a class="btn btn-primary btn-sm btn-modern me-1"><i class="bi bi-pencil-square"></i></a>
                <a class="btn btn-danger btn-sm btn-modern"><i class="bi bi-trash"></i></a>
              </td>
            </tr>

            <tr>
              <td>102347</td>
              <td>Budi Santoso</td>
              <td>XII IPA 1</td>
              <td>
                <a class="btn btn-primary btn-sm btn-modern me-1"><i class="bi bi-pencil-square"></i></a>
                <a class="btn btn-danger btn-sm btn-modern"><i class="bi bi-trash"></i></a>
              </td>
            </tr>

            <tr>
              <td>102188</td>
              <td>Ade Fathimatuzzahroh Br Silalahi</td>
              <td>XII IPA 1</td>
              <td>
                <a class="btn btn-primary btn-sm btn-modern me-1"><i class="bi bi-pencil-square"></i></a>
                <a class="btn btn-danger btn-sm btn-modern"><i class="bi bi-trash"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>

  </div>
</div>

<?php include "layouts/scripts.php"; ?>

<?php include "layouts/footer.php"; ?>