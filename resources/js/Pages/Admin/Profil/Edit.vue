<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="far fa-list-alt"></i>
          Form Edit Profil
        </h3>
        <div class="card-tools">
          <Link href="/admin/profil" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Kembali
          </Link>
        </div>
      </div>
      <br>
      <form @submit.prevent="submit" class="form-horizontal" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label"><span class="text-info">
              <i class="fas fa-user-circle"></i> <u>PROFIL USER</u></span>
            </label>
          </div>
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Foto</label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" @input="form.foto = $event.target.files[0]" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <div v-if="form.progress" class="progress mt-1">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" :aria-valuenow="form.progress.percentage" aria-valuemin="0" aria-valuemax="100" style="width: {{ form.progress.percentage }}%">
                  {{ form.progress.percentage }}%
                </div>
              </div>
              <span v-if="errors.foto" class="small text-danger">{{ errors.foto }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.name" id="nama">
              <span v-if="errors.name" class="small text-danger">{{ errors.name }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.email" id="email">
              <span v-if="errors.email" class="small text-danger">{{ errors.email }}</span>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-sm-12">
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
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import AdminLayout from '../../../Layouts/Admin';

export default {
  name: 'AdminProfileEdit',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-user-tie',
        title: 'Edit Profil'
      },
      form: {
        foto: null,
        name: null,
        email: null
      }
    };
  },
  props: {
    profile: Object,
    errors: Object
  },
  mounted() {
    this.form.name = this.profile.name;
    this.form.email = this.profile.email;
  },
  methods: {
    submit() {
      Inertia.post('/admin/profil/', {
        foto: this.form.foto,
        name: this.form.name,
        email: this.form.email
      });
    }
  }
}
</script>

<style>

</style>