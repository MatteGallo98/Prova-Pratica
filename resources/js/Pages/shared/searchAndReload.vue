<template>
     <div class="rightContent col-sm">
            <div class="row">
                <div class="col inputContainer">
                    <i class="fa fa-search icon" aria-hidden="true" ></i>
                    <input type="text" id="search" placeholder="Cerca" name="search" class="searchInput Field" v-model="text" >
                </div>
                <div class="col">
                  <Link class="btn btn-primary reload" :href="route(routeEnd, {'perPage': perPage})">Ricarica Pagina</Link>  
                </div>
            </div>        
     </div>
</template>
<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
    components:{
        Link
    },
    props: {
        routeEnd : String,
        search: String,
        perPage: Number
    },
    data(){
        return {
            text: this.search,
            timer: null
        }
    },
    methods: {
        searchBar(){
            this.$inertia.get(route(this.routeEnd), {
                search: this.text
            }) 
        },
         searchTimer(){
          if(this.timer){
              clearTimeout(this.timer);
              this.timer=null;
          }
          
          this.timer = setTimeout(()=>{
            this.searchBar();
            },500);
        },
    },
    watch: {
        text : function (){
            this.searchTimer();
        }
    }
}
</script>
