<template>

    

    <div style="margin:5%;">

        
        <Crear @created="carga" ></Crear>
 
        <table class="table" style="margin-top:1%;">
            <thead>
            <tr>
            <th >Nombre</th>
            <th >Fecha Creacion</th>
            <th> Fecha Edicion </th>
            <th> Acciones </th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="item in usuarios"> 

            <td v-text="item.nombre"></td>
            <td v-text="item.created_at"></td>
            <td v-text="item.updated_at"></td>
            <td> 
                <Ver v-bind:ids="item.id" ></Ver> 
                <Editar v-bind:ids="item.id" @send="carga" ></Editar>
                <Eliminar v-bind:ids="item.id"  @actualizar="carga" ></Eliminar>
                
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    import Crear from "./Crear.vue";
    import Editar from "./Editar.vue";
    import Ver from "./Ver.vue";
    import Eliminar from "./Eliminar.vue";

    export default {
        
         components: {
    Crear,
    Editar,
    Ver,
    Eliminar
  },
    data() {
    return {
      usuarios: [],
      
      
    }
  },
  mounted(){
  
      this.carga()
  },

  methods:{

      carga(){
            axios.get('/api/testeo').then(res=>{
      this.usuarios = res.data;
    })

      }
  }

       
    }
</script>
