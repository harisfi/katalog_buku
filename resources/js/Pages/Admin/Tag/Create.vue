<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="far fa-list-alt"></i>
          Form Tambah Tag
        </h3>
        <div class="card-tools">
          <Link href="/admin/master/tag" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Kembali
          </Link>
        </div>
      </div>
      <br>
      <form @submit.prevent="submit" class="form-horizontal">
        <div class="card-body">
          <div class="form-group row">
            <label for="tag" class="col-sm-3 col-form-label">Tag</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.tag">
              <span v-if="errors.tag" class="small text-danger">{{ errors.tag }}</span>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-sm-10">
            <button :disabled="form.processing" type="submit" class="btn btn-info float-right">
              <i class="fas fa-plus"></i>
              Tambah
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
  name: 'AdminTagCreate',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-plus',
        title: 'Tambah Tag'
      },
      form: {
        tag: null
      }
    };
  },
  props: {
    errors: Object
  },
  methods: {
    submit() {
      Inertia.post('/admin/master/tag', this.form);
    }
  }
}
</script>
