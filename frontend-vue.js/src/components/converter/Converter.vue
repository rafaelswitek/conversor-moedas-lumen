<template>
  <div>
    <loading
      :active.sync="isLoading"
      :can-cancel="true"
      :on-cancel="onCancel"
      :is-full-page="true"
    ></loading>
    <form @submit.prevent="converter()" class="row">
      <div class="col-3 form-group">
        <label for="base_date">Data da cotação</label>
        <input
          type="date"
          id="base_date"
          :max="values.base_date"
          v-model="values.base_date"
          class="form-control"
        />
      </div>

      <div class="col-2 form-group">
        <label for="base_rate">Valor</label>
        <input
          type="number"
          step="0.01"
          id="base_rate"
          v-model="values.base_rate"
          class="form-control"
        />
      </div>

      <div class="col-2 form-group">
        <label for="base_currency">Converter de</label>
        <select
          id="base_currency"
          v-model="values.base_currency"
          class="form-control"
        >
          <option>BRL</option>
          <option>CAD</option>
          <option>USD</option>
        </select>
      </div>

      <div class="col-2 form-group">
        <label for="converted_currency">Para</label>
        <select
          id="converted_currency"
          v-model="values.converted_currency"
          class="form-control"
        >
          <option>BRL</option>
          <option>CAD</option>
          <option>USD</option>
        </select>
      </div>
      <div class="col-3 form-group">
        <button
          class="btn btn-primary form-control mt-4"
          type="submit"
          id="converter"
        >
          Converter
        </button>
      </div>
    </form>

    <div
      class="alert alert-primary m-2"
      v-if="values.converted_rate != undefined"
    >
      {{ formatValue(values.base_currency, values.base_rate) }} é equivale à
      {{ formatValue(values.converted_currency, values.converted_rate) }}
    </div>
  </div>
</template>

<script>
import moment from "moment";
import http from "../../http";
import currencyFormatter from "currency-formatter";

import Converter from "../../models/Converter";

import Loading from "vue-loading-overlay";
import "vue-loading-overlay/dist/vue-loading.css";

export default {
  props: ["base_date", "history"],
  components: {
    Loading,
  },
  data() {
    return {
      values: new Converter(this.base_date, 1, "USD", "BRL"),
      isLoading: false,
    };
  },

  methods: {
    formatValue(currency, value) {
      return new Intl.NumberFormat("pt-BR", {
        style: "currency",
        currency: currency,
      }).format(value);
    },

    converter() {
      this.isLoading = true;
      http.post("rates", this.values).then(
        (res) => {
          res.data.base_date = moment(res.data.base_date).format("DD/MM/YYYY");
          this.values.converted_rate = res.data.converted_rate;
          this.history.unshift(res.data);
          this.isLoading = false;
        },
        (error) => console.log(error)
      );
    },
  },
};
</script>

<style>
</style>
