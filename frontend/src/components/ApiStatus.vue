<template>
    <div>
        <div v-if="name">
            <p>
                Используется <span class="api-name">{{ name }}</span> version {{ version }}
            </p>
        </div>
        <div v-else class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "ApiStatus",
        data () {
            return {
                name: null,
                version: null
            }
        },
        mounted() {
            axios.get('/').then(response => {
                this.name = response.data.name;
                this.version = response.data.version;
            })
        }
    }
</script>

<style scoped>
.api-name {
    font-weight: bold;
}
</style>