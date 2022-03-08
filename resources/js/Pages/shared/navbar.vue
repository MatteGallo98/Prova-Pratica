<template>
  <div>
       <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd!important;">
            <a class="navbar-brand brand" href="/">BuyMe</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    
                        <li class="nav-item" v-if="!$page.props.user">
                            <a :href=" route('login') " class="nav-link underline me-auto">Log in</a>
                        </li>
           
                        <li class="nav-item" v-if="$page.props.user && !$page.props.user.admin">
                            <Link class="nav-link underline me-auto" :href="route('cart')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></Link>
                        </li>

                            <li class="nav-item dropdown" v-if="$page.props.user">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ $page.props.user.name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <span v-if="$page.props.user.admin">
                                        <a class="dropdown-item" :href="route('gest_utenti')">
                                            Gestione Utenti 
                                        </a>
                                        <a class="dropdown-item" :href="route('gest_prodotti')">
                                            Gestione Prodotti
                                        </a>
                                        <a class="dropdown-item" :href="route('gest_ordini')">
                                            Gestione Ordini
                                        </a>
                                    </span>
                                    <span v-else>
                                        <a class="dropdown-item" :href="route('userOrders',{'id': $page.props.user.id})">
                                            Riepilogo Ordini 
                                        </a>
                                   </span>
                                    
                                    <button class="dropdown-item" @click="logout" >Logout</button>
                                    
                                </div>
                            </li>
                           
                    </ul>
                </div>
        </nav>
  </div>
</template>

<script>
import {Link} from '@inertiajs/inertia-vue3'

export default {
    components: {
        Link
    },
    methods:{
        logout(){
            document.getElementById("logout").submit();
        }
    }
}
</script>
