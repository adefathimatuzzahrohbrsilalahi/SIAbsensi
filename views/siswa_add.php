<?php
require "../config/koneksi.php";
$getDataKelas = mysqli_query($koneksi, "SELECT id_kelas, nama_kelas FROM kelas ORDER BY nama_kelas ASC");
$dataKelas = mysqli_fetch_all($getDataKelas, MYSQLI_ASSOC);
include "layouts/header.php";
include "layouts/navbar.php";
?>

<style>
    .section-title {
        font-weight: 600;
        font-size: 1.25rem;
        border-left: 4px solid #0d6efd;
        padding-left: 10px;
        margin-bottom: 1rem;
    }

    .modern-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.08);
    }

    .form-control,
    .form-select {
        border-radius: 8px;
    }

    .btn-modern {
        padding: 8px 18px;
        border-radius: 8px;
    }
</style>

<div class="container" style="padding-top: 90px;">
    <div class="py-4 d-flex justify-content-center">

        <div class="col-md-6">
            <div class="card modern-card p-4">

                <div class="section-title">Tambah Siswa</div>

                <form action="../controllers/siswa/siswa_add.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <input type="text" class="form-control" placeholder="Masukkan NIS" name="nis">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Siswa" name="nama_lengkap">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select class="form-select" name="id_kelas">
                            <option selected disabled>Pilih kelas...</option>
                            <?php foreach ($dataKelas as $kelas): ?>
                                <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['nama_kelas'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button class="btn btn-primary btn-modern w-100">
                        Simpan Data
                    </button>

                </form>
            </div>
        </div>

    </div>
</div>

<?php include "layouts/scripts.php"; ?>

<?php include "layouts/footer.php"; ?>