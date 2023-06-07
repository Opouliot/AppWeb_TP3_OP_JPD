<template>
    <div>
        <form>
            <div class="form-group">
                <label for="inputComment">Comment</label>
                <textarea name="userComment" id="userComment" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <star-rating v-bind:increment="0.5"
                             inactive-color="#000"
                             active-color="#f00"
                             v-bind:star-size="90">
                </star-rating>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>

</style>