<template>
    <div>
        <h1>{{ this.movie.titre }}</h1>
        <img src="../images/imageGrande.jpg" alt="movie poster">
        <p>{{ getAvgCritics() }}</p>
        <p>{{ this.critics.length }}</p>
        <p>{{ this.movie.description }}</p>
        <p>{{ this.movie.classement }}</p>
        <p>{{ this.movie.longueur }}</p>
        <p>{{ this.movie.annee }}</p>
        <ul>
            <li v-for="actor in actors">
                <p>{{ actor.first_name }}</p>
                <p>{{ actor.last_name }}</p>
            </li>
        </ul>
    </div>
</template>

<script>
    import {getMovie} from "@/services/APIServices.js"
    import { getMovieActors } from "@/services/APIServices.js";

    export default {
        props: {
            movie: {
                movieId: Number,
            },
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
                let nbCritics = critics.length;
                if(nbCritics >= 5){
                    this.critics.forEach(critique => {
                        total += critique.score;
                    });
                    return (total/nbCritics).toFixed(1);
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
            fillMovie();
            getActors();
        },
    }
</script>

<style scoped>

</style>