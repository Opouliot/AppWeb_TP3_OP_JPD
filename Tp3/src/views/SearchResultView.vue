<template>
    <!-- <NbMovieFound :movieFound="filteredMovies"></NbMovieFound> -->
    <SearchResultList :searchQuery="searchQuery"></SearchResultList>
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
			return {
                searchQuery
            }
		}
	}
</script>

<style scoped>

</style>