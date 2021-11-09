<template>
  <div>
    <Navbar :bookCategories="bookCategories" />
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">BLOG</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9 blog-main">
            <div class="blog-post">
              <h2 class="blog-post-title">{{ blog.judul }}</h2>
              <p class="blog-post-meta">{{ formatDate(blog.tanggal) }} by <a href="#">{{ blog.user.name }}</a> in <a href="#">{{ blog.blog_category.kategori_blog }}</a></p>
              {{ blog.isi }}
            </div><br><br><!-- /.blog-post -->
          </div><!-- /.blog-main -->
          <aside class="col-md-3 blog-sidebar">
            <div class="p-4">
              <h4 class="font-italic">Categories</h4>
              <ol class="list-unstyled mb-0">
                <li v-for="c in blogCategories" :key="c.id"><a href="#">{{ c.kategori_blog }}</a></li>
              </ol>
            </div>
            <div class="p-4">
              <h4 class="font-italic">Archives</h4>
              <ol class="list-unstyled mb-0">
                <li v-for="a in blogArchives" :key="a.id"><a href="#">{{ a.tanggal }}</a></li>
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
import Navbar from "../../../Components/User/Navbar.vue";
import Footer from "../../../Components/User/Footer.vue";

export default {
  name: 'BlogDetail',
  components: {
    Navbar,
    Footer
  },
  props: {
    blog: Object,
    blogCategories: Array,
    blogArchives: Array,
    bookCategories: Array
  },
  methods: {
    formatDate(date) {
      const oDate = new Date(date);
      const formated = oDate.toLocaleString('default', { month: 'long', day: 'numeric', year: 'numeric' });
      return formated;
    }
  }
}
</script>

<style>

</style>