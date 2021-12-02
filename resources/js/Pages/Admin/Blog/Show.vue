<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <Link href="/admin/blog" class="btn btn-sm btn-warning float-right">
            <i class="fas fa-arrow-alt-circle-left"></i>
            Kembali
          </Link>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td width="20%"><strong>Tanggal</strong></td>
              <td width="80%">{{ blog.tanggal }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Kategori Blog</strong></td>
              <td width="80%">{{ blog.blog_category.kategori_blog }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Judul</strong></td>
              <td width="80%">{{ blog.judul }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Penulis</strong></td>
              <td width="80%">{{ blog.user.name }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Isi</strong></td>
              <td width="80%" v-html="blog.isi"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </AdminLayout>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import AdminLayout from '../../../Layouts/Admin';

export default {
  name: 'AdminBlogShow',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fab fa-blogger',
        title: 'Detail Blog'
      }
    };
  },
  props: {
    blog: Object
  }
}
</script>

<style>

</style>