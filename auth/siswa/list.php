<?php
// siswa/list.php
session_start();
require_once __DIR__ . '/../inc/koneksi.php';


$res = $mysqli->query("SELECT s.*, k.nama_kelas FROM siswa s LEFT JOIN kelas k ON s.id_kelas=k.id ORDER BY s.nama");
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Daftar Siswa</title></head><body>
<h2>Daftar Siswa</h2>
<a href="add.php">Tambah Siswa</a>
<table border="1" cellpadding="6">
<tr><th>NIS</th><th>Nama</th><th>Kelas</th><th>Aksi</th></tr>
<?php while ($row = $res->fetch_assoc()): ?>
<tr>
<td><?=htmlspecialchars($row['nis'])?></td>
<td><?=htmlspecialchars($row['nama'])?></td>
<td><?=htmlspecialchars($row['nama_kelas'])?></td>
<td>
<a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
<a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>
</td>
</tr>
<?php endwhile; ?>
</table>
</body></html>