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
            <!-- <v-flex v-for="(item, index) in menus" :key="index">
                <v-btn block color="warning">{{ item.descripcion }}</v-btn>
            </v-flex> -->
            <ul>
                <li>
                    <router-link :to="{name: 'roles'}">ROLES</router-link>
                </li>
            </ul>
        </v-layout>
    </v-navigation-drawer>

    <transition name="slider-fade" mode="out-in">
        <router-view></router-view>
    </transition>

</v-container>
</template>

<script>
    export default {
        data(){
            return {
                drawer: false,
                menus: []
            }
        },
        mounted(){
            axios.get('menu')
                .then(res => {
                    console.log(res.data);
                    this.menus.push(res.data);
                })
                .catch(err => {
                    console.log()
                })
        },
    }
</script>
