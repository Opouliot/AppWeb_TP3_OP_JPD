<template>
    <div>
        <h2>Leave a comment</h2>
        <form @submit.prevent="" class="form-control">
            <label for="comment">Comment</label>
            <div v-if="currentUserCritic.comment.length != 0">
                <textarea id="comment" name="comment" rows="4" cols="50" maxlength="255">{{ this.currentUserCritic.comment }}</textarea>
            </div>
            <div v-else>
                <textarea id="comment" name="comment" rows="4" cols="50" placeholder="Enter your comment" maxlength="255"></textarea>
            </div>
            <label for="score">Score</label>
            <div v-if="currentUserCritic.comment.length != 0">
                <input type="number" id="score" name="score" min="0" max="5" :value="this.currentUserCritic.score">
            </div>
            <div v-else>
                <input type="number" id="score" name="score" min="0" max="5" placeholder="Enter your score">
            </div>
            <div v-if="currentUserCritic.comment.length != 0">
                <input @click="checkCriticPUT" type="submit" value="Modify" class="btn btn-success">
            </div>
            <div v-else>
                <input @click="checkCriticPOST" type="submit" value="Submit" class="btn btn-success">
            </div>
            <span id="errMsg"></span>
        </form>
    </div>
</template>

<script>
    import { ref } from 'vue'
    import { storeToRefs } from 'pinia'
    import {getMovie} from "@/services/APIServices.js";
    import {putCritic} from "@/services/APIServices.js";
    import {postCritic} from "@/services/APIServices.js";
    import { useUserStore } from '@/stores/userStore.js'

    export default {
        data() {
            let userStore = useUserStore();
            const { info } = storeToRefs(userStore);
            return {
                currentUserCritic:{
                    score: Number,
                    comment : "",
                    id : Number
                },
                critic:{
                    user_id: Number,
                    film_id: Number,
                    score: Number,
                    comment: "",
                    date: Date,
                    user_name: "",
                    id: Number
                },
                currentUser : info
            };
        },
        props: {
            movieId: String,
        },
        methods: {
            setCritic() {
                this.critic.user_id = this.currentUser.id;
                this.critic.film_id = this.movieId;
                this.critic.score = document.getElementById("score").value;
                this.critic.comment = document.getElementById("comment").value;
                this.critic.date = new Date();
                this.critic.user_name = this.currentUser.email;
            },
            checkCommentLength(){
                let error = false;
                let comment = document.getElementById("comment").value;
                if(comment.length < 0){
                    error = true;
                }
                else if(comment.trim().length == 0){
                    error = true;
                }
                else if(comment.length > 255){
                    error = true;
                }
                return error;  
            },
            checkCriticPUT(){
                let error = false;
                let errMsg = document.getElementById("errMsg");

                error = this.checkCommentLength();
                if(error){
                    document.getElementById("comment").style.borderColor = "red";
                }
                else{
                    this.setCritic();
                    putCritic(this.critic, this.currentUser).then(response => {
                        if(response.ok){
                            errMsg.innerHTML = "Your comment has been posted";
                            errMsg.classList.add("text-success");
                        }
                        else{
                            errMsg.innerHTML = "An error occured";
                            errMsg.classList.add("text-danger");
                        }
                    });
                }
            },
            checkCriticPOST() {
                let error = false;
                let errMsg = document.getElementById("errMsg");

                error = this.checkCommentLength();
                if(error){
                    document.getElementById("comment").style.borderColor = "red";
                }
                else{
                    this.setCritic();
                    postCritic(this.critic, this.currentUser).then(response => {
                        if(response.ok){
                            errMsg.innerHTML = "Your comment has been posted";
                            errMsg.classList.add("text-success");
                        }
                        else{
                            errMsg.innerHTML = "An error occured";
                            errMsg.classList.add("text-danger");
                        }
                    });
                }
            }
        },
        mounted () {
            getMovie(this.movieId).then(response => response.data)
                                  .then(data => data.critiques)
                                  .then(critiques => {
                                    critiques.forEach(critique => {
                                        if(critique.user_id == this.currentUser.id){
                                            console.log(critique);
                                            this.currentUserCritic.score = critique.score;
                                            this.currentUserCritic.comment = critique.commentaire;
                                            this.critic.id = critique.critic_id;
                                        }
                                    });
                                  });
        },
    }
</script>

<style scoped>

</style>