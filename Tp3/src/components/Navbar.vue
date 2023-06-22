<template>
    <div>
        <nav class="navbar">
            <div class="container-fluid">
                <div class="d-flex" role="">
                    <RouterLink to="/"
                                class="nav-link active p-2" aria-current="page">Home</RouterLink>
                    <RouterLink v-if="isConnected && isAdmin"
                                to="/admin"
                                class="nav-link p-2" aria-current="page">Add Movie</RouterLink>
                    <RouterLink v-if="!isConnected"
                                to="/login"
                                class="nav-link p-2" aria-current="page">Login</RouterLink>
                    <RouterLink v-if="!isConnected"
                                to="/register"
                                class="nav-link p-2" aria-current="page">Register</RouterLink>
                    <RouterLink v-if="isConnected"
                                to="/account"
                                class="nav-link p-2" aria-current="page">Profil</RouterLink>
                    <a v-if="isConnected" class="nav-link p-2" aria-current="page" @click="user.logout()" href="#">Logout ({{user.info.email}})</a>
                </div>
                <form class="d-flex" role="search">
                    <input v-model="queryString" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button @click.prevent="searchMovie()" class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </div>
</template>

<script>
    import { ref } from 'vue';
    import { storeToRefs } from 'pinia'
    import { useUserStore } from '../stores/userStore';
    import { RouterLink } from 'vue-router';
    import router from '@/router/index.js'

    export default {
        props: {
            id: String,
        },
        setup(props) {
            const user = useUserStore();
            const { isConnected, isAdmin } = storeToRefs(user);

            const queryString = ref("");

            let searchMovie = () => {
                router.push({ name: 'search', params: { searchQuery: queryString.value ? queryString.value : " " } })
            }

            return {
                user, isConnected, isAdmin, searchMovie, queryString
            }
        }
    }
</script>

<style scoped>

</style>