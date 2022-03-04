<template>
    <tr>   
        <th class="th-sm" v-for="(valore, nome) in columnsHead" :key="nome">
            <div class="row">
                <div class="col-sm-9">
                    {{nome}}
                </div>
                <div class="upAndDown col-sm-3" v-if="nome!=='Prodotti'">
                    <Link class="up" :href="route(mainRoute, {
                        'perPage': perPage,
                        'column' : valore,
                        'type': 'ASC'
                        })"><i class="fa fa-arrow-up" aria-hidden="true"></i></Link>
                    <Link class="down" :href="route(mainRoute, {
                        'perPage': perPage,
                        'column' : valore,
                        'type': 'DESC'
                        })"><i class="fa fa-arrow-down" aria-hidden="true"></i></Link>
                </div>
            </div>
        </th>
        <th></th>
        <th></th>
    </tr>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3';

export default {
  components:{
      Link
  },
  props: {
      columnsHead: Object,
      mainRoute: String,
      perPage: Number
  }
}
</script>
