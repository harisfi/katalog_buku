<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <Link href="/admin/user" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i> Kembali
          </Link>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td colspan="2"><i class="fas fa-user-circle"></i> <strong>Data User</strong></td>
            </tr>
            <tr>
              <td><strong>Foto User</strong></td>
              <td><img src="foto/<?= $foto ?>" class="img-fluid img-rounded shadow" width="200px;" loading="lazy"></td>
            </tr>
            <tr>
              <td width="20%"><strong>Nama</strong></td>
              <td width="80%">$nama</td>
            </tr>
            <tr>
              <td width="20%"><strong>Email</strong></td>
              <td width="80%">$email</td>
            </tr>
            <tr>
              <td width="20%"><strong>Level</strong></td>
              <td width="80%">$level</td>
            </tr>
            <tr>
              <td width="20%"><strong>Username</strong></td>
              <td width="80%">$username</td>
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
  name: 'AdminUserShow',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-user-tie',
        title: 'Detail User'
      }
    };
  }
}
</script>

<style>

</style>