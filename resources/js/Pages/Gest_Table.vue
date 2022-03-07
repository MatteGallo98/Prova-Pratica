<template>
    <app-layout>
        <div class="titleGest">
            <h2>Gestione {{titolo}}</h2>
        </div>
        <div class = "row">
            <SelectorPage :perPage="data.perPage" :numberOfItems="numberOfItems" />
            <SearchAndReload :routeEnd="data.mainRoute" :search="searchValue"  :perPage="data.perPage"/>
            <div class="rightContent col-sm">
                <a class="btn btn-primary" :href="route(data.addRoute)">Aggiungi {{titolo}}</a>
            </div>
        </div>
         <div class="userTable">
            <table class="table table-bordered table-sm" cellspacing="0" width="100%">
               <Utenti v-if="table_type==='users'" :data="data"/>
               <Prodotti v-else-if="table_type==='products'" :data="data" />
               <Ordini v-else :data="data"/>
            </table>
        </div>
    </app-layout>
</template>

<script>
import Layout from './Layout';
import SelectorPage from './shared/SelectorPage';
import SearchAndReload from './shared/searchAndReload'
import Utenti from './gest/Utenti';
import Prodotti from './gest/Prodotti';
import Ordini from './gest/Ordini';

export default {
    components:{
      "app-layout":Layout,
      SearchAndReload,
      SelectorPage,
      Utenti,
      Prodotti,
      Ordini
    },
    props:{
        data: Object,
        table_type: String,
        title: String,
        search: String
    },
    data(){
        return {
            titolo: this.title,
            numberOfItems: [5,10,15,20,25],
            searchValue: this.search
        }
    }
}
</script>
