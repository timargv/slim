<template>
  <div class="home">
    <div class="jumbotron">
      <h1>Главная страница</h1>
    </div>
    <ApiStatus/>
  </div>
</template>

<script>
// @ is an alias to /src
import ApiStatus from '@/components/ApiStatus.vue'

export default {
  name: 'Home',
  components: {
    ApiStatus
  }
}
</script>
