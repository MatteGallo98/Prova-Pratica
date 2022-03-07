<template>
    <app-layout>
         <div class="Form">
            <form @submit.prevent="sendData">
                <div class="form-group">
                    <label for="name">Nome Utente</label>
                    <input type="text" name="name" class="form-control " id="name" placeholder="Nome" v-model="utente.name" pattern="[^\d]+" required>
                        <div class="alert alert-danger" v-if="errors.name">{{ errors.name }}</div>
                </div>

                <div class="form-group">
                    <label for="agency_name">Nome Azienda</label>
                    <input type="text" name="agency_name" class="form-control " id="agency_name" placeholder="Azienda" v-model="utente.agency_name">
                  <!--   @error('agency_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror-->
                </div>

                <div class="form-group">
                    <label for="address">Indirizzo</label>
                    <input type="text" name="address" class="form-control " id="address" placeholder="Indirizzo" v-model="utente.address">
                  <!--   @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror-->
                </div>

                <div class="form-group">
                    <label for="phone">Telefono</label>
                    <input type="tel" name="phone" class="form-control " id="phone" placeholder="Telefono" pattern="[0-9]{7,9}" v-model="utente.phone">
                   <!--  @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror-->
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control " id="emailUser" placeholder="Email"  v-model="utente.email" required>
                   <!--  @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror-->
                </div>

                <div class="form-group">
                    <label for="password"> {{userUpdate ? "Nuova Password" : "Password"}}</label>
                    <input type="password" name="password" class="form-control " id="passwordUser" placeholder="Password" v-model="utente.password" v-if="!userUpdate" required>
                    <input type="password" name="password" class="form-control " id="passwordUser" placeholder="Password" v-model="utente.password" v-else >
                   <!-- @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror-->
                </div>
               
                <div class="form-group">
                    <label for="admin">Admin</label>
                    <input type="checkbox" name="admin" id="admin" @click="event=> changeValue(event)"/>
                </div>

                <button type="submit" class="btn btn-primary buttonLogin">Salva</button>
            </form>
        </div>
    </app-layout>
</template>

<script>
import Layout from './Layout';

export default {
 mounted(){
        console.log(this.$page.props.errors);
        console.log(this.userUpdate);
        if(this.userUpdate && this.userUpdate.admin==1){
            var nodoAdmin=document.getElementById("admin");
            nodoAdmin.value='1';
            nodoAdmin.checked= true;
        }
    },
  components:{
      'app-layout': Layout
  },
  props: {
    userUpdate: Object,
    errors: Object,
  },
  data(){
      return{
          utente: {
            'name': this.userUpdate ? this.userUpdate.name : null,
            'agency_name': this.userUpdate ? this.userUpdate.agency_name : null,
            'address': this.userUpdate ? this.userUpdate.agency_name : null,
            'phone' : this.userUpdate ? this.userUpdate.phone : null,
            'email' : this.userUpdate ? this.userUpdate.email : null,
            'admin' : this.userUpdate ? this.userUpdate.admin : '0',
            'password' : ''
          }
      }       
  },
  methods: {
      sendData(){
         if(this.userUpdate){
             this.$inertia.post(route('user.update', {'id': this.userUpdate.id}), this.utente);
         }else{
             console.log(this.utente);
             this.$inertia.post(route('user.store'), this.utente);
         }
      },
      changeValue(event){
          var nodoCheckbox = document.getElementById(event.target.id);
          console.log(nodoCheckbox.value);
          if(nodoCheckbox.value==1){
              this.utente.admin='0';
              nodoCheckbox.value=0;
          }else{
              this.utente.admin='1';
              nodoCheckbox.value=1;
          }
          console.log(this.utente);
      }
  }
}
</script>
