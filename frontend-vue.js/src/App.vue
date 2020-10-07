<template>
  <div id="app">
    <router-view />
  </div>
</template>

<script>
import Login from "./components/login/Login";
import Home from "./components/home/Home";

export default {
  components: {
    Login,
    Home,
  },
};
</script>

<style>
</style>
