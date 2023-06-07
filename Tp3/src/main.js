import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import Vue from 'vue'

import vMultiselectListbox from 'vue-multiselect-listbox'
import 'vue-multiselect-listbox/dist/vue-multi-select-listbox.css';

import StarRating from 'vue-star-rating'
import "https://unpkg.com/vue-star-rating@next/dist/VueStarRating.umd.min.js"

Vue.component('star-rating', VueStarRating.default)
Vue.component('v-multiselect-listbox', vMultiselectListbox)

import 'bootstrap/dist/css/bootstrap.min.css'

const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
