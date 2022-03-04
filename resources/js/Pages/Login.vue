<template>
     <div class="Form">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" v-model="email" required>
                    <small id="emailHelp" class="form-text text-muted">Non condivideremo la tua email con nessuno.</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" v-model="password" required>
                </div>
                <button type="submit" class="btn btn-primary buttonLogin" @click="login">Login</button>
        </div>
</template>

<script>

export default {
    data(){
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        login(){
            this.$inertia.post(route('login'), {
                email: this.email,
                password: this.password
            })
        }
    }
}
</script>
