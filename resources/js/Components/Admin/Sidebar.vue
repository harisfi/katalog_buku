<template>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <Link href="/admin/profil" class="brand-link">
      <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminKatalog</span>
    </Link>
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <Link href="/admin/profil" :class="'nav-link' + (pathNow === '/admin/profil' ? ' active' : '')">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </Link>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <Link href="/admin/master/kategori-buku" :class="'nav-link' + (pathNow === '/admin/master/kategori-buku' ? ' active' : '')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Buku</p>
                </Link>
              </li>
              <li class="nav-item">
                <Link href="/admin/master/tag" :class="'nav-link' + (pathNow === '/admin/master/tag' ? ' active' : '')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tag</p>
                </Link>
              </li>
              <li class="nav-item">
                <Link href="/admin/master/penerbit" :class="'nav-link' + (pathNow === '/admin/master/penerbit' ? ' active' : '')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerbit</p>
                </Link>
              </li>
              <li class="nav-item">
                <Link href="/admin/master/kategori-blog" :class="'nav-link' + (pathNow === '/admin/master/kategori-blog' ? ' active' : '')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Blog</p>
                </Link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <Link href="/admin/konten" :class="'nav-link' + (pathNow === '/admin/konten' ? ' active' : '')">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Konten
              </p>
            </Link>
          </li>
          <li class="nav-item">
            <Link href="/admin/buku" :class="'nav-link' + (pathNow === '/admin/buku' ? ' active' : '')">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku
              </p>
            </Link>
          </li>
          <li class="nav-item">
            <a href="/admin/blog" :class="'nav-link' + (pathNow === '/admin/blog' ? ' active' : '')">
              <i class="nav-icon fab fa-blogger"></i>
              <p>
                Blog
              </p>
            </a>
          </li>
          <li v-if="role === 'superadmin'" class="nav-item">
            <Link href="/admin/user" :class="'nav-link' + (pathNow === '/admin/user' ? ' active' : '')">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Pengaturan User
              </p>
            </Link>
          </li>
          <li class="nav-item">
            <Link href="/admin/ubah-password" :class="'nav-link' + (pathNow === '/admin/ubah-password' ? ' active' : '')">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                Ubah Password
              </p>
            </Link>
          </li>
          <li class="nav-item">
            <Link href="/admin/signout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Sign Out
              </p>
            </Link>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
  name: 'AdminSidebar',
  components: {Link},
  data() {
    return {
      pathNow: window.location.pathname,
      role: null
    };
  },
  methods: {
    async getRoleNow() {
      const config = {
        method: 'get',
        url: '/api/v1/user-role'
      };
      const response = await axios(config);
      const data = response.data;
      this.role = data;
    }
  },
  mounted() {
    this.getRoleNow();
  }
}
</script>

<style>

</style>