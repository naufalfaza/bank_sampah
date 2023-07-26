<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-success">
    <div class="card-header text-center">
      <div class="image mb-3">
        <img src="<?= base_url('assets/images/logo-adiwiyata.jpg') ?>" class="img-circle elevation-2" alt="User Image" style="width: 50%; margin-bottom: 10px; height: 120px;">
      </div>
      <h1><b>BANK</b>SAMPAH</h1>
    </div>
    <div class="card-body">
      <div id="alert">
            
      </div>
      <form action="<?= base_url('login/prosesLogin') ?>" method="post">
        <div class="row">
          <div class="col-12">
            <div class="input-group mb-3">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
            </div>
            <div class="input-group mb-1">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
            </div>
            <p class="text-right">
              <a href="forgot-password.html" style="color: black;">Lupa Password?</a>
            </p>
            <button type="button" class="btn btn-success btn-block" id="btnLogin">Masuk</button>
          </div>
        </div>
      </form>
      <hr>
      <p class="mb-0">
        <a href="<?= base_url("Login/register") ?>" class="text-center" style="color: black;">Belum Punya Akun? <b style="color: green;">Daftar</b></a>
      </p>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    $("#btnLogin").click(function() {
      var user = $("#username").val();
      var pass = $("#password").val();
      if(user.length == "" && pass.length == "") {
        $('#alert').html('Masukan Username & Password !');
        $('#alert').attr('class', 'alert alert-danger alert-dismissible');
        $('#username').attr('style', 'border: 1px solid red;');
        $('#password').attr('style', 'border: 1px solid red;');
      } else if(user.length == "") {
        $('#alert').html('Masukan Username !');
        $('#alert').attr('class', 'alert alert-danger alert-dismissible');
        $('#username').attr('style', 'border: 1px solid red;');
        $('#password').attr('style', '');
      } else if (pass.length == "") {
        $('#alert').html('Masukan Password !');
        $('#alert').attr('class', 'alert alert-danger alert-dismissible');
        $('#password').attr('style', 'border: 1px solid red;');
        $('#username').attr('style', '');
      } else {
        $('#username').attr('style', '');
        $('#password').attr('style', '');
        $.ajax({
          type: "post",
          url: "<?= base_url('Login/prosesLogin') ?>",
          data: {"username":user, "password":pass},
          dataType: 'json',
          success: function(result) {
            if (result.response == "success") {
              if (result.role == 1) {
                $('#alert').html(result.keterangan);
                $('#alert').attr('class', 'alert alert-success alert-dismissible');
                setTimeout(function(){
                   window.location.reload(1);
                }, 2000);
              } else {
                $('#alert').html(result.keterangan);
                $('#alert').attr('class', 'alert alert-success alert-dismissible');
                setTimeout(function(){
                   window.location.reload(1);
                }, 2000);
              }
            } else {
              $('#alert').html(result.keterangan);
              $('#alert').attr('class', 'alert alert-danger alert-dismissible');
              setTimeout(function(){
                 window.location.reload(1);
              }, 3000);
            }
          }
        });
      }
    });
  });
</script>
