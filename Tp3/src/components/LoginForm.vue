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
import { mapStores } from 'pinia'
import { useUserStore } from '@/stores/userStore'


export default {
    computed: {
    ...mapStores(useUserStore)
    },
    data () {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        login : () =>{
            this.userStore.getToken(this.email, this.password);
        }
    }
}
</script>

<style scoped>

</style>