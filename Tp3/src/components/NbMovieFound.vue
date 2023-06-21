<template>
    <div>
        <h3>There is {{ this.movieFound.length }} movies matching your search!</h3>
    </div>
</template>

<script>
    export default {
        props: {
            movieFound : Array,
        },
    }
</script>

<style scoped>

</style>