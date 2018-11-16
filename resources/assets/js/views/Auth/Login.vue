<template>
    <form class="form" @submit.prevent="login">
        <h1 class="form__title">Faça seu login</h1>
        <div class="form__group">
            <label>Email</label>
            <input type="text" class="form__control" v-model="form.email">
            <small class="error__control" v-if="error.email">{{error.email[0]}}</small>
        </div>
        <div class="form__group">
            <label>Password</label>
            <input type="password" class="form__control" v-model="form.password">
            <small class="error__control" v-if="error.password">{{error.password[0]}}</small>
        </div>
        <div class="form__group">
            <button :disabled="isProcessing" class="btn btn__primary">Login</button>
        </div>
    </form>
</template>

<script>
export default {
     data() {
        return {
            form: {
                email: '',
                password: ''
            },
            error: {},
            isProcessing: false
        }
    },
}
</script>

