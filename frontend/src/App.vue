<template>
  <div id="app" class="d-flex flex-column h-100">
    <header class="app-header">
      <Nav />
    </header>
    <div class="app-content">
      <main class="container">
        <router-view />
      </main>
    </div>
    <div class="app-footer footer mt-auto py-3">
      <div class="container ">
        <hr >
        <p class="small text-muted">Все права защищены</p>
      </div>
    </div>
  </div>
</template>

<script>
  import Nav from "./components/Nav";
  export default {
    components: {
      Nav
    }
  }
</script>

<style>

  @import '~bootstrap/dist/css/bootstrap.css';
  @import '~bootstrap-vue/dist/bootstrap-vue.css';
  /*@import './assets/scss/_variables.scss';*/

  #app {
    font-family: Avenir, Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color: #2c3e50;
    font-size: .9rem;
  }


  .btn-primary {
    color: #fff;
    background-color: #337ab7;
    border-color: #007bff;
  }

</style>
