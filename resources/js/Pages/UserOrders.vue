<template>
  <app-layout>
    <div class="UserOrders">
      <div class="titleGest">
        <h2>Riepilogo Ordini</h2>
      </div>
      <UserOrder v-for="(order, key) in orders" :key="key" :order="order"/>
    </div>
  </app-layout>
</template>

<script>
import Layout from "./Layout";
import UserOrder from './shared/UserOrder'

export default {
  mounted() {
    console.log(this.orders);
  },
  props: {
    orders: Object,
  },
  components: {
    "app-layout": Layout,
    UserOrder
  },
};
</script>