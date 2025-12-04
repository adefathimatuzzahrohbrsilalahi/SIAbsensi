<?php
include "../../config/koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT id, username, password, role, nama_lengkap 
          FROM users 
          WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($koneksi, $query);

if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
}

$row = mysqli_fetch_assoc($result);

if ($row) {
    session_start();
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['nama_lengkap'] = $row['nama_lengkap'];

    header("Location: ../../views/dashboard.php");
    exit;
} else {
    header("Location: ../../views/login.php?error=1");
    exit;
}
