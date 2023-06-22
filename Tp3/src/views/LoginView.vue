<script setup>
import LoginForm from '@/components/LoginForm.vue';
</script>

<template>
<LoginForm></LoginForm>
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
  },
  mounted(){
            document.title = "Login Page";
        }
 }
</script>

<style scoped>

</style>
