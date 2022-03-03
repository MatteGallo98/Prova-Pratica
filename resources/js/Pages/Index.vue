<template>
  <app-layout >
    <div >
     <div class="SplashPage">
            <div class="testoSplash">
                <h2> Compra quello che vuoi. Quando vuoi</h2>
            </div>
        </div>
        <SelectorPage :perPage="perPage" :numberOfItems="numberOfItems" />
        <div class="productList row justify-start">
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
          </div>
        </div>
  </app-layout>
</template>

<script>
import Layout from "./Layout";
import StandardButton from "./shared/Button";
import SelectorPage from './shared/SelectorPage';
import {Link} from '@inertiajs/inertia-vue3';

export default {
  components: {
    "app-layout": Layout,
    "standard-button": StandardButton,
    Link,
    SelectorPage
  },
  data() {
    return {
      pinco: this.products,
      buttonText: 'Cliccami',
      key: 0,
      standardObject: [{
          nome: 'Pippo',
          cognome: 'Franco'
      }],
      numberOfItems: [1,10,15,20,25]
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
