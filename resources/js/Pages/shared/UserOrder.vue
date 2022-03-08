<template>
  <div class="UserOrder">
    <div class="row">
      <div class="col">
        <h2>Ordine del {{ format_date(order.created_at) }}</h2>

        <p>
          Stato Ordine: <span class="status">{{ order.status }}</span>
        </p>
        <h2 class="finalCount">
          Per un totale non scontato di: {{ order.final_price }}€ e scontato di
          {{ Number(order.final_discount_price).toFixed(2) }}€
        </h2>
      </div>
      <div class="col">
        <p class="acquistati">Acquistati:</p>
        <p v-for="(product, key) in order.products" :key="key">
          {{ product.name }} {{product.PS ? "(S)" : "(P)"}}, in quantità {{ product.pivot.amount }}
        </p>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";

export default {
  props: {
    order: Object,
  },
  methods: {
    format_date(value) {
      if (value) {
        return moment(String(value)).format("DD MM YYYY");
      }
    },
  },
};
</script>