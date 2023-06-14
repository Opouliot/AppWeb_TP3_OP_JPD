<script setup>
import { RouterLink, RouterView } from 'vue-router'
import loginView from '@/views/LoginView.vue';
import navbarAdmin from '@/components/NavbarAdmin.vue';
</script>

<template>
  <navbar-admin id="nav"></navbar-admin>
  <login-view id="main"></login-view>
</template>

<script>
export default {
  name: 'app',
  components: {
    loginView: loginView

  },
  data() {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  }
 }
</script>

<style scoped>
.main {
  margin: 0 0;
  width: 100%;
  max-width: 1200px;
}
</style>
