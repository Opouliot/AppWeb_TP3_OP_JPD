<template>
    <div>
        <h2>Leave a comment</h2>
        <form class="form-control">
            <label for="comment">Comment</label>
            <div v-if="currentUserCritic.comment.length != 0">
                <textarea id="comment" name="comment" rows="4" cols="50">{{ currentUserComment }}</textarea>
            </div>
            <div v-else>
                <textarea id="comment" name="comment" rows="4" cols="50" placeholder="Enter your comment"></textarea>
            </div>
            <label for="score">Score</label>
            <div v-if="currentUserCritic.comment.length != 0">
                <input type="number" id="score" name="score" min="0" max="5" placeholder={{ currentUserScore }}>
            </div>
            <div v-else>
                <input type="number" id="score" name="score" min="0" max="5" placeholder="Enter your score">
            </div>
            <div v-if="currentUserCritic.comment.length != 0">
                <input type="submit" value="Modify" class="btn btn-success">
            </div>
            <div v-else>
                <input type="submit" value="Submit" class="btn btn-success">
            </div>
            <input type="submit" value="Submit" class="btn btn-success">
        </form>
    </div>
</template>

<script>
    import {getMovie} from "@/services/APIServices.js";
    import {postCritic} from "@/services/APIServices.js";

    export default {
        data() {
            return {
                currentUserCritic:{
                    score: Number,
                    comment : "",
                },
                critic:{
                    user_id: Number,
                    film_id: Number,
                    score: Number,
                    comment: "",
                    date: Date,
                    user_name: ""
                }
            }
        },
        props: {
            movieId: Number,
        },
        methods: {
            addCritic() {
                this.critic.user_id = this.$store.state.user.id;
                this.critic.film_id = this.movieId;
                this.critic.score = document.getElementById("score").value;
                this.critic.comment = document.getElementById("comment").value;
                this.critic.date = new Date();
                this.critic.user_name = this.$store.state.user.name;
                postCritic(this.critic);
            }
        },
        mounted () {
            getMovie(this.movieId).then(response => response.data)
                                  .then(data => data.critiques)
                                  .then(critiques => {
                                    critiques.forEach(critique => {
                                        if(critique.user_id == this.$store.state.user.id){
                                            this.currentUserCritic.score = critique.score;
                                            this.currentUserCritic.comment = critique.commentaire;
                                        }
                                    });
                                  });
        },
    }
</script>

<style scoped>

</style>