<?php include "layouts/header.php"; ?>

<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card card-sm p-4">
        <h4 class="mb-3">Login</h4>
        <form>
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input class="form-control" value="admin">
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" value="1234">
          </div>
          <button class="btn btn-primary w-100">Masuk</button>
        </form>
      </div>
    </div>
  </div>

</div>

<?php include "layouts/scripts.php"; ?>

<?php include "layouts/footer.php"; ?>