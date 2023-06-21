<template>
    <div>
        <h1>Last Movies Added</h1>
        <div>
            <ul class="list-group">
                <li v-for="movie in this.filteredFilmList" v-bind:key="movie.id">
                    <h4>{{ movie.titre }}</h4>
                    <p>{{ movie.description.slice(0,101) + "..." }}</p>
                    <p>Rating : {{ movie.classement }}</p>
                    <p>Length : {{ movie.longueur }} min</p>
                    <p>Average Critics Score : {{ movie.moyenne }}</p>
                    <img src="../images/imagePetite.jpg" alt="affiche du film">
                    <div>
                        <button class="btn btn-success" @click="sendMovieId(movie.id)">See Details</button>
                    </div>
                </li>
            </ul>
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
                moyenne: 0,
                movieId: Number
            }
        },
        methods: {
            filterMovieList(){
                getAllMovies()
                            .then(data => {
                                data.sort((a, b) => (b.id - a.id));
                                this.filteredFilmList = data.slice(0,3);
                                return this.filteredFilmList;
                            }).then(movies => {
                                movies.forEach((movie)=>{
                                    let totalScore = 0;
                                    let criticNb = 0;
                                    getMovie(movie.id).then(response => response.data)
                                    .then(data => data.critiques)
                                    .then(critiques => {
                                        critiques.forEach(critique => {
                                            totalScore += parseFloat(critique.score);
                                            criticNb++;
                                        });   
                                        movie.moyenne = criticNb > 0 ? (totalScore/criticNb).toFixed(1) : 0;
                                    });
                                })
                                
                            });
            },
            sendMovieId(id){
                this.movieId = id;
            }
        },
        mounted() {
            this.filterMovieList();
        },
    }
</script>

<style scoped>

</style>