<template>
    <div>
        <p v-for="(prodotto, key) in prodotti" :key="key"> {{prodotto.name}}</p>
        <input name="name" placeholder="Nome" v-model="text"/>
        <Button text='Invia' @clicked="storeShopping"></Button>
        <a href="/" >Home</a>
        {{$page.props.flash}}
    </div>
</template>

<script>
import { usePage } from '@inertiajs/inertia-vue3';
import Button from './shared/Button';

export default {
    
    mounted(){
        console.log(this.$page.props);
    },
   data(){
       return {
           text : ""
       }
   },
   components: {
       Button
   },
   methods: {
       storeShopping(){
           this.$inertia.post(route('shopping'),{
              name: this.text
           },{
               preserveState: false
           });
       }
   },
   props: {
       prodotti : Array
   }
}
</script>


