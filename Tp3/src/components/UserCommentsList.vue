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

    import { ref } from 'vue'
    import { storeToRefs } from 'pinia'
    import { useUserStore } from '@/stores/userStore.js'

    export default {
        props: {
            movieId: String
        },
        data() {
            let userStore = useUserStore();
            const { info } = storeToRefs(userStore);
            return {
                movieCritics: [],
                currentUser : info
            }
        },
        methods: {
            
        },
        mounted () {
            getMovie(this.movieId).then(response => response.data)
                                  .then(data => data.critiques)
                                  .then(critiques => {
                                    critiques.sort((a,b) => new Date(b.date) - new Date(a.date)).forEach(critique => {
                                        if(critique.user_id != this.currentUser.id)
                                            this.movieCritics.push(critique);
                                    });
                                    
                                  });
        }
}   
</script>

<style scoped>

</style>