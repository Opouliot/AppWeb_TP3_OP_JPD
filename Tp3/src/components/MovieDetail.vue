<template>
    <div>
        <h1>{{ movie.titre }}</h1>
        <img src="../images/imageGrande.jpg" alt="movie poster">
        <p>{{ getAvgCritics() }}</p>
        <p>{{ this.critics.length }}</p>
        <p>{{ movie.description }}</p>
        <p>{{ movie.classement }}</p>
        <p>{{ movie.longueur }}</p>
        <p>{{ movie.annee }}</p>
        <p>{{ movie.acteurs }}</p>
    </div>
</template>

<script>
    import {getMovie} from "@/services/APIServices.js"

    export default {
        props: {
            movie: {
                type: Object,
            },
        },
        data() {
            return {
                critics: []
            }
        },
        methods: {
            getCritics() {
                getMovie(movie.id).then(response => response.data)
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
            }
        },
        mounted () {
            this.getCritics();
        },
    }
</script>

<style scoped>

</style>