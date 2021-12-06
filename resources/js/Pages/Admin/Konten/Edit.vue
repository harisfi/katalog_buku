<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="far fa-list-alt"></i>
          Form Edit Konten
        </h3>
        <div class="card-tools">
          <Link href="/admin/konten" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Kembali
          </Link>
        </div>
      </div>
      <br><br>
      <form @submit.prevent="submit" class="form-horizontal">
        <div class="card-body">
          <div class="form-group row">
            <label for="judul" class="col-sm-3 col-form-label">Judul</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" v-model="form.judul">
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
  name: 'AdminKontenEdit',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-edit',
        title: 'Edit Konten'
      },
      form: {
        judul: null,
        isi: null
      }
    };
  },
  props: {
    content: Object,
    errors: Object
  },
  mounted() {
    this.form.judul = this.content.judul;
    this.form.isi = this.content.isi;

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
      Inertia.put('/admin/konten/' + this.content.id, this.form);
    }
  }
}
</script>
