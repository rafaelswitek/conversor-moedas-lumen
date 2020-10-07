<template>
  <div>
    <h2>Histórico de conversões</h2>
    <table class="table table-hover">
      <tr>
        <th>Data conversão</th>
        <th>Valor base</th>
        <th>Valor convertido</th>
      </tr>
      <tr v-for="data of pageOfItems" :key="data.id">
        <td>{{ data.base_date }}</td>
        <td>{{ formatValue(data.base_currency, data.base_rate) }}</td>
        <td>{{ formatValue(data.converted_currency, data.converted_rate) }}</td>
      </tr>
    </table>
    <jw-pagination
      :items="history"
      @changePage="onChangePage"
      :labels="customLabels"
    ></jw-pagination>
  </div>
</template>

<script>
import moment from "moment";
const customLabels = {
  first: "<<",
  last: ">>",
  previous: "<",
  next: ">",
};

export default {
  props: ["history"],
  data() {
    return {
      pageOfItems: [],
      customLabels,
    };
  },

  methods: {
    onChangePage(pageOfItems) {
      // update page of items
      this.pageOfItems = pageOfItems;
    },
    formatValue(currency, value) {
      return new Intl.NumberFormat("pt-BR", {
        style: "currency",
        currency: currency,
      }).format(value);
    },
  }
};
</script>

<style>
</style>
