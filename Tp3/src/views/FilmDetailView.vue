<template>    
    <MovieDetail :movieId="props.id" :isAdmin="isAdmin"></MovieDetail>
    <MovieCriticForm :movieId="props.id"></MovieCriticForm>
    <UserCommentsList :movieId="props.id"></UserCommentsList>

</template>

<script>
    import { ref } from 'vue'
    import { storeToRefs } from 'pinia'
    import router from '@/router/index.js'

    import { useUserStore } from '@/stores/userStore.js'
    import MovieDetail from '@/components/MovieDetail.vue';
    import MovieCriticForm from '@/components/MovieCriticForm.vue';
    import UserCommentsList from '@/components/UserCommentsList.vue';

    export default {
        props: {
            id: String,
        },
        components: {
            MovieDetail,
            MovieCriticForm,
            UserCommentsList
        },
        setup(props) {
            const userStore = useUserStore();
            const { isConnected, isAdmin } = storeToRefs(userStore);
            return { isConnected, isAdmin, props };
        },
        mounted(){
            document.title = "Film Details";
        }
    }
</script>

<style scoped>

</style>