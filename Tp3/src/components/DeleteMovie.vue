<template>
    <div>
        <label for="deleteMovie">Delete Movie?</label>
        <button typ="button" class="btn btn-danger" @click="removeMovie">Delete</button>
        <span id="confirmMsg"></span>
    </div>
</template>

<script>
    import { deleteMovie } from "@/services/APIServices.js";

    import { ref } from 'vue'
    import { storeToRefs } from 'pinia'
    import { useUserStore } from '@/stores/userStore.js'

    export default {
        data() {
            let userStore = useUserStore();
            const { info } = storeToRefs(userStore);
            return {
                currentUser: info,
            }
        },
        props: {
            movieId: String,
        },
        methods: {
            removeMovie() {
                let confirmMsg = document.getElementById("confirmMsg");

                deleteMovie(this.movieId, this.currentUser)
                .then((response) => {
                    if(response.ok){
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