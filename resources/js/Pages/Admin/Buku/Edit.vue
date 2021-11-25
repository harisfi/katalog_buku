<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Buku</h3>
        <div class="card-tools">
          <Link href="/admin/buku" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i> Kembali
          </Link>
        </div>
      </div>
      <br><br>
      <form class="form-horizontal" method="POST" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Cover Buku </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="cover" id="customFile">
                <label class="custom-file-label" for="customFile">$cover</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori Buku</label>
            <div class="col-sm-7">
              <select class="custom-select" id="kategori" name="kategori">
                <option value="0" disabled selected>- Pilih Kategori -</option>
                <option value="<?= $id_kategori ?>">$kategori</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="nim" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="judul" id="judul" value="<?= $judul ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="pengarang" class="col-sm-3 col-form-label">Pengarang</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="pengarang" id="pengarang" value="<?= $pengarang ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="penerbit" class="col-sm-3 col-form-label">Penerbit</label>
            <div class="col-sm-7">
              <select class="custom-select" id="penerbit" name="penerbit">
                <option value="0" disabled selected>- Pilih penerbit -</option>
                <option value="<?= $id_penerbit ?>">$penerbit</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="tahun" class="col-sm-3 col-form-label">Tahun Terbit</label>
            <div class="col-sm-7">
              <div class="input-group date">
                <input type="text" class="form-control" name="tahun" id="datepicker-year" autocomplete="off" value="<?= $tahun ?>">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="sinopsis" class="col-sm-3 col-form-label">Sinopsis</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="sinopsis" id="editor1" rows="12"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="hobi" class="col-sm-3 col-form-label">Tag</label>
            <div class="col-sm-7">
              <div class="row">
                <div class="form-check col-4">
                  <input class="form-check-input" type="checkbox" name="tag[]" id="<?= $id_tag ?>" value="<?= $id_tag ?>">
                  <label class="form-check-label" for="<?= $id_tag ?>">$tag</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </AdminLayout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '../../../Layouts/Admin';

export default {
  name: 'AdminBukuEdit',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-edit',
        title: 'Edit Buku'
      }
    };
  }
}
</script>

<style>

</style>