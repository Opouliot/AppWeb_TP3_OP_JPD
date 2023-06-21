<template>
    <div>
        <form @:submit.prevent="register">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email</label>
                    <input v-model="email" type="email" class="form-control" id="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input v-model="password" type="password" class="form-control" id="inputPassword" placeholder="">
            </div>
            <div class="form-group">
                <label for="inputConfPassword">Confirm Password</label>
                <input v-model="confPassword" type="password" class="form-control" id="inputConfPassword" placeholder="">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputFirstName">First Name</label>
                    <input v-model="firstName" type="text" class="form-control" id="inputFirstName">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputLastName">Last Name</label>
                    <input v-model="lastName" type="text" class="form-control" id="inputLastName">
                </div>   
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
</template>

<script>
    import { ref } from 'vue'
    export default {
        setup() {
            const email = ref('');
            const password = ref('');
            const confPassword = ref('');
            const firstName = ref('');
            const lastName = ref('');
            let register = async ()=>{
                if(password.value != confPassword.value){
                    alert("Passwords don't match");
                    return;
                }
                let response = await fetch('https://laravel-e23.herokuapp.com/api/users', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        email: email.value,
                        password: password.value,
                        first_name: firstName.value,
                        last_name: lastName.value,
                    })
                });
                if(response.ok){
                    alert("User created");
                }
                else{
                    alert("Error");
                }

            };
            return {
                email,
                password,
                confPassword,
                firstName,
                lastName,
                register
            }
        }
    }
</script>

<style scoped>

</style>