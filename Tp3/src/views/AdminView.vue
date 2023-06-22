<template>
    <AddMovieForm></AddMovieForm> 
</template>

<script>
    import { ref } from 'vue'
    import { storeToRefs } from 'pinia'
    import router from '@/router/index.js'

    import { useUserStore } from '@/stores/userStore.js'
    import AddMovieForm from '@/components/AddMovieForm.vue';

    export default {
        props: {
            id: String,
        },
        components: {
            AddMovieForm
        },
        setup(props) {
            const userStore = useUserStore();
            const { isConnected, isAdmin } = storeToRefs(userStore);

            if(!isConnected.value || !isAdmin.value){
                router.push({ name: 'home' });
            }
        },
        mounted(){
            document.title = "Administrator's Quarters";
        }
    }
</script>

<style scoped>

</style>