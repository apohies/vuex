<template>
  <div>
    <b-button id="show-btn" variant="success" @click="showModal">Ver Usuario</b-button>
 

    <b-modal ref="my-modal2" hide-footer title="Informacion Usuario">

        
         
      <div class="d-block">
           <p> <span>Nombre:</span>{{usuario.nombre}} </p> 
           <p> <span>Cedula :</span>{{usuario.cedula}} </p> 
            <p> <span>Correo:</span> {{usuario.correo}} </p> 
            <p> <span>Telefono:</span>  {{usuario.telefono}}</p> 
            <p> <span>observaciones:</span>  {{usuario.observaciones}}</p> 
    
         

    
      </div>


      <b-button  variant="outline-danger" v-on:click="hideModal" >cerrar</b-button>
        
    </b-modal>
  </div>
</template>

<script>

export default {
    props:{ids:""},
     data() {
    return {

      usuario: {nombre: '', cedula:'', imagen: '' , correo:'' , telefono:'', observaciones:''}
    }
  },

  mounted(){
       

  },
    

    methods: {
      showModal() {
        this.$refs['my-modal2'].show()
        this.cargar();
       
        console.log(this.usuario);
      },
      hideModal() {
        this.$refs['my-modal2'].hide()
      },

      cargar(){

          axios.get('/api/show/'+this.ids).then(res=>{
      this.usuario = res.data;
     
    })

    }

    }

}
   
    

</script>