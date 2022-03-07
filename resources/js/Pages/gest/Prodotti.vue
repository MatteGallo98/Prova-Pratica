<template>
    <ThTable :perPage="data.perPage" :mainRoute="data.mainRoute" :columnsHead="data.columnsHead" />                  
    <tr v-for="(product, key) in data.products.data" :key="key">
        <td>{{product.name}}</td>
        <td>{{product.description}}</td> 
        <td>{{product.PS === 1 ? "Servizio" : "Prodotto"}}</td>
        <td>{{product.availability}}</td>
        <td>{{product.cost}}</td>
        <td>{{product.measure}}</td>
        <td>{{product.discount ? product.discount+"%" : '' }}</td>
        <td><Link :href="route('product.edit', {'id': product.id})">Modifica</Link></td>
        <td>
                    <input type="submit" value="Cancella" class="buttonSubmit" @click="cancella(product.id)">
        </td>
    </tr>
</template>

<script>
import moment from 'moment';
import ThTable from '../shared/thTable';
import {Link} from '@inertiajs/inertia-vue3';

export default {
     components:{
        ThTable,
        Link
    },
    props:{
        data: Object
    }, 
    methods:{
        cancella(id){
            console.log(id);
            this.$inertia.post(route('product.destroy', {'id': id}))
        },
         format_date(value){
            if (value) {
                return moment(String(value)).format('DD MM YYYY')
            }
      },
    }
}
</script>

