<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <Link href="/admin/blog" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i> Kembali
          </Link>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td width="20%"><strong>Tanggal</strong></td>
              <td width="80%">$tanggal</td>
            </tr>
            <tr>
              <td width="20%"><strong>Kategori Blog</strong></td>
              <td width="80%">$kategori</td>
            </tr>
            <tr>
              <td width="20%"><strong>Judul</strong></td>
              <td width="80%">$judul</td>
            </tr>
            <tr>
              <td width="20%"><strong>Penulis</strong></td>
              <td width="80%">$penulis</td>
            </tr>
            <tr>
              <td width="20%"><strong>Isi</strong></td>
              <td width="80%">$isi</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer clearfix">&nbsp;</div>
    </div>
  </AdminLayout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '../../../Layouts/Admin';

export default {
  name: 'AdminBlogShow',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fab fa-blogger',
        title: 'Detail Blog'
      }
    };
  }
}
</script>

<style>

</style>