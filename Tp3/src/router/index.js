import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import('../views/HomeView.vue')
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/RegisterView.vue')
    },
    {
      path: '/admin',
      name: 'admin',
      component: () => import('../views/AdminView.vue')
    },
    {
      path: '/filmDetail/:id',
      name: 'filmDetail',
      component: () => import('../views/FilmDetailView.vue'),
      props: true
    },
    {
      path: '/account',
      name: 'account',
      component: () => import('../views/UpdateAccntView.vue')
    },
    {
      path: '/search/:searchQuery',
      name: 'search',
      component: () => import('../views/SearchResultView.vue'),
      props: true
    },
  ]
})

export default router
