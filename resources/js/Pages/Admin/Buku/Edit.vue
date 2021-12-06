<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="far fa-list-alt"></i>
          Form Edit Data Buku
        </h3>
        <div class="card-tools">
          <Link href="/admin/buku" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Kembali
          </Link>
        </div>
      </div>
      <br><br>
      <form @submit.prevent="submit" class="form-horizontal" enctype="multipart/form-data">
        <div class="card-body">
          <div class="form-group row">
            <label for="foto" class="col-sm-3 col-form-label">Cover Buku </label>
            <div class="col-sm-7">
              <div class="custom-file">
                <input type="file" @input="form.cover = $event.target.files[0]" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
              <div v-if="form.progress" class="progress mt-1">
                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" :aria-valuenow="form.progress.percentage" aria-valuemin="0" aria-valuemax="100" style="width: {{ form.progress.percentage }}%">
                  {{ form.progress.percentage }}%
                </div>
              </div>
              <span v-if="errors.cover" class="small text-danger">{{ errors.cover }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori Buku</label>
            <div class="col-sm-7">
              <select class="custom-select" id="kategori" v-model="form.book_category_id">
                <option value="" disabled selected>- Pilih Kategori -</option>
                <option v-for="bc in bookCategories" :key="bc.id" :value="bc.id">{{ bc.kategori_buku }}</option>
              </select>
              <span v-if="errors.book_category_id" class="small text-danger">{{ errors.book_category_id }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="nim" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.judul" id="judul">
              <span v-if="errors.judul" class="small text-danger">{{ errors.judul }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="pengarang" class="col-sm-3 col-form-label">Pengarang</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.pengarang" id="pengarang">
              <span v-if="errors.pengarang" class="small text-danger">{{ errors.pengarang }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="penerbit" class="col-sm-3 col-form-label">Penerbit</label>
            <div class="col-sm-7">
              <select class="custom-select" id="penerbit" v-model="form.publisher_id">
                <option value="" disabled selected>- Pilih penerbit -</option>
                <option v-for="p in publishers" :key="p.id" :value="p.id">{{ p.penerbit }}</option>
              </select>
              <span v-if="errors.publisher_id" class="small text-danger">{{ errors.publisher_id }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="tahun" class="col-sm-3 col-form-label">Tahun Terbit</label>
            <div class="col-sm-7">
              <div class="input-group date">
                <input type="number" class="form-control" v-model="form.tahun_terbit">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
              </div>
              <span v-if="errors.tahun_terbit" class="small text-danger">{{ errors.tahun_terbit }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="sinopsis" class="col-sm-3 col-form-label">Sinopsis</label>
            <div class="col-sm-7">
              <textarea class="form-control" id="editor1"></textarea>
              <span v-if="errors.sinopsis" class="small text-danger">{{ errors.sinopsis }}</span>
            </div>
          </div>
          <div class="form-group row">
            <label for="hobi" class="col-sm-3 col-form-label">Tag</label>
            <div class="col-sm-7">
              <div class="row">
                <div v-for="t in tags" :key="t.id" class="form-check col-4">
                  <input class="form-check-input" type="checkbox" :id="t.id" :value="t.id" v-model="form.tags">
                  <label class="form-check-label" :for="t.id">{{ t.tag }}</label>
                </div>
              </div>
              <span v-if="errors.tags" class="small text-danger">{{ errors.tags }}</span>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-sm-12">
            <button :disabled="form.processing" type="submit" class="btn btn-info float-right">
              <i class="fas fa-plus"></i>
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
  name: 'AdminBukuEdit',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-edit',
        title: 'Edit Buku'
      },
      form: {
        cover: null,
        book_category_id: '',
        judul: null,
        pengarang: null,
        publisher_id: '',
        tahun_terbit: null,
        sinopsis: null,
        tags: []
      }
    };
  },
  props: {
    book: Object,
    bookCategories: Object,
    publishers: Object,
    tags: Object,
    errors: Object
  },
  mounted() {
    this.form.cover = this.book.cover;
    this.form.book_category_id = this.book.book_category_id;
    this.form.judul = this.book.judul;
    this.form.pengarang = this.book.pengarang;
    this.form.publisher_id = this.book.publisher_id;
    this.form.tahun_terbit = this.book.tahun_terbit;
    this.form.sinopsis = this.book.sinopsis;
    this.form.tags = this.book.tags;

    $('#editor1').summernote({
      placeholder: 'Type something...',
      height: 200
    });
    $('#editor1').summernote('code', this.form.sinopsis);
    $('#editor1').on('summernote.change', (_, contents) => {
      this.form.sinopsis = contents;
    });
  },
  methods: {
    submit() {
      Inertia.post('/admin/buku/' + this.book.id, {
        _method: 'put',
        cover: this.form.cover,
        book_category_id: this.form.book_category_id,
        judul: this.form.judul,
        pengarang: this.form.pengarang,
        publisher_id: this.form.publisher_id,
        tahun_terbit: this.form.tahun_terbit,
        sinopsis: this.form.sinopsis,
        tags: this.form.tags,
        is_edit: true
      });
    }
  }
}
</script>

<style>

</style>