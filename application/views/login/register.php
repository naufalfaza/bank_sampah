<div class="register-box">
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
                  <span class="fas fa-phone-alt"></span>
                </div>
              </div>
              <input type="number" class="form-control" id="noHp" name="noHp" placeholder="No Telepon" autocomplete="off">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fa fa-address-book"></span>
                </div>
              </div>
              <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" autocomplete="off">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
            </div>
            <button type="button" class="btn btn-success btn-block" id="btnRegis">Daftar</button>
          </div>
        </div>
      </form>
      <hr>
      <p class="mb-0">
        <a href="<?= base_url("Login") ?>" class="text-center" style="color: black;">Sudah Punya Akun? <b style="color: green;">Masuk</b></a>
      </p>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {

    $("#btnRegis").click(function() {
      var phone = $("#noHp").val();
      var name = $("#name").val();
      var user = $("#username").val();
      var pass = $("#password").val();
      if (phone.length == "" && name.length == "" && user.length == "" && pass.length == "") {
        $('#alert').html('Harap Isi Data Dengan Benar !');
        $('#alert').attr('class', 'alert alert-danger alert-dismissible');
        $('#noHp').attr('style', 'border: 1px solid red;');
        $('#name').attr('style', 'border: 1px solid red;');
        $('#username').attr('style', 'border: 1px solid red;');
        $('#password').attr('style', 'border: 1px solid red;');
      } else if (phone.length == "") {
        $('#alert').html('Masukan No Telepon !');
        $('#alert').attr('class', 'alert alert-danger alert-dismissible');
        $('#noHp').attr('style', 'border: 1px solid red;');
      } else if (name.length == "") {
        $('#alert').html('Masukan Nama Lengkap !');
        $('#alert').attr('class', 'alert alert-danger alert-dismissible');
        $('#name').attr('style', 'border: 1px solid red;');
        $('#phone').attr('style', '');
      } else if (user.length == "") {
        $('#alert').html('Masukan Username !');
        $('#alert').attr('class', 'alert alert-danger alert-dismissible');
        $('#username').attr('style', 'border: 1px solid red;');
        $('#phone').attr('style', '');
      } else if (pass.length == "") {
        $('#alert').html('Masukan Password !');
        $('#alert').attr('class', 'alert alert-danger alert-dismissible');
        $('#password').attr('style', 'border: 1px solid red;');
        $('#phone').attr('style', '');
      } else {
        $.ajax({
          type: 'post',
          url: '<?= base_url('Login/prosesRegis') ?>',
          data: {'noHp':phone, 'name':name, 'username':user, 'password':pass},
          dataType: 'json',
          success: function(result) {
            if (result.response == "success") {
              $('#alert').html(result.keterangan);
              $('#alert').attr('class', 'alert alert-success alert-dismissible');
              setTimeout(function(){
                 window.location.href = '<?= base_url('login') ?>';
              }, 2000);
            } else {
              $('#alert').html(result.keterangan);
              $('#alert').attr('class', 'alert alert-danger alert-dismissible');
              $('#username').attr('style', 'border: 1px solid red;');
              setTimeout(function(){
                 window.location.reload(1);
              }, 2000);
            }
          }
        });
      }
    });
  });
</script>
