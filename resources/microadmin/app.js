require("./bootstrap");
window.Vue = require("vue").default;
import router from "./router";
import store from "./store/index.js";
import App from "./App.vue";
import Toasted from "vue-toasted";
import Vuetify from "vuetify";
import "vuetify/dist/vuetify.min.css";
import "material-design-icons-iconfont/dist/material-design-icons.css";
import '@mdi/font/css/materialdesignicons.css'
import CKEditor from "@ckeditor/ckeditor5-vue";

Vue.use(Vuetify);
Vue.use(Toasted);
Vue.use(CKEditor);

const app = new Vue({
    router,
    store,
    watch: {
        $route(to, from) {
            document.title = to.meta.title;
        },
    },
    vuetify: new Vuetify({
        icons: {
            iconfont: "md",
        },
    }),
    render: (h) => h(App),
}).$mount("#app");
