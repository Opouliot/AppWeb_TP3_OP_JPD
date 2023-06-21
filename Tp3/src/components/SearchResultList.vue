<template>
    <div>
        <H1>Search Results</H1>
        <ul class="list-group">
            <li v-for="movie in this.filteredMovies" v-bind:key="movie.id">
                <h4>{{ movie.titre }}</h4>
                <img src="../images/imagePetite.jpg" alt="movie poster">
                <p>Description : {{ movie.description.slice(0,101) + "..." }}</p>
                <p>Rating : {{ movie.classement }}</p>
                <p>Length : {{ movie.longueur }} min</p>
                <p>Average Critics Score : {{ movie.moyenne }}</p>
                <div>
                    <button class="btn btn-success" @click="sendMovieId(movie.id)">See Details</button>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
    import {getAllMovies} from "@/services/APIServices.js";
    import {getMovie} from "@/services/APIServices.js";

    export default {
        props: {
            searchResult : String,
        },
        data() {
            return {
                movies: [],
                filteredMovies: [],
                movieId: Number
            }
        },
        methods: {
            filterMovies() {
                this.filterMovieByTitle();
                this.filterMovieByDescription();
                this.getMovieAvgScore();
            },
            filterMovieByTitle(){
                let regex = new RegExp(this.searchResult, "i");
                this.movies.forEach((movie) => {
                    if(regex.test(movie.titre)){
                        this.filteredMovies.push(movie);
                    }
                });
            },
            filterMovieByDescription(){
                let regex = new RegExp(this.searchResult, "i");
                this.movies.forEach((movie) => {
                    if(regex.test(movie.description)){
                        this.filteredMovies.push(movie);
                    }
                });
            },
            getMovieAvgScore(){
                this.movies.forEach(movie =>{
                    getMovie(movie.id).then(response => response.data)
                                     .then(data => data.critiques)
                                     .then(critiques => {
                                        let totalScore = 0;
                                        let criticNb = 0;
                                        critiques.forEach(critique => {
                                            totalScore += parseFloat(critique.score);
                                            criticNb++;
                                        });
                                        movie.moyenne = (totalScore/criticNb).toFixed(1);
                                     });

                });
            },
            sendMovieId(id){
                this.movieId = id;
            }
        },
        created () {
            getAllMovies().then((response) => {
                this.movies = response.data;
            });
            this.filterMovies();
        },
    }
</script>

<style scoped>

</style>