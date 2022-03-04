<template>
  <app-layout >
    <div >
     <div class="SplashPage">
            <div class="testoSplash">
                <h2> Compra quello che vuoi. Quando vuoi</h2>
            </div>
        </div>
        <div class="row toolbar">
          <SelectorPage :perPage="perPage" :numberOfItems="numberOfItems" />
          <div class="col-sm">
            <div class="row">
              <div class="col">
                <select name="orderFor" id="orderFor" class="form-select select-order" v-model="orderColumn" @change="orderSomething">         
                  <option :value="orderColumn" v-for="(orderColumn, key) in orderColumns" :key="key">{{key}}</option>             
                </select>
              </div>
              <div class="col">
                <select name="type" id="type" class="form-select select-order" v-model="typeOrder" @change="orderSomething">         
                  <option value="ASC" selected>Ascendente</option>  
                  <option value="DESC">Discendente</option>            
                </select>
              </div>
              <div class="col">
                <div class="radioService">
                  <input type="radio" id="E" value="" v-model="picked" @change="orderSomething">
                  <label for="E">Entrambi</label>
                </div>
                <div class="radioService">
                  <input type="radio" id="S" value="1" v-model="picked" @change="orderSomething">
                  <label for="S">Servizio</label>
                </div>
                <div class="radioService">
                  <input type="radio" id="P" value="P" v-model="picked" @change="orderSomething">
                  <label for="P">Prodotto</label>
                </div>
              </div>
             
            </div>
          </div>
          <SearchAndReload routeEnd="homepage" :search="searchValue" />
        </div>
        <div class="productList row justify-start">
            <div
              class="prodDiv col-3"
              v-for="(product, index) in pinco.data"
              :key="index"
            >
              <div class="typeProduct">
                <h2 class="type">
                  {{ product.PS === 0 ? "Prodotto" : "Servizio" }}
                  <span class="dataProd">({{ format_date(product.created_at) }})</span>
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
              <p class="Price">
                {{
                  product.cost +
                  product.measure +
                  " con sconto pari al " +
                  product.discount +
                  "% per un complessivo di " +
                   calculateDiscount(product)
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
import SearchAndReload from './shared/searchAndReload';
import moment from 'moment'

export default {
  components: {
    "app-layout": Layout,
    "standard-button": StandardButton,
    Link,
    SelectorPage,
    SearchAndReload
  },
  data() {
    return {
      pinco: this.products,
      buttonText: 'Cliccami',
      key: 0,
      numberOfItems: [1,10,15,20,25],
      orderColumns: {
        "Prezzo": "prezzo",
        "Sconto": "sconto",
        "Nome" : "nome",
        "Data Creazione" : "data"
      },
      orderColumn: this.column,
      picked: this.filter,
      typeOrder: this.type,
      searchValue: this.search
    };
  },
  props: {
    products: Object,
    perPage: Number,
    filter : String,
    type: String,
    column: String,
    search: String
  },
  methods: {
    orderSomething(){
          this.$inertia.get(route('homepage'),{
            column: this.orderColumn,
            filter: this.picked,
            type: this.typeOrder
          },{
              preserveState: false
          });
    },
    updateStandardObject() {
        this.key++;
    },
    calculateDiscount(product) {
      return (product.cost - product.cost * (product.discount / 100)) + this.getMeasure(product);
    },
    getMeasure(product) {
      return product.measure;
    },
    format_date(value){
          if (value) {
              return moment(String(value)).format('DD MM YYYY')
          }
    },
  },
};
</script>
