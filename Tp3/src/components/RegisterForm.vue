<template>
    <div>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputUsername4">Username</label>
                    <input type="text" class="form-control" id="inputUsername4" placeholder="Username">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Password</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Confirm Password</label>
                <input type="password" class="form-control" id="inputConfPassword" placeholder="">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFirstName">First Name</label>
                    <input type="text" class="form-control" id="inputFirstName">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputLaseName">Last Name</label>
                    <input type="text" class="form-control" id="inputLastName">
                </div>   
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</template>

<script>
    export default {
        setup() {
            return {

            }
        }
    }
</script>

<style scoped>

</style>