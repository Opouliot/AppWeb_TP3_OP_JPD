<script setup>
import { RouterLink, RouterView } from 'vue-router'
import loginView from '@/views/LoginView.vue';
import navbar from '@/components/Navbar.vue';
</script>

<template>
  <navbar id="navbar"></navbar>
  <RouterView></RouterView>
</template>

<script>
export default {
  name: 'app',
  data() {
    return {
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
