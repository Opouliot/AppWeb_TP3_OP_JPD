<template>
    <div>
        <h1>Search Results</h1>
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
        <div class="d-flex justify-content-center">
            <div v-for="n in nbPage" :key="n" class="page-item">
                <a class="page-link" href="#">{{ n }}</a>
            </div>
        </div>
    </div>
</template>
<script>
    import {getAllMovies} from "@/services/APIServices.js";
    import {getMovie} from "@/services/APIServices.js";

    export default {
        emits: ['sendNbMovieFound'],
        props: {
            searchQuery : String,
        },
        data() {
            return {
                movies: [],
                filteredMovies: [],
                movieId: Number,
                searchQueryClean: String,
                nbMovie : Number,
                currentPage: 1,
                perPage: 5,
                nbPage: 0,
            }
        },
        methods: {
            filterMovies() {
                this.searchQueryClean = this.searchQuery.replace(/['"]+/g, '');
                this.searchQueryClean = this.searchQueryClean.trim();
                
                this.filterMovieByTitle();
                this.filterMovieByDescription();
                this.nbMovie = this.filteredMovies.length;
                this.nbPage = Math.ceil(this.nbMovie/this.perPage);
                this.$emit('sendNbMovieFound', this.nbMovie);

                this.filteredMovies = this.filteredMovies.slice(0, 20); // a enlever si pagination
                this.getMovieAvgScore();
                
            },
            filterMovieByTitle(){
                
                let regex = new RegExp(this.searchQueryClean, "i");
                this.movies.forEach((movie) => {
                    if(regex.test(movie.titre)){
                        this.filteredMovies.push(movie);
                    }
                });
            },
            filterMovieByDescription(){
                let regex = new RegExp(this.searchQueryClean, "i");
                this.movies.forEach((movie) => {
                    if(regex.test(movie.description)){
                        this.filteredMovies.push(movie);
                    }
                });
            },
            getMovieAvgScore(){
                this.filteredMovies.forEach(movie =>{
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
        mounted () {
            getAllMovies().then((movies) => {
                this.movies = movies;
            }).then(() => {
                this.filterMovies();
            });
        },
    }
</script>

<style scoped>

</style>