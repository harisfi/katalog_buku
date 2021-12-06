<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;">
          <i class="fas fa-list-ul"></i>
          Daftar User
        </h3>
        <div class="card-tools">
          <Link href="/admin/user/create" class="btn btn-sm btn-info float-right">
            <i class="fas fa-plus"></i>
            Tambah User
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
              <Link :href="'/admin/user?q=' + katakunci" class="btn btn-primary">
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
              <th width="30%">Nama</th>
              <th width="30%">Email</th>
              <th width="20%">Level</th>
              <th width="15%">
                <center>Aksi</center>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="u in users.data" :key="users.data.indexOf(u)">
              <td>{{ users.from + users.data.indexOf(u) }}</td>
              <td>{{ u.name }}</td>
              <td>{{ u.email }}</td>
              <td>{{ u.level.charAt(0).toUpperCase() + u.level.slice(1) }}</td>
              <td align="center">
                <Link :href="`/admin/user/${u.id}/edit`" class="btn btn-xs btn-info mr-1">
                  <i class="fas fa-edit"></i>
                </Link>
                <Link :href="`/admin/user/${u.id}`" class="btn btn-xs btn-info mr-1">
                  <i class="fas fa-eye"></i>
                </Link>
                <button @click="deleteItem(u.id)" type="button" class="btn btn-xs btn-warning">
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
            <li v-if="users.current_page > 1" class="page-item">
              <Link class="page-link" :href="users.first_page_url">First</Link>
            </li>
            <li v-for="l in users.links" :key="users.links.indexOf(l)" :class="'page-item' + (l.active ? ' active' : '') + (l.url ? '' : ' disabled')">
              <Link v-if="l.url && !l.active" class="page-link" :href="l.url" v-html="l.label"></Link>
              <span v-else class="page-link" v-html="l.label"></span>
            </li>
            <li v-if="users.current_page < users.last_page" class="page-item">
              <Link class="page-link" :href="users.last_page_url">Last</Link>
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
  name: 'AdminUserIndex',
  components: {
    Link,
    AdminLayout
  },
  data() {
    return {
      layout: {
        icon: 'fas fa-user-tie',
        title: 'User'
      }
    };
  },
  props: {
    users: Object,
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
          Inertia.delete('/admin/user/' + id);
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
