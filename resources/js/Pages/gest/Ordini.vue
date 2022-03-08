<template>
  <ThTable
    :perPage="data.perPage"
    :mainRoute="data.mainRoute"
    :columnsHead="data.columnsHead"
  />
  <tr v-for="(order, key) in data.orders.data" :key="key">
    <td>{{ order.email }}</td>
    <td>
      <span v-for="(product, key) in order.products" :key="key">
        {{ product.name + " " }}{{ product.PS == 0 ? "(P)" : "(S)" }}</span
      ><br />
    </td>
    <td>{{ order.status }}</td>
    <td>{{ format_date(order.created_at) }}</td>
    <td>{{ order.final_price + " €" }}</td>
    <td>{{ order.final_discount_price + " €" }}</td>
    <td><Link :href="route('order.edit', { id: order.id })">Modifica</Link></td>
    <td>
      <input
        type="submit"
        value="Cancella"
        class="buttonSubmit"
        @click="cancella(order.id)"
      />
    </td>
  </tr>
</template>

<script>
import moment from "moment";
import ThTable from "../shared/thTable";
import { Link } from "@inertiajs/inertia-vue3";
import lib from "../../shareJs/lib";

export default {
  components: {
    ThTable,
    Link,
  },
  props: {
    data: Object,
  },
  methods: {
    cancella(id) {
      if (confirm("Vuoi veramente cancellarlo?")) {
        this.$inertia.post(
          route("order.destroy", { id: id, perPage: this.data.perPage })
        );
      }
    },
    format_date(value) {
      if (value) {
        return moment(String(value)).format("DD MM YYYY");
      }
    },
  },
};
</script>

