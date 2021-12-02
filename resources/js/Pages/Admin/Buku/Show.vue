<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <Link href="/admin/buku" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Kembali
          </Link>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td><strong>Cover Buku</strong></td>
              <td><div><img :src="cover" class="img-fluid"></div></td>
            </tr>
            <tr>
              <td width="20%"><strong>Kategori Buku</strong></td>
              <td width="80%">{{ book.book_category.kategori_buku }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Judul</strong></td>
              <td width="80%">{{ book.judul }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Pengarang</strong></td>
              <td width="80%">{{ book.pengarang }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Penerbit</strong></td>
              <td width="80%">{{ book.publisher.penerbit }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Tahun Terbit</strong></td>
              <td width="80%">{{ book.tahun_terbit }}</td>
            </tr>
            <tr>
              <td><strong>Tag</strong></td>
              <td>
                <ul>
                  <li v-for="t in book.tag" :key="t.id">{{ t.tag }}</li>
                </ul>
              </td>
            </tr>
            <tr>
              <td width="20%"><strong>Sinopsis</strong></td>
              <td width="80%" v-html="book.sinopsis"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer clearfix">&nbsp;</div>
    </div>
  </AdminLayout>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import AdminLayout from '../../../Layouts/Admin';

export default {
  name: 'AdminBukuShow',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-book',
        title: 'Detail Buku'
      }
    };
  },
  props: {
    book: null,
    cover: null
  }
}
</script>

<style>

</style>