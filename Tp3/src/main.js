import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'
import * as Vue from 'vue'

import MultiSelect from '@vueform/multiselect'

import vue3StarRatings from 'vue3-star-ratings'
// import "https://unpkg.com/vue-star-rating@next/dist/VueStarRating.umd.min.js"

// Vue.component('star-rating', VueStarRating.default)
// Vue.component('v-multiselect-listbox', vMultiselectListbox)
import 'bootstrap/dist/css/bootstrap.min.css'

const app = createApp(App)

app.component('star-rating', vue3StarRatings)
app.component('multiselect', MultiSelect)
app.use(createPinia())
app.use(router)

app.mount('#app')
