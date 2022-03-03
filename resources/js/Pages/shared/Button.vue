<template>
    <button class="btn btn-primary p-2 border-rounded" @click="$emit('clicked', 'Clicca Qui Coso')">
        {{text ? text : 'Clicca Qui'}}
    </button>
</template>

<script>
export default {
    props: {
        text: {
            type: String,
            nullable: true,
            default: 'Clicca Qui'
        }
    },  
    watch : {
        text: function (){
            console.log("Sono cambiato");
        }
    }
}
</script>