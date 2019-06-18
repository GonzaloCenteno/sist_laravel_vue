<template>
<v-container>
    <v-toolbar app color="red lighten-1">

        <v-toolbar-side-icon @click="drawer = !drawer"></v-toolbar-side-icon>

        <v-toolbar-title>INTRANET</v-toolbar-title>

        <v-spacer></v-spacer>

        <v-toolbar-items class="hidden-sm-and-down">
            <v-btn flat>Link One</v-btn>
            <v-btn flat>Link Two</v-btn>
            <v-btn flat>Link Three</v-btn>
        </v-toolbar-items>
        
    </v-toolbar>

    <v-navigation-drawer app v-model="drawer" temporary>
        <v-layout mt-4 column align-center>
            <v-flex>
                <p class="dark--text mt-3 headline">Gonzalo Centeno Zapata</p>
            </v-flex>
            <v-treeview 
                :items="items"
                open-on-click
                activatable
            >
            </v-treeview>
                <!-- <li v-for="(item, index) in menus" :key="index">
                    <router-link :to="{name:  'item.descripcion'}">{{ item.descripcion }}</router-link>
                </li> -->
            <p>{{ items }}</p>
        </v-layout>
    </v-navigation-drawer>

    <transition name="slide-fade" mode="out-in">
        <router-view></router-view>
    </transition>

</v-container>
</template>

<script>
    export default {
        data(){
            return {
                drawer: false,
                menus: [],
                items: []
            }
        },
        mounted(){
            axios.get('menu')
              .then(res => {
                console.log(res.data);
                // res.data.forEach(data => {
                //     this.items.push({
                //         id: data.id_mod,
                //         name: data.descripcion,
                //         children:
                //         [
                //             {id:1, name: 'otro'},
                //             {id:1, name: 'otro'}
                //         ]
                //     });
                // });
              })
              .catch(err => {
                  console.log()
              })
        }
    }
</script>
