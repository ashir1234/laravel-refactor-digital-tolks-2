require('./bootstrap');

import Vue from 'vue'
import Vuetify from "vuetify";
import VueRouter from 'vue-router'
// import routes from './routes'
import App from './components/App.vue'
import "vuetify/dist/vuetify.min.css"; // Ensure you are using css-loader


Vue.use(VueRouter)
Vue.use(Vuetify, {
    theme: {
      themes: {
        light: {
          primary: "#3f51b5",
          secondary: "#b0bec5",
          accent: "#8c9eff",
          error: "#b71c1c"
        }
      }
    }
  });


const app = new Vue({
    el: '#app',
    components: { App },
    // router: new VueRouter(routes)
})
