<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <Link href="/admin/profil/edit" class="btn btn-sm btn-info float-right">
            <i class="fas fa-edit"></i> Edit Profil
          </Link>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td colspan="2"><i class="fas fa-user-circle"></i> <strong>PROFIL</strong></td>
            </tr>
            <tr>
              <td width="20%"><strong>Foto</strong></td>
              <td width="80%"><div><img :src="foto" class="img-fluid img-rounded shadow"></div></td>
            </tr>
            <tr>
              <td width="20%"><strong>Nama</strong></td>
              <td width="80%">{{ profile.name }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Email</strong></td>
              <td width="80%">{{ profile.email }}</td>
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
  name: 'AdminProfileIndex',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-user-tie',
        title: 'Profil'
      }
    };
  },
  props: {
    profile: Object,
    foto: String,
  },
  mounted() {
    this.showFlashedMessage();
  },
  updated() {
    this.showFlashedMessage();
  },
  methods: {
    showFlashedMessage() {
      if (this.$page.props.success != false) {
        Swal.fire(
          this.$page.props.success.title,
          this.$page.props.success.text,
          'success'
        );
      }
      if (this.$page.props.error != false) {
        Swal.fire(
          this.$page.props.error.title,
          this.$page.props.error.text,
          'error'
        );
      }
    }
  }
}
</script>
