<template>
  <div class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <Link href="/">
          <b>Admin</b>
          Katalog Buku
        </Link>
      </div>
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>
          <form @submit.prevent="submit">
            <div class="input-group mb-3">
              <input type="text" v-model="form.username" class="form-control" placeholder="Username"/>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3" id="showHidePassword">
              <input :type="showPass ? 'text' : 'password'" v-model="form.password" class="form-control" placeholder="Password" autocomplete="current-password"/>
              <div class="input-group-append">
                <button type="button" @click="showPass = !showPass" class="input-group-text">
                  <i :class="'fa fa-eye' + (!showPass ? '-slash' : '')" aria-hidden="true"></i>
                </button>
              </div>
            </div>
            <div class="row">
              <div class="col-8"></div>
              <div class="col-4">
                <button type="submit" name="login" value="login" class="btn btn-primary btn-block">
                  Sign In
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import { Inertia } from '@inertiajs/inertia';

export default {
  name: 'Login',
  components: {
    Link
  },
  data() {
    return {
      showPass: false,
      showMsg: false,
      form: {
        username: null,
        password: null
      }
    };
  },
  mounted() {
    this.showFlashedMessage();
  },
  updated() {
    this.showFlashedMessage();
  },
  methods: {
    submit() {
      this.showMsg = true;
      Inertia.post('/login', this.form);
    },
    showFlashedMessage() {
      if (this.$page.props.error != false && this.showMsg) {
        Swal.fire(
          this.$page.props.error.title,
          this.$page.props.error.text,
          'error'
        );
      }
      this.showMsg = false;
    }
  }
}
</script>
