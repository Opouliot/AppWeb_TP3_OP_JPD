import { defineStore } from 'pinia'

export const useUserStore = defineStore('user',{
    state: () => ({
        username: '',
        token: '',
        role: '',
        connected: false,
    }),
    getters: {
        isConnected: (state) => state.connected
    },
    actions: {
        async getToken(email, password) {
            let formData = new FormData();
            formData.append('email', email);
            formData.append('password', password);

            let response = await fetch('https://laravel-e23.herokuapp.com/api/login', { method: 'POST', body: formData });
            if (!response.ok) {
                this.username = '';
                this.token = '';
                this.role = '';
                this.connected = false;
                return false;
            }
            let result = await response.json();
            let user = await fetch('https://laravel-e23.herokuapp.com/api/user', { method: 'GET', headers: { 'Authorization': 'Bearer ' + result.token } }).then(response => response.json());
            this.username = email;
            this.token = result.token;
            this.connected = true;
            return true;
        },
    },
});
