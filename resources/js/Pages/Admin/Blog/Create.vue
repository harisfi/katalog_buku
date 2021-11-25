<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data Blog</h3>
        <div class="card-tools">
          <Link href="/admin/blog" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i> Kembali
          </Link>
        </div>
      </div>
      <br><br>
      <form class="form-horizontal" method="POST">
        <div class="card-body">
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori Blog</label>
            <div class="col-sm-7">
              <select class="custom-select" id="kategori" name="kategori">
                <option value="0" disabled selected>- Pilih Kategori -</option>
                <option value="<?= $id_kategori ?>">$kategori</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="judul" id="judul" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="isi" class="col-sm-3 col-form-label">Isi</label>
            <div class="col-sm-7">
              <textarea class="form-control" name="isi" id="editor1" rows="12"></textarea>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
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
  name: 'AdminBlogCreate',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-plus',
        title: 'Tambah Blog'
      }
    };
  }
}
</script>

<style>

</style>