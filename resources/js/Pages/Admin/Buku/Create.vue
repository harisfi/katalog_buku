<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="far fa-list-alt"></i>
          Form Tambah Data Buku
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
            <label for="foto" class="col-sm-3 col-form-label">Cover Buku</label>
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
            </div>
          </div>
          <div class="form-group row">
            <label for="kategori" class="col-sm-3 col-form-label">Kategori Buku</label>
            <div class="col-sm-7">
              <select class="custom-select" id="kategori" v-model="form.book_category_id">
                <option value="" disabled selected>- Pilih Kategori -</option>
                <option v-for="bc in bookCategories" :key="bc.id" :value="bc.id">{{ bc.kategori_buku }}</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.judul" id="judul">
            </div>
          </div>
          <div class="form-group row">
            <label for="pengarang" class="col-sm-3 col-form-label">Pengarang</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.pengarang" id="pengarang">
            </div>
          </div>
          <div class="form-group row">
            <label for="penerbit" class="col-sm-3 col-form-label">Penerbit</label>
            <div class="col-sm-7">
              <select class="custom-select" id="penerbit" v-model="form.publisher_id">
                <option value="" disabled selected>- Pilih penerbit -</option>
                <option v-for="p in publishers" :key="p.id" :value="p.id">{{ p.penerbit }}</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="tahun" class="col-sm-3 col-form-label">Tahun Terbit</label>
            <div class="col-sm-7">
              <div class="input-group date">
                <input type="number" class="form-control" v-model="form.tahun_terbit">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="sinopsis" class="col-sm-3 col-form-label">Sinopsis</label>
            <div class="col-sm-7">
              <textarea class="form-control" id="editor1"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label for="tag" class="col-sm-3 col-form-label">Tag</label>
            <div class="col-sm-7">
              <div class="row">
                <div v-for="t in tags" :key="t.id" class="form-check col-4">
                  <input class="form-check-input" type="checkbox" :id="t.id" :value="t.id" v-model="form.tags">
                  <label class="form-check-label" :for="t.id">{{ t.tag }}</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="col-sm-12">
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
  name: 'AdminBukuCreate',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-plus',
        title: 'Tambah Buku'
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
    bookCategories: Array,
    publishers: Array,
    tags: Array
  },
  methods: {
    submit() {
      Inertia.post('/admin/buku', this.form);
    }
  },
  mounted() {
    $('#editor1').summernote({
      placeholder: 'Type something...',
      height: 200
    });
    $('#editor1').on('summernote.change', (_, contents) => {
      this.form.sinopsis = contents;
    });
  }
}
</script>

<style>

</style>