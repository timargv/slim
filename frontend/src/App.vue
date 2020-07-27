<template>
  <div id="app">
    <header class="app-header">
      <Nav />
    </header>
    <div class="app-content">
      <main class="container">
        <router-view />
      </main>
    </div>
    <div class="app-footer">
      <div class="container">
        <hr >
        <p class="small text-muted">Все права защищены</p>
      </div>
    </div>
  </div>
</template>

<script>
  import Nav from "@/components/Nav";
  export default {
    components: {
      Nav
    }
  }
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
}
a {
  font-weight: bold;
  color: #2c3e50;
}
.router-link-exact-active {
  color: #42b983;
}
</style>
