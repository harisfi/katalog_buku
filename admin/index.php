<?php
include("./includes/auth.php");
?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head.php") ?>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Admin</b>Katalog Buku</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php if (!empty($_GET['gagal'])) { ?>
          <?php if ($_GET['gagal'] == "userKosong") { ?>
            <span class="text-danger">
              Maaf Username Tidak Boleh Kosong
            </span>
          <?php } else if ($_GET['gagal'] == "passKosong") { ?>
            <span class="text-danger">
              Maaf Password Tidak Boleh Kosong
            </span>
          <?php } else { ?>
            <span class="text-danger">
              Maaf Username dan Password Anda Salah
            </span>
          <?php } ?>
        <?php } ?>
        <form action="konfirmasilogin.php" method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username" />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3" id="showHidePassword">
            <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="current-password" />
            <div class="input-group-append">
                <a href="" class="input-group-text"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="row">
            <div class="col-8"></div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="login" value="login" class="btn btn-primary btn-block">
                Sign In
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <?php include("includes/script.php") ?>
</body>

</html>