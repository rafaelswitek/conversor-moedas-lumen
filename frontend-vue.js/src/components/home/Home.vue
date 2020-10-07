<template>
  <div class="container">
    <h1 class="text-center">{{ title }}</h1>

    <button class="btn btn-danger float-rigth" @click="efetuarLogout">
      Sair
    </button>

    <cm-converter
      :base_date="this.base_date"
      :history="this.history"
    ></cm-converter>

    <cm-history :history="this.history"></cm-history>

    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :is-full-page="true"
    ></loading>
  </div>
</template>

<script>
import moment from "moment";
import http from "../../http";

import Converter from "../converter/Converter";
import History from "../history/History";
import { logoutMixin } from "../../mixins";

import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

const base_date = moment().format("YYYY-MM-DD");

export default {
  name: "home",
  mixins: [logoutMixin],
  components: {
    "cm-converter": Converter,
    "cm-history": History,
    Loading,
  },
  data() {
    return {
      title: "Conversor de moedas",
      base_date,
      history,
      isLoading: false,
    };
  },
  created() {
    this.isLoading = true;
    http
      .get(`rates/${1}`)
      .then((response) => response.data)
      .then(
        (history) => {
          history.map(function (row, key) {
            history[key].base_date = moment(row.base_date).format("DD/MM/YYYY");
          });
          this.history = history;
          this.isLoading = false;
        },
        (error) => console.log(error)
      );
  },
  formatValue(currency, value) {
    return new Intl.NumberFormat("pt-BR", {
      style: "currency",
      currency: currency,
    }).format(value);
  },
};
</script>

<style>
</style>
