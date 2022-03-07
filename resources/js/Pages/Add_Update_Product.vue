<template>
    <app-layout>
         <div class="Form">
            <form @submit.prevent="sendData">
                 <div class="form-group">
                    <label for="name">Nome Prodotto</label>
                    <input type="text" name="name" class="form-control " id="name" placeholder="Nome" v-model="prod.name" pattern="[^\d]+" required>
                </div>

                <div class="form-group">
                    <label for="description">Descrizione</label>
                    <textarea rows="2" name="description" class="form-control" id="description" placeholder="Descrizione" v-model="prod.description" ></textarea>
                </div>

                <div class="form-group">
                    <label for="PS">Servizio (di default Prodotto)</label>
                    <input type="checkbox" name="PS" id="PS" @click="event => PSfunction(event)">
                </div>

               <div class="form-group" id="PSdiv">
                    <label for="availability">Disponibilità</label>
                    <input type="number" name="availability" class="form-control" id="availability" placeholder="Disponibilità" v-model="prod.availability">
                </div>

                 <div class="form-group">
                    <label for="cost">Prezzo</label>
                    <input type="number"  step=0.01 name="cost" class="form-control" id="cost" placeholder="Prezzo" v-model="prod.cost" required>
                </div>

                <div class="form-group">
                    <label for="measure">Unità di misura</label>
                    <select id="measure" name="measure" class="form-select" aria-label="Default select example" v-model="prod.measure">
                       <option :value="option" v-for="(option, key) in options" :key="key">{{option}}</option>     
                    </select>
                </div>

               
                <div class="form-group">
                    <label for="discount">Sconto</label>
                    <select id="discount" name="discount" class="form-select" aria-label="Default select example" v-model="prod.discount">
                        <option value=""></option> 
                        <option :value="discount" v-for="(discount, key) in discounts" :key="key">{{discount+'%'}}</option>    
                    </select>
                   
                </div>

                <button type="submit" class="btn btn-primary buttonLogin">Salva</button>
            </form>
        </div>
    </app-layout>
</template>


<script>

import Layout from './Layout';
import lib from '../shareJs/lib';

export default {
 mounted(){
       lib.nodoControl("PS", this.productUpdate);
    },
  components:{
      'app-layout': Layout
  },
  props: {
    productUpdate: Object,
    errors: Object,
  },
  data(){
      return{
          options: ["€/unità", "€/ora", "€/minuto", "€/kg"],
          discounts : this.createDiscounts(),
          prod: {
            'name': this.productUpdate ? this.productUpdate.name : null,
            'description': this.productUpdate ? this.productUpdate.description : null,
            'PS': this.productUpdate ? this.productUpdate.PS : '0',
            'availability' : this.productUpdate ? this.productUpdate.availability : null,
            'cost' : this.productUpdate ? this.productUpdate.cost : null,
            'measure' : this.productUpdate ? this.productUpdate.measure : "€/unità",
            'discount' : this.productUpdate ? this.productUpdate.discount : null,
          }
      }       
  },
  methods: {
      sendData(){
         if(this.productUpdate){
             this.$inertia.post(route('product.update', {'id': this.productUpdate.id}), this.prod);
         }else{
             console.log(this.prod);
             this.$inertia.post(route('product.store'), this.prod);
         }
      },
      PSfunction(event){
        this.changeValue(event);
        this.showhiddenAvailability();
      },
      changeValue(event){
          lib.changeValue(event, this.prod);
      },
      showhiddenAvailability(){
                var nodoDis= document.getElementById('PSdiv');
                console.log(nodoDis);
                if(nodoDis.style.display=== 'none'){
                    nodoDis.style.display= 'block'
                }else{
                    nodoDis.style.display= 'none'
                }
            },
    createDiscounts(){
        var dis= [];
        for(var i=5; i<=100; i+=5){
            dis.push(i);
        }

        return dis;
    }
  }
}
</script>