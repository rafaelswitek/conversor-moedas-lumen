<template>
  <div class="container">
    <h1>Login</h1>
    <form @submit.prevent="login">
      <div class="form-group">
        <label for="email">E-mail</label>
        <input
          type="email"
          class="form-control"
          v-model="usuario.email"
          required
        />
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input
          type="password"
          class="form-control"
          v-model="usuario.password"
          required
        />
      </div>
      <p class="alert alert-danger" v-if="mensagemErro">{{ mensagemErro }}</p>
      <button type="submit" class="btn btn-primary brn-block">Logar</button>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      usuario: {},
      mensagemErro: "",
    };
  },
  methods: {
    login() {
      this.$store
        .dispatch("login", this.usuario)
        .then(() => this.$router.push({ name: "home" }))
        .catch((err) => {
          if (err.request.status == 401) {
            this.mensagemErro = "Login ou senha inválido(s)";
          }
        });
    },
  },
};
</script>

<style>
</style>
