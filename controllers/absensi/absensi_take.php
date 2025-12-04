<?php
session_start();
include "../../config/koneksi.php";

$tanggal = $_POST['tanggal'] ?? null;
$statusList = $_POST['status'] ?? [];
$ketList    = $_POST['ket'] ?? [];
$id_user    = $_SESSION['user_id'];

if (!$tanggal) {
    die("Tanggal wajib diisi");
}

foreach ($statusList as $id_siswa => $status) {

    $keterangan = $ketList[$id_siswa] ?? '';

    $query = "
        INSERT INTO absensi (id_siswa, tanggal, status, keterangan, id_user)
        VALUES ('$id_siswa', '$tanggal', '$status', '$keterangan', '$id_user')
    ";

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($koneksi));
    }
}

header("Location: ../../views/dashboard.php");
exit;
