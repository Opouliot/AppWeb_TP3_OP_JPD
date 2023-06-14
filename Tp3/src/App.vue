<script setup>
import { RouterLink, RouterView } from 'vue-router'
import test from '@/views/LoginView.vue';
</script>

<template>
  <test id="main"></test>
</template>

<script>
export default {
  name: 'app',
  components: {
    test
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
