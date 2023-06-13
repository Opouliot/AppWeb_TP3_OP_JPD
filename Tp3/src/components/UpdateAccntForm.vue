<template>
    <div>
        <form>
            <div class="form-group">
                <label for="formUsername">Username</label>
                <input type="text" class="form-control" id="formUsername" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="formEmail">Email</label>
                <input type="email" class="form-control" id="formEmail" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="formFirstName">First Name</label>
                <input type="text" class="form-control" id="formFirstName" placeholder="First Name">
            </div>
            <div class="form-group">
                <label for="formLastName">Last Name</label>
                <input type="text" class="form-control" id="formLastName" placeholder="Last Name">
            </div>
            <button type="submit" class="btn btn-success">Update Profil</button>
        </form>
        <button class="btn btn-primary">Update Password</button>
    </div>
</template>

<script>
    export default {
        
    }
</script>

<style scoped>

</style>