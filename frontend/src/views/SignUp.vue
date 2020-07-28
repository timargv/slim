<template>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <b-card title="Sign Up" sub-title="">
                <b-form @submit="signUp">
                    <b-form-group label="Email:" label-for="signupEmail">
                        <b-form-input
                                id="signupEmail"
                                v-model="form.email"
                                type="email"
                                required
                        ></b-form-input>
                    </b-form-group>

                    <b-form-group label="Password:" label-for="signupPassword">
                        <b-form-input
                                id="signupPassword"
                                type="password"
                                v-model="form.password"
                                required
                        ></b-form-input>
                    </b-form-group>

                    <b-form-group label="Password Confirm:" label-for="signupPasswordConfirm">
                        <b-form-input
                                id="signupPasswordConfirm"
                                type="password"
                                v-model="form.passwordConfirm"
                                required
                        ></b-form-input>
                    </b-form-group>

                    <b-button type="submit" variant="primary">SignUp</b-button>
                </b-form>
            </b-card>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SignUp",
        data () {
            return {
                form: {
                    email: null,
                    password: null,
                    passwordConfirm: null
                }
            }
        },
        methods: {
            signUp(event) {
                event.preventDefault();
                alert('signup ' + this.form.email);
                return false;
            }
        }
    }
</script>

<style scoped>

</style>