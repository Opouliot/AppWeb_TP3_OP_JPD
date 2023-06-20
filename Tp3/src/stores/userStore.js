import { defineStore } from 'pinia'
import { useStorage } from '@vueuse/core'

export const useUserStore = defineStore('user',{
    state: () => ({
        info : useStorage('user-info', {
            token: '',
            id : 0,
            email: '',
            role: '',
            last_name: '',
            first_name: '',
            connected: false,
        }),
    }),
    getters: {
        isConnected: (state) => state.info.connected,
        isAdmin: (state) => state.info.role === 'admin',
    },
    actions: {
        async login(email, password) {
            let formData = new FormData();
            formData.append('email', email);
            formData.append('password', password);

            let response = await fetch('https://laravel-e23.herokuapp.com/api/login', { method: 'POST', body: formData });
            if (!response.ok) {
                this.logout();
                return false;
            }
            let result = await response.json();
            let user = await fetch( 'https://laravel-e23.herokuapp.com/api/user',
                                    { method: 'GET', headers: { 'Authorization': 'Bearer ' + result.token } })
                            .then(response => response.json());

            this.info.token = result.token;
            this.info.id = user.id;
            this.info.email = email;
            this.info.role = user.role_id === 1 ? 'admin' : 'user';
            this.info.last_name = user.last_name;
            this.info.first_name = user.first_name;
            this.info.connected = true;
            return true;
        },
        logout() {
            this.info.id = 0;
            this.info.email = '';
            this.info.token = '';
            this.info.role = '';
            this.info.last_name = '';
            this.info.first_name = '';
            this.info.connected = false;
        }
    },
});
