<?php include "layouts/header.php"; ?>

<?php include "layouts/navbar.php"; ?>

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

                <form>

                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <input type="text" class="form-control" placeholder="Masukkan NIS">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama Siswa">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kelas</label>
                        <select class="form-select">
                            <option selected disabled>Pilih kelas...</option>
                            <option>X IPA 1</option>
                            <option>XI IPS 1</option>
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