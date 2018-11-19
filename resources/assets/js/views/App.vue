<template>
	<div class="container">
		<div class="navbar">
			<div class="navbar__brand">
				<router-link to="/">Recipe Box</router-link>
			</div>
			<ul class="navbar__list">
				<li class="navbar__item"  v-if="guest">
					<router-link to="/login">LOGIN</router-link>
				</li>
				<li class="navbar__item"  v-if="guest">
					<router-link to="/register">REGISTER</router-link>
				</li>
				<li class="navbar__item"  v-if="auth">
					<router-link to="/recipes/create">CREATE RECIPE</router-link>
				</li>
				<li class="navbar__item"  v-if="auth">
					<a @click.stop="logout">LOGOUT</a>
				</li>
			</ul>
		</div>
		<router-view></router-view>
	</div>
</template>

<script>

	export default {
}
</script>
