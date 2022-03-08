<template>
  <app-layout>
    <div class="titleGest">
      <h2>Carrello</h2>
    </div>
    <div v-if="exCart">
    <CartEl v-for="(cartel, key) in cartdata" :key="key" :cartel="cartel" />
    <div class="finalPrice row">
        <div class="col"></div>
        <div class="col">
            <h2>Quantità totale: {{finalAmount}}</h2>
            <h2>Prezzo Finale: {{finalPrice}}€ </h2>
            <h2>Prezzo Finale Scontato: {{finalDisPrice}}€ </h2>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary" @click="confirmOrder">Conferma Ordine</button>
        </div>
        </div>
    </div>
    <div class="emptycart row" v-else>
        <h2>Nessun Prodotto/Servizio presente nel carrello</h2>
    </div>
  </app-layout>
</template>

<script>
import Cookies from "js-cookie";
import Layout from "./Layout";
import CartEl from "./shared/CartEl";

export default {
  mounted() {
      if(Cookies.get('cart')){
         this.calcFinalAmountAndPrice(); 
      }
      
      console.log(this.$page.props.user);
  },
  components: {
    "app-layout": Layout,
    CartEl,
  },
  data() {
    return {
      cartdata: Cookies.get("cart") ? JSON.parse(Cookies.get("cart")) : {},
      finalAmount: 0,
      finalPrice: 0,
      finalDisPrice: 0,
      productsAmounts:  [],
      exCart: this.existingCart()
    };
  },
  methods: {
    calcFinalAmountAndPrice() {
      for (var i = 0; i < this.cartdata.length; i++) {
        this.finalAmount += this.cartdata[i].amount;
        this.finalDisPrice += parseFloat(this.calculateDiscount(this.cartdata[i]));
        this.finalPrice += parseFloat(this.calculatePrice(this.cartdata[i]));
      }
    },
      calculatePrice(product) {
      var dis = Number(( product.prod_price  * product.amount)).toFixed(2);
      return dis;
    },
    calculateDiscount(product) {
      var dis = Number((product.prod_price - product.prod_price * (product.prod_dis / 100)) * product.amount).toFixed(2);
      return dis;
    },
    confirmOrder(){
        this.extractAmountId();
        this.$inertia.post(route('cartToOrder'),{
            'status': 'In elaborazione',
            'user_id': this.$page.props.user.id,
            'productsAmounts' : this.productsAmounts,
            'finalprice' : this.finalPrice,
            'finaldisprice': this.finalDisPrice
        })
        Cookies.remove('cart');

    },
    extractAmountId(){
        for (var i = 0; i < this.cartdata.length; i++) {
            let prod_id= this.cartdata[i];
            var obj = {
                [prod_id.prod_id]: {
                'amount': prod_id.amount
            }
            }

            this.productsAmounts.push(obj);
        }
    },
    existingCart(){
        console.log(Cookies.get("cart"));
        return Cookies.get("cart");
    }
     
  },
};
</script>
