<template>
    <app-layout>
         <div class="Form">
            <form @submit.prevent="sendData">
                <div class="form-group" v-if="users">
                    <label for="user_id">Utente</label>
                    <select id="user" name="user_id" class="form-select" aria-label="Default select example" v-model="order.user_id" required>
                        <option :value="user.id" v-for="(user, key) in users" :key="key">{{user.id+'-'+ user.name}}</option>     
                    </select>
                </div>

                <div class="form-group">
                    <label for="status">Stato Ordine</label>
                    <select id="status" name="status" class="form-select" aria-label="Default select example" v-model="order.status">
                        <option :value="state" v-for="(state, key) in status" :key="key">{{state}}</option>  
                    </select>
                </div>
                <ProdAmount :products="products" :orderProducts="orderProducts" :amounts="order.amounts" v-if="!orderUpdate" @newOrderProducts="(newOP)=>orderProducts=newOP"/>

                <button type="submit" class="btn btn-primary buttonLogin">Salva</button>
            </form>
        </div>
    </app-layout>
</template>


<script>

import Layout from './Layout';
import ProdAmount from './shared/ProdAmount'

export default {
 mounted(){
     if(this.orderUpdate){
        this.order.status= this.status[0];
    }else{
        this.order["user_id"] = '';
        this.order['product'] = [];
        this.order['amount']= [];
    }
  },
  components:{
      'app-layout': Layout.Layout,
      ProdAmount
  },
  props: {
    orderUpdate: Object,
    errors: Object,
    users: Object,
    products: Object
  },
  data(){
      return{
          orderProducts : [],
          status : ['In elaborazione', 'Spedito', 'Completato'],
          order: {
              'status' : this.orderUpdate ? this.orderUpdate.status : ''
            /*'user_id': this.orderUpdate ? this.orderUpdate.user_id : null,
            'description': this.productUpdate ? this.productUpdate.description : null,
            'PS': this.productUpdate ? this.productUpdate.PS : '0',
            'availability' : this.productUpdate ? this.productUpdate.availability : null,
            'cost' : this.productUpdate ? this.productUpdate.cost : null,
            'measure' : this.productUpdate ? this.productUpdate.measure : "€/unità",
            'discount' : this.productUpdate ? this.productUpdate.discount : null,*/
          }
      }       
  },
  methods: {
      sendData(){
         if(this.orderUpdate){
             this.$inertia.post(route('order.update', {'id': this.orderUpdate.id}), this.order);
         }else{
             console.log(this.orderProducts);
             this.extractValue('id', this.order.product, this.orderProducts);
             this.extractValue('amount', this.order.amount, this.orderProducts);
             console.log(this.order);
             this.$inertia.post(route('order.store'), this.order);
         }
      },
      extractValue(key, finalArray, compositeArray){
        for(var i=0; i<compositeArray.length; i++){
            finalArray.push(compositeArray[i][key])
        }
      }
  }
}
</script>