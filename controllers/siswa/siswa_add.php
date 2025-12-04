<?php
include "../../config/koneksi.php";

$nis           = $_POST['nis'];
$nama_lengkap  = $_POST['nama_lengkap'];
$id_kelas      = $_POST['id_kelas'];

if (empty($nis) || empty($nama_lengkap) || empty($id_kelas)) {
    header("Location: ../../views/siswa_add.php?error=empty");
    exit;
}

$query = "INSERT INTO siswa (nis, nama_siswa, id_kelas)
          VALUES ('$nis', '$nama_lengkap', '$id_kelas')";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

header("Location: ../../views/siswa_list.php?success=1");
exit;
