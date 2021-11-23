<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Kategori Buku</h3>
        <div class="card-tools">
          <Link href="/admin/master/kategori-buku/create" class="btn btn-sm btn-info float-right"><i class="fas fa-plus"></i> Tambah Kategori Buku</Link>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="col-md-12">
          <form method="POST">
            <div class="row">
              <div class="col-md-4 bottom-10">
                <input type="text" class="form-control" id="kata_kunci" name="katakunci">
              </div>
              <div class="col-md-5 bottom-10">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp;Search</button>
              </div>
            </div>
          </form>
        </div><br>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th width="80%">Kategori Buku</th>
              <th width="15%">
                <center>Aksi</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>$no</td>
              <td>$kategori_buku</td>
              <td align="center">
                <Link href="/admin/master/kategori-buku/1/edit" class="btn btn-xs btn-info mr-1"><i class="fas fa-edit"></i> Edit</Link>
                <Link href="#" class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Hapus</Link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
      </div>
    </div>
  </AdminLayout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '../../../Layouts/Admin';

export default {
  name: 'AdminKategoriBukuIndex',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-address-book',
        title: 'Kategori Buku'
      }
    };
  }
}
</script>

<style>

</style>