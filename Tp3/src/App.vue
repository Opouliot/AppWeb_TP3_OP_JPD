<script setup>
import { RouterLink, RouterView } from 'vue-router'
import test from './components/AddMovieForm.vue';
import FilmDetailView from './views/FilmDetailView.vue';
import MovieCriticForm from './components/MovieCriticForm.vue';
import AddMovieForm from './components/AddMovieForm.vue';
import LastMoviesAdded from './components/LastMoviesAdded.vue';

</script>

<template>
  <LastMoviesAdded/>
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
