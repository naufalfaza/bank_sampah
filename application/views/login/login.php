<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <div class="image">
        <img src="<?= base_url('assets/images/logo-adiwiyata.jpg') ?>" class="img-circle elevation-2" alt="User Image" style="width: 50%; margin-bottom: 10px; height: 120px;">
      </div>
      <a href="../../index2.html" class="h1"><b>BANK</b>SAMPAH</a>
    </div>
    <div class="card-body">
      <form action="../../index3.html" method="post">
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <input type="text" class="form-control" placeholder="Username">
        </div>
        <div class="input-group mb-3">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <input type="password" class="form-control" placeholder="Password">
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-success btn-block">Log in</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
      <hr>
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="<?= base_url("Login/register") ?>" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->