<template>
  <div>
    <b-button id="show-btn" variant="success" @click="showModal">Crear Usuario</b-button>
 

    <b-modal ref="my-modal" hide-footer title="Crear usuario">
          <form @submit.prevent="confirmar">
      <div class="d-block">
          <div class="form-group">
              <label>Nombre</label>
              <input class="form-control" v-model="usuario.nombre" required>
              </div>

                <div class="form-group">
              <label>Imagen</label>
              <input class="form-control" v-model="usuario.imagen" required>
              </div>

              <div class="form-group">
              <label>Cedula</label>
              <input class="form-control" v-model="usuario.cedula" required>
              </div>

                <div class="form-group">
              <label>Correo</label>
              <input class="form-control" v-model="usuario.correo" required>
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

    data() {
    return {

      usuario: {nombre: '', cedula:'', imagen: '' , correo:'' , telefono:'', observaciones:''}
    }
  },
    
    

    methods: {
      showModal() {
        this.$refs['my-modal'].show()
      },
      hideModal() {
        this.$refs['my-modal'].hide()
      },
   

      confirmar(){

         
          const usuarioNuevo = this.usuario;
            axios.post('api/create', usuarioNuevo)
        .then((res) =>{
          
            if(res.data==="exito"){
            this.hideModal()
             this.$emit('created');
             this.usuario={nombre: '', cedula:'', imagen: '' , correo:'' , telefono:'', observaciones:''}

            }
        })
      }
    }
  }
</script>