<script setup>
import LoginForm from '@/components/LoginForm.vue';
</script>

<template>
<LoginForm id="main"></LoginForm>
</template>

<script>
export default {
  name: 'LoginView',
  components: {
    LoginForm
  },
  data() {
    return {
    }
  }
 }
</script>

<style scoped>

</style>
