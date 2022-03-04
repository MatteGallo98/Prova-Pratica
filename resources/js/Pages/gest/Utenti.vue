<template>
                   
    <ThTable :perPage="data.perPage" :mainRoute="data.mainRoute" :columnsHead="data.columnsHead" />    
    <tr v-for="(user, key) in data.users.data" :key="key">
        <td>{{user.admin === 1 ? "Admin" : "Cliente"}}</td>
        <td>{{user.name}}</td>
        <td>{{user.agency_name}}</td>
        <td>{{user.email}}</td>
        <td>{{user.phone}}</td>
        <td>{{user.address}}</td>
        <td><Link :href="route('user.edit', {'id': user.id})">Modifica</Link></td>
        <td v-if="$page.props.user.id!==user.id">
                    <input type="submit" value="Cancella" class="buttonSubmit" @click="cancella(user.id)">
        </td>
    </tr>
</template>

<script>
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
            this.$inertia.post(route('user.destroy', {'id': id}))
        }
    }
}
</script>
