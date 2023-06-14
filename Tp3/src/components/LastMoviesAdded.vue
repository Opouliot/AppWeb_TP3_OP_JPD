<template>
    <div>
        <h1>Last Movies Added</h1>
        <div>
            <ul class="list-group">
                <li v-for="movie in filteredFilmList" v-bind:key="movie.id">
                    <span>{{ movie.title }}</span>
                    <span></span>
                    <span></span>
                    <span></span>
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
                let filteredResult = [];
                getAllMovies().then(response => console.log(response.data)).then(data => this.filteredResult = data);
                console.log(filteredResult);
        },
        created () {
            this.filterMovieList();
        },
}
    }
</script>

<style scoped>

</style>