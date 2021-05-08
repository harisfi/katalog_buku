<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php include("includes/header.php") ?>
    <?php include("includes/sidebar.php") ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h3><i class="fas fa-user-lock"></i> Ubah Password</h3>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"> Ubah Password</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Pengaturan Password</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form class="form-horizontal" method="POST" action="index.php?include=konfirmasi-edit-password">
            <div class="card-body">
              <h6>
                <?php if (!empty($_GET['notif'])) { ?>
                  <?php if ($_GET['notif'] == "editkosong") { ?>
                    <div class="alert alert-danger" role="alert">
                      Maaf password wajib di isi</div>
                  <?php } elseif ($_GET['notif'] == "editsalah") { ?>
                    <div class="alert alert-danger" role="alert">
                      Maaf password lama salah</div>
                  <?php } elseif ($_GET['notif'] == "editberhasil") { ?>
                    <div class="alert alert-success" role="alert">
                      Berhasil mengganti password</div>
                  <?php } ?>
                <?php } else { ?>
                  <i class="text-blue"><i class="fas fa-info-circle"></i> Silahkan memasukkan password lama dan password baru Anda untuk mengubah password.</i>
                <?php } ?>
              </h6><br>

              <div class="form-group row">
                <label for="pass_lama" class="col-sm-3 col-form-label">Password Lama</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control" id="pass_lama" name="pass_lama" value="" autocomplete="current-password">
                </div>
              </div>
              <div class="form-group row">
                <label for="pass_baru" class="col-sm-3 col-form-label">Password Baru</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control" id="pass_baru" name="pass_baru" value="" autocomplete="new-password">
                </div>
              </div>
              <div class="form-group row">
                <label for="konfirmasi" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
                <div class="col-sm-7">
                  <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" value="" autocomplete="new-password">
                  <span id="validator-output"></span>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <div class="col-sm-10">
                <button type="submit" id="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
              </div>
            </div>
            <!-- /.card-footer -->
          </form>
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include("includes/footer.php") ?>

  </div>
  <!-- ./wrapper -->

  <?php include("includes/script.php") ?>
  <script>
    $(function() {
      $("#validator-output").realtimePasswordValidator({
        debug: true,
        input1: $("#pass_baru"),
        input2: $("#konfirmasi"),
        validators: [{
            regexp: ".{8,}",
            message: "Minimum 8 karakter"
          },
          {
            compare: true,
            message: "Password konfirmasi harus sama"
          }
        ],
        ok: function(instance) {
          console.log("ok");

          $("#submit").removeAttr("disabled");
        },
        ko: function(instance) {
          console.log("ko");
          $("#submit").attr("disabled", "");
        }
      });
    });
  </script>
</body>