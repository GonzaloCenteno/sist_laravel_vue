<template>
  <v-card class="pa-5 mb-2">
    <v-card-text v-for="(item, index) in menus" :key="index">
      <p class="text-lg-right">{{ item.descripcion }}</p>      
    </v-card-text>

    <p>{{ menus }}</p>
  </v-card>
</template>

<script>
    export default {
        data(){
            return {
                menus: []
            }
        },
        mounted(){
            axios.get('menu')
              .then(res => {
                  res.data.forEach(data => {
                    this.menus.push(data);
                  });
              })
              .catch(err => {
                  console.log()
              })
        }
    }
</script>