<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="fas fa-list-ul"></i>
          Daftar Buku
        </h3>
        <div class="card-tools">
          <Link href="/admin/buku/create" class="btn btn-sm btn-info float-right">
            <i class="fas fa-plus"></i>
            Tambah Buku
          </Link>
        </div>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-4 bottom-10">
              <input type="text" class="form-control" v-model="katakunci">
            </div>
            <div class="col-md-5 bottom-10">
              <Link :href="'/admin/buku?q=' + katakunci" class="btn btn-primary">
                <i class="fas fa-search"></i>
                Search
              </Link>
            </div>
          </div>
        </div><br>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th width="5%">No</th>
              <th width="30%">Kategori</th>
              <th width="30%">Judul</th>
              <th width="20%">Penerbit</th>
              <th width="15%">
                <center>Aksi</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="b in books.data" :key="books.data.indexOf(b)">
              <td>{{ books.from + books.data.indexOf(b) }}</td>
              <td>{{ b.book_category }}</td>
              <td>{{ b.judul }}</td>
              <td>{{ b.publisher.penerbit }}</td>
              <td align="center">
                <Link :href="`/admin/buku/${b.id}/edit`" class="btn btn-xs btn-info mr-1">
                  <i class="fas fa-edit"></i>
                </Link>
                <Link :href="`/admin/buku/${b.id}`" class="btn btn-xs btn-info mr-1">
                  <i class="fas fa-eye"></i>
                </Link>
                <button @click="deleteItem(b.id)" type="button" class="btn btn-xs btn-warning">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer clearfix">
        <nav aria-label="pagination">
          <ul class="pagination pagination-sm m-0 float-right">
            <li v-if="books.current_page > 1" class="page-item">
              <Link class="page-link" :href="books.first_page_url">First</Link>
            </li>
            <li v-for="l in books.links" :key="books.links.indexOf(l)" :class="'page-item' + (l.active ? ' active' : '') + (l.url ? '' : ' disabled')">
              <Link v-if="l.url && !l.active" class="page-link" :href="l.url" v-html="l.label"></Link>
              <span v-else class="page-link" v-html="l.label"></span>
            </li>
            <li v-if="books.current_page < books.last_page" class="page-item">
              <Link class="page-link" :href="books.last_page_url">Last</Link>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </AdminLayout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';
import AdminLayout from '../../../Layouts/Admin';

export default {
  name: 'AdminBukuIndex',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-book',
        title: 'Buku'
      }
    };
  },
  props: {
    books: Object,
    katakunci: String
  },
  mounted() {
    this.showFlashedMessage();
  },
  updated() {
    this.showFlashedMessage();
  },
  methods: {
    deleteItem(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Inertia.delete('/admin/buku/' + id);
        }
      })
    },
    showFlashedMessage() {
      if (this.$page.props.success != false) {
        Swal.fire(
          this.$page.props.success.title,
          this.$page.props.success.text,
          'success'
        );
      }
      if (this.$page.props.error != false) {
        Swal.fire(
          this.$page.props.error.title,
          this.$page.props.error.text,
          'error'
        );
      }
    }
  }
}
</script>

<style>

</style>