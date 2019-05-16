import Vue from 'vue'
import App from './App.vue'
import store from './store/store'
import axios from 'axios';
import '@babel/polyfill'

axios.defaults.baseURL = 'http://recipe.local/api'

Vue.filter('caps',  (value) =>{
    if (!value) return ''
    value = value.toString()
    return value.toUpperCase()
})

Vue.filter('html', (value)=>{
    console.log(value);
    value = value.toString()
    value.replace(/&lt;/g, "<");
    value.replace(/&gt;/g, ">");
    console.log(value);
    return value
})

new Vue({
    el: '#app',
    store,
    render: h => h(App)
})
