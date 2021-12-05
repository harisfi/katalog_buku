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
            <Link href="/admin/profil" :class="'nav-link' + activeMatch(/\/admin\/profil*/g)">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </Link>
          </li>
          <li :class="'nav-item has-treeview' + (menuOpened ? ' menu-open' : '')">
            <a href="#" class="nav-link" :style="menuOpened ? 'display: block' : ''">
              <i class="nav-icon fas fa-database"></i>
              <p>
                Data Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <Link href="/admin/master/kategori-buku" :class="'nav-link' + activeMatch(/\/admin\/master\/kategori-buku*/g)">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Buku</p>
                </Link>
              </li>
              <li class="nav-item">
                <Link href="/admin/master/tag" :class="'nav-link' + activeMatch(/\/admin\/master\/tag*/g)">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tag</p>
                </Link>
              </li>
              <li class="nav-item">
                <Link href="/admin/master/penerbit" :class="'nav-link' + activeMatch(/\/admin\/master\/penerbit*/g)">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Penerbit</p>
                </Link>
              </li>
              <li class="nav-item">
                <Link href="/admin/master/kategori-blog" :class="'nav-link' + activeMatch(/\/admin\/master\/kategori-blog*/g)">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori Blog</p>
                </Link>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <Link href="/admin/konten" :class="'nav-link' + activeMatch(/\/admin\/konten*/g)">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Konten
              </p>
            </Link>
          </li>
          <li class="nav-item">
            <Link href="/admin/buku" :class="'nav-link' + activeMatch(/\/admin\/buku*/g)">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku
              </p>
            </Link>
          </li>
          <li class="nav-item">
            <Link href="/admin/blog" :class="'nav-link' + activeMatch(/\/admin\/blog*/g)">
              <i class="nav-icon fab fa-blogger"></i>
              <p>
                Blog
              </p>
            </Link>
          </li>
          <li v-if="level === 'superadmin'" class="nav-item">
            <Link href="/admin/user" :class="'nav-link' + activeMatch(/\/admin\/user*/g)">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                Pengaturan User
              </p>
            </Link>
          </li>
          <li class="nav-item">
            <Link href="/admin/ubah-password" :class="'nav-link' + activeMatch(/\/admin\/ubah-password*/g)">
              <i class="nav-icon fas fa-user-lock"></i>
              <p>
                Ubah Password
              </p>
            </Link>
          </li>
          <li class="nav-item">
            <Link @click="confirmLogout()" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
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
import { Inertia } from '@inertiajs/inertia';

export default {
  name: 'AdminSidebar',
  components: {Link},
  data() {
    return {
      pathNow: window.location.pathname,
      level: this.$page.props.level,
      menuOpened: false
    };
  },
  methods: {
    matcher(regex) {
      return this.pathNow.match(regex);
    },
    activeMatch(regex) {
      return this.matcher(regex) ? ' active' : '';
    },
    confirmLogout() {
      Swal.fire({
        title: 'Are you sure?',
        text: "You will be logged out!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, log out!'
      }).then((result) => {
        if (result.isConfirmed) {
          Inertia.get('/logout');
        }
      })
    }
  },
  mounted() {
    this.menuOpened = this.matcher(/\/admin\/master*/g) != null;
  }
}
</script>

<style>

</style>