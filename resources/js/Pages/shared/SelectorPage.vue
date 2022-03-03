<template>
    <div class="selectPagination col-sm">
        <label for="pageNumber" class="control-label labelPage"> Elementi per pagina: </label>
        <select name="pageNumber" id="pageNumber" class="form-select" @change="changeFunc();" v-model="currentPage">
           
            <option :value="numberOfItem" v-for="(numberOfItem, key) in numberOfItems" :key="key">{{numberOfItem}}</option>
               
        </select>
    </div>   
</template>

<script>


export default {
    data(){
        return {
            currentPage: this.perPage
        }
    },
    props :{
        numberOfItems : Array,
        perPage: Number
    },
    methods: {
        changeFunc() {
              const queryString = window.location.search;
              const urlParams = new URLSearchParams(queryString);
              var selectBox = document.getElementById("pageNumber");
              var selectedValue = selectBox.options[selectBox.selectedIndex].value;
              if(urlParams.get('search')){
                  window.location.href= "?page=1&search="+urlParams.get('search')+"&perPage="+selectedValue;  
              }else{
                  window.location.href= "?page=1&perPage="+selectedValue;  
              }
              
          }
    }
}
</script>

