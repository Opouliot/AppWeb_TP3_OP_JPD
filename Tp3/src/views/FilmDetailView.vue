<template>
    <MovieDetail :movieId="props.id"></MovieDetail>
</template>

<script>
    import { ref } from 'vue'
    import { storeToRefs } from 'pinia'
    import router from '@/router/index.js'

    import { useUserStore } from '@/stores/userStore.js'
    import MovieDetail from '@/components/MovieDetail.vue';

    export default {
        props: {
            id: String,
        },
        components: {
            MovieDetail
        },
        setup(props) {
            const userStore = useUserStore();
            const { isConnected, isAdmin } = storeToRefs(userStore);
            return { isConnected, isAdmin, props };
        }
    }
</script>

<style scoped>

</style>