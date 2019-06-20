import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
    routes:[
        {
            path: '/vue/usuarios',
            name: 'usuarios',
            component: require('./views/Roles.vue').default
        }
    ],
    mode: 'history'
})