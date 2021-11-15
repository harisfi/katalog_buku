<template>
  <div>
    <Navbar />
    <section id="carousel-item">
      <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/images/slideshow/slide-1.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/images/slideshow/slide-2.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/images/slideshow/slide-3.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>
    <section id="notes-item">
      <div class="container">
        <div class="row featurette">
          <div class="col-md-7">
            <h2 class="featurette-heading">{{ wTitle }}</h2>
            <p class="lead">{{ wContent }}</p>
          </div>
          <div class="col-md-5">
            <img src="/images/undraw_book_lover_mkck.svg" class="img-fluid mx-auto featurette-image"/>
          </div>
        </div>
        <hr class="featurette-divider"/>
      </div>
    </section>
    <!-- #notes-item -->

    <section id="product-item">
      <div class="container">
        <h2>Koleksi Terbaru</h2>
        <div class="row">
          <div v-for="book in books" :key="book.id" class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img :src="'/images/books/' + book.cover " class="img-fluid" alt="Books Collection" title="Books"/>
              <div class="card-body bg-warning">
                <p class="card-text">{{ book.judul }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <Link :href="'/detail-buku/' + book.id " class="btn btn-primary stretched-link" >Detail</Link>
                  </div>
                  <small class="text-muted">{{ book.penerbit }}</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <br /><br /><!-- #product-item -->

    <section id="quotes-item" class="bg-light" style="min-height: 80px; padding: 40px 0px 0px 0px">
      <div class="container">
        <blockquote class="blockquote text-center">
          <p class="mb-0">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer
            posuere erat a ante.
          </p>
          <footer class="blockquote-footer">
            Someone famous in <cite title="Source Title">Source Title</cite>
          </footer>
        </blockquote>
      </div>
    </section>
    <br /><br />

    <section id="blog-item" class="mb-4">
      <div class="container">
        <h2>Blog Terbaru</h2>
        <br />
        <div class="row mb-2">
          <div v-for="blog in blogs" :key="blog.id" class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static bg-light">
                <strong class="d-inline-block mb-2 text-success">{{ blog.kategori }}</strong>
                <Link :href="'/blog/' + blog.id" class="h3 mb-0">{{ blog.judul }}</Link>
                <div class="mb-1 text-muted">{{ formatDate(blog.tanggal) }}</div>
              </div>
              <div class="col-auto d-none d-lg-block">
                <img src="/images/blog.jpg" class="img-fluid" title="book title here"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <Footer />
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import Navbar from "../../Components/User/Navbar.vue";
import Footer from "../../Components/User/Footer.vue";

export default {
  name: "Home",
  components: {
    Navbar,
    Footer,
    Link
  },
  props: {
    wTitle: String,
    wContent: String,
    books: Array,
    blogs: Array
  },
  methods: {
    formatDate(date) {
      let oDate = new Date(date).toISOString().slice(0, 10);
      return oDate;
    }
  }
};
</script>

<style>
</style>