<template>
    <div>
        <b-navbar toggleable="lg" type="dark" variant="dark" class="mb-5">
            <b-navbar-brand href="#">NavBar</b-navbar-brand>

            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

            <b-collapse id="nav-collapse" is-nav>
                <b-navbar-nav>
                    <router-link to="/" v-slot="{ href, route, navigate }">
                        <li class="nav-item" :class="$route.fullPath === route.fullPath ? 'active' : ''">
                            <a class="nav-link" :href="href" @click="navigate">{{ route.name }}</a>
                        </li>
                    </router-link>

                    <router-link to="/about" v-slot="{ href, route, navigate }">
                        <li class="nav-item" :class="$route.fullPath === route.fullPath ? 'active' : ''">
                            <a class="nav-link" :href="href" @click="navigate">{{ route.name }}</a>
                        </li>
                    </router-link>
                </b-navbar-nav>

                <b-navbar-nav class="ml-auto">
                    <router-link to="/login" v-slot="{ href, route, navigate }">
                        <li class="nav-item" :class="$route.fullPath === route.fullPath ? 'active' : ''">
                            <a class="nav-link" :href="href" @click="navigate">{{ route.name }}</a>
                        </li>
                    </router-link>

                    <router-link to="/signup" v-slot="{ href, route, navigate }">
                        <li class="nav-item" :class="$route.fullPath === route.fullPath ? 'active' : ''">
                            <a class="nav-link" :href="href" @click="navigate">{{ route.name }}</a>
                        </li>
                    </router-link>
                </b-navbar-nav>
            </b-collapse>
        </b-navbar>
    </div>
</template>

<script>
    export default {
        name: "Nav"
    }
</script>

<style scoped>

</style>