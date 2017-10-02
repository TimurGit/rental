
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
// import Vue from 'vue'

 //Vue.component('example', require('./components/Example.vue'));
Vue.component('select-transport', require('./components/SelectTransport.vue'));
Vue.component('vuetable-data', require('./components/Vuetabledata.vue'));
// import vSelect from 'vue-select'
// Vue.component('v-select', vSelect)

const app = new Vue({
    el: '#app',
    data: {
            options: [],
            userlist: null,
            userlistoptions: [],
            errors: [],
            reg_number_list: null,
            reg_number: null,
            user:null
    },
    methods: {
        onChange:function(obj){
            this.reg_number = obj.value
        },

        onChangeFIO:function(obj){
            this.user = obj.value
        },
        getOptions(search, loading) {
            loading(true)
            axios.get('/api/transports', {
                    params: {q: search}
                })
                .then(response => {
                    this.options = response.data
                    loading(false)
            })
            .catch(e => {
                    this.errors.push(e)
                loading(false)
            })

        },
        getOptionsFIO(search, loading) {
            loading(true)
            axios.get('/api/userlist', {
                params: {q: search}
            })
                .then(response => {
                    this.userlistoptions = response.data
                    loading(false)
                })
                .catch(e => {
                    this.errors.push(e)
                    loading(false)
                })

        }
    }
});
