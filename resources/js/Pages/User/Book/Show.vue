<template>
  <div>
    <Navbar />
      <section id="blog-header">
        <div class="container">
          <h1 class="text-white">DETAIL KATALOG</h1>
        </div>
      </section><br><br>
      <section id="katalog-wrapper">
        <main role="main" class="container">
          <div class="row">
            <div class="col-md-9 katalog-detail">
              <div class="table-responsive">
                <table class="table table-bordered">
                  <tr>
                    <td width="40%" rowspan="6">
                      <img :src="book.cover" class="img-fluid" alt="Books Collection" title="Books">
                    </td>
                    <td colspan="2">
                      <h4>{{ book.judul }}</h4>
                    </td>
                  </tr>
                  <tr>
                    <td width="17%"><strong>Penulis</strong></td>
                    <td width="43%">{{ book.pengarang }}</td>
                  </tr>
                  <tr>
                    <td><strong>Penerbit</strong></td>
                    <td>{{ book.publisher.penerbit }}</td>
                  </tr>
                  <tr>
                    <td><strong>Tahun Terbit</strong></td>
                    <td>{{ book.tahun_terbit }}</td>
                  </tr>
                  <tr>
                    <td><strong>Kategori Buku</strong></td>
                    <td>{{ book.book_category.kategori_buku }}</td>
                  </tr>
                  <tr>
                    <td><strong>Tag</strong></td>
                    <td>
                      <span v-for="t in book.tag" :key="book.tag.indexOf(t)">
                        <a href="#">
                          {{ t.tag }}
                        </a>
                        <span v-if="book.tag.length > 0 && book.tag.indexOf(t) < book.tag.length-1">, </span>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3">
                      <h5>Sinopsis</h5>
                      {{ book.sinopsis }}
                    </td>
                  </tr>
                </table>
              </div><!-- .table-responsive -->
            </div><!-- /.blog-main -->
            <aside class="col-md-3 katalog-sidebar">
              <div class="pl-4 pb-4">
                <h4 class="font-italic">Buku Terkait</h4>
                <ol class="list-unstyled mb-0">
                  <li v-for="r in related" :key="r.id">
                    <Link :href="'/book/' + r.id">{{ r.judul }}</Link>
                  </li>
                </ol>
              </div>
              <div class="pl-4 pb-4">
                <h4 class="font-italic">Categories</h4>
                <ol class="list-unstyled mb-0">
                  <li v-for="c in categories" :key="c.id">
                    <Link :href="'/book-category/' + c.id">{{ c.kategori_buku }}</Link>
                  </li>
                </ol>
              </div>
              <div class="p-4">
                <h4 class="font-italic">Tag</h4>
                <ol class="list-unstyled">
                  <li v-for="t in tags" :key="t.id">
                    <a href="#">{{ t.tag }}</a>
                  </li>
                </ol>
              </div>
            </aside><!-- /.blog-sidebar -->
          </div><!-- /.row -->
        </main><!-- /.container -->
      </section><br><br>
    <Footer />
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import Navbar from "../../../Components/User/Navbar.vue";
import Footer from "../../../Components/User/Footer.vue";

export default {
  name: 'BookDetail',
  components: {
    Link,
    Navbar,
    Footer
  },
  props: {
    book: Object,
    related: Array,
    categories: Array,
    tags: Array
  }
}
</script>

<style>

</style>