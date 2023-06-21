<template>
    <div>
        <h2>Leave a comment</h2>
        <form class="form-control">
            <label for="comment">Comment</label>
            <div v-if="currentUserComment.length != 0">
                <textarea id="comment" name="comment" rows="4" cols="50">{{ currentUserComment }}</textarea>
            </div>
            <div v-else>
                <textarea id="comment" name="comment" rows="4" cols="50" placeholder="Enter your comment"></textarea>
            </div>
            <label for="score">Score</label>
            <div v-if="currentUserComment.length != 0">
                <input type="number" id="score" name="score" min="0" max="5" placeholder={{ currentUserScore }}>
            </div>
            <div v-else>
                <input type="number" id="score" name="score" min="0" max="5" placeholder="Enter your score">
            </div>
            <div v-if="currentUserComment.length != 0">
                <input type="submit" value="Modify" class="btn btn-success">
            </div>
            <div v-else>
                <input type="submit" value="Submit" class="btn btn-success">
            </div>
            <input type="submit" value="Submit" class="btn btn-success">
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                currentUserComment: String,
                currentUserScore: Number
            }
        },
        methods: {
            name() {
                
            }
        },
    }
</script>

<style scoped>

</style>