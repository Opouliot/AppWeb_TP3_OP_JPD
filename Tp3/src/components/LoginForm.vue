<template>
    <div>
        <form @:submit.prevent="login" >
            <div class="form-group">
                <label for="inputEmail">Email address</label>
                <input v-model="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We will never share your email..but your pass...</small>
            </div>
            <div class="form-group">
                <label for="inputPassword">Password</label>
                <input v-model="password" type="password" class="form-control" id="inputPassword" placeholder="Password" >
            </div>
                <button type="submit" class="btn btn-primary" >Submit</button>
        </form>
    </div>
</template>

<script>
import { useUserStore } from '@/stores/userStore.js'
import { ref } from 'vue'


export default {
    setup() {
        const userStore = useUserStore();
        const email = ref("karine@email.com");
        const password = ref("password");
        
        function login() {
            let success = userStore.getToken(email.value, password.value);
        };
        return { email, password, login }
    }
}
</script>

<style scoped>

</style>