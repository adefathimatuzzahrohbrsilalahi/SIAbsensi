<?php include "layouts/header.php"; ?>

<style>
/* ===== TEMA PINK LOGIN ===== */

/* Background halaman */
.bg-pink {
  background: linear-gradient(135deg, #ffd6e8, #ffeaf4);
}

/* Card login */
.card-login {
  background-color: #ffffff;
  border-radius: 16px;
}

/* Judul */
.text-pink {
  color: #ff5fa2;
}

/* Tombol pink */
.btn-pink {
  background-color: #ff5fa2;
  border: none;
}

.btn-pink:hover {
  background-color: #ff3f8e;
}

/* Input focus pink */
.form-control:focus {
  border-color: #ff5fa2;
  box-shadow: 0 0 0 0.2rem rgba(255, 95, 162, 0.25);
}

/* Floating label saat aktif */
.form-floating > .form-control:focus ~ label {
  color: #ff5fa2;
}
</style>

<div class="min-vh-100 d-flex align-items-center justify-content-center bg-pink">
  <div class="col-md-4">
    <div class="card card-login shadow-lg border-0 p-4">

      <h3 class="text-center mb-4 fw-semibold text-pink">
        Masuk
      </h3>

      <form action="../controllers/auth/login.php" method="POST">

        <div class="form-floating mb-3">
          <input
            type="text"
            class="form-control rounded-3"
            name="username"
            placeholder="Username"
            required
          >
          <label>Username</label>
        </div>

        <div class="form-floating mb-4">
          <input
            type="password"
            class="form-control rounded-3"
            name="password"
            placeholder="Password"
            required
          >
          <label>Password</label>
        </div>

        <button type="submit" class="btn btn-pink rounded-3 py-2 w-100 fw-semibold text-white">
          Masuk
        </button>

      </form>
    </div>
  </div>
</div>

<?php include "layouts/scripts.php"; ?>
<?php include "layouts/footer.php"; ?>
