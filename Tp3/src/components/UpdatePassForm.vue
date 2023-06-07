<template>
    <div>
        <form>
            <div class="form-group">
                <label for="inputNewPass">New Password</label>
                <input type="password" class="form-control" id="inputNewPass" aria-describedby="emailHelp" placeholder="Enter New Password">
            </div>
            <div class="form-group">
                <label for="inputConfirmPass">Confirm Password</label>
                <input type="password" class="form-control" id="inputConfirmPass" placeholder="Password">
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