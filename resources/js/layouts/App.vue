<template>
  <div id="app">
    <Header />
    <router-view />
    <Footer />
  </div>
</template>

<script setup>
import Header from "../components/HeaderComponent.vue"
import Footer from "../components/FooterComponent.vue"

</script>

<style>
@import url('https://fonts.googleapis.com/css?family=Inconsolata|Oswald');

html, body {
  font-family: 'Roboto', sans-serif;
}

#app {
  font-family: 'Inconsolata', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>


