<template>
    <div>
        <h1>Last Movies Added</h1>
        <div>
            <ul class="list-group">
                <li v-for="movie in this.filteredFilmList" v-bind:key="movie.id">
                    <h4>{{ movie.titre }}</h4>
                    <p>{{ movie.description.slice(0,101) + "..." }}</p>
                    <img src="../images/imagePetite.jpg" alt="affiche du film">
                </li>
            </ul>
            
        </div>
        <div>
            <button class="btn btn-success" @click="filterMovieList">See Details</button>
        </div>
    </div>
</template>

<script>
    import {getAllMovies} from "@/services/APIServices.js";
    import {getMovie} from "@/services/APIServices.js";

    export default {
        data() {
            return {
                filteredFilmList: [],
                movieList: [],
            }
        },
        methods: {
            filterMovieList(){
                getAllMovies()
                            .then(response => response.data)
                            .then(data => {
                                data.sort((a, b) => (b.id - a.id));
                                this.filteredFilmList = data.slice(0,3)});
            }
        },
        mounted() {
            this.filterMovieList();
        },
    }
</script>

<style scoped>

</style>