<template>
  <div>
    <Navbar />
    <section id="blog-header">
      <div class="container">
        <h1 class="text-white">ABOUT US</h1>
      </div>
    </section><br><br>
    <section id="blog-list">
      <main role="main" class="container">
        <div class="row">
          <div class="col-md-9 blog-main">
            <div class="blog-post">
              <h2 class="blog-post-title">{{ about.judul }}</h2>
              {{ about.isi }}
            </div><br><br>
          </div>
          <aside class="col-md-3 blog-sidebar">
            <div class="p-4">
              <h4 class="font-italic">Social Media</h4>
              <ol class="list-unstyled">
                <li><a href="#">GitHub</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
              </ol>
            </div>
          </aside>
        </div>
      </main>
    </section><br><br>
    <Footer />
  </div>
</template>

<script>
import Navbar from "../../Components/User/Navbar.vue";
import Footer from "../../Components/User/Footer.vue";

export default {
  name: 'About',
  components: {
    Navbar,
    Footer
  },
  props: {
    about: Object
  }
}
</script>
