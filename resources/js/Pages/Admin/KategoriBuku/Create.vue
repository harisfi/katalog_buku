<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Kategori Buku</h3>
        <div class="card-tools">
          <Link href="/admin/master/kategori-buku" class="btn btn-sm btn-warning float-right"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</Link>
        </div>
      </div>
      <br>
      <form class="form-horizontal" method="POST">
        <div class="card-body">
          <div class="form-group row">
            <label for="kategoribuku" class="col-sm-3 col-form-label">Kategori Buku</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="kategoribuku" name="kategori_buku" value="">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-sm-10">
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
  name: 'AdminKategoriBukuCreate',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-plus',
        title: 'Tambah Kategori Buku'
      }
    };
  }
}
</script>

<style>

</style>