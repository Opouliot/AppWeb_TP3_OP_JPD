<template>
    <div>
        <h1>User Comments</h1>
        <ul>
            <li v-for="critic in this.movieCritics" v-bind:key="critic.id">
                <p>{{ critic.commentaire }}</p>
                <p>{{ critic.user_name }}</p>
                <p>{{ new Date(critic.date).toLocaleDateString('en-us',{day:"numeric", month:"long", year:"numeric"}) }}</p>
            </li>
        </ul>
    </div>
</template>

<script>
    import {getMovie} from "@/services/APIServices.js"

    export default {
        props: {
            movieId: Number
        },
        data() {
            return {
                movieCritic: [],
            }
        },
        methods: {
            
        },
        mounted () {
            getMovie(this.movieId).then(response => response.data)
                                  .then(data => data.critiques)
                                  .then(critiques => {
                                    critiques.forEach(critique => {
                                        if(critique.user_id != this.$store.state.user.id)
                                            this.movieCritic.push(critique);
                                    });
                                  });
        }
}   
</script>

<style scoped>

</style>