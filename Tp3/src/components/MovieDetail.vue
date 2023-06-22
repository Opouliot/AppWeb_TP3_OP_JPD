<template>
    <div>
        <h1>{{ this.movie.titre }}</h1>
        <img src="../images/imageGrande.jpg" alt="movie poster">
        <p>Critics Average : {{ getAvgCritics() }}</p>
        <p>Number of Critics : {{ this.critics.length }}</p>
        <p> Description: {{ this.movie.description }}</p>
        <p>Rating : {{ this.movie.classement }}</p>
        <p>Length : {{ this.movie.longueur }} min</p>
        <p>Release Year : {{ this.movie.annee }}</p>
        <p>Actors : </p>
        <ul>
            <li v-for="actor in actors">
                <p>{{ actor.first_name }}</p>
                <p>{{ actor.last_name }}</p>
            </li>
        </ul>
        <DeleteMovie  v-if="isAdmin" :movieId="movieId"></DeleteMovie>
    </div>
</template>

<script>
    import {getMovie} from "@/services/APIServices.js"
    import { getMovieActors } from "@/services/APIServices.js";
    import DeleteMovie from "@/components/DeleteMovie.vue";

    export default {
        components: {
            DeleteMovie
        },
        props: {
            movieId: {
                movieId: Number,
            },
            isAdmin: {
                isAdmin: Boolean,
            }
        },
        data() {
            return {
                critics: [],
                actors: [],
                movie: Object
            }
        },
        methods: {
            getCritics() {
                getMovie(this.movieId).then(response => response.data)
                                  .then(data => data.critiques)
                                  .then(critiques => this.critics = critiques);
            },
            getAvgCritics(){
                let total = 0;
                let nbCritics = this.critics.length;
                if(nbCritics >= 5){
                    this.critics.forEach(critique => {
                        total += critique.score;
                    });
                    return movie.moyenne = criticNb > 0 ? (totalScore/criticNb).toFixed(1) : 0;
                }
                else{
                    return 0;
                }
            },
            fillMovie(){
                getMovie(this.movieId).then(response => response.data)
                                      .then(data => this.movie = data);
            },
            getActors(){
                getMovieActors(this.movieId).then(response => response.data)
                                            .then(data => data.acteurs)
                                            .then(acteurs => this.actors = acteurs);
            }
        },
        mounted () {
            this.getCritics();
            this.fillMovie();
            this.getActors();
        },
    }
</script>

<style scoped>

</style>