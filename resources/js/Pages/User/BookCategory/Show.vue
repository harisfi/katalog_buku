<template>
  <div>
    <Navbar />
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">DAFTAR BUKU</h1>
      </div>
    </section><br><br>
    <section id="katalog-item">
      <main role="main" class="container">
        <h2 class="text-primary">CATEGORIES: {{ category.kategori_buku }}</h2><br><br>
        <div class="row">
          <div class="col-md-9 katalog-main">
            <div class="row">
              <div v-for="book in books" :key="book.id" class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img :src="book.cover" class="img-fluid" alt="Books Collection" title="Books">
                  <div class="card-body bg-warning">
                    <p class="card-text">{{ book.judul }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <Link :href="'/book/' + book.id" class="btn btn-primary stretched-link">Detail</Link>
                      </div>
                      <small class="text-muted">{{ book.publisher.penerbit }}</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-12">
                  <nav aria-label="Page navigation">
                      <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="" ><strong>first</strong></a></li>
                        <li class="page-item"><a class="page-link" href="">1</a></li> 
                        <li class="page-item active"><a class="page-link" href="">2</a></li> 
                        <li class="page-item"><a class="page-link" href="">3</a></li> 
                        <li class="page-item"><a class="page-link" href=""><strong>last</strong></a></li>
                    </ul>
                  </nav>
              </div>  
            </div><!-- .row-->
          </div><!-- /.katalog-main -->
          <aside class="col-md-3 katalog-sidebar">
            <div class="pl-4 pb-4">
              <h4 class="font-italic">Kategori</h4>
              <ol class="list-unstyled mb-0">
                <li v-for="c in categories" :key="c.id">
                  <Link :href="'/book-category/' + c.id">{{ c.kategori_buku }}</Link>
                </li>
              </ol>
            </div>
            <div class="p-4">
              <h4 class="font-italic">Tag</h4>
              <ol class="list-unstyled">
                <li v-for="t in tags" :key="t.id"><a href="#">{{ t.tag }}</a></li>
              </ol>
            </div>
          </aside> <!-- /.katalog-sidebar -->
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
  name: 'BookCategory',
  components: {
    Link,
    Navbar,
    Footer
  },
  props: {
    category: Object,
    books: Array,
    categories: Array,
    tags: Array
  }
}
</script>
