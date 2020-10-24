<template>
  <div>
    <b-button id="show-btn" variant="danger" v-on:click="eliminar"> Eliminar Usuario</b-button>
 


  </div>
</template>

<script>

export default {
    props:{ids:""},

    methods: {
  

      eliminar(){

          axios.get('/api/delete/'+this.ids).then(res=>{
      
     
    })
            this.$emit('actualizar');
    }

    }

}
   
    

</script>