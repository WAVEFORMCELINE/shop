import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'main-index',
      component: () => import('../views/main/Index.vue')
    },
    {
      path: '/cart',
      name: 'main-cart',
      component: () => import('../views/main/Cart.vue')
    },
    {
      path: '/products',
      name: 'product-index',
      component: () => import('../views/product/Index.vue')
    },
    {
      path: '/products/:id',
      name: 'product-show',
      component: () => import('../views/product/Show.vue')
    },
    {
      path: '/category/:id',
      name: 'product-category',
      component: () => import('../views/product/Category.vue')
    },
  ]
})

export default router
