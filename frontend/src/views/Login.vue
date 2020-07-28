<template>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <b-card title="Login" sub-title="">
                    <b-form @submit="login">
                        <b-form-group label="Email:" label-for="loginEmail">
                            <b-form-input
                                    id="loginEmail"
                                    v-model="form.email"
                                    type="email"
                                    required
                            ></b-form-input>
                        </b-form-group>

                        <b-form-group label="Password:" label-for="loginPassword">
                            <b-form-input
                                    id="loginPassword"
                                    type="password"
                                    v-model="form.password"
                                    required
                            ></b-form-input>
                        </b-form-group>

                        <b-button type="submit" variant="primary">Войти</b-button>
                    </b-form>
            </b-card>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data () {
            return {
                form: {
                    email: null,
                    password: null
                }
            }
        },
        methods: {
            login(event) {
                event.preventDefault();
                alert('login ' + this.form.email);
                return false;
            }
        }
    }
</script>

<style scoped>

</style>