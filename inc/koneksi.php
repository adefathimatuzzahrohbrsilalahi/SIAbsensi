<?php
// inc/koneksi.php
$host = 'localhost';
$db = 'absensi_man2asahan';
$user = 'root';
$pass = '';
$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) {
die('Koneksi error: ' . $mysqli->connect_error);
}
// set charset
$mysqli->set_charset('utf8mb4');