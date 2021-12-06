<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="far fa-list-alt"></i>
          Form Edit Data User
        </h3>
        <div class="card-tools">
          <Link href="/admin/user" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Kembali
          </Link>
        </div>
      </div>
      <br>
      <form @submit.prevent="submit" class="form-horizontal" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-12 col-form-label">
              <span class="text-info">
                <i class="fas fa-user-circle"></i>
                <u>Data User</u>
              </span>
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
          <div class="form-group row">
            <label for="username" class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.username" id="username">
              <span v-if="errors.username" class="small text-danger">{{ errors.username }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="password" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.password" id="password">
              <span class="text-danger" style="font-weight:lighter;font-size:12px">
                *Jangan diisi jika tidak ingin mengubah password
              </span>
              <span v-if="errors.password" class="small text-danger">{{ errors.password }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="level" class="col-sm-3 col-form-label">Level</label>
            <div class="col-sm-7">
              <select class="form-control" id="level" v-model="form.level">
                <option value="" disabled selected>- Pilih Level -</option>
                <option value="superadmin">Superadmin</option>
                <option value="admin">Admin</option>
              </select>
              <span v-if="errors.level" class="small text-danger">{{ errors.level }}</span>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-sm-12">
            <button :disabled="form.processing" type="submit" class="btn btn-info float-right">
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
  name: 'AdminUserEdit',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-edit',
        title: 'Edit User'
      },
      form: {
        foto: null,
        name: null,
        email: null,
        username: null,
        password: null,
        level: ''
      }
    };
  },
  props: {
    user: Object,
    errors: Object
  },
  mounted() {
    this.form.name = this.user.name;
    this.form.email = this.user.email;
    this.form.username = this.user.username;
    this.form.level = this.user.level;
  },
  methods: {
    submit() {
      Inertia.post('/admin/user/' + this.user.id, {
        _method: 'put',
        id: this.user.id,
        foto: this.form.foto,
        name: this.form.name,
        email: this.form.email,
        username: this.form.username,
        password: this.form.password,
        level: this.form.level,
        is_edit: true
      });
    }
  }
}
</script>
