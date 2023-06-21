<template>
    <div>
        <h3>There is {{ movieFound }} movies matching your search!</h3>
    </div>
</template>

<script>
    export default {
        props: {
            movieFound : Number,
        },
        setup(props) {
            return {
                
            }
        }
    }
</script>

<style scoped>

</style>