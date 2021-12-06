<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="far fa-list-alt"></i>
          Form Edit Data Blog
        </h3>
        <div class="card-tools">
          <Link href="/admin/blog" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Kembali
          </Link>
        </div>
      </div>
      <br><br>
      <form @submit.prevent="submit" class="form-horizontal">
        <div class="card-body">
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori Blog</label>
            <div class="col-sm-7">
              <select class="custom-select" id="kategori" v-model="form.blog_category_id">
                <option value="" disabled selected>- Pilih Kategori -</option>
                <option v-for="c in blogCategories" :key="c.id" :value="c.id">{{ c.kategori_blog }}</option>
              </select>
              <span v-if="errors.blog_category_id" class="small text-danger">{{ errors.blog_category_id }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.judul" id="judul">
              <span v-if="errors.judul" class="small text-danger">{{ errors.judul }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="isi" class="col-sm-3 col-form-label">Isi</label>
            <div class="col-sm-7">
              <textarea class="form-control" id="editor1"></textarea>
              <span v-if="errors.isi" class="small text-danger">{{ errors.isi }}</span>
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
  name: 'AdminBlogEdit',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-edit',
        title: 'Edit Blog'
      },
      form: {
        blog_category_id: '',
        judul: null,
        isi: null
      }
    };
  },
  props: {
    blog: Object,
    blogCategories: Array,
    errors: Object
  },
  mounted() {
    this.form.judul = this.blog.judul;
    this.form.isi = this.blog.isi;
    this.form.blog_category_id = this.blog.blog_category_id;

    $('#editor1').summernote({
      placeholder: 'Type something...',
      height: 200
    });
    $('#editor1').summernote('code', this.form.isi);
    $('#editor1').on('summernote.change', (_, contents) => {
      this.form.isi = contents;
    });
  },
  methods: {
    submit() {
      Inertia.put('/admin/blog/' + this.blog.id, this.form);
    }
  }
}
</script>
