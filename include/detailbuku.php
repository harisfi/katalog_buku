  <section id="blog-header">
    <div class="container">
      <h1 class="text-white">DETAIL KATALOG</h1>
    </div>
  </section><br><br>
  <section id="katalog-wrapper">
    <main role="main" class="container">
      <div class="row">
        <div class="col-md-9 katalog-detail">
          <?php
          if (isset($_GET['data'])) {
            $id_buku = $_GET['data'];
            $sql_d = "SELECT b.cover, k.kategori_buku, b.judul, b.pengarang, b.tahun_terbit, p.penerbit, b.sinopsis, b.id_kategori_buku FROM buku b INNER JOIN kategori_buku k ON b.id_kategori_buku = k.id_kategori_buku INNER JOIN penerbit p ON b.id_penerbit = p.id_penerbit WHERE b.id_buku = '$id_buku'";
            $query_d = mysqli_query($koneksi, $sql_d);
            while ($data_d = mysqli_fetch_row($query_d)) {
              $id_kategori = $data_d[7];
              // get tag
              $arr_idtag = [];
              $arr_tag = [];
              $sql_tb = "SELECT tb.id_tag, t.tag FROM tag_buku tb INNER JOIN tag t ON tb.id_tag = t.id_tag WHERE tb.id_buku = '$id_buku' ORDER BY t.tag";
              $query_tb = mysqli_query($koneksi, $sql_tb);
              while ($data_tb = mysqli_fetch_row($query_tb)) {
                $arr_idtag[] = $data_tb[0];
                $arr_tag[] = $data_tb[1];
              }
          ?>

              <div class="table-responsive">
                <table class="table table-bordered">
                  <tr>
                    <td width="40%" rowspan="6"><img src="admin/cover/<?= $data_d[0] ?>" class="img-fluid" alt="Books Collection" title="Books"></td>
                    <td colspan="2">
                      <h4><?= $data_d[2] ?></h4>
                    </td>
                  </tr>
                  <tr>
                    <td width="17%"><strong>Penulis</strong></td>
                    <td width="43%"><?= $data_d[3] ?></td>
                  </tr>
                  <tr>
                    <td><strong>Penerbit</strong></td>
                    <td><?= $data_d[5] ?></td>
                  </tr>
                  <tr>
                    <td><strong>Tahun Terbit</strong></td>
                    <td><?= $data_d[4] ?></td>
                  </tr>
                  <tr>
                    <td><strong>Kategori Buku</strong></td>
                    <td><?= $data_d[1] ?></td>
                  </tr>
                  <tr>
                    <td><strong>Tag</strong></td>
                    <td>
                      <?php
                      if (!empty($arr_tag)) {
                        $jml_tag = count($arr_tag);
                        for ($i=0; $i < $jml_tag; $i++) { 
                          if ($i == $jml_tag-1) {
                            echo "<a href='index.php?include=daftar-buku-tag&data=$arr_idtag[$i]'>$arr_tag[$i]</a>";
                          } else {
                            echo "<a href='index.php?include=daftar-buku-tag&data=$arr_idtag[$i]'>$arr_tag[$i]</a>, ";
                          }
                        }
                      }
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <h5>Sinopsis</h5>
                      <?= $data_d[6] ?>
                    </td>
                  </tr>
                </table>
              </div><!-- .table-responsive -->

          <?php
            }
          } else {
            # code...
          }
          ?>
        </div><!-- /.blog-main -->

        <aside class="col-md-3 katalog-sidebar">


          <div class="pl-4 pb-4">
            <h4 class="font-italic">Buku Terkait</h4>
            <ol class="list-unstyled mb-0">
              <?php
              $sql_bt = "SELECT id_buku, judul FROM buku WHERE id_kategori_buku = '$id_kategori' ORDER BY rand() LIMIT 5";
              $query_bt = mysqli_query($koneksi, $sql_bt);
              while ($data_bt = mysqli_fetch_row($query_bt)) {
                echo "<li><a href='index.php?include=detail-buku&data=$data_bt[0]'>$data_bt[1]</a></li>";
              }
              ?>
            </ol>
          </div>

          <div class="pl-4 pb-4">
            <h4 class="font-italic">Categories</h4>
            <ol class="list-unstyled mb-0">
              <?php
              $sql_c = "SELECT id_kategori_buku, kategori_buku FROM kategori_buku ORDER BY kategori_buku";
              $query_c = mysqli_query($koneksi, $sql_c);
              while ($data_c = mysqli_fetch_row($query_c)) {
                echo "<li><a href='index.php?include=daftar-buku-kategori&data=$data_c[0]'>$data_c[1]</a></li>";
              }
              ?>
          </div>

          <div class="p-4">
            <h4 class="font-italic">Tag</h4>
            <ol class="list-unstyled">
              <?php
              $sql_t = "SELECT id_tag, tag FROM tag ORDER BY tag";
              $query_t = mysqli_query($koneksi, $sql_t);
              while ($data_t = mysqli_fetch_row($query_t)) {
                echo "<li><a href='index.php?include=daftar-buku-tag&data=$data_t[0]'>$data_t[1]</a></li>";
              }
              ?>
            </ol>
          </div>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </main><!-- /.container -->
  </section><br><br>