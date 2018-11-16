import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from '../views/Home.vue'
import Login from '../views/Auth/Login.vue'
import NotFound from '../views/NotFound.vue'

Vue.use(VueRouter)

const router = new VueRouter({

	routes: [
		{ path: '/', component: Home },
		{ path: '/recipes/create', component: RecipeForm, meta: { mode: 'create' }},
		{ path: '/recipes/:id/edit', component: RecipeForm, meta: { mode: 'edit' }},
		{ path: '/recipes/:id', component: RecipeShow },
		{ path: '/register', component: Register },
		{ path: '/login', component: Login },
		{ path: '/not-found', component: NotFound },
		{ path: '*', component: NotFound }
	]
})

export default router
