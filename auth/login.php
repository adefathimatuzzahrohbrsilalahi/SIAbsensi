<?php
// auth/login.php
session_start();
require_once __DIR__ . '/../inc/koneksi.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$username = $mysqli->real_escape_string($_POST['username']);
$password = $_POST['password'];


$q = $mysqli->query("SELECT * FROM users WHERE username='$username' LIMIT 1");
if ($q && $q->num_rows === 1) {
$user = $q->fetch_object();
// asumsi password di DB sudah di-hash dengan password_hash()
if (password_verify($password, $user->password)) {
$_SESSION['user_id'] = $user->id;
$_SESSION['username'] = $user->username;
$_SESSION['nama'] = $user->nama;
$_SESSION['role'] = $user->role;
header('Location: ../dashboard.php');
exit;
}
}
$err = 'Username atau password salah.';
}
?>


<!-- HTML singkat -->
<!doctype html>
<html>
<head><meta charset="utf-8"><title>Login - Absensi MAN2 Asahan</title>
<link rel="stylesheet" href="../css/style.css"></head>
<body>
<h2>Login</h2>
<?php if (!empty($err)) echo "<p style='color:red;'>$err</p>"; ?>
<form method="post">
<label>Username<br><input name="username" required></label><br>
<label>Password<br><input name="password" type="password" required></label><br>
<button type="submit">Login</button>
</form>
</body>
</html>