<template>
    <div>
        <label for="deleteMovie">Delete Movie?</label>
        <button class="btn btn-alert" @click="removeMovie">Delete</button>
        <span id="confirmMsg"></span>
    </div>
</template>

<script>
    import { deleteMovie } from "@/services/APIServices.js";

    export default {
        props: {
            movieId: {
                type: Number,
            },
        },
        methods: {
            removeMovie() {
                let confirmMsg = document.getElementById("confirmMsg");

                deleteMovie(this.movieId)
                .then((response) => {
                    if(response.status == 200){
                        confirmMsg.innerHTML = "Movie deleted";
                        confirmMsg.classList.add("text-success");
                    }
                    else{
                        confirmMsg.innerHTML = "Error";
                        confirmMsg.classList.add("text-danger");
                    }
                })
            }
        },
    }
</script>

<style scoped>

</style>