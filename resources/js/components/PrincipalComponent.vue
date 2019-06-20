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
                :items="menu"
                :open="open"
                activatable
                open-on-click
            >
                <template slot="prepend" slot-scope="{ item, open }">
                    <v-icon v-if="item.type === 'folder'">
                        {{ open ? 'folder_open' : 'create_new_folder' }}
                    </v-icon>
                    <v-icon v-else>  
                        {{ 'arrow_forward' }}
                    </v-icon>
                </template>

                <template slot="label" slot-scope="{item}">
                    <router-link :to="item.ruta" v-if="item.ruta != 'principal'">{{ item.name }}</router-link>
                    <span v-else>{{ item.name }}</span>
                </template>
            
            </v-treeview>
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
                menu:[],
                open: []
            }
        },
        mounted(){
            axios.get('menu')
                .then(res => {
                    this.construir_menu(res.data.rsptaMod,res.data.rsptaSub);
                })
                .catch(err => {
                    console.log(err)
                });
        },
        methods: {
            mensaje(){
                alert('este es un mensaje');
            },
            construir_menu(Lista,SubLista)
            {
                let arbol = [];
                Lista.forEach((List,index) => {
                    arbol.push(
                        {
                            id: List.id_mod,
                            name: List.descripcion,
                            type: 'folder',
                            ruta: 'principal',
                            children: []
                        }
                    );
                    SubLista.forEach(SubList => {
                        if(List.id_mod === SubList.id_mod)
                        {
                            arbol[index].children.push(
                                {
                                    id: SubList.id_sub_mod,
                                    name: SubList.des_sub_mod,
                                    type: SubList.id_sistema,
                                    ruta: SubList.ruta_sis
                                }
                            );
                        }
                    });
                });
                
                this.menu = arbol;
            }
        }
    }
</script>
