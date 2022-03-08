<template>
    <div class="row cartEl">
        <div class="col">
            <h2>{{cartel.prod_name}}</h2>
            <p>{{cartel.prod_desc}}</p>
        </div>
        <div class="col">
            <h3>Quantità: {{cartel.amount}}</h3>
            <h3>Prezzo: {{calculateDiscount(cartel)}}</h3>
        </div>
        <div class="col">
            <form @submit.prevent="changeQuantity" >
                <input type="number" :min="1" :max="cartel.prod_max" :name="'Amount'+cartel.prod_id" :id="'Amount'+cartel.prod_id" v-model="newAmount" class="form-control quantitaCar" >
                <button type="submit" class="btn btn-primary btnCarrello">Modifica Quantità</button>
            </form>
            <button type="submit" class="btn btn-primary btnCancella" @click="cancellaEl">Cancella Elemento</button>
        </div>
    </div>
</template>

<script>
import lib from '../../shareJs/lib';
import Cookies from 'js-cookie';

export default {
    mounted(){
       console.log(this.cartel);
    },
    data(){
       return {
          newAmount : this.cartel.amount
       } 
    },
    props:{
        cartel: Object
    },
    methods:{
        calculateDiscount(product) {
            var dis= Number((product.prod_price - product.prod_price * (product.prod_dis / 100))*product.amount).toFixed(2) + product.prod_measure;
            return dis;
        },
        changeQuantity() {
            var cart = JSON.parse(Cookies.get('cart'));
            var [find, index]= lib.findInCart(cart, this.cartel.prod_id);
            if(find){
                cart[index].amount=this.newAmount;
            }
            console.log(cart);
            Cookies.set('cart', JSON.stringify(cart), {expires: 7});
            this.$inertia.get(route('cart'));
        },
        cancellaEl(){
            if(confirm("Vuoi veramente cancellarlo?")){
                var cart = JSON.parse(Cookies.get('cart'));
                var [find, index]= lib.findInCart(cart, this.cartel.prod_id);
                if(find){
                    cart.splice(index, 1);
                }
                console.log(cart);
                Cookies.set('cart', JSON.stringify(cart), {expires: 7});
                this.$inertia.get(route('cart'));
            }
        }
    }

}
</script>