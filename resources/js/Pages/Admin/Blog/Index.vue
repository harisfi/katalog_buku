<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar Blog</h3>
        <div class="card-tools">
          <Link href="/admin/blog/create" class="btn btn-sm btn-info float-right">
            <i class="fas fa-plus"></i> Tambah Blog
          </Link>
        </div>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <form method="POST">
            <div class="row">
              <div class="col-md-4 bottom-10">
                <input type="text" class="form-control" id="kata_kunci" name="katakunci" value="<?= (isset($katakunci)) ? $katakunci : '' ?>">
              </div>
              <div class="col-md-5 bottom-10">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
              </div>
            </div>
          </form>
        </div><br>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th width="30%">Kategori</th>
              <th width="30%">Judul</th>
              <th width="20%">Tanggal</th>
              <th width="15%">
                <center>Aksi</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>$no</td>
              <td>$kategori</td>
              <td>$judul</td>
              <td>$tanggal</td>
              <td align="center">
                <Link href="/admin/blog/1/edit" class="btn btn-xs btn-info mr-1" title="Edit"><i class="fas fa-edit"></i></Link>
                <Link href="/admin/blog/1" class="btn btn-xs btn-info mr-1" title="Detail"><i class="fas fa-eye"></i></Link>
                <Link href="#" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></Link>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AdminLayout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import AdminLayout from '../../../Layouts/Admin';

export default {
  name: 'AdminBlogIndex',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fab fa-blogger',
        title: 'Blog'
      }
    };
  }
}
</script>

<style>

</style>