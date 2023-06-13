<template>
    <div>
        <form>
            <div class="form-group">
                <label for="inputComment">Comment</label>
                <textarea name="userComment" id="userComment" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <star-rating 
                    starSize="32"
                    starColor="#ff9800"
                    inactiveColor="#333333"
                    controlBg="#2e5090"
                    controlColor="#ffffff" 
                    controlSize="24" 
                    :numberOfStars="5"
                    :step="0.5"
                    :showControl="true" 
                    :disableClick="true" 
                    />
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