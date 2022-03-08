<template>

  <div class="prodDiv col-3">
   <div class="typeProduct">
      <h2 class="type">
        {{ product.PS == 0 ? "Prodotto" : "Servizio" }}
        <span class="dataProd">({{ format_date(product.created_at) }})</span>
      </h2>
    </div>
    <h2 class="titleProd">{{ product.name }}</h2>
    <p class="descProd">
      {{ product.description
      }}{{
        product.PS == 0
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
    <div class="row AddCart mt-auto mx-auto" v-if=" $page.props.user && !$page.props.user.admin">
      <div class="col" >
        <form @submit.prevent="addToCart" >
            <input type="number" :min="1" :max="product.availability" :name="'Amount'+product.id" :id="'Amount'+product.id" v-model="currentAmount" class="form-control quantitaCar" >
            <button type="submit" class="btn btn-primary">Aggiungi al Carrello</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import Cookies from 'js-cookie';
import lib from '../../shareJs/lib';

export default {
  mounted(){
  },
  props: {
    product: Object,
  },
  data(){
      return {
          currentAmount:1
      }
  },
  methods: {
    calculateDiscount(product) {
      var dis= Number(product.cost - product.cost * (product.discount / 100)).toFixed(2) + this.getMeasure(product);
      return dis;
    },
    format_date(value) {
      if (value) {
        return moment(String(value)).format("DD MM YYYY");
      }
    },
    getMeasure(product) {
      return product.measure;
    },
    addToCart(){
        console.log(this.product);
        var cart=undefined;
        if(Cookies.get('cart')){
            cart = JSON.parse(Cookies.get('cart'));
            console.log(cart);
        }
       var actualEl= {
            'prod_id': this.product.id,
            'amount' : this.currentAmount ? this.currentAmount : 0,
            'prod_name' : this.product.name,
            'prod_max' : this.product.availability,
            'prod_price' : this.product.cost,
            'prod_dis' : this.product.discount,
            'prod_measure': this.product.measure,
            'prod_desc' : this.product.description
        };

        if(!cart){
           cart=[];
           cart.push(actualEl); 
        }else{
            var [find, index]= lib.findInCart(cart, this.product.id);
            if(find){
                cart[index].amount+=this.currentAmount;
            }else{
              cart.push(actualEl);  
            }
        }
        Cookies.set('cart', JSON.stringify(cart), {expires: 7})
        
    },
  },
};
</script>