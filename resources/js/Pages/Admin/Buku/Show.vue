<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <Link href="/admin/buku" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i> Kembali
          </Link>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td><strong>Cover Buku</strong></td>
              <td><img src="cover/<?= $cover ?>" class="img-fluid" width="200px;"></td>
            </tr>
            <tr>
              <td width="20%"><strong>Kategori Buku</strong></td>
              <td width="80%">$kategori</td>
            </tr>
            <tr>
              <td width="20%"><strong>Judul</strong></td>
              <td width="80%">$judul</td>
            </tr>
            <tr>
              <td width="20%"><strong>Pengarang</strong></td>
              <td width="80%">$pengarang</td>
            </tr>
            <tr>
              <td width="20%"><strong>Penerbit</strong></td>
              <td width="80%">$penerbit</td>
            </tr>
            <tr>
              <td width="20%"><strong>Tahun Terbit</strong></td>
              <td width="80%">$tahun</td>
            </tr>
            <tr>
              <td><strong>Tag</strong></td>
              <td>
                <ul>
                  <li>$data_k[0]</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td width="20%"><strong>Sinopsis</strong></td>
              <td width="80%">$sinopsis</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer clearfix">&nbsp;</div>
    </div>
  </AdminLayout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import AdminLayout from '../../../Layouts/Admin';

export default {
  name: 'AdminBukuShow',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-book',
        title: 'Detail Buku'
      }
    };
  }
}
</script>

<style>

</style>