<template>
    <NbMovieFound :movieFound="nbMovie"></NbMovieFound>
    <SearchResultList :searchQuery="searchQuery" @send-nb-movie-found="setNbMovie"></SearchResultList>
</template>

<script>
    import { ref } from 'vue'
	import SearchResultList from '@/components/SearchResultList.vue'
    import NbMovieFound from '@/components/NbMovieFound.vue'

	export default {
		name: 'HomeView',
		components: {
			SearchResultList,
            NbMovieFound
		},
        props: {
            searchQuery : String,
        },
        
		setup(props) {
            let searchQuery = ref(props.searchQuery);
            let nbMovie = ref(0);

            let setNbMovie = (nb) => {
                nbMovie.value = nb;
            }

			return {
                searchQuery,
                setNbMovie,
                nbMovie
            }
		},
        mounted(){
            document.title = "Search Results";
        }
	}
</script>

<style scoped>

</style>