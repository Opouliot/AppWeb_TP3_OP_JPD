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
                <button type="submit" class="btn btn-primary" >Se Connecter</button>
        </form>
    </div>
</template>

<script>
import { useUserStore } from '@/stores/userStore.js'
import { storeToRefs } from 'pinia'
import router from '@/router/index.js'
import { ref } from 'vue'


export default {
    setup() {
        const userStore = useUserStore();
        const { info } = storeToRefs(userStore);
        const password = ref("");
        const email = ref(info.email);
        
        function login() {
            let success = userStore.login(email.value, password.value);
            if(success) {
                router.push({ name: 'home' })
            }
            else {
                alert("Wrong email or password")
            }
        };
        return { email, password, login }
    }
}
</script>

<style scoped>

</style>