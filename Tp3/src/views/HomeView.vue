<template>
<main>
	<WelcomeWord></WelcomeWord>
</main>
</template>

<script>
	import WelcomeWord from '@/components/WelcomeWord.vue'
	export default {
		name: 'HomeView',
		components: {
			WelcomeWord
		},
		setup() {
			return {}
		}
	}
</script>

<style scoped>

</style>