<template>
    <div class="form-group">
        <label :for="'product'">{{'Prodotto'}}</label>
        <select :name="'product'" :id="'product'" class="form-select"  v-model='orderProducts' multiple>
            <option :value="{'id': product.id, 'amount': null, 'PS' : product.PS, 'name': product.name }" v-for="(product, key) in products" :key="key" >{{product.id+'-'+product.name+'-'}}{{product.PS == 1 ? '(S)': '(P)'}}</option>
        </select>
        
    </div>
    <div class="form-group" v-for="(orderProduct, key) in orderProducts" :key="key" >
        <div v-if="!orderProduct.PS">
            <label :for="'amount'">Quantità {{orderProduct.name}}</label>
            <input type="number" :name="'amount'" class="form-control" :id="'amount'" placeholder="Quantita" v-model="orderProduct.amount" required>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        products: Object, 
        orderProducts: Array,
        amounts: Array
    },
    watch:{
        orderProducts(){
            this.$emit('newOrderProducts', this.orderProducts);
        }
    }
}
</script>