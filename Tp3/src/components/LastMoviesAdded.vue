<template>
    <div>
        <h1>Last Movies Added</h1>
        <div>
            <ul class="list-group">
                <li v-for="movie in this.filteredFilmList" v-bind:key="movie.id">
                    <span>{{ movie.titre }}</span>
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

    export default {
        data() {
            return {
                filteredFilmList: [],
                movieList: [],
            }
        },
        methods: {
            filterMovieList(){
                getAllMovies().then(response => response.data).then(data => { this.filteredFilmList = data; return data;} );
            }
        },
        mounted() {
            this.filterMovieList();
        },
    }
</script>

<style scoped>

</style>