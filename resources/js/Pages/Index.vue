<template>
  <app-layout >
    <div class="container">
        <input type="text" v-model="buttonText" />
      <div
        class="prodDiv col-3"
        v-for="(product, index) in pinco.data"
        :key="index"
      >
        <div class="typeProduct">
          <h2 class="type">
            {{ product.PS === 0 ? "Prodotto" : "Servizio" }}
            <span class="dataProd">({{ product.created_at }})</span>
          </h2>
        </div>
        <h2 class="titleProd">{{ product.name }}</h2>
        <p class="descProd">
          {{ product.description
          }}{{
            product.PS === 0
              ? " di cui rimangono solo " + product.availability + " pezzi"
              : ""
          }}
        </p>
        <p class="Price" v-if="product.stringDiscount !== undefined">
          {{
            product.cost +
            product.measure +
            " con sconto pari al " +
            product.discount +
            "% per un complessivo di " +
            product.stringDiscount
          }}
        </p>
      </div>
      <Link href="/x">X</Link>
      <p :key="key">
        {{standardObject.provincia}}  
      </p>
      <standard-button :text="buttonText" @clicked="updateStandardObject" />
    </div>
  </app-layout>
</template>

<script>
import Layout from "./Layout";
import StandardButton from "./shared/Button";
import {Link} from '@inertiajs/inertia-vue3';

export default {
  components: {
    "app-layout": Layout,
    "standard-button": StandardButton,
    Link
  },
  data() {
    return {
      pinco: this.products,
      buttonText: 'Cliccami',
      key: 0,
      standardObject: [{
          nome: 'Pippo',
          cognome: 'Franco'
      }]
    };
  },
  props: {
    products: Object,
    perPage: Number,
  },
  methods: {
      updateStandardObject() {
          this.standardObject.provincia = 'Pordenone';
          this.key++;
      },
    calculateDiscount(product, index) {
      this.pinco.data[index].stringDiscount =
        product.cost -
        product.cost * (product.discount / 100) +
        this.getMeasure(product);
    },
    getMeasure(product) {
      return product.measure;
    },
  },
};
</script>
