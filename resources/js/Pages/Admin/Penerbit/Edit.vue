<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="far fa-list-alt"></i>
          Form Edit Penerbit
        </h3>
        <div class="card-tools">
          <Link href="/admin/master/penerbit" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Kembali
          </Link>
        </div>
      </div>
      <br>
      <form @submit.prevent="submit" class="form-horizontal">
        <div class="card-body">
          <div class="form-group row">
            <label for="Penerbit" class="col-sm-3 col-form-label">Penerbit</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.penerbit">
              <span v-if="errors.penerbit" class="small text-danger">{{ errors.penerbit }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="isi" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-7">
              <textarea class="form-control" rows="3" v-model="form.alamat"></textarea>
              <span v-if="errors.alamat" class="small text-danger">{{ errors.alamat }}</span>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-sm-10">
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
  name: 'AdminPenerbitEdit',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-edit',
        title: 'Edit Penerbit'
      },
      form: {
        penerbit: null,
        alamat: null
      }
    };
  },
  props: {
    publisher: Object,
    errors: Object
  },
  mounted() {
    this.form.penerbit = this.publisher.penerbit;
    this.form.alamat = this.publisher.alamat;
  },
  methods: {
    submit() {
      Inertia.put('/admin/master/penerbit/' + this.publisher.id, this.form);
    }
  }
}
</script>
