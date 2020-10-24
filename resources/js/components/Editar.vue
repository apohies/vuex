<template>
    <div>
    <b-button id="show-btn" variant="warning" @click="showModal">Editar</b-button>

     <b-modal ref="my-modal1" hide-footer title="Editar Usuario">
          <form @submit.prevent="confirmar">
      <div class="d-block">
          <div class="form-group">
              <label>Nombre</label>
              <input class="form-control" v-model="usuario.nombre"  required>
              </div>

                <div class="form-group">
              <label>Imagen</label>
              <input class="form-control" v-model="usuario.imagen" required>
              </div>

              <div class="form-group">
              <label>Cedula</label>
              <input class="form-control" v-model="usuario.cedula"  required>
              </div>

                <div class="form-group">
              <label>Correo</label>
              <input class="form-control" v-model="usuario.correo"  required>
              </div>

                <div class="form-group">
              <label>Telefono</label>
              <input class="form-control" v-model="usuario.telefono" required>
              </div>

               <div class="form-group">
              <label>observaciones</label>
              <input class="form-control" v-model="usuario.observaciones" required>
              </div>

            
    
      </div>


      <b-button  variant="outline-danger" type="submit">Guardar</b-button>
        </form>
    </b-modal>
    


    </div>



</template>

<script>

export default {
props:{ids:""},

  data() {
    return {

      usuarioRef:"",
      usuario: {nombre: '', cedula:'', imagen: '' , correo:'' , telefono:'', observaciones:''}

    }
  },

  mounted(){
      this.cargar();
  },

methods : {

    informacion(){
        console.log(this.ids);
    },

     showModal() {
        this.$refs['my-modal1'].show()
      },
      hideModal() {
        this.$refs['my-modal1'].hide()
      },
   

    cargar(){

          axios.get('/api/show/'+this.ids).then(res=>{
      this.usuario = res.data;
     
    })

    },

      confirmar(){

         
          const usuarioedit= this.usuario;
            axios.post('api/edit/'+this.ids, usuarioedit)
        .then((res) =>{
          
            if(res.data==="exito"){
            this.hideModal();
            this.$emit('send')
           
            }
        })
      }
}
    
}
</script>