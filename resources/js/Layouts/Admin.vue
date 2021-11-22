<template>
  <div class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <Header />
      <Sidebar />
      <div class="content-wrapper">
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h3><i :class="icon"></i> {{title}}</h3>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">{{breadcrumb}}</li>
                </ol>
              </div>
            </div>
          </div>
        </section>
        <section class="content">
          <slot></slot>
        </section>
      </div>
      <Footer />
    </div>
  </div>
</template>

<script>
import Header from '../Components/Admin/Header';
import Sidebar from '../Components/Admin/Sidebar';
import Footer from '../Components/Admin/Footer';

export default {
  name: 'AdminLayout',
  components: {
    Header,
    Sidebar,
    Footer
  },
  props: {
    icon: String,
    title: String,
    breadcrumb: String
  }
}
</script>

<style>

</style>