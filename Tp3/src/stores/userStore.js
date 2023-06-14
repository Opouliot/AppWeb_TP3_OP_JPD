import { defineStore } from 'pinia'

export const useUserStore = defineStore('user',{
    state: () => ({
        username: '',
        token: '',
    }),
    actions: {
        async getToken(email, password) {
            let formData = new FormData();
            formData.append('email', email);
            formData.append('password', password);

            let response = await fetch('https://laravel-e23.herokuapp.com/api/login', { method: 'POST', body: formData });
            if (!response.ok) {
                return false;
            }
            let result = await response.json();
            
            this.username = login;
            this.token = result.token;
            return true;
        },
    },
});
