<template>
  <AdminLayout :icon="layout.icon" :title="layout.title" :breadcrumb="layout.title">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar User</h3>
        <div class="card-tools">
          <Link href="/admin/user/create" class="btn btn-sm btn-info float-right">
            <i class="fas fa-plus"></i> Tambah User
          </Link>
        </div>
      </div>
      <div class="card-body">
        <div class="col-md-12">
          <form method="POST" action="index.php?include=user">
            <div class="row">
              <div class="col-md-4 bottom-10">
                <input type="text" class="form-control" id="kata_kunci" name="katakunci" value="<?= (isset($katakunci)) ? $katakunci : '' ?>">
              </div>
              <div class="col-md-5 bottom-10">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
              </div>
            </div>
          </form>
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
            <tr>
              <td>$no</td>
              <td>$nama</td>
              <td>$email</td>
              <td>$level</td>
              <td align="center">
                <Link href="/admin/user/1/edit" class="btn btn-xs btn-info mr-1" title="Edit"><i class="fas fa-edit"></i></Link>
                <Link href="/admin/user/1" class="btn btn-xs btn-info mr-1" title="Detail"><i class="fas fa-eye"></i></Link>
                <Link href="#" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></Link>
              </td>
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
  }
}
</script>

<style>

</style>