<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Pengaturan Password</h3>
      </div>
      <form class="form-horizontal" method="POST">
        <div class="card-body">
          <div class="form-group row">
            <label for="pass_lama" class="col-sm-3 col-form-label">Password Lama</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" id="pass_lama" name="pass_lama" value="" autocomplete="current-password">
            </div>
          </div>
          <div class="form-group row">
            <label for="pass_baru" class="col-sm-3 col-form-label">Password Baru</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" id="pass_baru" name="pass_baru" value="" autocomplete="new-password">
            </div>
          </div>
          <div class="form-group row">
            <label for="konfirmasi" class="col-sm-3 col-form-label">Konfirmasi Password Baru</label>
            <div class="col-sm-7">
              <input type="password" class="form-control" id="konfirmasi" name="konfirmasi" value="" autocomplete="new-password">
              <span id="validator-output"></span>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-sm-10">
            <button type="submit" id="submit" class="btn btn-info float-right" disabled><i class="fas fa-save"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </AdminLayout>
</template>

<script>
import AdminLayout from '../../../Layouts/Admin';

export default {
  name: 'AdminUbahPasswordIndex',
  components: {
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-user-lock',
        title: 'Ubah Password'
      }
    };
  }
}
</script>

<style>

</style>