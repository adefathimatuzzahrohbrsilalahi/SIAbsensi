<?php
// absensi/take.php
session_start();
require_once __DIR__ . '/../inc/koneksi.php';


// pilih tanggal dan kelas
$tanggal = $_GET['tanggal'] ?? date('Y-m-d');
$id_kelas = $_GET['id_kelas'] ?? 1;


// ambil siswa di kelas
$stmt = $mysqli->prepare("SELECT id, nis, nama FROM siswa WHERE id_kelas = ? ORDER BY nama");
$stmt->bind_param('i', $id_kelas);
$stmt->execute();
$res = $stmt->get_result();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$tanggal_post = $_POST['tanggal'];
foreach ($_POST['status'] as $id_siswa => $status) {
$keterangan = $mysqli->real_escape_string($_POST['keterangan'][$id_siswa] ?? '');
// upsert sederhana: hapus dulu lalu insert
$mysqli->query("DELETE FROM absensi WHERE id_siswa={$id_siswa} AND tanggal='{$tanggal_post}'");
$mysqli->query("INSERT INTO absensi (id_siswa,tanggal,status,keterangan,id_guru) VALUES ({$id_siswa},'{$tanggal_post}','{$mysqli->real_escape_string($status)}','{$keterangan}', {$_SESSION['user_id']})");
}
$msg = 'Absensi tersimpan.';
}
?>


<!doctype html>
<html><head><meta charset="utf-8"><title>Input Absensi</title></head><body>
<h2>Input Absensi - <?=htmlspecialchars($tanggal)?></h2>
<?php if (!empty($msg)) echo "<p style='color:green;'>$msg</p>"; ?>
<form method="post">
<label>Tanggal: <input type="date" name="tanggal" value="<?=htmlspecialchars($tanggal)?>"></label>
<table border="1" cellpadding="6">
<tr><th>NIS</th><th>Nama</th><th>Status</th><th>Keterangan</th></tr>
<?php while ($row = $res->fetch_assoc()): ?>
<tr>
<td><?=htmlspecialchars($row['nis'])?></td>
<td><?=htmlspecialchars($row['nama'])?></td>
<td>
<select name="status[<?= $row['id'] ?>]">
<option value="Hadir">Hadir</option>
<option value="Izin">Izin</option>
<option value="Sakit">Sakit</option>
<option value="Alpha">Alpha</option>
</select>
</td>
<td><input name="keterangan[<?= $row['id'] ?>]"></td>
</tr>
<?php endwhile; ?>
</table>
<button type="submit">Simpan Absensi</button>
</form>
</body></html>