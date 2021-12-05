<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="far fa-list-alt"></i>
          Form Pengaturan Password
        </h3>
      </div>
      <form @submit.prevent="submit" class="form-horizontal">
        <div class="card-body">
          <div class="form-group row">
            <label for="pass_lama" class="col-sm-3 col-form-label">Password Lama</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" id="pass_lama" v-model="form.old_pass" autocomplete="current-password">
            </div>
          </div>
          <div class="form-group row">
            <label for="pass_baru" class="col-sm-3 col-form-label">Password Baru</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" id="pass_baru" v-model="form.password" autocomplete="new-password">
            </div>
          </div>
          <div class="form-group row">
            <label for="konfirmasi" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" id="konfirmasi" v-model="form.password_confirmation" autocomplete="new-password">
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-info float-right">
              <i class="fas fa-save"></i>
              Simpan
            </button>
          </div>
        </div>
      </form>
    </div>
  </AdminLayout>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import AdminLayout from '../../../Layouts/Admin';

export default {
  name: 'AdminUbahPasswordEdit',
  components: {
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-user-lock',
        title: 'Ubah Password'
      },
      form: {
        old_pass: null,
        password: null,
        password_confirmation: null
      }
    };
  },
  mounted() {
    this.showFlashedMessage();
  },
  updated() {
    this.showFlashedMessage();
  },
  methods: {
    submit() {
      Inertia.post('/admin/ubah-password/', this.form);
    },
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

<style>

</style>