<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="far fa-list-alt"></i>
          Form Edit Kategori Blog
        </h3>
        <div class="card-tools">
          <Link href="/admin/master/kategori-blog" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Kembali
          </Link>
        </div>
      </div>
      <br>
      <form @submit.prevent="submit" class="form-horizontal">
        <div class="card-body">
          <div class="form-group row">
            <label for="Kategori Blog" class="col-sm-3 col-form-label">Kategori Blog</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.kategori_blog">
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
  name: 'AdminKategoriBlogEdit',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-edit',
        title: 'Edit Kategori Blog'
      },
      form: {
        kategori_blog: null
      }
    };
  },
  props: {
    blogCategory: Object
  },
  mounted() {
    this.form.kategori_blog = this.blogCategory.kategori_blog;
  },
  methods: {
    submit() {
      Inertia.put('/admin/master/kategori-blog/' + this.blogCategory.id, this.form);
    }
  }
}
</script>

<style>

</style>