<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <Link class="navbar-brand" href="/">Katalog Buku</Link>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <Link :class="'nav-link' + (pathNow === '/' ? ' active' : '')" href="/">Home <span class="sr-only">(current)</span></Link>
          </li>
          <li class="nav-item">
            <Link :class="'nav-link' + (pathNow === '/about-us' ? ' active' : '')" href="/about-us">About Us</Link>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Kategori</a>
            <div class="dropdown-menu" aria-labelledby="dropdown07">
              <Link v-for="cat in bookCategories" :key="cat.id" class="dropdown-item" :href="'/daftar-buku-kategori/' + cat.id">{{ cat.kategori_buku }}</Link>
            </div>
          </li>
          <li class="nav-item">
            <Link :class="'nav-link' + (pathNow === '/blog' ? ' active' : '')" href="/blog">Blog</Link>
          </li>
          <li class="nav-item">
            <Link :class="'nav-link' + (pathNow === '/contact-us' ? ' active' : '')" href="/contact-us">Contact Us</Link>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default {
  name: 'Navbar',
  components: {
    Link
  },
  data() {
    return {
      pathNow: window.location.pathname
    };
  },
  props: {
    bookCategories: Array
  }
}
</script>

<style>

</style>