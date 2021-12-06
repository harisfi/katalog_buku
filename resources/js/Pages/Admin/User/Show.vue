<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <Link href="/admin/user" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Kembali
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
              <td><div><img :src="foto" class="img-fluid img-rounded shadow"></div></td>
            </tr>
            <tr>
              <td width="20%"><strong>Nama</strong></td>
              <td width="80%">{{ user.name }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Email</strong></td>
              <td width="80%">{{ user.email }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Level</strong></td>
              <td width="80%">{{ user.level.charAt(0).toUpperCase() + user.level.slice(1) }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Username</strong></td>
              <td width="80%">{{ user.username }}</td>
            </tr>
          </tbody>
        </table>
      </div>
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
  },
  props: {
    user: null,
    foto: null
  }
}
</script>
